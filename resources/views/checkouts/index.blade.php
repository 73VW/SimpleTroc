@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row'>
        <div class='col-md-4 col-md-offset-4'>
            <form action="/checkout" method="POST">
            {{ csrf_field() }}
              <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ENV('STRIPE_KEY')}}"
                data-amount="999"
                data-name="Demo Site"
                data-description="Widget"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-zip-code="true"
                data-currency="chf">
              </script>
            </form>
        </div>
    </div>
</div>
@endsection
