<?php

namespace App\Http\Controllers\Admin;

use App\Models\TagCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagCategory = TagCategory::get();
        return view('admin/tag_category/index',compact('tagCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tag_category/create');
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
            return redirect('admin/tag_category/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new TagCategory;
            $save->title = $request->title;
            $save->title_slug = $request->title_slug;
            $save->status = $request->status;
        
            if($save->save()){
                $id = $save->id;// Get Last Inserted Id
                return redirect('admin/tag_category')->with(['success'=>'Tag Category Added Successfully']);    
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
        $tagCategory = TagCategory::find($id);
        return view('admin/tag_category/edit',compact('tagCategory'));
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
            $tagCategory = TagCategory::find($id);
            if(empty($tagCategory)){
                return redirect()->back()->with(['error'=>'Invalid Tag Category Id']);
            }
            $tagCategory->title = $request->title;
            $tagCategory->title_slug = $request->title_slug;
        
            $tagCategory->status = $request->status;           

            if($tagCategory->save()){
                return redirect('admin/tag_category')->with(['success'=>'Tag Category Updated Successfully']);    
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
