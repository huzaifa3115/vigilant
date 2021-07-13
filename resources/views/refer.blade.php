@extends('layouts.main')

@section('content')
    <div class="container wrapper">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4 primary-text">Refer a <span class="secondary-text">Friend</span></h1>
            <form class="needs-validation" method="post" action="{{ route('refer.store') }}">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <input type="text" class="form-control refer-code-field" id="refer_code"
                               value="{{ $referCode }}" name="refer_code"
                               required="" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-block btn-outline-primary join_now">Proceed</button>
            </form>
            {{--      <button type="button" class="btn btn-lg btn-block btn-outline-primary join_now mt-2"--}}
            {{--              onclick="generateReferalCode()">--}}
            {{--          Generate Code--}}
            {{--      </button>--}}
        </div>
    </div>
@endsection
