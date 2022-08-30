@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật thể loại truyện</div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                   
                    <form method="POST" action="{{route('theloai.update',[$theloai->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thể loại</label>
                            <input type="text" class="form-control" value="{{$theloai->tentheloai}}" onkeyup="ChangeToSlug()" name="tentheloai" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại...">
                            
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Slug thể loại</label>
                            <input type="text" class="form-control" value="{{$theloai->slug_theloai}}"  name="slug_theloai" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug thể loại...">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả thể loại</label>
                            <input type="text" class="form-control"  value="{{$theloai->mota}}"name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả thể loại...">
                            
                        </div>
                        <div class="form-group">
                         <label for="exampleInputEmail1">Trạng thái</label>
                         <select name="tinhtrang" class="custom-select">
                            @if($theloai->tinhtrang==0)
                          <option selected value="0">Kích hoạt</option>
                           <option value="1">Không kích hoạt</option>
                          @else
                           <option value="0">Kích hoạt</option>
                          <option selected value="1">Không kích hoạt</option>
                          @endif
                      </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Cập nhật</button>
              </form>             
  </div>
</div>
</div>
</div>
</div>
@endsection
