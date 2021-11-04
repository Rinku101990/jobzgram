<?php

namespace App\Http\Controllers\Admin;

use App\Models\Page;
use Illuminate\Http\Request;;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = Page::get();
        return view('admin/page/index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/page/create');
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
            return redirect('admin/page/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Page;
            $save->title = $request->title;
            $save->description = $request->description;
            
            if($request->file("banner")){
                $banner_image = $request->file("banner");
                $banner = Storage::disk('public')->put('page', $banner_image);
                $banner_file_name = basename($banner);
                $save->banner = $banner_file_name;
            }
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/page')->with(['success'=>'Page Added Successfully']);    
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
        $page = Page::find($id);
        return view('admin/page/edit',compact('page'));
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
            'title' => ['required'],
            'status' => ['required'],
            'description' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $page = Page::find($id);
            if(empty($page)){
                return redirect()->back()->with(['error'=>'Invalid Page Id']);
            }
            $page->title = $request->title;
            $page->description = $request->description;
            
            if($request->file("banner")){
                 #remove old img
                 if (Storage::exists('/public/page/'.@$page->banner)){
                    Storage::disk('public')->delete('page/'.@$page->banner);
                }
                
                $banner_image = $request->file("banner");
                $bannerImg = Storage::disk('public')->put('page', $banner_image);
                $banner_file_name = basename($bannerImg);
                $page->banner = $banner_file_name;
               

            }

            $page->status = $request->status;           
            if($page->save()){
                return redirect('admin/page')->with(['success'=>'Page Updated Successfully']);    
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
            $res = Page::where('id',$id)->first();

            if (Storage::exists('/public/page/'.@$res->banner)){
                Storage::disk('public')->delete('page/'.@$res->banner);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Page Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Page Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
