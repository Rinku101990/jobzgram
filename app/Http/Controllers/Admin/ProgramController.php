<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use App\Models\Category;
use App\Models\BookedProgram;
use App\Models\Batch;
use App\Models\ZoomLinks;
use App\Models\TagCategory;
use App\Models\SearchTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ZoomJWT;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    use ZoomJWT;
    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program = Program::get();
        return view('admin/program/index',compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagCategoryId = '5';
        $tags = SearchTag::where('tag_cate_id',$tagCategoryId)->get();
        $batch = Batch::where('status','active')->get();
        $category = Category::where('status','active')->get();
        return view('admin/program/create',compact('batch','category','tags'));
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
            'category'=>['required'],
            'fees' => ['required'],
            'age_group'=>['required'],
            'batch' => ['required'],
            'rate_per_session' => ['required'],
            'about_mentor' => ['required'],
            'short_description' => ['required'],
            'description' => ['required'],
            'training_material' => ['required'],
            'status' => ['required'],
            'tags'=>['required']
        ]);
        if ($validator->fails()) {
            return redirect('admin/program/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Program;
            $save->title = $request->title;
            $save->title_slug = $request->title_slug;
            $save->cate_id = $request->category;
            $save->fees = $request->fees;
            $save->age_group = $request->age_group;
            $save->batch = $request->batch;
            $save->rate_per_session = $request->rate_per_session;
            $save->about_mentor = $request->about_mentor;

            $save->about_course = $request->about_course;
            $save->why_joinus = $request->why_joinus;
            $save->gain_after = $request->gain_after;
            $save->curriculum = $request->curriculum;
            $save->batch_strength = $request->batch_strength;
            $save->class_per_week = $request->class_per_week;

            $save->short_description = $request->short_description;
            $save->description = $request->description;
            
            if($request->file("banner")){
                $banner_image = $request->file("banner");
                $banner = Storage::disk('public')->put('program', $banner_image);
                $banner_file_name = basename($banner);
                $save->banner = $banner_file_name;
            }

            if($request->file("training_material")){
                $doc_training_material = $request->file("training_material");
                $document = Storage::disk('public')->put('program', $doc_training_material);
                $document_file_name = basename($document);
                $save->training_material = $document_file_name;
            }

            
            if($request->file("program_presentations")){
                $doc_program_presentations = $request->file("program_presentations");
                $document2 = Storage::disk('public')->put('program', $doc_program_presentations);
                $document_file_name2 = basename($document2);
                $save->program_presentations = $document_file_name2;
            }
            
            $tagsImplode = implode(',',$request->tags);
            $save->search_tag = $tagsImplode;
            $save->status = $request->status;
           
            if($save->save()){
                $id = $save->id;
                 # Call Rest Api to create zoom link
                $startDate = now();
                $path = 'users/me/meetings';
                $response = $this->zoomPost($path, [
                    'topic' => $request->title,
                    'type' => self::MEETING_TYPE_SCHEDULE,
                    'start_time' => $this->toZoomTimeFormat($startDate),
                    'duration' => 30,
                    'agenda' => $request->title,
                    'settings' => [
                        'host_video' => false,
                        'participant_video' => false,
                        'waiting_room' => true,
                    ]
                ]);
                /*start zoom link save  */
                $zoomCreate = json_decode($response->body(), true);
                $zooms = new ZoomLinks;
                $zooms->zoom_pgrm_id = $id;
                $zooms->zoom_ref_id = $zoomCreate['id'];
                $zooms->zoom_host_email = $zoomCreate['host_email'];
                $zooms->zoom_topic = $zoomCreate['topic'];  
                $zooms->zoom_agenda = $zoomCreate['agenda']; 
                $zooms->zoom_join_url = $zoomCreate['join_url']; 
                $zooms->zoom_join_password = $zoomCreate['password']; 
                $zooms->zoom_start_time = $zoomCreate['start_time']; 
                $zooms->zoom_status = $zoomCreate['status']; 
                $zooms->zoom_timezone = $zoomCreate['timezone']; 
                $zooms->save();
                /* end zoom link save */

                return redirect('admin/program')->with(['success'=>'Program Added Successfully']);    
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
        $program = Program::find($id);
        $batch = Batch::where('status','active')->get();
        $category = Category::where('status','active')->get();
        $tagCategoryId = '5';
        $tags = SearchTag::where('tag_cate_id',$tagCategoryId)->get();
        return view('admin/program/edit',compact('program','batch','category','tags'));
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
            'category'=> ['required'],
            'fees' => ['required'],
            'age_group' => ['required'],
            'batch' => ['required'],
            'rate_per_session' => ['required'],
            'about_mentor' => ['required'],
            'short_description' => ['required'],
            'description' => ['required'],          
            'status' => ['required'],  
            'tags'=>['required']          
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $program = Program::find($id);
            if(empty($program)){
                return redirect()->back()->with(['error'=>'Invalid Program Id']);
            }
            $program->title = $request->title;
            $program->title_slug = $request->title_slug;
            $program->cate_id = $request->category;
            $program->fees = $request->fees;
            $program->age_group = $request->age_group;
            $program->batch = $request->batch;
            $program->rate_per_session = $request->rate_per_session;
            $program->about_mentor = $request->about_mentor;
            $program->description = $request->description;

            $program->about_course = $request->about_course;
            $program->why_joinus = $request->why_joinus;
            $program->gain_after = $request->gain_after;
            $program->curriculum = $request->curriculum;
            $program->batch_strength = $request->batch_strength;
            $program->class_per_week = $request->class_per_week;

            $program->short_description = $request->short_description;
            
            if($request->file("banner")){
                 #remove old img
                 if (Storage::exists('/public/program/'.@$program->banner)){
                    Storage::disk('public')->delete('program/'.@$program->banner);
                }
                
                $banner_image = $request->file("banner");
                $bannerImg = Storage::disk('public')->put('program', $banner_image);
                $banner_file_name = basename($bannerImg);
                $program->banner = $banner_file_name;
               

            }

            if($request->file("training_material")){
                #remove old training_material
                if (Storage::exists('/public/program/'.@$program->training_material)){
                   Storage::disk('public')->delete('program/'.@$program->training_material);
               }
               
               $doc_training_material = $request->file("training_material");
               $document = Storage::disk('public')->put('program', $doc_training_material);
               $doc_file_name = basename($document);
               $program->training_material = $doc_file_name;
              

           }

           if($request->file("program_presentations")){
            #remove old program_presentations
            if (Storage::exists('/public/program/'.@$program->program_presentations)){
               Storage::disk('public')->delete('program/'.@$program->program_presentations);
           }
           
           $doc_program_presentations = $request->file("program_presentations");
           $document2 = Storage::disk('public')->put('program', $doc_program_presentations);
           $doc_file_name2 = basename($document2);
           $program->program_presentations = $doc_file_name2;
 
        }
            // # Call Rest Api to create zoom link
            // $startDate = now();
            // $path = 'users/me/meetings';
            // $response = $this->zoomPost($path, [
            //     'topic' => $request->title,
            //     'type' => self::MEETING_TYPE_SCHEDULE,
            //     'start_time' => $this->toZoomTimeFormat($startDate),
            //     'duration' => 30,
            //     'agenda' => $request->title,
            //     'settings' => [
            //         'host_video' => false,
            //         'participant_video' => false,
            //         'waiting_room' => true,
            //     ]
            // ]);
            // /*start zoom link save  */
            // $zoomCreate = json_decode($response->body(), true);
            // $zooms = new ZoomLinks;
            // $zooms->zoom_pgrm_id = $id;
            // $zooms->zoom_ref_id = $zoomCreate['id'];
            // $zooms->zoom_host_email = $zoomCreate['host_email'];
            // $zooms->zoom_topic = $zoomCreate['topic'];  
            // $zooms->zoom_agenda = $zoomCreate['agenda']; 
            // $zooms->zoom_join_url = $zoomCreate['join_url']; 
            // $zooms->zoom_join_password = $zoomCreate['password']; 
            // $zooms->zoom_start_time = $zoomCreate['start_time']; 
            // $zooms->zoom_status = $zoomCreate['status']; 
            // $zooms->zoom_timezone = $zoomCreate['timezone']; 
            // $zooms->save();
            // /* end zoom link save */  
            
            $tagsImplode = implode(',',$request->tags);
            $program->search_tag = $tagsImplode;

            $program->status = $request->status;           
            if($program->save()){
                return redirect('admin/program')->with(['success'=>'Program Updated Successfully']);    
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
            $res = Program::where('id',$id)->first();

            if (Storage::exists('/public/program/'.@$res->banner)){
                Storage::disk('public')->delete('program/'.@$res->banner);
            }
            if (Storage::exists('/public/program/'.@$res->training_material)){
                Storage::disk('public')->delete('program/'.@$res->training_material);
            }
            if (Storage::exists('/public/program/'.@$res->program_presentations)){
                Storage::disk('public')->delete('program/'.@$res->program_presentations);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Program Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Program Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function booking_program()
    {
        $program = BookedProgram::get();
        return view('admin/program/booking_program',compact('program'));
    }
    
}
