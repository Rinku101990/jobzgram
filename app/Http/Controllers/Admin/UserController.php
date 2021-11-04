<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('admin/user/index',compact('user'));
    }

    public function teacher()
    {
        $user = User::get();
        return view('admin/user/teacher',compact('user'));
    }

    public function counsellors()
    {
        $user = User::get();
        return view('admin/user/counsellors',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function view(Request $request)
    {        
            $user = User::find($request->id);
            return view('admin/user/view',compact('user'));
           
    }

    public function userStatus(Request $request) {
         try {
           
                $user = User::findOrFail($request->id);
                $user->status = $request->status;
                $user->updated_at = Carbon::now();
                if ($user->save()) {
                  
                    return redirect('admin/user/'.$request->id)->with(['success'=>'Status updated successfully.']);    
                } else {
                    return redirect('admin/user/'.$request->id)->with(['success'=>'Something went be wrong.']); 

                }
          
        } catch (\Exception $e) {
            return ['status' => false, "message" => $e->getMessage()];
        }
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
        //
    }
}
