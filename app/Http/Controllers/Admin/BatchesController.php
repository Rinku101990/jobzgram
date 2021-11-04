<?php

namespace App\Http\Controllers\Admin;

use App\Models\BatchesByAdmin;
use App\Models\User;
use App\Models\BookedProgram;
use App\Models\DaysOfWeek;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = BatchesByAdmin::get();
        $mentorList=array();
        foreach($batches as $btcList)
        {
            $mentorList[] = User::where('id',$btcList->mentor)->where('registerAs','teacher')->first();
        }
        return view('admin/batches/index',compact('batches','mentorList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mentor  = User::where('registerAs','teacher')->get();
        $student = BookedProgram::get();
        return view('admin/batches/create',compact('mentor','student'));
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
            'start_date' => ['required'],
            'end_date' => ['required'],
            'session' => ['required'],
            'week_day' => ['required'],
            'week_time' => ['required'],
            'students' => ['required']
        ]);
        if ($validator->fails()) {
            return redirect('admin/batches/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new BatchesByAdmin;
            $save->start_date = $request->start_date;
            $save->end_date = $request->end_date;
            $save->session = $request->session;

            // Array To String Conversion //
            $student = $request->students;
            $studentUpdated = implode(', ',$student);
            $save->students = $studentUpdated;

            $save->mentor = $request->mentor;
            $save->save();
            
            // Update Related Week and Time //
            $weekDays = $request->week_day;
            $weekTime = $request->week_time;
            $weekDaysTime = [];
            foreach($weekDays as $key=>$wDays){
                foreach($weekTime as $key1=>$wTime){
                    if($key==$key1){
                        $weekDaysTime[] = [
                            'batches_id' => $save->id,
                            'days' => $wDays,
                            'time' => $wTime,
                            'updated_at'=> NOW(),
                            'created_at'=> NOW()
                        ];
                    }
                }
            }
            DaysOfWeek::insert($weekDaysTime); // Save Array Record //
            if($save->save()){
                return redirect('admin/batches')->with(['success'=>'Batche Created Successfully']);    
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
        // $mentor  = User::where('registerAs','teacher')->get();
        // $student = BookedProgram::get();
        $batch = BatchesByAdmin::find($id);
        $weekDays = DaysOfWeek::where('batches_id',$id)->get();
        $mentor = User::where('id',$batch->mentor)->where('registerAs','teacher')->first();
        return view('admin/batches/show',compact('batch','weekDays','mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batches = BatchesByAdmin::find($id);
        return view('admin/batches/edit',compact('batches'));
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
        //
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
            $res = BatchesByAdmin::where('id',$id)->first();

            if (Storage::exists('/public/batches/'.@$res->img)){
                Storage::disk('public')->delete('batches/'.@$res->img);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Batches Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Batches Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
