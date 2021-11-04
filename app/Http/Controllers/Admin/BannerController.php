<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{

  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::get();
        return view('admin/banner/index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/banner/create');
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
            'file' => ['required', 'mimes:jpeg,jpg,png'],
            'title' => ['required'],
            'pageLink' => [''],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/banner/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Banner;
            $save->title = $request->title;
            $save->pageLink = $request->pageLink;
            
            if($request->file("file")){
                $banner_image = $request->file("file");
                $banner = Storage::disk('public')->put('banner', $banner_image);
                $banner_file_name = basename($banner);
                $save->file = $banner_file_name;
            }
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/banner')->with(['success'=>'Banner Added Successfully']);    
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
        $banner = Banner::find($id);
        return view('admin/banner/edit',compact('banner'));
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
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $banner = Banner::find($id);
            if(empty($banner)){
                return redirect()->back()->with(['error'=>'Invalid Banner Id']);
            }
            $banner->title = $request->title;
            $banner->pageLink = $request->pageLink;
            
            if($request->file("file")){
                 #remove old img
                 if (Storage::exists('/public/banner/'.@$banner->file)){
                    Storage::disk('public')->delete('banner/'.@$banner->file);
                }
                
                $banner_image = $request->file("file");
                $bannerImg = Storage::disk('public')->put('banner', $banner_image);
                $banner_file_name = basename($bannerImg);
                $banner->file = $banner_file_name;
               

            }

            $banner->status = $request->status;           
            if($banner->save()){
                return redirect('admin/banner')->with(['success'=>'Banner Updated Successfully']);    
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
            $res = Banner::where('id',$id)->first();

            if (Storage::exists('/public/banner/'.@$res->file)){
                Storage::disk('public')->delete('banner/'.@$res->file);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Banner Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Banner Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }

    
}
