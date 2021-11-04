<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\speaker;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speaker = speaker::get();
        return view('admin/speaker/index',compact('speaker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/speaker/create');
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
            'email' => ['required'],
            'phone' => ['required'],
            'designation' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/speaker/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new speaker;
            $save->name = $request->name;
            $save->email = $request->email;
            $save->phone = $request->phone;
            $save->designation = $request->designation;
            
            if($request->file("img")){
                $banner_image = $request->file("img");
                $banner = Storage::disk('public')->put('speaker', $banner_image);
                $banner_file_name = basename($banner);
                $save->img = $banner_file_name;
            }
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/speaker')->with(['success'=>'Speaker Added Successfully']);    
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
        $speaker = speaker::find($id);
        return view('admin/speaker/edit',compact('speaker'));
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
            'email' => ['required'],
            'phone' => ['required'],
            'designation' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $speaker = speaker::find($id);
            if(empty($speaker)){
                return redirect()->back()->with(['error'=>'Invalid Speaker Id']);
            }
            $speaker->name = $request->name;
            $speaker->email = $request->email;
            $speaker->phone = $request->phone;
            $speaker->designation = $request->designation;
            
            if($request->file("img")){
                 #remove old img
                 if (Storage::exists('/public/speaker/'.@$speaker->img)){
                    Storage::disk('public')->delete('speaker/'.@$speaker->img);
                }
                
                $banner_image = $request->file("img");
                $bannerImg = Storage::disk('public')->put('speaker', $banner_image);
                $banner_file_name = basename($bannerImg);
                $speaker->img = $banner_file_name;
               

            }

            $speaker->status = $request->status;           
            if($speaker->save()){
                return redirect('admin/speaker')->with(['success'=>'Speaker Updated Successfully']);    
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
            $res = speaker::where('id',$id)->first();

            if (Storage::exists('/public/speaker/'.@$res->img)){
                Storage::disk('public')->delete('speaker/'.@$res->img);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Speaker Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Speaker Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
