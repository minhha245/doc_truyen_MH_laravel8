@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật danh truyện</div>
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
                   
                    <form method="POST" action="{{route('truyen.update',[$truyen->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                           <div class="form-group">
                            <label for="exampleInputEmail1">Tên truyện</label>
                            <input type="text" class="form-control" value="{{$truyen->tentruyen}}" onkeyup="ChangeToSlug()" name="tentruyen" id="slug" aria-describedby="emailHelp" placeholder="Tên truyen...">
                            
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Tác giả</label>
                            <input type="text" class="form-control" value="{{$truyen->tacgia}}"  name="tacgia" aria-describedby="emailHelp" placeholder="Tên tác giả...">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ khóa</label>
                            <input type="text" class="form-control" value="{{$truyen->tukhoa}}"  name="tukhoa" aria-describedby="emailHelp" placeholder="Từ khóa...">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug truyen</label>
                            <input type="text" class="form-control" value="{{$truyen->slug_truyen}}" name="slug_truyen" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyen...">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tóm tắt truyện</label>
                            <textarea name="tomtat" class="form-control" rows="5" style="resize: none;">{{$truyen->tomtat}}</textarea>
                            
                        </div>
                         <div class="form-group">
                         <label for="exampleInputEmail1">Danh mục truyện</label>
                         <select name="danhmuc" class="custom-select">
                      @foreach($danhmuc as $key=>$muc)
                         
                          <option {{$muc->id == $truyen->danhmuc_id ? 'selected' : ''}} value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                          @endforeach
                      </select>
                  </div>
                   <div class="form-group">
                         <label for="exampleInputEmail1">Thể loại truyện</label>
                         <select name="theloai" class="custom-select">
                      @foreach($theloai as $key => $tl)
                         
                          <option {{ $tl->id==$truyen->theloai_id ? 'selected' : '' }} value="{{$tl->id}}">{{$tl->tentheloai}}</option>
                          <!-- <option value="{{$tl->id}}">{{$tl->tentheloai}}</option> -->
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh" >
                            <img src="{{asset('public/uploads/product/'.$truyen->hinhanh)}}" height="150" width="100">
                        </div>
                      <div class="form-group">
                         <label for="exampleInputEmail1">Trạng thái</label>
                         <select name="tinhtrang" class="custom-select">
                            @if($truyen->tinhtrang==0)
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
