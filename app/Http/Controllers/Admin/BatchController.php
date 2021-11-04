<?php

namespace App\Http\Controllers\Admin;

use App\Models\Batch;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batch = Batch::get();
        return view('admin/batch/index',compact('batch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = User::where('status','active')->where('registerAs','teacher')->get();      
        return view('admin/batch/create',compact('teacher'));
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
            'name' => ['required'], 
            'teacher' => ['required'],   
            'start_date' => ['required'],  
            'end_date' => ['required'],  
            'schedule' => ['required'],  
            'time' => ['required'],                   
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/batch/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Batch;
            $save->name = $request->name;        
            $save->teacher_id = $request->teacher;        
            $save->start_date = $request->start_date; 
            $save->end_date = $request->end_date; 
            $save->schedule = $request->schedule; 
            $save->duration = $request->time; 
            // start img
            if($request->file("img")){
                $img_image = $request->file("img");
                $get_img= Storage::disk('public')->put('batch', $img_image);
                $img_file_name = basename($get_img);
                $save->img = $img_file_name;
            }
            // end img
             // start video
             if($request->file("video")){
                $batch_video= $request->file("video");
                $get_Video= Storage::disk('public')->put('batch', $batch_video);
                $video_file_name = basename($get_Video);
                $save->video = $video_file_name;
            }
            // end img
             // start document
             if($request->file("document")){
                $batch_document= $request->file("document");
                $get_document= Storage::disk('public')->put('batch', $batch_document);
                $document_file_name = basename($get_document);
                $save->document = $document_file_name;
            }
            // end document
            $save->batch_link = $request->batch_link; 
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/batch')->with(['success'=>'Batch Added Successfully']);    
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
        $batch = Batch::find($id);
        $teacher = User::where('status','active')->where('registerAs','teacher')->get(); 
        return view('admin/batch/edit',compact('batch','teacher'));
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
            'teacher' => ['required'],   
            'start_date' => ['required'],  
            'end_date' => ['required'],  
            'schedule' => ['required'],  
            'time' => ['required'],                    
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $batch = Batch::find($id);
            if(empty($batch)){
                return redirect()->back()->with(['error'=>'Invalid Batch Id']);
            }
            $batch->name = $request->name;        
            $batch->teacher_id = $request->teacher;        
            $batch->start_date = $request->start_date; 
            $batch->end_date = $request->end_date; 
            $batch->schedule = $request->schedule; 
            $batch->duration = $request->time; 
                        // start img
                        if($request->file("img")){
                             #remove old img
                            if (Storage::exists('/public/batch/'.@$batch->img)){
                                Storage::disk('public')->delete('batch/'.@$batch->img);
                            }
                            $img_image = $request->file("img");
                            $get_img= Storage::disk('public')->put('batch', $img_image);
                            $img_file_name = basename($get_img);
                            $batch->img = $img_file_name;
                        }
                        // end img
                         // start video
                         if($request->file("video")){
                          #remove old video
                          if (Storage::exists('/public/batch/'.@$batch->video)){
                            Storage::disk('public')->delete('batch/'.@$batch->video);
                            }
                            $batch_video= $request->file("video");
                            $get_Video= Storage::disk('public')->put('batch', $batch_video);
                            $video_file_name = basename($get_Video);
                            $batch->video = $video_file_name;
                        }
                        // end img
                         // start document
                         if($request->file("document")){
                               #remove old document
                          if (Storage::exists('/public/batch/'.@$batch->document)){
                            Storage::disk('public')->delete('batch/'.@$batch->document);
                            }
                            $batch_document= $request->file("document");
                            $get_document= Storage::disk('public')->put('batch', $batch_document);
                            $document_file_name = basename($get_document);
                            $batch->document = $document_file_name;
                        }
                        // end document
            $batch->batch_link = $request->batch_link; 
            $batch->status = $request->status;          
            if($batch->save()){
                return redirect('admin/batch')->with(['success'=>'Batch Updated Successfully']);    
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
            $res = Batch::where('id',$id)->first();
            if (Storage::exists('/public/batch/'.@$res->img)){
                Storage::disk('public')->delete('batch/'.@$res->img);
            }
            if (Storage::exists('/public/batch/'.@$res->video)){
                Storage::disk('public')->delete('batch/'.@$res->video);
            }
            if (Storage::exists('/public/batch/'.@$res->document)){
                Storage::disk('public')->delete('batch/'.@$res->document);
            }

            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Batch Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Batch Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    
    }
}
