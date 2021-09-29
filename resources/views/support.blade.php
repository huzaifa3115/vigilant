@extends('layouts.main')

@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Our Support</h1>
    <!-- <p class="lead">.</p> -->
  </div>

  <div class="container wrapper">
    <form class="form-signin">
      <label for="inputName" class="sr-only">Name</label>
      <input type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

      <label for="inputMessage" class="sr-only">Enter Query</label>
      <textarea type="email" id="inputMessage" class="form-control" placeholder="Enter your query.." required
        autofocus> </textarea>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Submit Query</button>
    </form>
  </div>

@endsection
