@extends('layouts.user')
@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{asset('style.css')}}">
@endsection
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<div class="row justify-content-evenly" style="display:flex; justify-content:center;">

<div class="col-4">
<h2>THÔNG TIN NGƯỜI DÙNG </h2>


        <div class="form-group">
        <label style="font-size:20px; color:black; opacity:0.8" for="formFile" class="form-label">Ảnh đại diện</label>
        </br>
        <p>

            @if ($account->image)
            <img id="imageUser"  src="{{ url('/') }}/images/UserImages/{{$account->image}}" style="width: 200px; height: 200px;border-top-right-radius:50%; border-bottom-left-radius:50%; border-top-left-radius:50%; border-bottom-right-radius:50%;" alt="user image" class="img-thumbnail"/>
            @else
            <img id="imageUser"  src="{{ url('/') }}/images/UserImages/avt.png" style="width: 200px; height: 200px;border-top-right-radius:50%; border-bottom-left-radius:50%; border-top-left-radius:50%; border-bottom-right-radius:50%;" alt="user image" class="img-thumbnail"/>
            @endif
            <br>
            <button class="btn btn-primary" id="btn-send-message" style="margin-top:20px; margin-left:34px">Gửi tin nhắn</button>
        </p>

        </div>
</div>
    <div class="col-4">


            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="name">Họ tên</label>
                <p class="form-control">{{$account->name}}</p>

            </div>
            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="email">Email</label>
                <p class="form-control">{{$account->email}}</p>
            </div>
            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="phone">Số điện thoại</label>
                <p class="form-control">{{$account->phone}}</p>
            </div>
            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="address">Địa chỉ</label>
                <p class="form-control">{{$account->address}}</p>
            </div>
            <div class="form-group">
                <label style="font-size:20px; color:black; opacity:0.8" for="dateofbirth">Ngày sinh</label>
                <p class="form-control">{{$account->dateofbirth}}</p>
            </div>



          <a href="{{route('trang-chu-nguoi-dung')}}" style="margin: 0px 20px 0 20px" class="btn btn-outline-primary">< Quay lại</a>


    </div>
</div>

@endsection
@section('js')

<script>
    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#imageUser').attr('src', e.target.result).width(200).height(200);
      $('#imageUser').attr('hidden',false);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
</script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }});
        $("#btn-send-message").click(async function(e) {

        const {
        value: text
        } = await Swal.fire({
        input: 'textarea',
        inputLabel: 'Gửi tin nhắn',
        inputPlaceholder: 'Nhập nội dung ',
        inputAttributes: {
        'aria-label': 'Type your message here'
        },
        showCancelButton: true
        })

        if (text) {
        var $report_id=$(this).attr('id').slice(5);
        var $content=text;
        Swal.fire({
        title: 'Xác nhận gửi??',
        text: "Đã gửi tin nhắn!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Gửi!'
        }).then((result) => {
        if (result.isConfirmed) {

        $.post('/user/send-message',{send_id:{{$account->id}},content:$content,_token:'{{csrf_token()}}',}).done(function(){
                Swal.fire({
                title: 'Gửi tin nhắn thành công thành công',
                showClass: {
                popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
                }
                });

            }).fail(function(){
            Swal.fire({
            icon: 'error',
            title: 'Lỗi rồi',
            text: 'Bị lỗi gì đó!',
        })

        });
        }
        })

        ;
        // $.ajax({
        // method: "POST",
        // url: "/user/report-post",
        // data: { report_id: $report_id,content: $content }
        // })
        }
        })
    })

</script>
@endsection
