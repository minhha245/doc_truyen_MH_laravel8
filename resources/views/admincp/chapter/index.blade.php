@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10>
            <div class="card">
                <div class="card-header">Liệt kê Chapter truyện</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped table-responsive">
  <thead class="thead-dark">

    <tr>
      <th scope="col">STT </th>
      <th scope="col">Tiêu đề</th>
      <th scope="col">Slug Chapter</th>
      <th scope="col">Tóm tắt</th>
      <th scope="col">Nội dung </th>
      <th scope="col">Thuộc truyện</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
     @foreach($chapter as $key => $value)
    <tr>
      <th scope="row">{{$key}}</th>
      <td>{{$value->tieude}}</td>
      <td>{{$value->slug_chapter}}</td>
      <td>{{$value->tomtat}}</td>
        <td>{{$value->noidung}}</td>
       <td>
       {{$value->truyen->tentruyen}}
    </td>
      <td>
       @if($value->tinhtrang==0)
           <span class="text text-success">Kích hoạt</span> 
         @else
           <span class="text text-danger"> Không kích hoạt</span> 
           @endif
      </td>
      <td>
        <a href="{{route('chapter.edit',[$value->id])}}" class="btn btn-primary ">Edit</a>
        <form action="{{route('chapter.destroy',[$value->id])}}" method="POST">
            @method('DELETE')
            @csrf
            <button onclick="return confirm('Bạn muốn xóa danh mục truyện này khỏi danh sách không?');" class="btn btn-danger">Delete</button>
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
