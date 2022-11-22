
@extends('layouts.admin')
@section('css')
@section('css')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endsection
@endsection
@section('content')
<form action="{{route('xu-li-cap-nhat-bai-dang',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="type_id">Tài khoản đăng</label>
        <select class="form-select" aria-label="select account" name="account_id">
            @foreach ($listAccount as $account)
            @if ($account->id==$post->account_id)
            <option value="{{$account->id}}" selected>{{$account->username}}</option>
            @else
            <option value="{{$account->id}}">{{$account->username}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="type_id">Loại bài đăng</label>
        <select class="form-select" aria-label="select account" name="type_id">
            @foreach ($listTypePost as $typePost)
            @if ($post->type_id==$typePost->id)
            <option value="{{$typePost->id}}" selected>{{$typePost->name}}</option>
            @else
            <option value="{{$typePost->id}}">{{$typePost->name}}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="type_id">Danh mục tìm đồ</label>
        <select class="form-select" aria-label="select account" name="catalogue_id">
            @foreach ($listCatalogue as $catalogue)
            @if ($post->catalogue_id==$catalogue->id)
            <option value="{{$catalogue->id}}" selected>{{$catalogue->name}}</option>
            @else
            <option value="{{$catalogue->id}}">{{$catalogue->name}}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="exampleInput">Chủ đề</label>
        <input type="text" class="form-control" id="exampleInput"  placeholder="Chủ đề" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Nội dung</label>
        <textarea name="content" id="content" >{!!$post->content!!}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputLocation">Địa chỉ</label>
        <input type="text" class="form-control" id="exampleInputLocation"  placeholder="Địa điểm (nơi nhặt hoặc mất)" name="location" value="{{$post->location}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection
