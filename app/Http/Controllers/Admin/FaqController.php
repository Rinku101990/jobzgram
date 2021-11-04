<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Faq::get();
        return view('admin/faq/index',compact('faq'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/faq/create');
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
            'question' => ['required'],
            'answer' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/faq/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Faq;
            $save->question = $request->question;
            $save->answer = $request->answer;
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/faq')->with(['success'=>'Faq Added Successfully']);    
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
        $faq = Faq::find($id);
        return view('admin/faq/edit',compact('faq'));
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
            'question' => ['required'],
            'answer' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $faq = Faq::find($id);
            if(empty($faq)){
                return redirect()->back()->with(['error'=>'Invalid Faq Id']);
            }
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->status = $request->status;           
            if($faq->save()){
                return redirect('admin/faq')->with(['success'=>'Faq Updated Successfully']);    
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
            $res = Faq::where('id',$id)->first();
            
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Faq Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Faq Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
