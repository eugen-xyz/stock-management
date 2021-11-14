@extends('layouts.base')

@section('content')
@include('layouts.navigation')
@include('layouts.header')

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        
        <p><strong>Order Number: {{ $order->reference }}</strong></p>
      

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



        <div>
            <a href="{{ route('order.list') }}"><button type="button" class="btn btn-info">Back to Orders</button></a>
        </div>


        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"><br><br></div>
    </div>
</section>

@endsection