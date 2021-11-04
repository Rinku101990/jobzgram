<?php

namespace App\Http\Controllers\Admin;

use App\Models\SearchTag;
use App\Models\TagCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searchTag = SearchTag::get();
        $tagCategory = TagCategory::where('status','active')->get();
        return view('admin/tag_search/index',compact('searchTag','tagCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tagCategory = TagCategory::where('status','active')->get();
        return view('admin/tag_search/create',compact('tagCategory'));
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
            'tag_cate_id' => ['required'],
            'title' => ['required'],
            'status' => ['required'],
        ]);
        if ($validator->fails()) {
            return redirect('admin/search_tag/create')->withErrors($validator)->withInput();
        }

        try{
            $save = new SearchTag;
            $save->tag_cate_id = $request->tag_cate_id;
            $save->title = $request->title;
            $save->status = $request->status;
        
            if($save->save()){
                $id = $save->id;// Get Last Inserted Id
                return redirect('admin/search_tag/create')->with(['success'=>'Tag Added Successfully']);    
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
        $tagSearch = SearchTag::find($id);
        $tagCategory = TagCategory::where('status','active')->get();
        return view('admin/tag_search/edit',compact('tagSearch','tagCategory'));
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
            'tag_cate_id' => ['required'],
            'title' => ['required'],
            'status' => ['required'],            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{
            $searchTag = SearchTag::find($id);
            if(empty($searchTag)){
                return redirect()->back()->with(['error'=>'Invalid Search Tag Id']);
            }
            $searchTag->tag_cate_id = $request->tag_cate_id;
            $searchTag->title = $request->title;
            $searchTag->status = $request->status;           

            if($searchTag->save()){
                return redirect('admin/search_tag')->with(['success'=>'Tag Category Updated Successfully']);    
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
