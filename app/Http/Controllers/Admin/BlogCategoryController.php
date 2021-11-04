<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = BlogCategory::get();
        return view('admin/blog/blogcategory/index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/blog/blogcategory/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #validation
        $validator = Validator::make($request->all(), [
            'img' => ['required', 'mimes:jpeg,jpg,png'],
            'name' => ['required'],            
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/blogcategory/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new BlogCategory;
            $save->name = $request->name;           
            
            if($request->file("img")){
                $banner_image = $request->file("img");
                $banner = Storage::disk('public')->put('blog', $banner_image);
                $banner_file_name = basename($banner);
                $save->img = $banner_file_name;
            }
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/blogcategory')->with(['success'=>'Blog Category Added Successfully']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = BlogCategory::find($id);
        return view('admin/blog/blogcategory/edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $category = BlogCategory::find($id);
            if(empty($category)){
                return redirect()->back()->with(['error'=>'Invalid Blog Category Id']);
            }
            $category->name = $request->name;
                     
            if($request->file("img")){
                 #remove old img
                 if (Storage::exists('/public/blog/'.@$category->img)){
                    Storage::disk('public')->delete('blog/'.@$category->img);
                }
                
                $banner_image = $request->file("img");
                $bannerImg = Storage::disk('public')->put('blog', $banner_image);
                $banner_file_name = basename($bannerImg);
                $category->img = $banner_file_name;
               

            }

            $category->status = $request->status;           
            if($category->save()){
                return redirect('admin/blogcategory')->with(['success'=>'Blog Category Updated Successfully']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $res = BlogCategory::where('id',$id)->first();

            if (Storage::exists('/public/blog/'.@$res->img)){
                Storage::disk('public')->delete('blog/'.@$res->img);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Blog Category Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Blog Category Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
