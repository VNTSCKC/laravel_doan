<div class="topbar stick">
    <div class="logo">
        <a title="" href="{{route('trang-chu-nguoi-dung')}}"><img style="width:50px; height:50px;" src="{{asset('images/chao.jpg')}}" alt=""></a>
    </div>
    <div class="top-area">
        <div class="main-menu">
            <span>
                <i class="fa fa-braille"></i>
            </span>
        </div>
        <div class="top-search">
            <form method="get" id="tim-kiem-form" action="/user/tim-kiem">
                <input id="tim-kiem" type="text" placeholder="Search People, Pages, Groups etc" name="txtSearch">
            </form>
        </div>
        <div class="page-name">
            <span>Newsfeed</span>
         </div>
        <ul class="setting-area">
            <li><a href="#" title="Home" data-ripple=""><i class="fa fa-home"></i></a></li>



                <a href="/user/message" title="Messages" data-ripple="" style="font-size: 20px; margin:0px 10px 0px 10px;"><i class="fa fa-commenting" style="color: #999; "></i></a>


            <li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i><em>EN</em></a>
                <div class="dropdowns languages">
                    <div data-gutter="10" class="row">
                        <div class="col-md-3">
                          <ul class="dropdown-meganav-select-list-lang">
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/UK.png')}}">English(UK)
                              </a>
                            </li>
                            <li class="active">
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/US.png')}}">English(US)
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/DE.png')}}">Deutsch
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/NED.png')}}">Nederlands
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/FR.png')}}">Français
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/SP.png')}}">Español
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/ARG.png')}}">Español (AR)
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/IT.png')}}">Italiano
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/PT.png')}}">Português (PT)
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/BR.png')}}">Português (BR)
                              </a>
                            </li>

                          </ul>
                        </div>
                        <div class="col-md-3">
                          <ul class="dropdown-meganav-select-list-lang">
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/FIN.png')}}">Suomi
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/SW.png')}}">Svenska
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/DEN.png')}}">Dansk
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/CZ.png')}}">Čeština
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/HUN.png')}}">Magyar
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/ROM.png')}}">Română
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/JP.png')}}">日本語
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/CN.png')}}">简体中文
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/PL.png')}}">Polski
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/GR.png')}}">Ελληνικά
                              </a>
                            </li>

                          </ul>
                        </div>
                        <div class="col-md-3">
                          <ul class="dropdown-meganav-select-list-lang">
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/TUR.png')}}">Türkçe
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/BUL.png')}}">Български
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/ARB.png')}}">العربية
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/KOR.png')}}">한국어
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/ISR.png')}}">עברית
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/LAT.png')}}">Latviski
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/UKR.png')}}">Українська
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/IND.png')}}">Bahasa Indonesia
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/MAL.png')}}">Bahasa Malaysia
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/TAI.png')}}">ภาษาไทย
                              </a>
                            </li>

                          </ul>
                        </div>
                        <div class="col-md-3">
                          <ul class="dropdown-meganav-select-list-lang">
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/CRO.png')}}">Hrvatski
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/LIT.png')}}">Lietuvių
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/SLO.png')}}">Slovenčina
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/SERB.png')}}">Srpski
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/SLOVE.png')}}">Slovenščina
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/NAM.png')}}">Tiếng Việt
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/PHI.png')}}">Filipino
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/ICE.png')}}">Íslenska
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/EST.png')}}">Eesti
                              </a>
                            </li>
                            <li>
                              <a href="#">
                                <img title="Image Title" alt="Image Alternative text" src="{{asset('user/images/flags/RU.png')}}">Русский
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                </div>
            </li>
            <li><a href="#" title="Help" data-ripple=""><i class="fa fa-question-circle"></i></a>
                <div class="dropdowns helps">
                    <span>Quick Help</span>
                    <form method="post">
                        <input type="text" placeholder="How can we help you?">
                    </form>
                    <span>Help with this page</span>
                    <ul class="help-drop">
                        <li><a href="forum.html" title=""><i class="fa fa-book"></i>Community & Forum</a></li>
                        <li><a href="faq.html" title=""><i class="fa fa-question-circle-o"></i>FAQs</a></li>
                        <li><a href="career.html" title=""><i class="fa fa-building-o"></i>Carrers</a></li>
                        <li><a href="privacy.html" title=""><i class="fa fa-pencil-square-o"></i>Terms & Policy</a></li>
                        <li><a href="#" title=""><i class="fa fa-map-marker"></i>Contact</a></li>
                        <li><a href="#" title=""><i class="fa fa-exclamation-triangle"></i>Report a Problem</a></li>
                    </ul>
                </div>
            </li>
        </ul>
        <div class="user-img">
            <h5>{{Auth::user()->name}}</h5>
            @if (Auth::user()->image)
            <img  style="width:50px; height:50px; object-fit:cover;" src="{{ url('/') }}/images/UserImages/{{Auth::user()->image}}" alt="">
            @else
            <img  style="width:50px; height:50px; object-fit:cover;" src="{{ url('/') }}/images/UserImages/avt.png" alt="">
            @endif

            <span class="status f-online"></span>
            <div class="user-setting">
                <span class="seting-title">Chat setting <a href="#" title="">see all</a></span>
                <ul class="chat-setting">
                    <li><a href="#" title=""><span class="status f-online"></span>online</a></li>
                    <li><a href="#" title=""><span class="status f-away"></span>away</a></li>
                    <li><a href="#" title=""><span class="status f-off"></span>offline</a></li>
                </ul>
                <span class="seting-title">User setting <a href="#" title="">see all</a></span>
                <ul class="log-out">
                    {{-- <li><a href="about.html" title=""><i class="ti-user"></i> view profile</a></li> --}}
                    <li><a href="/user/profile-update/{{Auth::user()->id}}" title=""><i class="ti-pencil-alt"></i>Cập nhật thông tin</a></li>
                    <li><a href="/user/doi-mat-khau" title=""><i class="ti-target"></i>Đổi mật khẩu</a></li>
                    {{-- <li><a href="setting.html" title=""><i class="ti-settings"></i>account setting</a></li> --}}
                    <li><a href="/dang-xuat" title=""><i class="ti-power-off"></i>đăng xuất</a></li>
                </ul>
            </div>
        </div>
        <span class="ti-settings main-menu" data-ripple=""></span>
    </div>
    <nav>
        <ul class="nav-list">
            <li><a class="" href="#" title=""><i class="fa fa-home"></i> Home Pages</a>
                <ul>
                    <li><a href="index.html" title="">Pitnik Default</a></li>
                    <li><a href="company-landing.html" title="">Company Landing</a></li>
                    <li><a href="pitrest.html" title="">Pitrest</a></li>
                    <li><a href="redpit.html" title="">Redpit</a></li>
                    <li><a href="redpit-category.html" title="">Redpit Category</a></li>
                    <li><a href="soundnik.html" title="">Soundnik</a></li>
                    <li><a href="soundnik-detail.html" title="">Soundnik Single</a></li>
                    <li><a href="career.html" title="">Pitjob</a></li>
                    <li><a href="shop.html" title="">Shop</a></li>
                    <li><a href="classified.html" title="">Classified</a></li>
                    <li><a href="pitpoint.html" title="">PitPoint</a></li>
                    <li><a href="pittube.html" title="">Pittube</a></li>
                    <li><a href="/user/messgae" title="">Messenger</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-film"></i> Pittube</a>
                <ul>
                    <li><a href="pittube.html" title="">Pittube</a></li>
                    <li><a href="pittube-detail.html" title="">Pittube single</a></li>
                    <li><a href="pittube-category.html" title="">Pittube Category</a></li>
                    <li><a href="pittube-channel.html" title="">Pittube Channel</a></li>
                    <li><a href="pittube-search-result.html" title="">Pittube Search Result</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-female"></i> PitPoint</a>
                <ul>
                    <li><a href="pitpoint.html" title="">PitPoint</a></li>
                    <li><a href="pitpoint-detail.html" title="">Pitpoint Detail</a></li>
                    <li><a href="pitpoint-list.html" title="">Pitpoint List style</a></li>
                    <li><a href="pitpoint-without-baner.html" title="">Pitpoint without Banner</a></li>
                    <li><a href="pitpoint-search-result.html" title="">Pitpoint Search</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-graduation-cap"></i> Pitjob</a>
                <ul>
                    <li><a href="career.html" title="">Pitjob</a></li>
                    <li><a href="career-detail.html" title="">Pitjob Detail</a></li>
                    <li><a href="career-search-result.html" title="">Job seach page</a></li>
                    <li><a href="social-post-detail.html" title="">Social Post Detail</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-repeat"></i> Timeline</a>
                <ul>
                    <li><a href="timeline.html" title="">Timeline</a></li>
                    <li><a href="timeline-photos.html" title="">Timeline Photos</a></li>
                    <li><a href="timeline-videos.html" title="">Timeline Videos</a></li>
                    <li><a href="timeline-groups.html" title="">Timeline Groups</a></li>
                    <li><a href="timeline-friends.html" title="">Timeline Friends</a></li>
                    <li><a href="timeline-friends2.html" title="">Timeline Friends-2</a></li>
                    <li><a href="about.html" title="">Timeline About</a></li>
                    <li><a href="blog-posts.html" title="">Timeline Blog</a></li>
                    <li><a href="friends-birthday.html" title="">Friends' Birthday</a></li>
                    <li><a href="newsfeed.html" title="">Newsfeed</a></li>
                    <li><a href="search-result.html" title="">Search Result</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-heart"></i> Favourit Page</a>
                <ul>
                    <li><a href="fav-page.html" title="">Favourit Page</a></li>
                    <li><a href="fav-favers.html" title="">Fav Page Likers</a></li>
                    <li><a href="fav-events.html" title="">Fav Events</a></li>
                    <li><a href="fav-event-invitations.html" title="">Fav Event Invitations</a></li>
                    <li><a href="event-calendar.html" title="">Event Calendar</a></li>
                    <li><a href="fav-page-create.html" title="">Create New Page</a></li>
                    <li><a href="price-plans.html" title="">Price Plan</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-forumbee"></i> Forum</a>
                <ul>
                    <li><a href="forum.html" title="">Forum</a></li>
                    <li><a href="forum-create-topic.html" title="">Forum Create Topic</a></li>
                    <li><a href="forum-open-topic.html" title="">Forum Open Topic</a></li>
                    <li><a href="forums-category.html" title="">Forum Category</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-star-o"></i> Featured</a>
                <ul>
                    <li><a href="chat-messenger.html" title="">Messenger (Chatting)</a></li>
                    <li><a href="notifications.html" title="">Notifications</a></li>
                    <li><a href="badges.html" title="">Badges</a></li>
                    <li><a href="faq.html" title="">Faq's</a></li>
                    <li><a href="contribution.html" title="">Contriburion Page</a></li>
                    <li><a href="manage-page.html" title="">Manage Page</a></li>
                    <li><a href="weather-forecast.html" title="">weather-forecast</a></li>
                    <li><a href="statistics.html" title="">Statics/Analytics</a></li>
                    <li><a href="shop-cart.html" title="">Shop Cart</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-gears"></i> Account Setting</a>
                <ul>
                    <li><a href="setting.html" title="">Setting</a></li>
                    <li><a href="privacy.html" title="">Privacy</a></li>
                    <li><a href="support-and-help.html" title="">Support & Help</a></li>
                    <li><a href="support-and-help-detail.html" title="">Support Detail</a></li>
                    <li><a href="support-and-help-search-result.html" title="">Support Search</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-lock"></i> Authentication</a>
                <ul>
                    <li><a href="login.html" title="">Login Page</a></li>
                    <li><a href="register.html" title="">Register Page</a></li>
                    <li><a href="logout.html" title="">Logout Page</a></li>
                    <li><a href="coming-soon.html" title="">Coming Soon</a></li>
                    <li><a href="error-404.html" title="">Error 404</a></li>
                    <li><a href="error-404-2.html" title="">Error 404-2</a></li>
                    <li><a href="error-500.html" title="">Error 500</a></li>
                </ul>
            </li>
            <li><a class="" href="#" title=""><i class="fa fa-wrench"></i> Tools</a>
                <ul>
                    <li><a href="typography.html" title="">Typography</a></li>
                    <li><a href="popup-modals.html" title="">Popups/Modals</a></li>
                    <li><a href="post-versions.html" title="">Post Versions</a></li>
                    <li><a href="sliders.html" title="">Sliders / Carousel</a></li>
                    <li><a href="google-map.html" title="">Google Maps</a></li>
                    <li><a href="widgets.html" title="">Widgets</a></li>
                </ul>
            </li>
        </ul>

    </nav><!-- nav menu -->
</div><!-- topbar -->

<div class="fixed-sidebar right">
    <div class="chat-friendz">
        <ul class="chat-users">
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend1.jpg')}}" alt="">
                    <span class="status f-online"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend2.jpg')}}" alt="">
                    <span class="status f-away"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend3.jpg')}}" alt="">
                    <span class="status f-online"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend4.jpg')}}" alt="">
                    <span class="status f-offline"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend5.jpg')}}" alt="">
                    <span class="status f-online"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend6.jpg')}}" alt="">
                    <span class="status f-online"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend7.jpg')}}" alt="">
                    <span class="status f-offline"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend8.jpg')}}" alt="">
                    <span class="status f-online"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend9.jpg')}}" alt="">
                    <span class="status f-away"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend10.jpg')}}" alt="">
                    <span class="status f-away"></span>
                </div>
            </li>
            <li>
                <div class="author-thmb">
                    <img src="{{asset('user/images/resources/side-friend8.jpg')}}" alt="">
                    <span class="status f-online"></span>
                </div>
            </li>
        </ul>
        <div class="chat-box">
            <div class="chat-head">
                <span class="status f-online"></span>
                <h6>Bucky Barnes</h6>
                <div class="more">
                    <div class="more-optns"><i class="ti-more-alt"></i>
                        <ul>
                            <li>block chat</li>
                            <li>unblock chat</li>
                            <li>conversation</li>
                        </ul>
                    </div>
                    <span class="close-mesage"><i class="ti-close"></i></span>
                </div>
            </div>
            <div class="chat-list">
                <ul>
                    <li class="me">
                        <div class="chat-thumb"><img src="{{asset('images/resources/chatlist1.jpg')}}" alt=""></div>
                        <div class="notification-event">
                            <span class="chat-message-item">
                                HI, Jack i have faced a problem with your software. are you available now, when i install this i have to received an error.
                            </span>
                            <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Today at 2:12pm</time></span>
                        </div>
                    </li>
                    <li class="you">
                        <div class="chat-thumb"><img src="{{asset('images/resources/chatlist2.jpg')}}" alt=""></div>
                        <div class="notification-event">
                            <span class="chat-message-item">
                                Hi tina, Please let me know your purchase code, and show me the screnshot of error.
                            </span>
                            <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Today at 2:14pm</time></span>
                        </div>
                    </li>
                    <li class="me">
                        <div class="chat-thumb"><img src="{{asset('images/resources/chatlist1.jpg')}}" alt=""></div>
                        <div class="notification-event">
                            <span class="chat-message-item">
                                Yes, sure please wait a while, i ll show you the complete error list. Thank you.
                            </span>
                            <span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Today at 2:15pm</time></span>
                        </div>
                    </li>
                </ul>
                <form class="text-box">
                    <textarea placeholder="Post enter to post..."></textarea>
                    <div class="add-smiles">
                        <span title="add icon" class="em em-expressionless"></span>
                        <div class="smiles-bunch">
                            <i class="em em---1"></i>
                            <i class="em em-smiley"></i>
                            <i class="em em-anguished"></i>
                            <i class="em em-laughing"></i>
                            <i class="em em-angry"></i>
                            <i class="em em-astonished"></i>
                            <i class="em em-blush"></i>
                            <i class="em em-disappointed"></i>
                            <i class="em em-worried"></i>
                            <i class="em em-kissing_heart"></i>
                            <i class="em em-rage"></i>
                            <i class="em em-stuck_out_tongue"></i>
                        </div>
                    </div>

                    <button type="submit"></button>
                </form>
            </div>
        </div>
    </div>
</div><!-- right sidebar user chat -->

<div class="fixed-sidebar left">
    <div class="menu-left">
        <ul class="left-menu">
            <li>
                <a class="menu-small" href="#" title="">
                    <i class="ti-menu"></i>
                </a>
            </li>

            <li>
                <a href="newsfeed.html" title="Newsfeed Page" data-toggle="tooltip" data-placement="right">
                    <i class="ti-magnet"></i>
                </a>
            </li>
            <li>
                <a href="forum.html" title="Forum" data-toggle="tooltip" data-placement="right">
                    <i class="fa fa-forumbee"></i>
                </a>
            </li>
            <li>
                <a href="timeline-friends.html" title="Friends" data-toggle="tooltip" data-placement="right">
                    <i class="ti-user"></i>
                </a>
            </li>
            <li>
                <a href="fav-page.html" title="Favourit page" data-toggle="tooltip" data-placement="right">
                    <i class="fa fa-star-o"></i>
                </a>
            </li>
            <li>
                <a href="/user/message" title="Messages" data-toggle="tooltip" data-placement="right">
                    <i class="ti-comment-alt"></i>
                </a>
            </li>

            <li>
                <a href="notifications.html" title="Notification" data-toggle="tooltip" data-placement="right">
                    <i class="fa fa-bell-o"></i>
                </a>
            </li>

            <li>
                <a href="statistics.html" title="Account Stats" data-toggle="tooltip" data-placement="right">
                    <i class="ti-stats-up"></i>
                </a>
            </li>

            <li>
                <a href="support-and-help.html" title="Help" data-toggle="tooltip" data-placement="right">
                    <i class="fa fa-question-circle-o">
                    </i>
                </a>
            </li>
            <li>
                <a href="faq.html" title="Faq's" data-toggle="tooltip" data-placement="right">
                    <i class="ti-light-bulb"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="left-menu-full">
        <ul class="menu-slide">
            <li><a class="closd-f-menu" href="#" title=""><i class="ti-close"></i> close Menu</a></li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-home"></i> Home Pages</a>
                <ul class="submenu">
                    <li><a href="index.html" title="">Pitnik Default</a></li>
                    <li><a href="company-landing.html" title="">Company Landing</a></li>
                    <li><a href="pitrest.html" title="">Pitrest</a></li>
                    <li><a href="redpit.html" title="">Redpit</a></li>
                    <li><a href="redpit-category.html" title="">Redpit Category</a></li>
                    <li><a href="soundnik.html" title="">Soundnik</a></li>
                    <li><a href="soundnik-detail.html" title="">Soundnik Single</a></li>
                    <li><a href="career.html" title="">Pitjob</a></li>
                    <li><a href="shop.html" title="">Shop</a></li>
                    <li><a href="classified.html" title="">Classified</a></li>
                    <li><a href="pitpoint.html" title="">PitPoint</a></li>
                    <li><a href="pittube.html" title="">Pittube</a></li>
                    <li><a href="chat-messenger.html" title="">Messenger</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-film"></i> Pittube</a>
                <ul class="submenu">
                    <li><a href="pittube.html" title="">Pittube</a></li>
                    <li><a href="pittube-detail.html" title="">Pittube single</a></li>
                    <li><a href="pittube-category.html" title="">Pittube Category</a></li>
                    <li><a href="pittube-channel.html" title="">Pittube Channel</a></li>
                    <li><a href="pittube-search-result.html" title="">Pittube Search Result</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-female"></i>PitPoint</a>
                <ul class="submenu">
                    <li><a href="pitpoint.html" title="">PitPoint</a></li>
                    <li><a href="pitpoint-detail.html" title="">Pitpoint Detail</a></li>
                    <li><a href="pitpoint-list.html" title="">Pitpoint List style</a></li>
                    <li><a href="pitpoint-without-baner.html" title="">Pitpoint without Banner</a></li>
                    <li><a href="pitpoint-search-result.html" title="">Pitpoint Search</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-graduation-cap"></i>Pitjob</a>
                <ul class="submenu">
                    <li><a href="career.html" title="">Pitjob</a></li>
                    <li><a href="career-detail.html" title="">Pitjob Detail</a></li>
                    <li><a href="career-search-result.html" title="">Job seach page</a></li>
                    <li><a href="social-post-detail.html" title="">Social Post Detail</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-repeat"></i>Timeline</a>
                <ul class="submenu">
                    <li><a href="timeline.html" title="">Timeline</a></li>
                    <li><a href="timeline-photos.html" title="">Timeline Photos</a></li>
                    <li><a href="timeline-videos.html" title="">Timeline Videos</a></li>
                    <li><a href="timeline-groups.html" title="">Timeline Groups</a></li>
                    <li><a href="timeline-friends.html" title="">Timeline Friends</a></li>
                    <li><a href="timeline-friends2.html" title="">Timeline Friends-2</a></li>
                    <li><a href="about.html" title="">Timeline About</a></li>
                    <li><a href="blog-posts.html" title="">Timeline Blog</a></li>
                    <li><a href="friends-birthday.html" title="">Friends' Birthday</a></li>
                    <li><a href="newsfeed.html" title="">Newsfeed</a></li>
                    <li><a href="search-result.html" title="">Search Result</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-heart"></i>Favourit Page</a>
                <ul class="submenu">
                    <li><a href="fav-page.html" title="">Favourit Page</a></li>
                    <li><a href="fav-favers.html" title="">Fav Page Likers</a></li>
                    <li><a href="fav-events.html" title="">Fav Events</a></li>
                    <li><a href="fav-event-invitations.html" title="">Fav Event Invitations</a></li>
                    <li><a href="event-calendar.html" title="">Event Calendar</a></li>
                    <li><a href="fav-page-create.html" title="">Create New Page</a></li>
                    <li><a href="price-plans.html" title="">Price Plan</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-forumbee"></i>Forum</a>
                <ul class="submenu">
                    <li><a href="forum.html" title="">Forum</a></li>
                    <li><a href="forum-create-topic.html" title="">Forum Create Topic</a></li>
                    <li><a href="forum-open-topic.html" title="">Forum Open Topic</a></li>
                    <li><a href="forums-category.html" title="">Forum Category</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-star-o"></i>Featured</a>
                <ul class="submenu">
                    <li><a href="chat-messenger.html" title="">Messenger (Chatting)</a></li>
                    <li><a href="notifications.html" title="">Notifications</a></li>
                    <li><a href="badges.html" title="">Badges</a></li>
                    <li><a href="faq.html" title="">Faq's</a></li>
                    <li><a href="contribution.html" title="">Contriburion Page</a></li>
                    <li><a href="manage-page.html" title="">Manage Page</a></li>
                    <li><a href="weather-forecast.html" title="">weather-forecast</a></li>
                    <li><a href="statistics.html" title="">Statics/Analytics</a></li>
                    <li><a href="shop-cart.html" title="">Shop Cart</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-gears"></i>Account Setting</a>
                <ul class="submenu">
                    <li><a href="setting.html" title="">Setting</a></li>
                    <li><a href="privacy.html" title="">Privacy</a></li>
                    <li><a href="support-and-help.html" title="">Support & Help</a></li>
                    <li><a href="support-and-help-detail.html" title="">Support Detail</a></li>
                    <li><a href="support-and-help-search-result.html" title="">Support Search</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-lock"></i>Authentication</a>
                <ul class="submenu">
                    <li><a href="login.html" title="">Login Page</a></li>
                    <li><a href="register.html" title="">Register Page</a></li>
                    <li><a href="logout.html" title="">Logout Page</a></li>
                    <li><a href="coming-soon.html" title="">Coming Soon</a></li>
                    <li><a href="error-404.html" title="">Error 404</a></li>
                    <li><a href="error-404-2.html" title="">Error 404-2</a></li>
                    <li><a href="error-500.html" title="">Error 500</a></li>
                </ul>
            </li>
            <li class="menu-item-has-children"><a class="" href="#" title=""><i class="fa fa-wrench"></i>Tools</a>
                <ul class="submenu">
                    <li><a href="typography.html" title="">Typography</a></li>
                    <li><a href="popup-modals.html" title="">Popups/Modals</a></li>
                    <li><a href="post-versions.html" title="">Post Versions</a></li>
                    <li><a href="sliders.html" title="">Sliders</a></li>
                    <li><a href="google-map.html" title="">Google Maps</a></li>
                    <li><a href="widgets.html" title="">Widgets</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div><!-- left sidebar menu -->
