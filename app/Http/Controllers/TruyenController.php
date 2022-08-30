<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truyen;
use App\Models\DanhmucTruyen;
use App\Models\Theloai;
class TruyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $list_truyen=Truyen::with('danhmuctruyen','theloai')->orderBy('id','desc')->get();
         return view('admincp.truyen.index')->with(compact('list_truyen'));
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
     return view('admincp.truyen.create')->with(compact('danhmuc','theloai'));
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
        'tentruyen'=>'required|unique:truyen|max:255',
          'slug_truyen'=>'required|unique:truyen|max:255',
         'tomtat'=>'required|max:255',
         'tinhtrang'=>'required',
         'tukhoa'=>'required',
         'tacgia'=>'required',
         'hinhanh'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1920,max_height=1920',
          'danhmuc'=>'required',
          'theloai'=>'required',
    ],
    [
        'tentruyen.unique'=>'Tên truyện đã có, nhập lại !!!',
        'slug_truyen.unique'=>'slug đã có, nhập lại !!!',
        'slug_truyen.required'=>'slug không bỏ trống !!!',
         'tentruyen.required'=>'Tên truyện không được bỏ trống',
         'tomtat.required'=>'Tóm tắt không được bỏ trống',
          'tacgia.required'=>'Tác giả không được bỏ trống',
          'tukhoa.required'=>'Từ khóa không được bỏ trống',
         'hinhanh.required'=>'HÌnh ảnh không được bỏ trống',
    ]
);
    //$data =$request->all();
    $truyen= new Truyen();
    $truyen->tentruyen=$data['tentruyen'];
    $truyen->slug_truyen=$data['slug_truyen'];
    $truyen->tomtat=$data['tomtat'];
    $truyen->tacgia=$data['tacgia'];
    $truyen->tukhoa=$data['tukhoa'];
    $truyen->tinhtrang=$data['tinhtrang'];

    $truyen->danhmuc_id=$data['danhmuc'];
    $truyen->theloai_id=$data['theloai'];
    
    //chèn hình ảnh
    $get_image=$request->hinhanh;
    $path = 'public/uploads/product/';
    $get_nane_image =$get_image->getClientOriginalName();
    $name_image=current(explode('.',$get_nane_image));
    $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    $get_image->move($path,$new_image);
   // $data['product_image']=$new_image;

     $truyen->hinhanh=$new_image;
    $truyen->save();
    
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
        $theloai = Theloai::orderBy('id','DESC')->get();
        $truyen= Truyen::find($id);
         $danhmuc = DanhmucTruyen::orderBy('id','DESC')->get();
         return view('admincp.truyen.edit')->with(compact('truyen','danhmuc','theloai'));
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
        'tentruyen'=>'required|max:255',
          'slug_truyen'=>'required|max:255',
         'tomtat'=>'required|max:1000',
         'tinhtrang'=>'required',
         'tukhoa'=>'required',
          'danhmuc'=>'required',
          'tacgia'=>'required',
          'theloai'=>'required',
    ],
    [
        
        'slug_truyen.required'=>'slug không bỏ trống !!!',
         'tentruyen.required'=>'Tên truyện không được bỏ trống',
         'tomtat.required'=>'Tóm tắt không được bỏ trống',
         'tacgia.required'=>'Tác giả không được bỏ trống',
        
    ]
);
    //$data =$request->all();
    $truyen= Truyen::find($id);
    $truyen->tentruyen=$data['tentruyen'];
    $truyen->slug_truyen=$data['slug_truyen'];
    $truyen->tomtat=$data['tomtat'];
    $truyen->tacgia=$data['tacgia'];
    $truyen->tukhoa=$data['tukhoa'];
    $truyen->tinhtrang=$data['tinhtrang'];
    $truyen->danhmuc_id=$data['danhmuc'];
    $truyen->theloai_id=$data['theloai'];
    //chèn hình ảnh
    $get_image = $request->hinhanh;
    if($get_image){
         $path = 'public/uploads/product/'.$truyen->hinhanh;
         if(file_exists($path)){
          unlink($path);}
    $path = 'public/uploads/product/';    
    $get_nane_image =$get_image->getClientOriginalName();
    $name_image=current(explode('.',$get_nane_image));
    $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
    $get_image->move($path,$new_image);
    $truyen->hinhanh=$new_image;
 }

    $truyen->save();
    
    return redirect()->back()->with('status','Cập nhật truyện thành công.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $truyen = Truyen::find($id);
        $path = 'public/uploads/product/'.$truyen->hinhanh;
        if(file_exists($path)){

            unlink($path);
        }
         Truyen::find($id)->delete();
        
        return redirect()->back()->with('status','Xóa truyện thành công.');
    }
}
