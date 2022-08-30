@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật danh mục truyện</div>
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
                   
                    <form method="POST" action="{{route('danhmuc.update',[$danhmuc->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" value="{{$danhmuc->tendanhmuc}}" onkeyup="ChangeToSlug()" name="tendanhmuc" id="slug" aria-describedby="emailHelp" placeholder="Tên danh mục...">
                            
                        </div>
                         <div class="form-group">
                            <label for="exampleInputEmail1">Slug danh mục</label>
                            <input type="text" class="form-control" value="{{$danhmuc->slug_danhmuc}}"  name="slug_danhmuc" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug danh mục...">
                            
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô tả danh mục</label>
                            <input type="text" class="form-control"  value="{{$danhmuc->mota}}"name="mota" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục...">
                            
                        </div>
                        <div class="form-group">
                         <label for="exampleInputEmail1">Trạng thái</label>
                         <select name="tinhtrang" class="custom-select">
                            @if($danhmuc->tinhtrang==0)
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
