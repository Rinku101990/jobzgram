<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Media;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\MembershipPackage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function category(){
        $category = Category::select('id','name','icon')->where('status','active')->get();
        return response()->json(['status'=>true,'data'=>$category]);
    }

    public function membershipPackages(){
        $data = MembershipPackage::select('id','title','price','duration','features')->where('status','active')->get();
        return response()->json(['status'=>true,'data'=>$data]);
    }

    #edit profile
    public function editProfile(Request $request){
        
        DB::beginTransaction();
        try{

            $user = auth()->user();
            if($request->prefixName){
                $user->prefixName = $request->prefixName;
            }
             
            if($request->name){
                $user->name = $request->name;
            }
             
            // if($request->email){
            //     $user->email = $request->email;
            // }

            // if($request->mobile){
            //     $user->mobile = $request->mobile;
            // }

            if($request->whatsAppNo){
                $user->whatsAppNo = $request->whatsAppNo;
            }

            if($request->website){
                $user->website = $request->website;
            }
             
            if($request->companyName){
                $user->companyName = $request->companyName;
            }

            if($request->repersenter){
                $user->repersenter = $request->repersenter;
            }
            
            if($request->state){
                $user->state = $request->state;
            }

            if($request->city){
                $user->city = $request->city;
            }
             
            if($request->zipCode){
                $user->zipCode = $request->zipCode;
            }

            if($request->facebook){
                $user->facebook = $request->facebook;
            }

            if($request->instagram){
                $user->instagram = $request->instagram;
            }

            if($request->twitter){
                $user->twitter = $request->twitter;
            }
             
            if($request->password){
                $user->password =  Hash::make($request->password);
            }

            if($request->displayAs){
                $user->displayAs = $request->displayAs;
            }

            if($request->height){
                $user->height = $request->height;
            }

            if($request->weight){
                $user->weight = $request->weight;
            }

            if($request->waist){
                $user->waist = $request->waist;
            }

            if($request->hairColor){
                $user->hairColor = $request->hairColor;
            }

            if($request->eyeColor){
                $user->eyeColor = $request->eyeColor;
            }

            if($request->skinTon){
                $user->skinTon = $request->skinTon;
            }

            if($request->dress){
                $user->dress = $request->dress;
            }

            if($request->experience){
                $user->experience = $request->experience;
            }

            if($request->maritalStatus){
                $user->maritalStatus = $request->maritalStatus;
            }

            if($request->gender){
                $user->gender = $request->gender;
            }

            if($request->languageKnown){
                $user->languageKnown = $request->languageKnown;
            }

            if($request->chargesFullDay){
                $user->chargesFullDay = $request->chargesFullDay;
            }

            if($request->chargesHalfDay){
                $user->chargesHalfDay = $request->chargesHalfDay;
            }

            if($request->chargesHours){
                $user->chargesHours = $request->chargesHours;
            }

            if($request->dob){
                $user->dob = $request->dob;
            }

            if($request->availableFor){
                $user->availableFor = $request->availableFor;
            }

            if($request->speciality){
                $user->speciality = $request->speciality;
            }

            if($request->currentState){
                $user->currentState = $request->currentState;
            }

            if($request->currentCity){
                $user->currentCity = $request->currentCity;
            }

            if($request->agencySigned){
                $user->agencySigned = $request->agencySigned;
            }

            if($request->preferredLocation){
                $user->preferredLocation = $request->preferredLocation;
            }

            if($request->about){
                $user->about = $request->about;
            }


            if($request->hasfile('profileImage')){           // profile image
                $primary_image = $request->file("profileImage");
                $primaryImg = Storage::disk('public')->put('profile', $primary_image);
                $ImgName = basename($primaryImg);
                $profileImage = basename($primaryImg);
              
                if (Storage::exists('/public/profile/'.@$user->profileImage)){
                    Storage::disk('public')->delete('profile/'.@$user->profileImage);
                }
    
                $user->profileImage = $profileImage;
    
            }

             $user->save();
             $user->profileImage = url('storage/profile/'.$user->profileImage);
                   
             DB::commit();   
             return response()->json(['status' => true , 'message'=> 'Profile Updated Successfully','data'=>$user]);
         } catch (\Exception $e) {
             dd($e);
             DB::rollback();
             return response()->json(['status'=>false,'message'=>$e]);
        }

    }

    # Upload Media
    public function uploadMedia(Request $request){
        $validation = Validator::make($request->all(), [
            'file' => 'required',
            'mediaType' => 'required',
        ]);

       if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
       }

       $user = auth()->user();

       DB::beginTransaction();
       try{

        $media = new Media;

        if($request->hasfile('file')){           // profile image
            $primary_image = $request->file("file");
            $primaryImg = Storage::disk('public')->put('media', $primary_image);
            $ImgName = basename($primaryImg);
            $file = basename($primaryImg);
        
            if (Storage::exists('/public/media/'.@$user->file)){
                Storage::disk('public')->delete('media/'.@$user->file);
            }

            $media->file = $file;

            }
            $media->user_id = auth()->user()->id;
            $media->title = $request->title;
            $media->description = $request->description;
            $media->mediaType = $request->mediaType;
            $media->save();
            
            DB::commit();   
            return response()->json(['status' => true , 'message'=> 'File Uploaded Successfully']);
       }catch(\Exception $e){
        dd($e);
        DB::rollback();
       }
       
    }

    #Media List
    public function uploadMediaList(Request $request){
        $mediaVideo = Media::select('id','title','description','file')->where(['mediaType'=>'video','user_id'=>auth()->user()->id])->get();
        $mediaAudio = Media::select('id','title','description','file')->where(['mediaType'=>'audio','user_id'=>auth()->user()->id])->get();
        $mediaImage = Media::select('id','title','description','file')->where(['mediaType'=>'image','user_id'=>auth()->user()->id])->get();
        return response()->json(['status' => true , 'audio'=> $mediaAudio,'video'=> $mediaVideo,'image'=> $mediaImage,'mediaFileUrl' => url('storage/media')]);
    }

    #Delete media
    public function deleteMedia(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
        ]);

       if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
       }
        $media = Media::where('id',$request->id)->first();
        if(empty($media)){
            return response()->json(['status' => false , 'message'=> 'Invalid Media Id']);
        }

        if (Storage::exists('/public/media/'.@$media->file)){
            Storage::disk('public')->delete('media/'.@$media->file);
        }

        if($media->delete()){
            return response()->json(['status' => true , 'message'=> 'File Deleted Successfully']);
        }else{
            return response()->json(['status' => false , 'message'=> 'Something Went Wrong !!']);
        }
        
    }
    
    public function addProject(Request $request){
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'role' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'description' => 'required',
        ]);

        if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
        }

        DB::beginTransaction();
        try{
            $project = new Project;
            $project->user_id = auth()->user()->id;
            $project->title = $request->title;
            $project->role = $request->role;
            $project->startDate = $request->startDate;
            $project->endDate = $request->endDate;
            $project->description = $request->description;
            if($project->save()){
                DB::commit();
                return response()->json(['status' => true , 'message'=> 'Project added Successfully']);
            }else{
                return response()->json(['status' => false , 'message'=> 'Something Went Wrong !!']);
            }

        }catch(\Exception $e){
            DB::rollback();
            dd($e);
        }
        
    }

    # Projects List
    public function projectList(){
        $project = Project::select('id','title','role','startDate','endDate','description')->where('user_id',auth()->user()->id)->get();
        return response()->json(['status' => true,'data'=>$project]);
    }

    # Projects Delete
    public function deleteProject(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
        ]);

       if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
       }
        $project = Project::where('id',$request->id)->first();
        if(empty($project)){
            return response()->json(['status' => false , 'message'=> 'Invalid Project Id']);
        }

        if($project->delete()){
            return response()->json(['status' => true , 'message'=> 'Project Deleted Successfully']);
        }else{
            return response()->json(['status' => false , 'message'=> 'Something Went Wrong !!']);
        }
        
    }

    #Edit Project
    public function editProject(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
            'title' => 'required',
            'role' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
            'description' => 'required',
        ]);

        if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
        }

        DB::beginTransaction();
        try{
            $project = Project::find($request->id);
            if(empty($project)){
                return response()->json(['status' => false , 'message'=> 'Invalid Project Id']);
            }
            $project->title = $request->title;
            $project->role = $request->role;
            $project->startDate = $request->startDate;
            $project->endDate = $request->endDate;
            $project->description = $request->description;
            if($project->save()){
                DB::commit();
                return response()->json(['status' => true , 'message'=> 'Project Updated Successfully']);
            }else{
                return response()->json(['status' => false , 'message'=> 'Something Went Wrong !!']);
            }

        }catch(\Exception $e){
            DB::rollback();
            dd($e);
        }
        
    }

  

}
