@extends('layouts.master')

@php
    $includeCarousel = true;
@endphp


@section('content')

<!-- content -->
<section class="py-5">
  <div class="container">
    <div class="row gx-5 wow fadeInUp" data-wow-delay="0.1s">
      <aside class="col-lg-6">
        <div class="carousel-container">

            <div class="carousel-slide">
          
            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit" src="/{{$listing->main_image}}" />
          
          
            <img class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" />
          
            <img class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" />
          
            <img  class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" />
          
            <img class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" />
          
            <img class="rounded-2" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
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

          <div class="row">
            <dt class="col-6">Address:</dt>
            <dd class="col-6">{{$listing->address}}</dd>

            <dt class="col-6"># of roomates:</dt>
            <dd class="col-6">{{$listing->roomates}}</dd>

            <dt class="col-6">Duration:</dt>
            <dd class="col-6">{{$listing->duration}}</dd>

            
          </div>

          <hr />

          
          <a href="#" class="btn btn-primary shadow-0  mx-auto w-100"> <i class="me-1 fa fa-check"></i> Apply </a>
        </div>
      </main>
    </div>
  </div>
</section>
<!-- content -->

<section class="bg-light border-top py-4">
  <div class="container">
    <div class="row gx-4">
      <div class="col-lg-12 mb-6">
        <div class="border rounded-2 px-3 py-2 bg-white">
          <!-- Pills navs -->
          <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item d-flex" role="presentation">
              <p class="nav-link d-flex align-items-center justify-content-center w-100 active" style='color: #FFFFFF' id="ex1-tab-1" data-mdb-toggle="pill" role="tab" aria-controls="ex1-pills-1" aria-selected="true">About your roomates</p>
            </li>

          </ul>
          <!-- Pills navs -->

          <!-- Pills content -->
          <div class="tab-content" id="ex1-content">
            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
              <p>
                With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                pariatur.
              </p>
              <div class="row mb-2">
                <div class="col-12 col-md-6">
                  <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                    <li><i class="fas fa-check text-success me-2"></i>Lorem ipsum dolor sit amet, consectetur</li>
                    <li><i class="fas fa-check text-success me-2"></i>Duis aute irure dolor in reprehenderit</li>
                    <li><i class="fas fa-check text-success me-2"></i>Optical heart sensor</li>
                  </ul>
                </div>
                <div class="col-12 col-md-6 mb-0">
                  <ul class="list-unstyled">
                    <li><i class="fas fa-check text-success me-2"></i>Easy fast and ver good</li>
                    <li><i class="fas fa-check text-success me-2"></i>Some great feature name here</li>
                    <li><i class="fas fa-check text-success me-2"></i>Modern style and design</li>
                  </ul>
                </div>
              </div>
              
            </div>

          </div>
          <!-- Pills content -->
        </div>
      </div>
      
    </div>
  </div>
</section>






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

        window.nextImage = function() {
            if (counter >= images.length - 1) counter = -1;
            carouselSlide.style.transform = 'translateX(' + (-size * ++counter) + 'px)';
        }

        window.prevImage = function() {
            if (counter <= 0) counter = images.length;
            carouselSlide.style.transform = 'translateX(' + (-size * --counter) + 'px)';
        }

        
    } else {
        console.error('Carousel slide not found');
    }
});

</script>

