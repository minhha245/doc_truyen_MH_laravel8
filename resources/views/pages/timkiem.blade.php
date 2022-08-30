@extends('../layout')

@section('content')


<!-- -------Sách mới update------- -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
  </ol>
</nav>
<h3>Tìm kiếm với từ khóa: {{$tukhoa}}</h3>
<div class="album py-5 bg-light">  
        <div class="container">
          
          <div class="row">
            @php
            $count =count($truyen);
            @endphp
            @if($count==0)
              <div class="col-md-12">
              <div class="card mb-12 box-shadow">

                
                <div class="card-body">
                  <p>Truyện không tim thấy...!</p>
                </div>
              </div>
            </div>
              
              @else
            @endif
             @foreach ($truyen as $key => $value)
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
        <a href="#" class="btn btn-outline-success">Xem tất cả</a>
      </div>
        </div>
  
  
@endsection