<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DanhmucTruyen;
use App\Models\Truyen;
use App\Models\Chapter;
use App\Models\Theloai;
class IndexController extends Controller
{
    public function timkiem_ajax(Request $request)
    {
       
        $data = $request->all();
        if($data['keyword']){
            $truyen=Truyen::where('tinhtrang',0)->where('tentruyen','LIKE','%'.$data['keyword'].'%')->get();
            $output ='<ul class="dropdown-menu" style="display:block;position:Relative;width:500px;float: left;">';
            foreach($truyen as $key => $tr){
                $output .='<li class="li_search_ajax">'.$tr->tentruyen.'</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
    public function home(){
        
        $slide_truyen =Truyen::orderBy('id','DESC')->where('tinhtrang',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->where('tinhtrang',0)->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->where('tinhtrang',0)->get();
        $truyen = Truyen::orderBy('id','DESC')->where('tinhtrang',0)->get();
        return view('pages.home')->with(compact('danhmuc','truyen','theloai','slide_truyen'));
    }
    public function danhmuc($slug){
      
        $slide_truyen =Truyen::orderBy('id','DESC')->where('tinhtrang',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $danhmuc_id = DanhmucTruyen::orderBy('id','DESC')->where('slug_danhmuc',$slug)->first();
        $tendanhmuc = $danhmuc_id->tendanhmuc;
        $truyen = Truyen::orderBy('id','DESC')->where('tinhtrang',0)->where('danhmuc_id',$danhmuc_id->id)->get();
        return view('pages.danhmuc')->with(compact('danhmuc','truyen','tendanhmuc','theloai','slide_truyen'));
    }
    public function xemtruyen($slug){
        
        $slide_truyen =Truyen::orderBy('id','DESC')->where('tinhtrang',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Truyen::with('danhmuctruyen','theloai')->where('slug_truyen',$slug)->where('tinhtrang',0)->first();
        $chapter = Chapter::with('truyen')->orderBy('id','DESC')->where('truyen_id',$truyen->id)->get();
        $chapter_dau = Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->id)->first();
        $cungdanhmuc = Truyen::with('danhmuctruyen','theloai')->where('danhmuc_id',$truyen->danhmuctruyen->id)->whereNotin('id',[$truyen->id])->get();  
        return view('pages.truyen')->with(compact('danhmuc','truyen','chapter','cungdanhmuc','chapter_dau','theloai','slide_truyen'));
    }
    public function xemchapter($slug){
       
        $slide_truyen =Truyen::orderBy('id','DESC')->where('tinhtrang',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $truyen = Chapter::where('slug_chapter',$slug)->first();
        $truyen_breadcrumb = Truyen::with('danhmuctruyen','theloai')->where('id',$truyen->truyen_id)->first();
        $chapter = Chapter::with('truyen')->orderBy('id','ASC')->where('slug_chapter',$slug)->where('truyen_id',$truyen->truyen_id)->first();
        $all_chapter=Chapter::with('truyen')->orderBy('id','ASC')->where('truyen_id',$truyen->truyen_id)->get();
        $next_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','>',$chapter->id)->min('slug_chapter');
        $previous_chapter = Chapter::where('truyen_id',$truyen->truyen_id)->where('id','<',$chapter->id)->max('slug_chapter');
        $max_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','DESC')->first();
        $min_id = Chapter::where('truyen_id',$truyen->truyen_id)->orderBy('id','ASC')->first();
        return view('pages.chapter')->with(compact('danhmuc','chapter','all_chapter','next_chapter','previous_chapter','max_id','min_id','theloai','truyen_breadcrumb','slide_truyen'));

    }

    public function theloai($slug){
         // $info = Info::find(1);
        $slide_truyen =Truyen::orderBy('id','DESC')->where('tinhtrang',0)->take(8)->get();
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $theloai_id = Theloai::orderBy('id','DESC')->where('slug_theloai',$slug)->first();
        $truyen = Truyen::orderBy('id','DESC')->where('tinhtrang',0)->where('theloai_id',$theloai_id->id)->get();
        $tentheloai = $theloai_id->tentheloai;
        return view('pages.theloai')->with(compact('theloai','truyen','danhmuc','tentheloai','slide_truyen'));
    }
    public function timkiem(Request $request){
        
        $data=$request->all();
        $slide_truyen =Truyen::orderBy('id','DESC')->where('tinhtrang',0)->take(8)->get();
        $tukhoa = $data['tukhoa'];
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
          $truyen = Truyen::with('danhmuctruyen','theloai')->where('tentruyen','LIKE','%'.$tukhoa.'%' )->orwhere('tacgia','LIKE','%'.$tukhoa.'%' )->orwhere('tomtat','LIKE','%'.$tukhoa.'%' )->get();
          return view('pages.timkiem')->with(compact('danhmuc','truyen','theloai','slide_truyen','tukhoa'));
    } 
public function tag($tag){
        $info = Truyen::find(1);
        $title ='Tìm kiếm tags';
        //seo
        $meta_desc= 'Tìm kiếm tags';
        $meta_keyword = 'Tìm kiếm tags';
        $url_canonical = \URL::current();
        // $og_image = url('public/uploads/logo/'.$info->logo);
        // $link_icon = url('public/uploads/logo/'.$info->logo);
        //end seo
        $slide_truyen =Truyen::orderBy('id','DESC')->where('tinhtrang',0)->take(8)->get();
        
        $theloai = Theloai::orderBy('id','DESC')->get();
        $danhmuc =DanhmucTruyen::orderBy('id','DESC')->get();
        $tags = explode("-", $tag);
          $truyen = Truyen::with('danhmuctruyen','theloai')->where(
            function($query) use($tags){ 
                for ($i=0; $i <count($tags) ; $i++) { 
                    $query->orwhere('tukhoa','LIKE','%'.$tags[i].'%');
                }})->paginate(12);
          return view('pages.tag')->with(compact('danhmuc','truyen','theloai','slide_truyen','tukhoa','tags','title','meta_desc','meta_keyword','url_canonical','og_image','link_icon'));
    } 
}
