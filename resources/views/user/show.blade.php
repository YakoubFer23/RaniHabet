@extends('layouts.master')

@section('content')

<!-- content -->
 <!--
<div class="card w-75 mt-3 m-auto">
    <div class="card-body d-inline-flex">
        <img class="rounded-circle border border-primary" id="profile-pic" alt="avatar2"
            src="{{asset('assets/listings/abdou.jpg')}}" />
        <div class="d-flex flex-column ms-3">
            <h4 style="color: #00B98E; margin-bottom: 25px;">{{$user->firstname}}&nbsp;{{$user->lastname}}</h4>
            <div class="d-flex flex-column justify-content-around">
                <span style="margin-bottom: 1.7px;"><i class="fa fa-envelope"> :</i> {{$user->email}}</span>
                <span style="margin-bottom: 1.7px;"><i class="fa fa-phone"> :</i> 7198319673</span>
                <span style="margin-bottom: 1.7px;"><i class="fa fa-venus-mars"> :</i> Male</span>
            </div>
        </div>
        @auth()
        @if (Auth::id() === $user->id)
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary shadow-0 position-absolute bottom-0 end-0 mb-2 me-2 edit-btn">
            <i class="me-1 fa fa-check"></i> Edit
        </a>
        @endif
        @endauth
    </div>
</div>
-->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card w-75 mt-3 m-auto">
  <div class="card-body d-flex align-items-center flex-column flex-md-row">
    <img class="rounded-circle border border-primary" id="profile-pic" alt="avatar2" src="{{$user->getImage()}}" />
    <div class="d-flex flex-column ms-3">
      <h4 class="mb-2" style="color: #00B98E;">{{ $user->firstname }} {{ $user->lastname }}</h4>
      <div class="d-flex flex-column gap-1">
        <span class="d-flex align-items-center"><i class="fa fa-envelope me-1"> :</i> {{ $user->email }}</span>
        <span class="d-flex align-items-center"><i class="fa fa-phone me-1"> :</i> {{$user->phone_number ?? 'N/A'}}</span>
        <span class="d-flex align-items-center"><i class="fa fa-venus-mars me-1"> :</i> {{$user->gender}}</span>
      </div>
    </div>
    @auth()
        @if (Auth::id() === $user->id)
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary shadow-0 position-absolute bottom-0 end-0 mb-2 me-2 edit-btn">
            <i class="me-1 fa fa-check"></i> Edit
        </a>
        @endif
    @endauth
  </div>
</div>






<section class="py-5">
    <div class="container">
        <div class="row gx-5 wow fadeInUp" data-wow-delay="0.1s">
            <main class="col-lg-12 mt-3">

                <div class="container">
                    <div class="row gx-4">
                        <div class="col-lg-12 mb-6">
                            <div class="border rounded-2 px-3 py-2 bg-white">
                                <!-- Pills navs -->
                                <ul class="nav nav-pills nav-justified mb-3 mt-3" id="ex1" role="tablist">
                                    <li class="nav-item d-flex" role="presentation">
                                        <p class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                            style='color: #FFFFFF' id="ex1-tab-1" data-mdb-toggle="pill" role="tab"
                                            aria-controls="ex1-pills-1" aria-selected="true">About {{$user->firstname}}
                                        </p>
                                    </li>

                                </ul>
                                <!-- Pills navs -->

                                <!-- Pills content -->
                                <div class="tab-content" id="ex1-content">
                                    <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                                        aria-labelledby="ex1-tab-1">
                                        <p>@if ($user->about === '' || $user->about == null)
                                            Nothing To Show Here
                                            @else
                                            {{$user->about}}
                                        </p>
                                        @endif

                                    </div>

                                </div>
                                <!-- Pills content -->
                            </div>
                        </div>

                    </div>
                </div>

                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </main>
            <!--
      <main class="col-lg-6 ml-3">
        <div class="col-lg-12">
          <h4 class="title text-dark">
            Place Holder
          </h4>
          
            
          </div>

          <div class="mb-3">
            <span class="h5" style='color: #00B98E'>Place Holder 2</span>
            
          </div>

          <p>
            Place Holder 3
          </p>

          <div class="row">
            <dt class="col-6">Address:</dt>
            <dd class="col-6">erfref</dd>

            <dt class="col-6"># of roomates:</dt>
            <dd class="col-6">ferfe</dd>

            <dt class="col-6">Duration:</dt>
            <dd class="col-6">fof</dd>

            
          </div>

          <hr />

          
          <a href="#" class="btn btn-primary shadow-0  mx-auto w-100"> <i class="me-1 fa fa-check"></i> Apply </a>
        </div>
      </main>
-->
        </div>
    </div>
</section>
<!-- content -->








@endsection