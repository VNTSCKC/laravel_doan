<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/message/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Message</title>
</head>
<body>
    <main class="content">
        <div class="container p-0">

            <h1 class="h3 mb-3">Messages</h1>

            <div class="card">
                <div class="row g-0">
                    <div class="col-12 col-lg-5 col-xl-3 border-right">

                        <div class="px-4 d-none d-md-block">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <input type="text" class="form-control my-3" placeholder="Search...">
                                </div>
                            </div>
                        </div>

                        @foreach ($listRoomMessage as $roomMessage)


                        <a href="{{route('message.detail',['room'=>$roomMessage->id])}}" class="list-group-item list-group-item-action border-0">
                            <div class="badge bg-success float-right">5</div>
                            <div class="d-flex align-items-start">
                                @if ($roomMessage->first_user==Auth::user()->id)
                                <img src="{{ URL::to('/') }}/images/UserImages/{{App\Models\Account::where('id',$roomMessage->second_user)->first()->image}}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                @else
                                <img src="{{ URL::to('/') }}/images/UserImages/{{App\Models\Account::where('id',$roomMessage->first_user)->first()->image}}" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                @endif

                                <div class="flex-grow-1 ml-3">
                                    @if ($roomMessage->first_user==Auth::user()->id)
                                {!!App\Models\Account::where('id',$roomMessage->second_user)->first()->name!!}
                                @else
                                {!!App\Models\Account::where('id',$roomMessage->first_user)->first()->name!!}

                                @endif

                                    <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                                </div>
                            </div>
                        </a>

                        @endforeach
                        {{-- <a href="#" class="list-group-item list-group-item-action border-0">
                            <div class="badge bg-success float-right">5</div>
                            <div class="d-flex align-items-start">
                                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                <div class="flex-grow-1 ml-3">
                                    Vanessa Tucker
                                    <div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
                                </div>
                            </div>
                        </a> --}}


                        <hr class="d-block d-lg-none mt-1 mb-0">
                    </div>
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <script>
        
    </script>
</body>
</html>
