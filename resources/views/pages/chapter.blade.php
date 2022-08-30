@extends('../layout')
{{-- @section('slide')
@include('pages.slide')
@endsection --}}
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
     <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_breadcrumb->theloai->slug_theloai)}}">{{$truyen_breadcrumb->theloai->tentheloai}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('xem-truyen/'.$truyen_breadcrumb->slug_truyen)}}">{{$truyen_breadcrumb->tentruyen}}</a></li>
    <li class="breadcrumb-item"><a href="">{{$chapter->tieude}}</a></li>
  </ol>
</nav>
<div class="row">
  <div class="col-md-12">

   <p>{{$chapter->tieude}}</p>
   
   <div class="col-md-5">
     <div class="form-group">
       <label for="exampleInputEmail1">Chọn chương</label>
       <select name="select-chapter" class="custom-select select-chapter"> 
        @foreach($all_chapter as $key => $chap )
        <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
        @endforeach     
      </select>
      <style type="text/css">
        .isDisabled {
          color: currentColor;
          pointer-events: none;
          opacity: 0.5;
          text-decoration: none;
        }
      </style> 
     <p class="mt-4"> <a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Trước</a>
   <a  class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$next_chapter)}}">Sau</a>
 </p>
    </div>
  </div>
  <div class="noidungchuong">
    {!!$chapter->noidung!!}
    <div class="col-md-5">                  
      <div class="form-group">
        <label for="exampleInputEmail1">Chọn chương</label>
        <select name="select-chapter" class="custom-select select-chapter"> 
          @foreach($all_chapter as $key => $chap )
          <option value="{{url('xem-chapter/'.$chap->slug_chapter)}}">{{$chap->tieude}}</option>
          @endforeach
        </select>
          <p class="mt-4"> <a class="btn btn-primary {{$chapter->id==$min_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$previous_chapter)}}">Trước</a>
   <a  class="btn btn-primary {{$chapter->id==$max_id->id ? 'isDisabled' : ''}}" href="{{url('xem-chapter/'.$next_chapter)}}">Sau</a>
 </p>
      </div>
    </div>
  </div>

  <div class="fb-comments" data-href="{{\URL::current()}}" data-width="100%" data-numposts="10"></div>
  <hr>
  <h4>Lưu và chia sẻ truyện:</h4>
  <div class="fb-save" data-uri="{{\URL::current()}}" data-size="large"></div>
  <a href=""><i class="fab fa-facebook"></i></a>
  <a href=""><i class="fab fa-twitter"></i></a>
  <a href=""><i class="fab fa-viber"></i></a>
</div>

</div>
<hr>
@endsection