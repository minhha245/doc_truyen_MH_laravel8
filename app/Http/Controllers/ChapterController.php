<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Truyen;
class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $chapter=Chapter::with('truyen')->orderBy('id','ASC')->get();
         return view('admincp.chapter.index')->with(compact('chapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $truyen = Truyen::orderBy('id','ASC')->get();
     return view('admincp.chapter.create')->with(compact('truyen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                 $data=$request->validate([
        'tieude'=>'required|unique:chapter|max:255',
          'slug_chapter'=>'required|unique:chapter|max:255',
         'tomtat'=>'required|max:255',
         'noidung'=>'required',
         'tinhtrang'=>'required',
         
          'truyen_id'=>'required',
    ],
    [
        'tieude.unique'=>'Tên chapter đã có, nhập lại !!!',
        'slug_chapter.unique'=>'slug đã có, nhập lại !!!',
        'slug_chapter.required'=>'slug không bỏ trống !!!',
         'tenchapter.required'=>'Tên truyện không được bỏ trống',
         'tieude.required'=>'Tóm tắt không được bỏ trống',
         'noidung.required'=>'Nội dung không được bỏ trống',
    ]
);
    //$data =$request->all();
    $chapter= new Chapter();
    $chapter->tieude=$data['tieude'];
    $chapter->slug_chapter=$data['slug_chapter'];
    $chapter->tomtat=$data['tomtat'];
    $chapter->tinhtrang=$data['tinhtrang'];
    $chapter->truyen_id=$data['truyen_id'];
    $chapter->noidung=$data['noidung'];
    
    $chapter->save();
    
    return redirect()->back()->with('status','Thêm truyện thành công.');
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
        $chapter= Chapter::find($id);
         $truyen = Truyen::orderBy('id','ASC')->get();
         return view('admincp.chapter.edit')->with(compact('truyen','chapter'));
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
        
                 $data=$request->validate([
        'tieude'=>'required|max:255',
          'slug_chapter'=>'required|max:255',
         'tomtat'=>'required|max:255',
         'noidung'=>'required',
         'tinhtrang'=>'required',
         
          'truyen_id'=>'required',
    ],
    [
        
        'slug_chapter.required'=>'slug không bỏ trống !!!',
         'tenchapter.required'=>'Tên truyện không được bỏ trống',
         'tieude.required'=>'Tóm tắt không được bỏ trống',
         'noidung.required'=>'Nội dung không được bỏ trống',
    ]
);
    //$data =$request->all();
    $chapter= Chapter::find($id);
    $chapter->tieude=$data['tieude'];
    $chapter->slug_chapter=$data['slug_chapter'];
    $chapter->tomtat=$data['tomtat'];
    $chapter->tinhtrang=$data['tinhtrang'];
    $chapter->truyen_id=$data['truyen_id'];
    $chapter->noidung=$data['noidung'];
    
    $chapter->save();
    
    return redirect()->back()->with('status','Cập nhật chapter thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         Chapter::find($id)->delete();
        
        return redirect()->back()->with('status','Xóa truyện thành công.');
    }
}
