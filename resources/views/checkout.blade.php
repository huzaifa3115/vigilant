@extends('layouts.main')

@section('content')
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Checkout</h1>
    <!-- <p class="lead">.</p> -->
  </div>

  <div class="container wrapper">
    <div class="row">
      <div class="col-md-12 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        <form class="needs-validation" novalidate="">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="{{ auth()->user()->name }}" readonly required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="{{ auth()->user()->name }}" readonly required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" class="form-control" id="userName" value="{{ auth()->user()->name }}" readonly placeholder="Username" required="">
              <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
              </div>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}" readonly placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" value="1234 Main St" required="">
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" class="form-control" id="address2" value="Apartment or suite">
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" id="country" required="">
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <select class="custom-select d-block w-100" id="state" required="" value="california">
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" required="" value="12345">
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="save-info">
            <label class="custom-control-label" for="save-info">Save this information for next time</label>
          </div>
          <hr class="mb-4">

          @if($id == 1)
            <input type="hidden" id="plan-silver" name="plan" value='{{ $plans[1]->id }}'>
            <input type="hidden" id="package_type" name="package_type" value="premium">
          @else
            <input type="hidden" id="plan-silver" name="plan" value='{{ $plans[0]->id }}'>
            <input type="hidden" id="package_type" name="package_type" value="private">
          @endif

          <h4 class="mb-3">Payment</h4>

          <!-- <div class="d-block my-3">
            <div class="custom-control custom-radio">
              <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
              <label class="custom-control-label" for="credit">Credit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="debit">Debit card</label>
            </div>
            <div class="custom-control custom-radio">
              <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
              <label class="custom-control-label" for="paypal">Paypal</label>
            </div>
          </div> -->
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="cc-name">Card Holder Name</label>
              <input id="card-holder-name" type="text" class="form-control">
              <!-- <label for="card-holder-name">Card Holder Name</label> -->
              <!-- <small class="text-muted">Full name as displayed on card</small> -->
              <!-- <div class="invalid-feedback">
                Name on card is required
              </div> -->
            </div>
            <!-- <div class="col-md-6 mb-3">
              <label for="cc-number">Credit card number</label>
              <div id="cc-number" ></div>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div> -->
          </div>
          <!-- <div class="row">
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">Expiration</label>
              <div id="cc-expiration" ></div>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="cc-expiration">CVV</label>
              <div id="cc-cvv" > </div>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div> -->
          <!-- <hr class="mb-4"> -->
          <!-- <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button> -->
        </form>
        <form action="/subscribe" method="POST" id="subscribe-form">
            @csrf
            <div class="form">
                <label for="card-element">Credit or debit card</label>
                <div id="card-element" class="form-control">
                </div>
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>
            <div class="stripe-errors"></div>
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                    @endforeach
                </div>
              @endif
            <div class="form-group text-center mt-4">
                <button  id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-success btn-block" type="button">Continue To Checkout</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection

<script src="https://js.stripe.com/v3/"></script>
<script>
  document.addEventListener("DOMContentLoaded", function(){
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    console.log(stripe);
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    var card = elements.create('card', {hidePostalCode: true,
        style: style});

        console.log(document.getElementById('cc-cvv'));

    card.mount('#card-element');

    // var cardNumberElement = elements.create('cardNumber');
    // cardNumberElement.mount('#cc-number');

    // var cardExpiryElement = elements.create('cardExpiry');
    // cardExpiryElement.mount('#cc-expiration');

    // var cardCvcElement = elements.create('cardCvc');
    // cardCvcElement.mount('#cc-cvv');

    // cardNumberElement.on('change', function(event) {
    //   var displayError = document.getElementById('card-errors');
    //     if (event.error) {
    //         displayError.textContent = event.error.message;
    //     } else {
    //         displayError.textContent = '';
    //     }
    // });

    const cardHolderName = document.getElementById('card-holder-name');
    const firstName = document.getElementById('firstName');
    const lastName = document.getElementById('lastName');
    const userName = document.getElementById('userName');
    const email = document.getElementById('email');
    const address = document.getElementById('address');
    const address2 = document.getElementById('address2');
    const country = document.getElementById('country');
    const state = document.getElementById('state');
    const zip = document.getElementById('zip');
    const plan = document.getElementById('plan-silver');
    const packageType = document.getElementById('package_type');

    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardButton.addEventListener('click', async (e) => {
        console.log("attempting");
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: cardHolderName.value, }
                }
            }
            );
        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            paymentMethodHandler(setupIntent.payment_method);
        }
    });

    function paymentMethodHandler(payment_method) {
        console.log(payment_method)
        var form = document.getElementById('subscribe-form');

        var hiddenInput = document.createElement('input');
        var inputFirstName = document.createElement('input');
        var inputLastName = document.createElement('input');
        var inputUserName = document.createElement('input');
        var inputEmail = document.createElement('input');
        var inputAddress = document.createElement('input');
        var inputAddress2 = document.createElement('input');
        var inputCountry = document.createElement('input');
        var inputState = document.createElement('input');
        var inputZip = document.createElement('input');
        var inputPlan = document.createElement('input');
        var inputPackageType = document.createElement('input');

        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);

        inputFirstName.setAttribute('type', 'hidden');
        inputFirstName.setAttribute('name', 'first_name');
        inputFirstName.setAttribute('value', firstName.value);

        inputLastName.setAttribute('type', 'hidden');
        inputLastName.setAttribute('name', 'last_name');
        inputLastName.setAttribute('value', lastName.value);

        inputUserName.setAttribute('type', 'hidden');
        inputUserName.setAttribute('name', 'user_name');
        inputUserName.setAttribute('value', userName.value);

        inputEmail.setAttribute('type', 'hidden');
        inputEmail.setAttribute('name', 'email');
        inputEmail.setAttribute('value', email.value);

        inputAddress.setAttribute('type', 'hidden');
        inputAddress.setAttribute('name', 'address');
        inputAddress.setAttribute('value', address.value);

        inputAddress2.setAttribute('type', 'hidden');
        inputAddress2.setAttribute('name', 'address2');
        inputAddress2.setAttribute('value', address2.value);

        inputCountry.setAttribute('type', 'hidden');
        inputCountry.setAttribute('name', 'country');
        inputCountry.setAttribute('value', country.value);

        inputState.setAttribute('type', 'hidden');
        inputState.setAttribute('name', 'state');
        inputState.setAttribute('value', state.value);

        inputZip.setAttribute('type', 'hidden');
        inputZip.setAttribute('name', 'zip');
        inputZip.setAttribute('value', zip.value);

        inputPlan.setAttribute('type', 'hidden');
        inputPlan.setAttribute('name', 'plan');
        inputPlan.setAttribute('value', plan.value);
        
        inputPackageType.setAttribute('type', 'hidden');
        inputPackageType.setAttribute('name', 'package_type');
        inputPackageType.setAttribute('value', packageType.value);

        form.appendChild(hiddenInput);
        form.appendChild(inputFirstName);
        form.appendChild(inputLastName);
        form.appendChild(inputUserName);
        form.appendChild(inputEmail);
        form.appendChild(inputAddress);
        form.appendChild(inputAddress2);
        form.appendChild(inputCountry);
        form.appendChild(inputState);
        form.appendChild(inputZip);
        form.appendChild(inputPlan);
        form.appendChild(inputPackageType);

        form.submit();
    }
  });

</script>
