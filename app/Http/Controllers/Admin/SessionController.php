<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\ProgramSession;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $session = ProgramSession::get();
        return view('admin/program/session/index',compact('session'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $program = Program::where('status','active')->get();
        return view('admin/program/session/create',compact('program'));
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
            'program' => ['required'],           
            'description' => ['required'],            
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/session/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new ProgramSession;
            $save->title = $request->title;
            $save->program = $request->program;
            $save->description = $request->description;
            
         

            if($request->file("document")){
                $doc_document = $request->file("document");
                $document = Storage::disk('public')->put('program', $doc_document);
                $document_file_name = basename($document);
                $save->document = $document_file_name;
            }

         

            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/session')->with(['success'=>'Session Added Successfully']);    
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
        $session = ProgramSession::find($id);
        $program = Program::where('status','active')->get();
        return view('admin/program/session/edit',compact('program','session'));
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
            'program' => ['required'],           
            'description' => ['required'],            
            'status' => ['required'],       
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $program = ProgramSession::find($id);
            if(empty($program)){
                return redirect()->back()->with(['error'=>'Invalid Session Id']);
            }
            $program->title = $request->title;
            $program->program = $request->program;
            $program->description = $request->description;
            
           
            if($request->file("document")){
                #remove old document
                if (Storage::exists('/public/program/'.@$program->document)){
                   Storage::disk('public')->delete('program/'.@$program->document);
               }
               
               $doc_document = $request->file("document");
               $document = Storage::disk('public')->put('program', $doc_document);
               $doc_file_name = basename($document);
               $program->document = $doc_file_name;
              

           }

        

            $program->status = $request->status;           
            if($program->save()){
                return redirect('admin/session')->with(['success'=>'Session Updated Successfully']);    
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
            $res = ProgramSession::where('id',$id)->first();

            if (Storage::exists('/public/program/'.@$res->document)){
                Storage::disk('public')->delete('program/'.@$res->document);
            }
           
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Session Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Session Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
