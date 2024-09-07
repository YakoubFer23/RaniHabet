@extends('layouts.master')

@section('content')

<!-- content -->

<form id="edit-form" action="{{route('user.update',$user->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
<div class="card w-75 mt-3 m-auto">
  <div class="card-body d-flex align-items-center flex-column flex-md-row">
    <div class="d-flex flex-column align-items-center">
      <img class="rounded-circle border border-primary" id="profile-pic" alt="avatar2" src="{{$user->getImage()}}" />
      
      <!-- Image Upload Input -->
      @auth()
      @if (Auth::id() === $user->id)
      <label for="image-upload" class="form-label mt-2">Upload New Image</label>
      <input type="file" id="image-upload" name="profile_picture" class="form-control form-control-sm w-auto" accept="image/*">
      @error('image-upload')
            <span class="text-danger fs-6">{{$message}}</span>
      @enderror
      @endif
      @endauth
    </div>
    <div class="d-flex flex-column ms-3 w-100">
    <h4 style="color: #00B98E; margin-bottom: 10px;">{{ $user->firstname }} {{ $user->lastname }}</h4>
            <div class="d-flex flex-column gap-1">
                <span class="d-flex align-items-center" style="margin-bottom: 1.7px;"><i
                        class="fa fa-envelope me-1"></i>: {{ $user->email }}</span>
                <div class="d-flex align-items-center mb-2">

                    <span style="margin-bottom: 1.7px; margin-right: 4px; !important" class="mr-6"><i class="fa fa-phone"> :</i></span>
                    <input type="number" id="phone-number" name="phone_number" min="0" value="{{ $user->phone_number ?? '' }}"
                        class="form-control form-control-sm w-auto ml-6">
                        @error('phone_number')
            <span class="text-danger fs-6">{{$message}}</span>
      @enderror
                </div>
                <span class="d-flex align-items-center" style="margin-bottom: 1.7px;"><i
                        class="fa fa-venus-mars me-1"></i>: Male</span>
                        <span class="d-flex align-items-center"><i class="fa fa-address-card me-1"> :</i>
        @if ($user->identity_verified === 'Verified' || $user->identity_verified === 'Pending' )
        {{$user->identity_verified}}
        @else
        <a href="{{route('verify-identity')}}" target="_blank">{{$user->identity_verified}}</a>
        @endif
    </span>
            </div>
    </div>

    
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
                                        <p>
                                            <textarea name="about" class="form-control" id="about" rows="3">{{$user->about}}</textarea>
                                            @error('about')
                                                <span class="text-danger fs-6">{{$message}}</span>
                                            @enderror
                                        </p>
                                        

                                    </div>

                                </div>
                                <!-- Pills content -->
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="margin: 20px 0;">
                <button type="submit" class="btn btn-primary shadow-0 align-self-center justify-self-center mb-2 me-2">
            <i class="me-1 fa fa-check"></i> Save
</button>
                </div>

                <!-- thumbs-wrap.// -->
                <!-- gallery-wrap .end// -->
            </main>

        </div>
    </div>
</section>
</form>

<!-- content -->

@endsection



<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('edit-form').addEventListener('submit', function (e) {
            const fileInput = document.getElementById('image-upload');
            const file = fileInput.files[0];
    
            if (file) {
                const fileType = file.type;
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
    
                if (!validImageTypes.includes(fileType)) {
                    alert('Please upload a valid image file (JPEG, PNG, GIF).');
                    e.preventDefault(); // Prevent the form from submitting
                }
            }
        });

    })
</script>
