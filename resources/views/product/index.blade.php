@extends('layouts.base')

@section('content')
@include('layouts.navigation')
@include('layouts.header')

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <div class="col-md-4">
            <a href="{{ route('product.create') }}"><button type="button" class="btn btn-primary"> Add New</button></a>
        </div>

        <div class="clear-fix"><br><br></div>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price per unit</th>
                    <th scope="col">Quantity (in stock)</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $ndx =>  $product)
                        <tr>
                            <th scope="row">{{ $ndx + 1 }}</th>
                            <td>{{ $product->name ?? '' }}</td>
                            <td>{{ $product->price ?? '' }}</td>
                            <td>{{ $product->quantity ?? '' }}</td>
                            <td><a href="{{ route('product.edit', $product->product_id) }}">
                                <i class='fas fa-edit' style='font-size:15px;color:gray'></i>    
                            </a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</section>

@endsection