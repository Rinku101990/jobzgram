<?php

namespace App\Http\Controllers\Admin;

use App\Models\StudyMaterial;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudyMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $study = StudyMaterial::get();
        return view('admin/studymaterial/index',compact('study'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = User::where('status','active')->where('registerAs','teacher')->get();      
        return view('admin/studymaterial/create',compact('teacher'));
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
            'title' => ['required'], 
            'teacher' => ['required'],              
            'description' => ['required'],                   
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/study-material/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new StudyMaterial;
            $save->title = $request->title;        
            $save->teacher_id = $request->teacher; 
            $save->description = $request->description;          
            

                        // start img
                        if($request->file("img")){
                            $img_image = $request->file("img");
                            $get_img= Storage::disk('public')->put('studymaterial', $img_image);
                            $img_file_name = basename($get_img);
                            $save->img = $img_file_name;
                        }
                        // end img
                         // start video
                         if($request->file("video")){
                            $batch_video= $request->file("video");
                            $get_Video= Storage::disk('public')->put('studymaterial', $batch_video);
                            $video_file_name = basename($get_Video);
                            $save->video = $video_file_name;
                        }
                        // end img
                         // start document
                         if($request->file("document")){
                            $batch_document= $request->file("document");
                            $get_document= Storage::disk('public')->put('studymaterial', $batch_document);
                            $document_file_name = basename($get_document);
                            $save->document = $document_file_name;
                        }
                        // end document
                        $save->link = $request->link; 
            
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/study-material')->with(['success'=>'Study Material Added Successfully']);    
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
        
        $study = StudyMaterial::find($id);
        $teacher = User::where('status','active')->where('registerAs','teacher')->get();  
        return view('admin/studymaterial/edit',compact('study','teacher'));
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
            'teacher' => ['required'],              
            'description' => ['required'],                   
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $study = StudyMaterial::find($id);
            if(empty($study)){
                return redirect()->back()->with(['error'=>'Invalid Study Material Id']);
            }
            $study->title = $request->title;
            $study->teacher_id = $request->teacher;    
            $study->description = $request->description;
             // start img
              if($request->file("img")){
                #remove old img
               if (Storage::exists('/public/studymaterial/'.@$study->img)){
                   Storage::disk('public')->delete('studymaterial/'.@$study->img);
               }
               $img_image = $request->file("img");
               $get_img= Storage::disk('public')->put('studymaterial', $img_image);
               $img_file_name = basename($get_img);
               $study->img = $img_file_name;
           }
           // end img
            // start video
            if($request->file("video")){
             #remove old video
             if (Storage::exists('/public/studymaterial/'.@$study->video)){
               Storage::disk('public')->delete('studymaterial/'.@$study->video);
               }
               $batch_video= $request->file("video");
               $get_Video= Storage::disk('public')->put('studymaterial', $batch_video);
               $video_file_name = basename($get_Video);
               $study->video = $video_file_name;
           }
           // end img
            // start document
            if($request->file("document")){
                  #remove old document
             if (Storage::exists('/public/studymaterial/'.@$study->document)){
               Storage::disk('public')->delete('studymaterial/'.@$study->document);
               }
               $batch_document= $request->file("document");
               $get_document= Storage::disk('public')->put('studymaterial', $batch_document);
               $document_file_name = basename($get_document);
               $study->document = $document_file_name;
           }
           // end document
           $study->link = $request->link; 
          
            $study->status = $request->status;           
            if($study->save()){
                return redirect('admin/study-material')->with(['success'=>'Study Material Updated Successfully']);    
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
            $res = StudyMaterial::where('id',$id)->first();

            if (Storage::exists('/public/studymaterial/'.@$res->img)){
                Storage::disk('public')->delete('studymaterial/'.@$res->img);
            }
            if (Storage::exists('/public/studymaterial/'.@$res->video)){
                Storage::disk('public')->delete('studymaterial/'.@$res->video);
            }
            if (Storage::exists('/public/studymaterial/'.@$res->document)){
                Storage::disk('public')->delete('studymaterial/'.@$res->document);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Study Material Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Study Material Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
