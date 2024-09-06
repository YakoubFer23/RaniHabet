@extends('layouts.master')


@section('content')



<!-- Search Start -->
<form id="myForm" action="{{route('home')}}" method="GET">
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-8">
                            <input type="text" name="query" class="form-control border-0 py-3"
                                placeholder="Search by city or state (For state search please enter the state code)" value="{{ request('query') }}">
                        </div>
                    </div>
                </div>
                <input type="hidden" name="type" id="hiddenInput">
                <div class="col-md-2"> 
                    <button class="btn btn-dark border-0 w-100 py-3">Search</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Search End -->


    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-7">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h2 class="mb-3">Find Your Next Home Away From Home.</h2>

                    </div>
                </div>
                <div class="col-lg-5 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
    <li class="nav-item me-2">
        <a class="btn btn-outline-primary {{ request('type') == 'Apartments' ? 'active test' : '' }}" href="{{ route('home', ['type' => 'Apartments', 'query' => request('query')]) }}">Apartments</a>
    </li>
    <li class="nav-item me-2">
        <a class="btn btn-outline-primary {{ request('type') == 'Rooms' ? 'active test' : '' }}" href="{{ route('home', ['type' => 'Rooms', 'query' => request('query')]) }}">Rooms</a>
    </li>
</ul>
</form>
</div>
</div>
<div class="tab-content">
    <div id="tab-1" class="tab-pane fade show p-0 active">
        @if (request('query') != null)
        <p>Showing results for : {{request('query')}}</p>
        
        @endif
        @if ($listings->isNotEmpty())
            <div class="row g-4">
                @foreach ($listings as $listing)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="{{route('listings.show', ['id' => $listing->id])}}"><img class="img-fluid"
                                        src="{{$listing->getImage()}}" alt=""></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    {{$listing->type}}
                                </div>
                                <div
                                    class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                    @if ($listing->gender == null)
                                        Male/Female
                                    @else
                                        {{$listing->gender}} Only
                                    @endif
                                </div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">${{$listing->price}}</h5>
                                <a class="d-block h5 mb-2"
                                    href="{{route('listings.show', ['id' => $listing->id])}}">{{$listing->title}}</a>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$listing->city}},
                                    {{$listing->state}}
                                </p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-calendar text-primary me-2"></i>{{$listing->availability}}</small>
                                <small class="flex-fill text-center border-end py-2"><i
                                        class="fa fa-clock text-primary me-2"></i>{{$listing->duration}}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                    {{ $listings->appends(request()->all())->links() }}
                </div>

            </div>
        @else
            <p>No results</p>
        @endif


    </div>
</div>
</div>
</div>
<!-- Property List End -->

<script>
        // Get the active element with the class 'active'
        var activeElement = document.querySelector('.test');
        // Get the hidden input field
        var hiddenInput = document.getElementById('hiddenInput');
        
        // Set the value of the hidden input field to the text content of the active element
        hiddenInput.value = activeElement.innerHTML;
        console.log(activeElement.innerHTML);
    </script>



@endsection('content')