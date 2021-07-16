@extends('layouts.main')

@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach($sliders as $key => $slider)
                <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{ ($key == 0) ? "active" : "" }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                <div class="{{ ($key == 0) ? "carousel-item active" : "carousel-item" }}">
                    <img class="first-slide"
                         src="{{ env('ADMIN_URL') . $slider->image }}"
                         alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-left">
                            <h1>{{ $slider->title }}</h1>
                            <p>{{ $slider->description }}</p>
                            <p>
                                <a class="btn btn-lg btn-primary" href="{{ $slider->button_url }}"
                                   role="button">{{ $slider->button_text }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="container wrapper">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <!-- <h1 class="display-4 primary-text home-title">Vigilant <span class="secondary-text">Trading</span></h1> -->
            <img src="{{url('/assets/img/vigilant-logo.png')}}" alt="Vigilant Trading" class="main-logo"/>
            <a type="button" class="btn btn-lg btn-block btn-outline-primary join_now" href="{{ route('pricing') }}">Join Now</a>
        </div>
    </div>

@endsection
