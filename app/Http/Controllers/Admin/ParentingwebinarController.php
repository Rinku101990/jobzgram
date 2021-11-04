<?php

namespace App\Http\Controllers\Admin;

use App\Models\ParentingWebinar;
use App\Models\BlogCategory;
use App\Models\speaker;
use App\Models\ParentingWebinarQuery;
use App\Models\WebinarAttend;
use App\Models\TagCategory;
use App\Models\SearchTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ParentingwebinarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinar = ParentingWebinar::get();
        return view('admin/webinar/index',compact('webinar'));
    }
    public function information()
    {
       
        $webinar = ParentingWebinarQuery::get();
        return view('admin/webinar/information',compact('webinar'));
    }

    public function webinar_attended()
    {
       
        $webinarattend = WebinarAttend::get();
        return view('admin/webinar/webinar_attended',compact('webinarattend'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagCategoryId = '3';
        $tags = SearchTag::where('tag_cate_id',$tagCategoryId)->get();
        $category = BlogCategory::where('status','active')->get();
        $speaker  = speaker::where('status','active')->get();
        return view('admin/webinar/create',compact('category','speaker','tags'));
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
            'img' => ['required', 'mimes:jpeg,jpg,png'],             
            'title' => ['required'], 
            'category' => ['required'],      
            'speaker' => ['required'],                   
            'expire_date' => ['required'],                
            'description' => ['required'],
            'amount' => ['required'],
            'status' => ['required'],
            'tags'=>['required']
        ]);
        if ($validator->fails()) {
            return redirect('admin/parentingwebinar/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new ParentingWebinar();
            $save->title = $request->title; 
            $save->title_slug = $request->title_slug;        
            $save->category = $request->category;  
            $save->amount = $request->amount; 
            $save->expire_date = $request->expire_date;  
            $save->description = $request->description;          
            
            if($request->file("img")){
                $banner_image = $request->file("img");
                $banner = Storage::disk('public')->put('webinar', $banner_image);
                $banner_file_name = basename($banner);
                $save->img = $banner_file_name;
            }

            // YOUTUBE VIDEO LINK //
			$link = $request->video_url;
			if(!empty($link)){
				$videolink = explode("?v=", $link);
				$videolink = $videolink[1];
			}else{
				$videolink = '';
			}
            
            $save->video_url = $videolink;
            $save->speaker = $request->speaker; 
            $save->status = $request->status;

            $tagsImplode = implode(',',$request->tags);
            $save->search_tag = $tagsImplode;
           
            if($save->save()){
                return redirect('admin/parentingwebinar')->with(['success'=>'Parenting Webinar Added Successfully']);    
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
        $webinar = ParentingWebinarQuery::find($id);
        return view('admin/webinar/showWebinarQuery',compact('webinar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $webinar = ParentingWebinar::find($id);
        $category = BlogCategory::where('status','active')->get();
        $speaker  = speaker::where('status','active')->get();
        $tagCategoryId = '3';
        $tags = SearchTag::where('tag_cate_id',$tagCategoryId)->get();
        return view('admin/webinar/edit',compact('webinar','category','speaker','tags'));
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
            'category' => ['required'],
            'speaker' => ['required'],    
            'expire_date' => ['required'],         
            'description' => ['required'],
            'amount' => ['required'],
            'status' => ['required'],
            'tags'=>['required']
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $webinar = ParentingWebinar::find($id);
            if(empty($webinar)){
                return redirect()->back()->with(['error'=>'Invalid Webinar Id']);
            }
            $webinar->title = $request->title;
            $webinar->title_slug = $request->title_slug;
            $webinar->category = $request->category;     
            $webinar->amount = $request->amount;  
            $webinar->expire_date = $request->expire_date;         
            $webinar->description = $request->description;
            
            if($request->file("img")){
                 #remove old img
                 if (Storage::exists('/public/webinar/'.@$webinar->img)){
                    Storage::disk('public')->delete('webinar/'.@$webinar->img);
                }
                
                $banner_image = $request->file("img");
                $bannerImg = Storage::disk('public')->put('webinar', $banner_image);
                $banner_file_name = basename($bannerImg);
                $webinar->img = $banner_file_name;
               

            }

            
            // YOUTUBE VIDEO LINK //
			$link = $request->video_url;
			if(!empty($link)){
				$videolink = explode("?v=", $link);
				$videolink = $videolink[1];
			}else{
				$videolink = '';
			}

            $webinar->video_url = $videolink;
            $webinar->speaker = $request->speaker;
            $webinar->status = $request->status;     
            
            $tagsImplode = implode(',',$request->tags);
            $webinar->search_tag = $tagsImplode;
            
            if($webinar->save()){
                return redirect('admin/parentingwebinar')->with(['success'=>'Parenting Webinar Updated Successfully']);    
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
            $res = ParentingWebinar::where('id',$id)->first();

            if (Storage::exists('/public/webinar/'.@$res->img)){
                Storage::disk('public')->delete('webinar/'.@$res->img);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Parenting Webinar Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Parenting Webinar Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
