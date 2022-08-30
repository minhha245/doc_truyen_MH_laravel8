<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tàng Kinh Các</title>
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
 <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    </head>
    <body>
        <div class="container">
            <!-- menu -->

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{url('/')}}">꓄àꋊꍌ ꀘ꒐ꋊꁝ ꉔáꉔ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="# " id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Danh mục truyện
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($danhmuc as $key => $danh)
                
          
          <a class="dropdown-item" href="{{url('danh-muc/'.$danh->slug_danhmuc)}}">{{$danh->tendanhmuc}}</a>
           @endforeach
       </div>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Thể loại truyện
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach ($theloai as $key => $tl)
                
          
          <a class="dropdown-item" href="{{url('the-loai/'.$tl->slug_theloai)}}">{{$tl->tentheloai}}</a>
           @endforeach
       </div>
    </li>
      <!-- li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="# " id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Thame
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="#">Sáng</a>
           <a class="dropdown-item" href="#">Tối</a>
       </div>
      </li> -->
    </ul>
  
   
  
  </div>

</nav>

 <form autocomplete="off" class="form-inline my-2 my-lg-0" action="{{url('tim-kiem')}}" method="POST">
        @csrf
          <div class="form-group" style="display: block;">
              
      <input class="form-control mr-sm-3" type="search" id="keyword" name="tukhoa" placeholder="Nhập tên truyện, tác giả, ..." aria-label="Search">
       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
      <br>
      <div id="search_ajax"></div>
        </div>
        
    </form>
    <br>
   <!--slider-->
@yield('slide')

@yield('content')
<!-- -------Foooter------- -->
<footer class="text-muted">
      <div class="container">
      
        <p>Tàng Kinh Kác là nơi tổng hợp và sửa lỗi chính tả các tác phẩm gồm sách truyện hiện có trên internet. Nếu bạn có bản quyền liên quan tới tác phẩm vui lòng liên hệ qua email: info.tangkinhcac@gmail.com </p>
        <p>Địa chỉ: 245 Lý Thường Kiệt, Tp. Hà Nội<a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
       <!--  <p class="float-right">
          <a href="#"><i class="fas fa-arrow-circle-up"></i></a>
        </p> -->
        <div style="text-align:center; font-size:70px;"><a href='#' title="Back to top">&#710;</a></div>

    </footer>

        </div>
     <script src="{{ asset('js/app.js') }}" defer></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>

<script type="text/javascript">
    $('#keyword').keyup( function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
    var keyword = $(this).val(); //lấy gía trị ng dùng gõ
    if(keyword != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
    {
     var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
     $.ajax({
      url:"{{url('/timkiem-ajax')}}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"POST", // phương thức gửi dữ liệu.
      data:{keyword:keyword, _token:_token},
      success:function(data){ //dữ liệu nhận về
       $('#search_ajax').fadeIn();  
       $('#search_ajax').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
     }
   });
   }
   else{
     $('#search_ajax').fadeOut(); 
   }
 });

   $(document).on('click','.li_search_ajax', function(){  
    $('#keyword').val($(this).text());  
    $('#search_ajax').fadeOut();  
  });  

</script>

     <script type="text/javascript">
       $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dot:true,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
       </script>
       <script type="text/javascript">
           $('.select-chapter').on('change',function(){
            var url = $(this).val();
            if(url){
                window.location = url;

            }
            return false;
           });
           current_chapter();
           function current_chapter(){
            var url = window.location.href;
            $('select[name="select-chapter"]').find('option[value="'+url+'"]').attr("selected",true);

           }
       </script>
       <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="mHQySz1b"></script>

<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="wz5NGNgt"></script>
    </body>
</html>
