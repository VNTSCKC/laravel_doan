@extends('layouts.user')
@section('content')
<h2> EDIT PROFILE </h2>
<div class="row justify-content-evenly">
    <div class="col-4">
        <img src="" alt="" width="90%">
    </div>
    <div class="col-4">
        <form action="{{route('xu-li-cap-nhat-thong-tin-user',['id'=>$account->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Họ tên</label>
                <input type="text" class="form-control"  placeholder="name" name="name" value="{{$account->name}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$account->email}}">
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="tel" class="form-control"  placeholder="Số điện thoại" name="phone" pattern="(\+84|0)\d{9,10}" required value="{{$account->phone}}">
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input type="text" class="form-control"  placeholder="Username" name="address" value="{{$account->address}}">
            </div>
            <div class="form-group">
                <label for="dateofbirth">Ngày sinh</label>
                <input placeholder="Select date" type="datetime-local" id="dateofbirth" class="form-control" name="dateofbirth" value="{{$account->dateofbirth}}">
            </div>

            <button type="submit" class="btn btn-primary">Cap nhat</button>
          </form>
          <a href="{{route('trang-chu-user')}}" class="btn btn-outline-primary mt-2">< Back To Home</a>
    </div>
</div>

@endsection
