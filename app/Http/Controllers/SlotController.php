<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slot;
use App\Models\Week;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $user = auth()->user();
        $slot = Slot::where('child_counsellor',$user->id)->get();        
        
        return view('user/slot/index',compact('slot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $week = Week::where('status','active')->get(); 
        return view('user/slot/create',compact('week'));
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
        'slot_date' => ['required'],
        'start_time' => ['required'],
        'end_time' => ['required'],
        'status' => ['required'],
    ]);
    if ($validator->fails()) {
        return redirect('slot/create')->withErrors($validator)->withInput();
    }

    try{
        $save = new Slot;
        $save->child_counsellor = auth()->user()->id;
        $save->slot_date = $request->slot_date;
        $save->start_time = $request->start_time;
        $save->end_time = $request->end_time;    
      
        $save->status = $request->status;
       
        if($save->save()){
            return redirect('slot')->with(['success_message'=>'Slot Added Successfully']);    
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
      
        $slot = Slot::find($id);  
        $week = Week::where('status','active')->get();      
        return view('user/slot/edit',compact('slot','week'));
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
            'slot_date' => ['required'],
            'start_time' => ['required'],
            'end_time' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $slot = Slot::find($id);
            if(empty($slot)){
                return redirect()->back()->with(['error'=>'Invalid Slot Id']);
            }
            $slot->slot_date = $request->slot_date;
            $slot->start_time = $request->start_time;
            $slot->end_time = $request->end_time;  
            $slot->status = $request->status;           
            if($slot->save()){
                return redirect('slot')->with(['success_message'=>'Slot Updated Successfully']);    
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
        //
    }
}
