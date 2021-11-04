<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        return view('admin/category/index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/category/create');
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
            'banner' => ['required', 'mimes:jpeg,jpg,png'],
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/category/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Category;
            $save->title = $request->title;
            $save->url_slug = $request->url_slug;
            $save->description = $request->description;
            if($request->file("banner")){
                $banner_image = $request->file("banner");
                $banner = Storage::disk('public')->put('category', $banner_image);
                $banner_file_name = basename($banner);
                $save->img = $banner_file_name;
            }
            $save->status = $request->status;
        
            if($save->save()){
                $id = $save->id;// Get Last Inserted Id
                return redirect('admin/category')->with(['success'=>'Category Added Successfully']);    
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
        $category = Category::find($id);
        return view('admin/category/edit',compact('category'));
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
            'banner' => ['required', 'mimes:jpeg,jpg,png'],
            'title' => ['required'],
            'description' => ['required'],
            'status' => ['required'],            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $category = Category::find($id);
            if(empty($category)){
                return redirect()->back()->with(['error'=>'Invalid Category Id']);
            }
            $category->title = $request->title;
            $category->url_slug = $request->url_slug;
            $category->description = $request->description;
            
            if($request->file("banner")){
                 #remove old img
                 if (Storage::exists('/public/category/'.@$category->banner)){
                    Storage::disk('public')->delete('category/'.@$category->banner);
                }
                $banner_image = $request->file("banner");
                $bannerImg = Storage::disk('public')->put('category', $banner_image);
                $banner_file_name = basename($bannerImg);
                $category->img = $banner_file_name;
            }
            $category->status = $request->status;           

            if($category->save()){
                return redirect('admin/category')->with(['success'=>'Category Updated Successfully']);    
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
        //
    }
}
