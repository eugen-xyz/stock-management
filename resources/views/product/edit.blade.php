@extends('layouts.base')

@section('content')
@include('layouts.navigation')
@include('layouts.header')

    <!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <div class="col-md-4">
            <a href="{{ route('product.index') }}"><button type="button" class="btn btn-primary">Back to Inventory</button></a>
        </div>

        <div class="clear-fix">
            <br>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>

            @if(session()->has('message'))
                <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
        </div>

        <div class="row gx-4 gx-lg-6 row-cols-2 row-cols-md-4 row-cols-xl-4 justify-content-center">
            
            <form action="{{ route('product.update', $product) }}" method="POST">
                @csrf
                @method('put')

                <label for="name">Product Name</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" aria-describedby="basic-addon3">
                </div>

                <label for="price">Price</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">&#8369;</span>
                    </div>
                    <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}" aria-label="price">
                </div>

                <label for="quantity">Quantity</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="quantity" id="quantity" value="{{ $product->quantity }}" aria-label="quantity">
                </div>

                <button type="submit" value="submit" class="btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</section>

@endsection