<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::get();
        return view('admin/testimonial/index',compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/testimonial/create');
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
            'designation' => ['required'],   
            'title' => ['required'],   
            'description' => ['required'],             
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/testimonial/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Testimonial;
            $save->name = $request->name; 
            $save->designation = $request->designation; 
            $save->title = $request->title;     
            $save->description = $request->description;           
            
            if($request->file("img")){
                $banner_image = $request->file("img");
                $banner = Storage::disk('public')->put('testimonial', $banner_image);
                $banner_file_name = basename($banner);
                $save->img = $banner_file_name;
            }
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/testimonial')->with(['success'=>'Testimonial Added Successfully']);    
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
        $testimonial = Testimonial::find($id);
        return view('admin/testimonial/edit',compact('testimonial'));
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
            'designation' => ['required'],
            'title' => ['required'],
            'description' => ['required'],            
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $testimonial = Testimonial::find($id);
            if(empty($testimonial)){
                return redirect()->back()->with(['error'=>'Invalid Testimonial Id']);
            }
            $testimonial->name = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->title = $request->title;
            $testimonial->description = $request->description;
                     
            if($request->file("img")){
                 #remove old img
                 if (Storage::exists('/public/testimonial/'.@$testimonial->img)){
                    Storage::disk('public')->delete('testimonial/'.@$testimonial->img);
                }
                
                $banner_image = $request->file("img");
                $bannerImg = Storage::disk('public')->put('testimonial', $banner_image);
                $banner_file_name = basename($bannerImg);
                $testimonial->img = $banner_file_name;
               

            }

            $testimonial->status = $request->status;           
            if($testimonial->save()){
                return redirect('admin/testimonial')->with(['success'=>'Testimonial Updated Successfully']);    
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
            $res = Testimonial::where('id',$id)->first();

            if (Storage::exists('/public/testimonial/'.@$res->img)){
                Storage::disk('public')->delete('testimonial/'.@$res->img);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Testimonial Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Testimonial Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
