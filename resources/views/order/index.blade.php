@extends('layouts.base')

@section('content')
@include('layouts.navigation')
@include('layouts.header')

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

      

        <div class="clear-fix"><br><br></div>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order Number</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $ndx =>  $order)
                        <tr>
                            <th scope="row">{{ $ndx + 1 }}</th>
                            <td>{{ $order->reference ?? '' }}</td>
                            <td>&#8369;{{ number_format($order->total_price ?? '',  2, '.') }}</td>
                            <td>{{ $order->created_at ?? '' }}</td>
                            <td><a href="{{ route('order.view', $order->order_id) }}">
                                <i class='fas fa-print' style='font-size:15px;color:gray'></i>    
                            </a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</section>

@endsection