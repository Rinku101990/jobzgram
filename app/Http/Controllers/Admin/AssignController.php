<?php

namespace App\Http\Controllers\Admin;

use App\Models\Batch;
use App\Models\User;
use App\Models\TeacherStudent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assign = TeacherStudent::get();
        return view('admin/assign/index',compact('assign'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $batch = Batch::where('status','active')->get();
        $student = User::where('status','active')->where('registerAs','student')->get();
         return view('admin/assign/create',compact('batch','student'));
    }


    public function teacher($id)
    {
        $batch = Batch::with('getteacher')->where('id',$id)->first();
        return response()->json(['data' => $batch]);
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
            'batch' => ['required'],
            'teacher' => ['required'],
            'student' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/assign/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new TeacherStudent;
            $save->batch = $request->batch;
            $save->teacher = $request->teacher;
            $save->student = $request->student;         
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/assign')->with(['success'=>'Assign Student Added Successfully']);    
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
        $assign = TeacherStudent::find($id);
        $batch = Batch::where('status','active')->get();
        $student = User::where('status','active')->where('registerAs','student')->get();
        $teacher = User::where('status','active')->where('registerAs','teacher')->get();
        return view('admin/assign/edit',compact('assign','batch','student','teacher'));
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
            'batch' => ['required'],
            'teacher' => ['required'],
            'student' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $assign = TeacherStudent::find($id);
            if(empty($banner)){
                return redirect()->back()->with(['error'=>'Invalid Assign Id']);
            }
           
            $assign->batch = $request->batch;
            $assign->teacher = $request->teacher;
            $assign->student = $request->student;         
            $assign->status = $request->status;           
               
            if($assign->save()){
                return redirect('admin/assign')->with(['success'=>'Assign Student Updated Successfully']);    
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
            $res = TeacherStudent::where('id',$id)->first();

           
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Assign Student Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Assign Student Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
