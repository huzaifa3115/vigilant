@extends('layouts.main')

@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Pricing</h1>
    <!-- <p class="lead">.</p> -->
  </div>

  <div class="container wrapper">
    <div class="card-deck mb-3 text-center">
      <div class="card mb-6 box-shadow">
        <div class="card-header secondary-background">
          <h4 class="my-0 font-weight-normal text-white">Premium membership includes</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
          <ul class="list-unstyled mt-3 mb-4 pricing_list_li">
            <li>Weekly and Daily watchlists</li>
            <li>Entry and exit signals from 6 of our top analysts in Crypto, Forex, Options, Long term swings, and Penny
              stocks!</li>
            <li>Free hand-curated education program</li>
            <li>Automated news AI</li>
            <li>24/7 trading chat rooms</li>
            <li>Access to daily live stream trading</li>
          </ul>
          <a role="button" class="btn btn-lg btn-block btn-outline-primary pricing-button" href="{{ route('checkout', 1) }}">Sign up
            for free</a>
        </div>
      </div>
      <div class="card mb-6 box-shadow">
        <div class="card-header red-background">
          <h4 class="my-0 font-weight-normal text-white">Private membership includes</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
          <ul class="list-unstyled mt-3 mb-4 pricing_list_li">
            <li>Everything from the Premium membership</li>
            <li>Direct contact with the top analysts at any time</li>
            <li>Access to a live CPA to answer any tax questions</li>
            <li>Private collection of advanced trading tools including paid services like FlowAlgo, Shortsqueeze, and
              our pro Mega file</li>
            <li>Courses to help you succeed in Engineering, Programming, Accounting, and any other requested career
              course.</li>
          </ul>
          <a role="button" class="btn btn-lg btn-block btn-primary pricing-button" href="{{ route('checkout', 2) }}">Sign up for
            free</a>
        </div>
      </div>
    </div>
  </div>

@endsection
