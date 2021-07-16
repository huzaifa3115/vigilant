@extends('layouts.main')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Blogs</h1>
        <!-- <p class="lead">.</p> -->
    </div>

    <div class="container wrapper">
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ env('ADMIN_URL') . $blog->image }}" height="200" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ substr($blog->description, 0, 100) }}</p>
                            <a href="{{ route('blog-detail', $blog->id) }}" class="btn btn-primary">Read More...</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
