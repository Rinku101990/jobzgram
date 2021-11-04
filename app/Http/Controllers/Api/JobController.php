<?php

namespace App\Http\Controllers\Api;

use App\Models\JobPosting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    #Add job
    public function addJob(Request $request){
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'gender' => 'required',
            'minAge' => 'required',
            'maxAge' => 'required',
          
        ]);

        if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
        }

        DB::beginTransaction();
        try{
            if($request->id){
                $addJob = JobPosting::find($request->id);
                if($addJob){
                    $message = "Job Updated Successfully";
                    $addJob = JobPosting::find($request->id);    
                }else{
                    $message = "Job Added Successfully";
                    $addJob = new JobPosting;     
                }
            }else{
                $message = "Job Added Successfully";
                $addJob = new JobPosting;
            }
            
            $addJob->title = $request->title;
            $addJob->category_id = $request->category_id;
            $addJob->description = $request->description;
            $addJob->gender = $request->gender;
            $addJob->minAge = $request->minAge;
            $addJob->maxAge = $request->maxAge;
            $addJob->country = $request->country;
            $addJob->state = $request->state;
            $addJob->city = $request->city;
            $addJob->startDate = $request->startDate;
            $addJob->endDate = $request->endDate;
            $addJob->lastDateToApply = $request->lastDateToApply;
            $addJob->auditionRequired = $request->auditionRequired;
            $addJob->noOfVacancy = $request->noOfVacancy;
            $addJob->budget = $request->budget;
            $addJob->budgetDuration = $request->budgetDuration;
            $addJob->name = $request->name;
            $addJob->email = $request->email;
            $addJob->phone = $request->phone;
            $addJob->whatsapp = $request->whatsapp;
            $addJob->location = $request->location;
            $addJob->jobCode = rand(10,100);
            $addJob->createdBy = auth()->user()->id;
            $addJob->status = 'active';
            if($addJob->save()){
                DB::commit();
                return response()->json(['status' => true , 'message'=> $message]);
            }else{
                return response()->json(['status' => false , 'message'=> 'Something Went Wrong !!']);
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
            dd($e);
        }
    }

    #Job Listing
    public function deleteJob(Request $request){
        $validation = Validator::make($request->all(), [
            'id' => 'required',
        ]);

       if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
       }

       $job = JobPosting::where('id',$request->id)->first();
        if(empty($job)){
            return response()->json(['status' => false , 'message'=> 'Invalid Job Id']);
        }

        if($job->delete()){
            return response()->json(['status' => true , 'message'=> 'Job Deleted Successfully']);
        }else{
            return response()->json(['status' => false , 'message'=> 'Something Went Wrong !!']);
        }

    }

      # Job List
      public function myJobList(Request $request){
        $validation = Validator::make($request->all(), [
            'jobType' => 'required',
        ]);

       if ($validation->fails()) {
           $response['status']	= false;
           $response['message'] = $validation->errors()->first();
           return response()->json($response,200);
       }
        if($request->jobType == 'all'){
            $job = JobPosting::where(['createdBy'=>auth()->user()->id])->get();
        }else{
            $job = JobPosting::where(['status'=>$request->jobType,'createdBy'=>auth()->user()->id])->get();
        }
        
        return response()->json(['status' => true,'data'=>$job]);
    }
    
}
