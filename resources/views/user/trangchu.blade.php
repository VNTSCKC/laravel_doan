@extends('layouts.user')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row merged20" id="page-contents">
                <div class="col-lg-3">
                    <aside class="sidebar static left">
                        <div class="widget">
                            <div class="weather-widget low-opacity bluesh">
                                <div class="bg-image" style="background-image: url({{asset('user/images/resources/weather.jpg')}})"></div>
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
                                    <h3>Cloudy Skyes<i>Tp.Ho Chi Minh, VietNam</i></h3>
                                    <div class="weather-date skyblue-bg">
                                        <span>Nov<strong>21</strong></span>
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
                            <div style="background-image: url({{asset('user/images/resources/dob2.png')}})" class="bg-image"></div>
                            <div class="dob-head">
                                <img src="{{asset('user/images/resources/sug-page-5.jpg')}}" alt="">
                                <span>22nd Birthday</span>
                                <div class="dob">
                                    <i>19</i>
                                    <span>September</span>
                                </div>
                            </div>
                            <div class="dob-meta">
                                <figure><img src="{{asset('user/images/resources/dob-cake.gif')}}" alt=""></figure>
                                <h6><a href="#" title="">Lucy Carbel</a> valentine's birthday</h6>
                                <p>leave a message with your best wishes on his profile.</p>
                            </div>
                        </div>birthday widget -->
                    </aside>
                </div><!-- sidebar -->
                <div class="col-lg-6">
                    <div class="central-meta postbox">
                        <span class="create-post">Tạo Bài Đăng</span>
                        <div class="new-postbox">
                            @if (session('success_create_post'))
                            <p class="alert alert-success">{{session('success_create_post')}}</p>
                            @endif
                            <figure>
                                <img style="width:35px; height:35px;" src="{{ url('/') }}/images/UserImages/{{Auth::user()->image}}" alt="">
                            </figure>
                            <div class="newpst-input">
                                <p style="margin-left: 10px; margin-top:10px;">Bài đăng tìm đồ/ nhặt đồ</p>

                            </div>
                            <div class="attachments">
                                <a href="/user/dang-bai" class="btn btn-info">Đăng bài</a>
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

                    <div class="loadMore">
                        @foreach ($listPost as $post )
                        <div class="central-meta item">
                            <div class="user-post">
                                <div class="friend-info">
                                    <figure>
                                        <img src="{{ URL::to('/') }}/images/UserImages/{{$post->nguoiDang->image}}" alt="">
                                    </figure>
                                    <div class="friend-name">
                                        <div class="more">
                                            <div class="more-post-optns"><i class="ti-more-alt"></i>
                                                <ul>
                                                    <li><i class="fa fa-pencil-square-o"></i>Edit Post</li>
                                                    <li><i class="fa fa-trash-o"></i>Delete Post</li>
                                                    <li class="bad-report"><i class="fa fa-flag"></i>Report Post</li>
                                                    <li><i class="fa fa-address-card-o"></i>Boost This Post</li>
                                                    <li><i class="fa fa-clock-o"></i>Schedule Post</li>
                                                    <li><i class="fa fa-wpexplorer"></i>Select as featured</li>
                                                    <li><i class="fa fa-bell-slash-o"></i>Turn off Notifications</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <ins><a href="time-line.html" title="">{{$post->nguoiDang->name}}</a> {{$post->loaiBaiDang->name}}/{{$post->loaiDo->name}}</ins>
                                        <span><i class="fa fa-globe"></i> Ngày đăng: {{$post->created_at}}</span>
                                    </div>
                                    <div class="post-meta">
                                        <h1>{{$post->title}}</h1>
                                        <p>
                                            {!!$post->content!!}
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
                                    <a href="#" title=""><img src="{{ url('/') }}/images/UserImages/{{Auth::user()->image}}" style="width:40px; height:40px;" alt=""></a>
                                </figure>
                                <div class="page-meta">
                                    <a href="#" title="" class="underline">{{Auth::user()->name}}</a>
                                    <span><i class="ti-comment"></i><a href="insight.html" title="">Tin nhắn <em>9</em></a></span>
                                </div>
                                <ul class="page-publishes ">
                                    <li>
                                        <span><i class="ti-pencil-alt"></i> <a href="profile-user/{{Auth::user()->id}}">Thông tin cá nhân</a></span>
                                    </li>
                                    <li>
                                        <span><i class="ti-camera"></i>Ảnh đại diện</span>
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
