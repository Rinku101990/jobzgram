<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Models\User;
use App\Models\BlogCategory;
use App\Models\TagCategory;
use App\Models\SearchTag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::get();
        return view('admin/blog/index',compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagCategoryId = '1';
        $tags = SearchTag::where('tag_cate_id',$tagCategoryId)->get();
        $category = BlogCategory::where('status','active')->get();
        return view('admin/blog/create',compact('category','tags'));
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
            'author' => ['required'],  
            'description' => ['required'],  
            'tags'=>['required'],                 
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/blog/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new Blog;
            $save->title = $request->title;   
            $save->user = '1';        
            $save->category = $request->category;        
            $save->author = $request->author; 
            $save->description = $request->description;          
            
            $tagsImplode = implode(',',$request->tags);
            $save->search_tag = $tagsImplode;

            if($request->file("img")){
                $banner_image = $request->file("img");
                $banner = Storage::disk('public')->put('blog', $banner_image);
                $banner_file_name = basename($banner);
                $save->img = $banner_file_name;
            }
            
            $save->status = $request->status;
           
            if($save->save()){
                return redirect('admin/blog')->with(['success'=>'Blog Added Successfully']);    
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
        $blog = Blog::find($id);
        $category = BlogCategory::where('status','active')->get();
        $tagCategoryId = '1';
        $tags = SearchTag::where('tag_cate_id',$tagCategoryId)->get();
        return view('admin/blog/edit',compact('blog','category','tags'));
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
            'author' => ['required'],
            'description' => ['required'],
            'tags'=>['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $blog = Blog::find($id);
            $userProfileName = User::select('prefixName','name','email')->where('id',$blog->user)->first();
            // dd($userProfileName);
            if(empty($blog)){
                return redirect()->back()->with(['error'=>'Invalid Blog Id']);
            }
            $blog->title = $request->title;
            $blog->category = $request->category;
            $blog->author = $request->author;
            $blog->description = $request->description;

            $tagsImplode = implode(',',$request->tags);
            $blog->search_tag = $tagsImplode;

            if($request->file("img")){
                 #remove old img
                 if (Storage::exists('/public/blog/'.@$blog->img)){
                    Storage::disk('public')->delete('blog/'.@$blog->img);
                }
                
                $banner_image = $request->file("img");
                $bannerImg = Storage::disk('public')->put('blog', $banner_image);
                $banner_file_name = basename($bannerImg);
                $blog->img = $banner_file_name;
            }
            $blog->status = $request->status;           
            if($blog->save()){

                // Mail Sending Module Block
                // $email_data = array(
                //     'name' => $userProfileName->prefixName.''.$userProfileName->name,
                //     'email' => $userProfileName->email,
                //     'bstatus'=>$request->status
                // );
                // Mail::send('email.blog_verification', $email_data, function ($message) use ($email_data) {
                //     $message->to($email_data['email'], $email_data['name'])
                //         ->subject('Welcome to Kidsfable')
                //         ->from('info@kidsfable.com', 'Kidsfable.com');
                // });
                // End of Mail Sending Module Block

                return redirect('admin/blog')->with(['success'=>'Blog Updated Successfully']);    
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
            $res = Blog::where('id',$id)->first();

            if (Storage::exists('/public/blog/'.@$res->img)){
                Storage::disk('public')->delete('blog/'.@$res->img);
            }
            if($res->delete()){
                return response()->json(['status'=>true,'message' => 'Blog Deleted Successfully']);
            }else{
                return response()->json(['status'=>false,'message' => 'Blog Not Deleted Try Again !!']);
            } 
        }catch(\Exception $e){
            dd($e);
        }
    }
}
