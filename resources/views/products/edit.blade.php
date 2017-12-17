@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row main main-create">
        <div class="main-login main-center">
            <h1>Edit product
            </h1>
            <form method="post" action="/profile/products/{{$product->id}}">

                {{ csrf_field() }}
                {{ method_field('put') }}

                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text"
                    name="name" placeholder="name of product"
                    class="form-control" value="{{$product->name}}">

                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                    <input type="number"
                    min="0"
                    name="price" placeholder="price of product"
                    class="form-control" value="{{$product->price}}">

                    @if ($errors->has('price'))
                    <span class="help-block">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <textarea name="description" cols="40" rows="5" class="form-control">
                        {{$product->description}}
                    </textarea>

                    @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">

                        <input type="checkbox" class="custom-control-input" name="isNegotiable" @if ($product->isNegotiable) checked="checked" @endif value=1>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Price is negotiable</span>
                    </label>
                </div>
                <button class="btn btn-primary">Update product</button>
            </form> {{-- END FORM --}}
        </div> {{-- END CARD-HEADER --}}
    </div> {{-- END CONTAINER --}}
</div> {{-- END CONTAINER --}}
@endsection
