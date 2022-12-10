
@extends('layouts.admin')
@section('css')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

@endsection
@section('content')
<form action="{{route('xu-li-them-moi-ban-tin')}}" method="post" enctype="multipart/form-data" id="add-news-cast">
    @csrf
    <div class="form-group">
        <label for="account">Tài khoản đăng</label>
        <select class="form-select" aria-label="select account" name="account_id">
            @foreach ($listAccount as $account)
            <option value="{{$account->id}}">{{$account->username}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="type">Loại bản tin</label>
        <select class="form-select" aria-label="select type" name="type_id">
            @foreach ($listTypeNewsCast as $typeNewsCast )
            <option value="{{$typeNewsCast->id}}">{{$typeNewsCast->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInput">Chủ đề</label>
        <input type="text" class="form-control" id="exampleInput"  placeholder="Chủ đề" name="title" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Nội dung</label>
        <textarea name="content" id="content" ></textarea >
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Hình ảnh chủ đề</label>
        <input class="form-control" type="file" id="formFile" name="imageupload" required>
    </div>
    <button type="submit" class="btn btn-primary">Thêm mới</button>
</form>
@endsection
@section('js')
<script src="{{asset('summernote/summernote-bs4.js')}}"></script>
<script>
    $(document).ready(function() {
    $('#content').summernote({
      placeholder: 'Enter content....',
      tabsize: 2,
      height: 200,
      minHeight: 100,
      maxHeight: 300,
      focus: true,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']],
      ],
      popover: {
        image: [
          ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
          ['float', ['floatLeft', 'floatRight', 'floatNone']],
          ['remove', ['removeMedia']]
        ],
        link: [
          ['link', ['linkDialogShow', 'unlink']]
        ],
        table: [
          ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
          ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
        ],
        air: [
          ['color', ['color']],
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture']]
        ]
      },
      codemirror: {
        theme: 'monokai'
      }
    });

});
</script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $('#add-news-cast').submit(function(e){
        e.preventDefault(e);
        Swal.fire({
        title: 'Bạn có muốn thêm bản tin?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Có',
        denyButtonText: `Không `,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
        Swal.fire('Thêm bản tin thành công!', '', 'Hoàn tất').then((result)=>{
        e.currentTarget.submit();})
        } else if (result.isDenied) {
        Swal.fire('Hủy đăng', '', 'Thông báo').then((result)=> window.location.replace("/admin/news-cast/meo-tim-do/danh-sach"));
        }
        })
        })
    })
</script>
@endsection
