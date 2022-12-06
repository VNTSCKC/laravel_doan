@extends('layouts.admin')
@section('content')
<h2>CẬP NHẬT THÔNG TIN DANH MỤC</h2>

<form action="{{route('xu-li-cap-nhat-danh-muc-tim-do',['id'=>$catalogue->id])}}" method="post">
    @csrf
    <div class="form-group">
        <label for="username">Tên danh mục</label>
        <input type="text" class="form-control"  placeholder="Username" name="name" value="{{$catalogue->name}}">
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <!-- <div class="alert alert-danger">{{$error}}</div> -->
            <label style="color:red">{{$error}}</label>
        @endforeach
        @endif
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <a href="/admin/item/catalogue/danh-sach">< Back</a>
@endsection
