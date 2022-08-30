@extends('../layout')
@section('slide')
@include('pages.slide')
@endsection
@section('content')


<!-- -------Sách mới update------- -->
<br>
  <h3>Sách Mới Update</h3>
<div class="album py-5 bg-light">  
        <div class="container">
          
          <div class="row">
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
       <!-- -------Sách mới------- -->

  <h3>Sách xem nhiều</h3>
<div class="album py-5 bg-light">
        <div class="container">
         
          <div class="row">
            <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{ asset('public/uploads/product/nghin-le-mot-dem80.jpg') }}">
                <div class="card-body">
                  <h3>This content is a little bit longer.</h3>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a>
                    </div>
                    <small class="text-muted">9 mins ago</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{ asset('public/uploads/product/nghin-le-mot-dem80.jpg') }}">
                <div class="card-body">
                  <h3>This content is a little bit longer.</h3>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a>
                    </div>
                    <small class="text-muted">9 mins ago</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{ asset('public/uploads/product/nghin-le-mot-dem80.jpg') }}">
                <div class="card-body">
                  <h3>This content is a little bit longer.</h3>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a>
                    </div>
                    <small class="text-muted">9 mins ago</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{ asset('public/uploads/product/nghin-le-mot-dem80.jpg') }}">
                <div class="card-body">
                  <h3>This content is a little bit longer.</h3>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a>
                    </div>
                    <small class="text-muted">9 mins ago</small>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <a href="#" class="btn btn-outline-success">Xem tất cả</a>
      </div>
        </div>
<!-- -------Bloger------- --> 

  <h3>Blogs</h3>
<div class="album py-5 bg-light">
        <div class="container">
          
          <div class="row">
            <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{ asset('public/uploads/product/nghin-le-mot-dem80.jpg') }}">
                <div class="card-body">
                  <h2>This content is a little bit longer.</h2>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a>
                    </div>
                    <small class="text-muted">9 mins ago</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{ asset('public/uploads/product/nghin-le-mot-dem80.jpg') }}">
                <div class="card-body">
                  <h2>This content is a little bit longer.</h2>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a>
                    </div>
                    <small class="text-muted">9 mins ago</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{ asset('public/uploads/product/nghin-le-mot-dem80.jpg') }}">
                <div class="card-body">
                  <h2>This content is a little bit longer.</h2>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a>
                    </div>
                    <small class="text-muted">9 mins ago</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card mb-3 box-shadow">
                <img class="card-img-top" src="{{ asset('public/uploads/product/nghin-le-mot-dem80.jpg') }}">
                <div class="card-body">
                  <h2>This content is a little bit longer.</h2>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="" class="btn btn-sm btn-outline-secondary">Xem ngay</a>
                      <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">241124</i></a>
                    </div>
                    <small class="text-muted">9 mins ago</small>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <a href="" class="btn btn-outline-success">Xem tất cả</a>
      </div>
        </div>
@endsection