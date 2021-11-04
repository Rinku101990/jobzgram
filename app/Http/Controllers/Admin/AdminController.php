<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        
        return view('admin.dashboard');
    }

    public function profile()
    {
       
        return view('admin.profile');
    }

    public function profile_update(Request $request )
    {
        // dd($request->name);
        $id=auth()->guard('admin')->user()->id;
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'mobile' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $user = User::find($id);
            if(empty($user)){
                return redirect()->back()->with(['error'=>'Invalid admin Id']);
            }
            $user->name = $request->name;
            $user->mobile = $request->mobile;
            
            if($request->file("img")){
                 #remove old img
                 if (Storage::exists('/public/profile/'.@$user->profileImage)){
                    Storage::disk('public')->delete('profile/'.@$user->profileImage);
                }
                
                $banner_image = $request->file("img");
                $bannerImg = Storage::disk('public')->put('profile', $banner_image);
                $banner_file_name = basename($bannerImg);
                $user->profileImage = $banner_file_name;
               

            }

                    
            if($user->save()){
                return redirect('admin/profile')->with(['success'=>'Profile Updated Successfully']);    
            }else{
                return back()->with(['error'=>'Something went wrong!!']);
            }
            
        }catch(\Exception $e){
            dd($e);
        }
    }
}
