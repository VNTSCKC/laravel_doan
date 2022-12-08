@extends('layouts.user')
@section('css')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{asset('style.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row merged20" id="page-contents">
                <div class="col-lg-3">
                    <aside class="sidebar static left">
                        <div class="widget">
                            <div class="weather-widget low-opacity bluesh">
                                <div class="bg-image"
                                    style="background-image: url({{ asset('user/images/resources/weather.jpg') }})"></div>
                                <span class="refresh-content"><i class="fa fa-refresh"></i></span>
                                <div class="weather-week">
                                    <div class="icon sun-shower">
                                        <div class="cloud"></div>
                                        <div class="sun">
                                            <div class="rays"></div>
                                        </div>
                                        <div class="rain"></div>
                                    </div>
                                </div>
                                <div class="weather-infos">
                                    <span class="weather-tem">25</span>
                                    <h3>Cloudy Skyes<i>Tp. Ho Chi Minh, Viet Nam</i></h3>
                                    <div class="weather-date skyblue-bg">
                                        <span>DEC<strong>12</strong></span>
                                    </div>
                                </div>
                                <div class="monthly-weather">
                                    <ul>
                                        <li>
                                            <span>Sun</span>
                                            <a href="#" title=""><i class="wi wi-day-sunny"></i></a>
                                            <em>40°</em>
                                        </li>
                                        <li>
                                            <span>Mon</span>
                                            <a href="#" title=""><i class="wi wi-day-cloudy"></i></a>
                                            <em>10°</em>
                                        </li>
                                        <li>
                                            <span>Tue</span>
                                            <a href="#" title=""><i class="wi wi-day-hail"></i></a>
                                            <em>20°</em>
                                        </li>
                                        <li>
                                            <span>Wed</span>
                                            <a href="#" title=""><i class="wi wi-day-lightning"></i></a>
                                            <em>34°</em>
                                        </li>
                                        <li>
                                            <span>Thu</span>
                                            <a href="#" title=""><i class="wi wi-day-showers"></i></a>
                                            <em>22°</em>
                                        </li>
                                        <li>
                                            <span>Fri</span>
                                            <a href="#" title=""><i class="wi wi-day-windy"></i></a>
                                            <em>26°</em>
                                        </li>
                                        <li>
                                            <span>Sat</span>
                                            <a href="#" title=""><i class="wi wi-day-sunny-overcast"></i></a>
                                            <em>30°</em>
                                        </li>
                                    </ul>
                                </div>

                            </div><!-- Weather Widget -->
                        </div><!-- weather widget-->
                        <!-- <div class="widget whitish low-opacity">
                            <div style="background-image: url({{ asset('user/images/resources/dob2.png') }})"
                                class="bg-image"></div>
                            <div class="dob-head">
                                <img src="{{ asset('user/images/resources/sug-page-5.jpg') }}" alt="">
                                <span>22nd Birthday</span>
                                <div class="dob">
                                    <i>19</i>
                                    <span>September</span>
                                </div>
                            </div>
                            <div class="dob-meta">
                                <figure><img src="{{ asset('user/images/resources/dob-cake.gif') }}" alt="">
                                </figure>
                                <h6><a href="#" title="">Lucy Carbel</a> valentine's birthday</h6>
                                <p>leave a message with your best wishes on his profile.</p>
                            </div>
                        </div>birthday widget -->
                        <div class="widget  low-opacity">
                            {{-- <div style="background-image: url({{ asset('user/images/resources/dob2.png') }})"
                                class="bg-image"></div>
                            <div class="dob-head">
                                <img src="{{ asset('user/images/resources/sug-page-5.jpg') }}" alt="">
                                <span>22nd Birthday</span>
                                <div class="dob">
                                    <i>19</i>
                                    <span>September</span> 
                                </div>
                            </div>
                            <div class="dob-meta">
                                <figure><img src="{{ asset('user/images/resources/dob-cake.gif') }}" alt="">
                                </figure>
                                <h6><a href="#" title="">Lucy Carbel</a> valentine's birthday</h6>
                                <p>leave a message with your best wishes on his profile.</p>
                            </div> --}}
                            <h2 style="margin-left: 10px">Tin tức</h2>
                            @if($listNews)
                            <div class="slideshow-container">
                                @foreach ($listNews as $news)
                                <div class="mySlides fade">

                                    <img src="{{URL::to('/')}}/images/post/{{$news->image}}" style="width:100%; height:200px; object-fit:cover;">
                                    <div class="text">{{$news->title}}</div>
                                </div>
                                @endforeach
                            </div>
                            <script>
                                let slideIndex = 0;
                                showSlides();

                                function showSlides() {
                                let i;
                                let slides = document.getElementsByClassName("mySlides");
                                for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                                }
                                slideIndex++;
                                if (slideIndex > slides.length) {slideIndex = 1}
                                slides[slideIndex-1].style.display = "block";
                                setTimeout(showSlides, 2000); // Change image every 2 seconds
                                }
                        </script>
                        <br>
                        <a href="/news-cast/2" class="btn btn-info" style="margin:0px 0px 10px 10px">Xem tất cả</a>

                        @else
                        <p>Trống</p>
                        @endif
                        </div><!-- birthday widget -->
                        <div class="widget  low-opacity">
                            {{-- <div style="background-image: url({{ asset('user/images/resources/dob2.png') }})"
                                class="bg-image"></div>
                            <div class="dob-head">
                                <img src="{{ asset('user/images/resources/sug-page-5.jpg') }}" alt="">
                                <span>22nd Birthday</span>
                                <div class="dob">
                                    <i>19</i>
                                    <span>September</span>
                                </div>
                            </div>
                            <div class="dob-meta">
                                <figure><img src="{{ asset('user/images/resources/dob-cake.gif') }}" alt="">
                                </figure>
                                <h6><a href="#" title="">Lucy Carbel</a> valentine's birthday</h6>
                                <p>leave a message with your best wishes on his profile.</p>
                            </div> --}}
                            <h2  style="margin-left: 10px">Mẹo tìm đồ</h2>
                            @if($listTip)
                            <div class="slideshow-container">
                                @foreach ($listTip as $tip)
                                <div class="mySlides-tip fade">
                                    <img src="{{URL::to('/')}}/images/post/{{$tip->image}}" style="width:100%; height:200px; object-fit:cover;">
                                    <div class="text">{{$tip->title}}</div>
                                </div>
                                @endforeach
                            </div>
                            <script>
                                let slideIndex_tip = 0;
                                showSlides_tip();

                                function showSlides_tip() {
                                let i_tip;
                                let slides_tip = document.getElementsByClassName("mySlides-tip");
                                for (i = 0; i < slides_tip.length; i++) {
                                    slides_tip[i].style.display = "none";
                                }
                                slideIndex_tip++;
                                if (slideIndex_tip > slides_tip.length) {slideIndex_tip = 1}
                                slides_tip[slideIndex_tip-1].style.display = "block";
                                setTimeout(showSlides_tip, 2000); // Change image every 2 seconds
                                }
                        </script>
                        <br>
                        <a href="/news-cast/1" class="btn btn-info" style="margin:0px 0px 10px 10px">Xem tất cả</a>

                        @else
                        <p>Trống</p>
                        @endif
                        </div><!-- birthday widget -->

                    </aside>
                </div><!-- sidebar -->
                <div class="col-lg-6">
                    <div class="central-meta postbox">
                        <span class="create-post">Tạo Bài Đăng</span>
                        <div class="new-postbox">
                            @if (session('success_create_post'))
                                <p class="alert alert-success">{{ session('success_create_post') }}</p>
                            @endif
                            <figure>
                                @if (Auth::user()->image)
                                    <img style="width:50px; height:50px; object-fit:cover;"
                                        src="{{ url('/') }}/images/UserImages/{{ Auth::user()->image }}"
                                        alt="">
                                @else
                                    <img style="width:50px; height:50px; object-fit:cover;"
                                        src="{{ url('/') }}/images/UserImages/avt.png" alt="">
                                @endif
                            </figure>
                            <div class="newpst-input">
                                <p style="margin-left: 10px; margin-top:10px;">Bài đăng tìm đồ/ nhặt đồ</p>

                            </div>
                            <div class="attachments">
                                <a href="/user/dang-bai" class="post-btn">Đăng bài</a>
                            </div>
                            <div class="add-location-post">
                                <span>Drag map point to selected area</span>
                                <div class="row">

                                    <div class="col-lg-6">
                                        <label class="control-label">Lat :</label>
                                        <input type="text" class="" id="us3-lat" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Long :</label>
                                        <input type="text" class="" id="us3-lon" />
                                    </div>
                                </div>
                                <!-- map -->
                                <div id="us3"></div>
                            </div>
                        </div>
                    </div><!-- add post new box -->

                    <div class="loadMore" id="bai-dang">
                        @foreach ($listPost as $post)
                            <div class="central-meta item">
                                <div class="user-post">
                                    <div class="friend-info">
                                        <figure>
                                            @if( !$post->nguoiDang->image)
                                                <img src="{{ URL::to('/') }}/images/UserImages/avt.png" style="width:50px; height:50px; object-fit:cover;" alt="">

                                            @else
                                            <img src="{{ URL::to('/') }}/images/UserImages/{{ $post->nguoiDang->image }}" style="width:50px; height:50px; object-fit:cover;" alt="">
                                         @endif
                                        </figure>
                                        <div class="friend-name">
                                            <div class="more">
                                                <div class="more-post-optns"><i class="ti-more-alt"></i>
                                                    <ul>
                                                        @if ($post->nguoiDang->username == Session::get('username'))
                                                            <form
                                                                action="{{ route('cap-nhat-bai-dang-cua-nguoi-dung', ['post' => $post->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <li><i class="fa fa-pencil-square-o"></i>
                                                                    <input type="submit" value="Sửa bài viết"
                                                                        class="border-0"
                                                                        style="background-color: transparent">
                                                                </li>
                                                            </form>
                                                            <form
                                                                action="{{ route('xoa-bai-dang-cua-nguoi-dung', ['post' => $post->id]) }}"
                                                                method="post" class="delete-post">
                                                                @csrf
                                                                <li>
                                                                    <i class="fa fa-trash-o"></i>
                                                                    <input id="{{$post->id}}" type="submit" value="Xóa bài viết"
                                                                        class="border-0"
                                                                        style="background-color: transparent">
                                                                </li>
                                                            </form>
                                                        @endif
                                                        <li>    <i class="fa fa-flag"></i>   <input  id="post_{{$post->id}}" type="button" value="Báo cáo bài viết"
                                                            class="border-0 report-post"
                                                            style="background-color: transparent"></li>
                                                        @if ($post->nguoiDang->username != Auth::user()->username)
                                                            @php

                                                                $flag = false;
                                                                foreach ($listPostFollow as $postFollow) {
                                                                    if ($postFollow->post_id == $post->id) {
                                                                        $flag = true;
                                                                        break;
                                                                    }
                                                                }
                                                                if ($flag == false) {
                                                                    echo '
                                                                        <li><i class="fa fa-wpexplorer"></i>   <input  id="follow_post_'.$post->id.'" type="button" value="Theo dõi bài viết"
                                                            class="border-0 follow-post"
                                                            style="background-color: transparent"></li>';
                                                                }
                                                                else{
                                                                    echo '
                                                                        <li><i class="fa fa-wpexplorer"></i>   <input  id="follow_post_'.$post->id.'" type="button" value="Hủy theo dõi"
                                                            class="border-0 follow-post"
                                                            style="background-color: transparent"></li>';
                                                                }
                                                            @endphp
                                                        @endif



                                                    </ul>
                                                </div>
                                            </div>
                                            <ins><a href="time-line.html" title="">{{ $post->nguoiDang->name }}</a>
                                                {{ $post->loaiBaiDang->name }}/{{ $post->loaiDo->name }}</ins>
                                            <span><i class="fa fa-globe"></i> Ngày đăng: {{ $post->created_at }}</span>
                                            @if ($post->updated_at != null && $post->created_at != $post->updated_at)
                                                <span></i> Đã chỉnh sửa</span>
                                            @endif
                                        </div>
                                        <div class="post-meta" style="text-transform: none;">
                                            <h1>{{ $post->title }}</h1>
                                            <p>
                                                {!! $post->content !!}
                                            </p>
                                            {{-- <figure>
                                            <div class="img-bunch">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <figure>
                                                            <a href="#" title="" data-toggle="modal" data-target="#img-comt">
                                                            <img src="{{asset('user/images/resources/album1.jpg')}}" alt="">
                                                            </a>
                                                        </figure>
                                                        <figure>
                                                            <a href="#" title="" data-toggle="modal" data-target="#img-comt">
                                                            <img src="{{asset('user/images/resources/album2.jpg')}}" alt="">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <figure>
                                                            <a href="#" title="" data-toggle="modal" data-target="#img-comt">
                                                            <img src="{{asset('user/images/resources/album6.jpg')}}" alt="">
                                                            </a>
                                                        </figure>
                                                        <figure>
                                                            <a href="#" title="" data-toggle="modal" data-target="#img-comt">
                                                            <img src="{{asset('user/images/resources/album5.jpg')}}" alt="">
                                                            </a>
                                                        </figure>
                                                        <figure>
                                                            <a href="#" title="" data-toggle="modal" data-target="#img-comt">
                                                            <img src="{{asset('user/images/resources/album4.jpg')}}" alt="">
                                                            </a>
                                                            <div class="more-photos">
                                                                <span>+15</span>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>

                                        </figure> --}}
                                            {{-- <div class="we-video-info">
                                            <ul>
                                                <li>
                                                    <span class="views" title="views">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                                </li>
                                                <li>
                                                    <div class="likes heart" title="Like/Dislike">❤ </div>
                                                </li>
                                                <li>
                                                    <span class="comment" title="Comments">
                                                        <i class="fa fa-commenting"></i>
                                                    </span>
                                                </li>

                                                <li>
                                                    <span>
                                                        <a class="share-pst" href="#" title="Share">
                                                            <i class="fa fa-share-alt"></i>
                                                        </a>
                                                    </span>
                                                </li>
                                            </ul>

                                        </div> --}}
                                        </div>

                                    </div>

                                </div>


                            </div><!-- album post -->
                        @endforeach
                    </div>
                </div><!-- centerl meta -->
                <div class="col-lg-3">
                                <aside class="sidebar static right">
                                    <div class="widget">
                                        <h4 class="widget-title">Trang Cá Nhân</h4>
                                        <div class="your-page">
                                            <figure>

                                                <a href="#" title=""><img style="width:50px; height:50px; object-fit:cover;" src="{{ url('/') }}/images/UserImages/{{Auth::user()->image}}" alt=""></a>
                                            </figure>
                                            <div class="page-meta">
                                                <a href="#" title="" class="underline">{{Auth::user()->name}}</a>
                                                <span><i class="ti-comment"></i><a href="{{ route('trang-chu-nhan-tin')}}" title="">Tin nhắn </a></span>
                                            </div>
                                            <ul class="page-publishes ">
                                                <li>
                                                    <span><i class="ti-pencil"></i><a href="{{ route('trang-ca-nhan')}}" title="">Bài viết của tôi</a></span>
                                                </li>
                                                <li>
                                                    <span><i class="ti-bell"></i><a href="{{ route('trang-bai-theo-doi')}}" title="">Bài viết theo dõi </a></span>
                                                </li>

                                            </ul>

                                        </div>
                                    </div><!-- page like widget -->
                                </aside>
                            </div><!-- sidebar --> 
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>

        $(document).ready(function() {
            // $('#tim-kiem-form').submit(function(e){
            //     e.preventDefault(e);
            //     return false;
            // });
            // $("#tim-kiem").change(function(){

            //     $txtSearch=$(this).val();

            //     if($txtSearch!=null){

            //         $.get('/user/tim-kiem/'.$txtSearch,"",function(data){
            //             console.log(data);
            //         $('#bai-dang').html(data);
            //         alert('abc');

            //         });
            //     }

            //     return false;
            // });


            $('form.delete-post').submit(function(e) {
                e.preventDefault(e);
                var frmAction = this.action;
                Swal.fire({
                    title: 'Bạn có muốn xóa bài viết?',
                    text: "Bài viết sẽ không thể khôi phục",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Vâng, xóa nó!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post(frmAction);
                        Swal.fire(
                            'Đã xóa',
                            'Bài viết của bạn đã được xóa',
                            'Hoàn tất'
                        )
                        location.reload(true);
                    }
                })
                return false;
            })
            $(".follow-post").click(function(e) {

                if($(this).val()=="Theo dõi bài viết"){
                    $follow_post_id=$(this).attr('id').slice(12);
                    $(this).val("Hủy theo dõi")
                    alert($follow_post_id);
                    $type=1;
                    $.post('/user/follow-post',{follow_post_id:$follow_post_id,type:$type}).done(function(){
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Theo dõi bài đăng thành công',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    });
                    return false;
                }else{
                    $follow_post_id=$(this).attr('id').slice(12);
                    $(this).val("Theo dõi bài viết")
                    alert($follow_post_id);
                    $type=0;
                    $.post('/user/follow-post',{follow_post_id:$follow_post_id,type:$type}).done(function(){
                        Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Đã hủy theo dõi bài đăng',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    });
                    return false;
                }

            })
            $(".report-post").click(async function(e) {

                const {
                    value: text
                } = await Swal.fire({
                    input: 'textarea',
                    inputLabel: 'Báo cáo',
                    inputPlaceholder: 'Nhập nội dung báo cáo dô',
                    inputAttributes: {
                        'aria-label': 'Type your message here'
                    },
                    showCancelButton: true
                })

                if (text) {
                    var $report_id=$(this).attr('id').slice(5);
                    var $content=text;
                    Swal.fire({
                    title: 'Chắc chắn báo cáo chưa??',
                    text: "Báo cáo rồi admin biết bạn là ai đó!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Rồi!'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        $.post('/user/report-post',{report_id:$report_id,content:$content,_token:'{{csrf_token()}}',}).done(function(){
                            Swal.fire({
                        title: 'Báo cáo thành công',
                        showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                        }
                        }).fail(function(){
                            Swal.fire({
                            icon: 'error',
                            title: 'Lỗi rồi',
                            text: 'Bị lỗi gì đó!',

                            })
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
