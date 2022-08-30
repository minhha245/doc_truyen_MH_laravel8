@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection --}}
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}"> {{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item">{{$truyen->tentruyen}}</li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-9">
    <div class="row">
      <div class="col-md-3">
        <img class="card-img-top" src="{{ asset('public/uploads/product/'.$truyen->hinhanh) }}">
      </div>
      <div class="col-md-9">
        <style type="text/css">
        .infortruyen{
          list-style: none;
        }
      </style>
      <ul class="infortruyen">
        <li>Tên truyện : {{$truyen->tentruyen}}</li>
        <li>Tác giả : {{$truyen->tacgia}}</li>
        <li>Danh mục truyện :<a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}"> {{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
        <li>Thể loại truyện :<a href="{{url('the-loai/'.$truyen->theloai->slug_theloai)}}"> {{$truyen->theloai->tentheloai}}</a></li>
        <li>Số chapter : 200</li>
        <li>Số lượt xem : 2900</li>
        <li><a href="">Xem mục lục</a></li>

    @if($chapter_dau)
        <li><a class="btn btn-primary" href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}">Đọc Online</a></li>
         @else
          <li><a class="btn btn-danger" ">Chưa update chương !</a></li>
         @endif
      </ul>
    </div>
  </div>
  <div class="col-md-12"> Mô tả
    <p>
      {{$truyen->tomtat}}
    </p>
  </div>
  <hr>
  <h4>Từ khóa tìm kiếm: </h4>
  <style type="text/css">
    .tagcloud05 ul {
  margin: 0;
  padding: 0;
  list-style: none;
}
.tagcloud05 ul li {
  display: inline-block;
  margin: 0 0 .3em 1em;
  padding: 0;
}
.tagcloud05 ul li a {
  position: relative;
  display: inline-block;
  height: 30px;
  line-height: 30px;
  padding: 0 1em;
  background-color: #3498db;
  border-radius: 0 3px 3px 0;
  color: #fff;
  font-size: 13px;
  text-decoration: none;
  -webkit-transition: .2s;
  transition: .2s;
}
.tagcloud05 ul li a::before {
  position: absolute;
  top: 0;
  left: -15px;
  content: '';
  width: 0;
  height: 0;
  border-color: transparent #3498db transparent transparent;
  border-style: solid;
  border-width: 15px 15px 15px 0;
  -webkit-transition: .2s;
  transition: .2s;
}
.tagcloud05 ul li a::after {
  position: absolute;
  top: 50%;
  left: 0;
  z-index: 2;
  display: block;
  content: '';
  width: 6px;
  height: 6px;
  margin-top: -3px;
  background-color: #fff;
  border-radius: 100%;
}
.tagcloud05 ul li span {
  display: block;
  max-width: 100px;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}
.tagcloud05 ul li a:hover {
  background-color: #555;
  color: #fff;
}
.tagcloud05 ul li a:hover::before {
  border-right-color: #555;
}

  </style>
  <script type="text/javascript">
    $(function() {
  $('a').on('click', function() {
    return false;
  });
});
  </script>
  @php
  $tukhoa = explode(",",$truyen->tukhoa);
  @endphp
  <div class="tagcloud05">
  <ul>
     @foreach ($tukhoa as $key => $tu)
<li><a href="{{url('tag/'.\Str::slug($tu))}}"><span>{{$tu}}</span></a></li>
       
    @endforeach
    
    
   
  </ul>
</div>
  <h4>Mục Lục</h4>
  <ul class="mucluctruyen">
    @php
$mucluc= count($chapter);

    @endphp
    @if($mucluc>0)
    @foreach ($chapter as $key => $chap)
       <li><a href="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</a></li>
    @endforeach
   @else
   <li>Mục lục đang cập nhật !!!</li>
   @endif
  </ul>
 
  <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="10"></div>
   <h5>Sách cùng danh mục</h5>
   <div class="row">
     @foreach ($cungdanhmuc as $key => $value)
            <div class="col-md-3">
              <div class="card mb-3 box-shadow">

                <img class="card-img-top" src="{{ asset('public/uploads/product/'.$value->hinhanh) }}">
                <div class="card-body">
                  <h4>{{$value->tentruyen}}</h4>
                  <p class="card-text">{{$value->tomtat}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a>
                    </div>
                    <small class="text-muted">9 mins ago</small>
                  </div>
                </div>
              </div>
            </div>
          @endforeach       
    </div>         
</div>
<div class="col-md-3">
  <h3>Sách đọc nhiều</h3>
   <div class="col-md-5">
        <img class="card-img-top" src="{{ asset('public/uploads/product/'.$truyen->hinhanh) }}">
      </div>
       <div class="col-md-9">
        <style type="text/css">
        .infortruyen{
          list-style: none;
        }
      </style>
      <ul class="infortruyen">
        <li> {{$truyen->tentruyen}}</li>
  
        <li><a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a></li>
        
      </ul>
    </div>
      
</div>
</div>

@endsection