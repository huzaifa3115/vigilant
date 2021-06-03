@extends('layouts.main')

@section('content')
<div class="container wrapper">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4 primary-text">Refer a <span class="secondary-text">Friend</span></h1>
      <form class="needs-validation" novalidate="">
        <div class="row">
          <div class="col-md-12 mb-3">
            <input type="text" class="form-control refer-code-field" id="firstName" placeholder="" value="13213424"
              required="" disabled>
            <!-- <div class="invalid-feedback">
              Valid first name is required.
            </div> -->
          </div>
        </div>
      </form>
      <button type="button" class="btn btn-lg btn-block btn-outline-primary join_now">Proceed</button>
    </div>
  </div>
@endsection
