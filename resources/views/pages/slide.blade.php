 <h3>Sách hay nên đọc</h3>
<div class="owl-carousel owl-theme mt-5">
     @foreach ($slide_truyen as $key => $value)
     <div class="item">
     <img src="{{asset('public/uploads/product/'.$value->hinhanh)}}">
  <h4>{{$value->tentruyen}}</h4> 
      <p><i class="fas fa-eye">241124</i></p>
      <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-danger">Đọc ngay</a>
    </div>
@endforeach
</div>