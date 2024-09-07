@extends('layouts.master')

@php
  $includeCarousel = true;
@endphp


@section('content')


@if (Auth::user()->joueur == 'Neymar')
<div>Status : {{$listing->status}}</div>
@endif
<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5 wow fadeInUp" data-wow-delay="0.1s">
      @if(session('error'))
      <div class="alert alert-danger mt-2">
      {{ session('error') }}
      </div>
    @endif
      @if(session('warning'))
      <div class="alert alert-danger mt-2">
      {{ session('warning') }}
      </div>
    @endif
      <aside class="col-lg-6">
        <div class="carousel-container">

          <div class="carousel-slide">

            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
              src="{{$listing->getImage()}}" />

            @foreach ($listing->listing_images as $image)
        <img class="rounded-2" src="{{$image->getSecImage()}}" />

      @endforeach
          </div>

          <button class="prev" onclick="prevImage()">&#10094;</button>
          <button class="next" onclick="nextImage()">&#10095;</button>
        </div>
        <!-- thumbs-wrap.// -->
        <!-- gallery-wrap .end// -->
      </aside>
      <main class="col-lg-6">
        <div class="col-lg-12">
          <h4 class="title text-dark">
            {{$listing->title}}
          </h4>


        </div>

        <div class="mb-3">
          <span class="h5" style='color: #00B98E'>${{$listing->price}}</span>

        </div>

        <p>
          {{$listing->description}}
        </p>

        <div class="row mt-4">
          <dt class="col-6">Address:</dt>
          <dd class="col-6">{{$listing->address}}</dd>

          <dt class="col-6">Location:</dt>
          <dd class="col-6">{{$listing->city}}, {{$states[$listing->state]}}</dd>

          <dt class="col-6">Available on:</dt>
          <dd class="col-6">{{$listing->availability}}</dd>
          
          <dt class="col-6">Property type:</dt>
          <dd class="col-6">{{$listing->type}}</dd>
          
          <dt class="col-6">Gender availability:</dt>
          <dd class="col-6">@if ($listing->gender == null)
                                            Male/Female
                                        @else
                                            {{$listing->gender}} Only
                                        @endif</dd>


        </div>

        <hr />


        <!--      <a href="#" class="btn btn-primary shadow-0  mx-auto w-100"> <i class="me-1 fa fa-check"></i> Apply </a> -->
        <form action="{{ route('listings.apply', $listing->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary">Apply</button>
        </form>
    </div>
    </main>
  </div>
  </div>
</section>
<!-- content -->

@endsection


<!-- JS for Image Carousel -->
<script>
  // Ensure this script is placed after the HTML or wrapped in DOMContentLoaded
  document.addEventListener('DOMContentLoaded', function () {
    const carouselSlide = document.querySelector('.carousel-slide');
    if (carouselSlide) { // Check if carouselSlide exists
      const images = document.querySelectorAll('.carousel-slide img');

      let counter = 0;
      const size = images[0].clientWidth;

      window.nextImage = function () {
        if (counter >= images.length - 1) counter = -1;
        carouselSlide.style.transform = 'translateX(' + (-size * ++counter) + 'px)';
      }

      window.prevImage = function () {
        if (counter <= 0) counter = images.length;
        carouselSlide.style.transform = 'translateX(' + (-size * --counter) + 'px)';
      }


    } else {
      console.error('Carousel slide not found');
    }
  });

</script>