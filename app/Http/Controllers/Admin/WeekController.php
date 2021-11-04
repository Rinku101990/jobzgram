<?php

namespace App\Http\Controllers\Admin;

use App\Models\Week;
use App\Models\Slot;
use App\Models\BookedSlot;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $week = Week::get();
        return view('admin/week/index',compact('week'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
         return view('admin/week/create');
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
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/week/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Week;
            $save->title = $request->title;  
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/week')->with(['success'=>'Week Added Successfully']);    
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
        
        $week = Week::find($id);       
        return view('admin/week/edit',compact('week'));
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
            $week = Week::find($id);
            if(empty($week)){
                return redirect()->back()->with(['error'=>'Invalid Week Id']);
            }
            $week->title = $request->title;
            $week->status = $request->status;           
            if($week->save()){
                return redirect('admin/week')->with(['success'=>'Week Updated Successfully']);    
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
            $res = Week::where('id',$id)->first();
            
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Week Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Week Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }

    public function slot()
    {
        $slot = Slot::get();
        return view('admin/week/slot',compact('slot'));
    }

    public function booking_appointment()
    {
        $appointment = BookedSlot::get();
        return view('admin/week/booking_appointment',compact('appointment'));
    }
}
