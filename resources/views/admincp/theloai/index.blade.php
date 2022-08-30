@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê thể loại truyện</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT </th>
      <th scope="col">Tên thể loại</th>
      <th scope="col">Slug thể loại</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
     @foreach($theloai as $key => $tl)
    <tr>
      <th scope="row">{{$key}}</th>
      <td>{{$tl->tentheloai}}</td>
      <td>{{$tl->slug_theloai}}</td>
      <td>{{$tl->mota}}</td>
      <td>
       @if($tl->tinhtrang==0)
           <span class="text text-success">Kích hoạt</span> 
         @else
           <span class="text text-danger"> Không kích hoạt</span> 
           @endif
      </td>
      <td>
        <a href="{{route('theloai.edit',[$tl->id])}}" class="btn btn-primary ">Edit</a>
        <form action="{{route('theloai.destroy',[$tl->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button onclick="return confirm('Bạn muốn xóa thể loại truyện này khỏi danh sách không đmm?');" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
   @endforeach
  </tbody>
</table>
  </div>
</div>
</div>
</div>
</div>
@endsection
