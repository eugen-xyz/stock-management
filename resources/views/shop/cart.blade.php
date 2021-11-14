@extends('layouts.base')

@section('content')
@include('layouts.navigation')
@include('layouts.header')

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        @if($itemCount != 0)
            <p><strong>Order Number: {{ session('customerID') }}</strong></p>
        @else
            <p><strong>Your cart is empty.</strong></p>
        @endif

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col" style="text-align: right;">Unit Price</th>
                    <th scope="col" style="text-align: right;">Quantity</th>
                    <th scope="col" style="text-align: right;">Sub Total</th>
                  </tr>
                </thead>
                <tbody>
                    @php $grand_total = $total_items = 0; @endphp
                    @foreach ($products as $ndx =>  $product)
                        <tr>
                            <th scope="row">{{ $ndx + 1 }}</th>
                            <td>{{ $product->product_name ?? '' }}</td>
                            <td style="text-align: right;">&#8369;{{ number_format($product->unit_price ?? '',  2, '.') }}</td>
                            <td style="text-align: right;">{{ $product->quantity ?? '' }}</td>
                            <td style="text-align: right;">&#8369;{{ number_format($product->sub_total ?? '',  2, '.') }}</td>
                        </tr>

                        @php 
                            $grand_total += $product->sub_total ?? 0;
                            $total_items += $product->quantity ?? 0;
                        @endphp
                    @endforeach
                    <tr>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       <th></th>
                       
                    </tr>
                    <tr style="font-weight: bold;">
                        <th scope="row"></th>
                        <td>Grand Total</td>
                        <td></td>
                        <td></td>
                        <td style="text-align: right;">&#8369;{{ number_format($grand_total ?? '',  2, '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"><br></div>

        @if($itemCount != 0)
            <div style="float: right;">
                <a href="{{ route('product.pay') }}"><button type="button" class="btn btn-success">Pay</button></a>
            </div>

            <div style="float: right; margin-right: 10px;">
                <a href="{{ route('product.clear') }}"><button type="button" class="btn btn-danger">Clear Cart</button></a>
            </div>
        @endif


        <div>
            <a href="{{ route('get.shop') }}"><button type="button" class="btn btn-info">Find Products</button></a>
        </div>


        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"><br><br></div>
    </div>
</section>

@endsection