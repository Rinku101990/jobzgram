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
        $category = Category::where('status','active')->get();
        return view('admin/program/create',compact('category'));
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
            'category'=>['required'],
            'fees' => ['required'],
            'description' => ['required'],
            'status' => ['required']
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
            $save->description = $request->description;
            
            // if($request->file("banner")){
            //     $banner_image = $request->file("banner");
            //     $banner = Storage::disk('public')->put('program', $banner_image);
            //     $banner_file_name = basename($banner);
            //     $save->banner = $banner_file_name;
            // }

            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/program')->with(['success'=>'Job Added Successfully']);    
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
        $category = Category::where('status','active')->get();
        return view('admin/program/edit',compact('program','category'));
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
            'description' => ['required'],          
            'status' => ['required']      
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $program = Program::find($id);
            if(empty($program)){
                return redirect()->back()->with(['error'=>'Invalid Job Id']);
            }
            $program->title = $request->title;
            $program->title_slug = $request->title_slug;
            $program->cate_id = $request->category;
            $program->fees = $request->fees;
            $program->description = $request->description;

            
            // if($request->file("banner")){
            //      #remove old img
            //      if (Storage::exists('/public/program/'.@$program->banner)){
            //         Storage::disk('public')->delete('program/'.@$program->banner);
            //     }
                
            //     $banner_image = $request->file("banner");
            //     $bannerImg = Storage::disk('public')->put('program', $banner_image);
            //     $banner_file_name = basename($bannerImg);
            //     $program->banner = $banner_file_name;
               

            // }

            $program->status = $request->status;           
            if($program->save()){
                return redirect('admin/program')->with(['success'=>'Job Updated Successfully']);    
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
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Job Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Job not deleted try again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
    
}
