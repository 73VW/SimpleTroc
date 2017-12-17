@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row main main-create">
        <div class="main-login main-center">
            <h1>Create a new Product</h1>
            <form class="form-horizontal" method="post" action="/profile/products"  enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-8 control-label">Product name</label>
                    <div class="col-sm-20">
                        <div class="input-group">
                            <input type="text" name="name" placeholder="Name of product" class="form-control" value="{{old('name')}}">

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-8 control-label">Price</label>
                    <div class="col-sm-20">
                        <div class="input-group">
                            <input type="number"
                            min="0"
                            name="price" placeholder="Price of product"
                            class="form-control" value="{{old('price')}}">

                            @if ($errors->has('price'))
                            <span class="help-block">
                                <strong>{{ $errors->first('price') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-8 control-label">Description</label>
                    <div class="col-sm-20">
                        <div class="input-group">
                            <textarea name="description" cols="40" rows="5" class="form-control" placeholder="Description" value="{{old('description')}}"></textarea>

                            @if ($errors->has('description'))
                            <span class="help-block">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="isNegotiable" checked="checked" value=1>
                        <span class="custom-control-indicator"></span>
                        <span class="custom-control-description">Price is negotiable</span>
                    </label>
                </div>

                <div class="form-group">
                    <label class="custom-file" for="name">
                        <input type="file" name="image[]"  multiple="multiple" class="custom-file-input bouton form-control" id="file2">
                        <span class="custom-file-control" id="lbl"></span>
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif

                    </label>
                </div>

                <button class="btn btn-primary">Store product</button>
            </form> {{-- END FORM --}}
        </div> {{-- END CARD-BODY --}}
    </div> {{-- END CARD-BODY --}}
</div> {{-- END CONTAINER --}}
@endsection
