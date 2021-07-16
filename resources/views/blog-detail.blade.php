@extends('layouts.main')

@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{ $blog->title }}</h1>
    <!-- <p class="lead">.</p> -->
  </div>

  <div class="container wrapper">
    <div class="card-deck mb-3 text-center">
        <img src="{{ env('ADMIN_URL') . $blog->image }}" class="blog-detail-image" />
      <p>{{ $blog->description }}</p>
    </div>
  </div>

@endsection
