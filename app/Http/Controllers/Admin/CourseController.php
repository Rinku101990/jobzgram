<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::get();
        return view('admin/course/index',compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/course/create');
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
            'title' => ['required'],
            'amount' => ['required','numeric'],
            // 'duration' => ['required','numeric'],
            // 'type' => ['required'],
            'age_group' => ['required'],
            'description' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/course/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Course;
            $save->title = $request->title;
            $save->amount = $request->amount;
            // $save->duration = $request->duration;
            // $save->type = $request->type;
            $save->age_group = $request->age_group;
            $save->description = $request->description;
            
            if($request->file("img")){
                $banner_image = $request->file("img");
                $banner = Storage::disk('public')->put('course', $banner_image);
                $banner_file_name = basename($banner);
                $save->img = $banner_file_name;
            }
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/course')->with(['success'=>'Course Added Successfully']);    
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
        $course = Course::find($id);
        return view('admin/course/edit',compact('course'));
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
            'amount' => ['required','numeric'],
            // 'duration' => ['required','numeric'],
            // 'type' => ['required'],
            'age_group'=>['required'],
            'description' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $course = Course::find($id);
            if(empty($course)){
                return redirect()->back()->with(['error'=>'Invalid Course Id']);
            }
            $course->title = $request->title;
            $course->amount = $request->amount;
            // $course->duration = $request->duration;
            // $course->type = $request->type;
            $course->age_group = $request->age_group;
            $course->description = $request->description;
            
            if($request->file("img")){
                 #remove old img
                 if (Storage::exists('/public/course/'.@$course->img)){
                    Storage::disk('public')->delete('course/'.@$course->img);
                }
                
                $banner_image = $request->file("img");
                $bannerImg = Storage::disk('public')->put('course', $banner_image);
                $banner_file_name = basename($bannerImg);
                $course->img = $banner_file_name;             

            }

            $course->status = $request->status;           
            if($course->save()){
                return redirect('admin/course')->with(['success'=>'Course Updated Successfully']);    
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
            $res = Course::where('id',$id)->first();

            if (Storage::exists('/public/course/'.@$res->img)){
                Storage::disk('public')->delete('course/'.@$res->img);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Course Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Course Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
