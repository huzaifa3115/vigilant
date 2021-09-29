@extends('layouts.main')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Our Reviews</h1>
        <!-- <p class="lead">.</p> -->
    </div>

    <div class="container wrapper">
        <div class="container-fluid px-3 px-sm-5 my-5 text-center">
            @foreach($reviews as $review)
                <div class="item first prev">
                    <div class="card border-0 py-3 px-4">
                        <div class="row justify-content-center"><img
                                src="{{ env('ADMIN_URL') . $review->image }}"
                                class="img-fluid profile-pic mb-4 mt-3 review-img"></div>
                        <h6 class="mb-3 mt-2">{{ $review->name }}</h6>
                        <p class="content mb-5 mx-2">{{ $review->review }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
