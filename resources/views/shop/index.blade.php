@extends('layouts.base')

@section('content')
@include('layouts.navigation')
@include('layouts.header')

<!-- Section-->
<section class="py-5">
    @if(session()->has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            
            @forelse ($products as $product)
                
                <form id="form" action="{{ route('item.store') }} " method="POST">

                    @csrf
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            @php 
                                $badge = 'In Stock (' .  $product->quantity .')';
                                if($product->quantity <= 0) $badge = 'Out of Stock';
                            @endphp
                            
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">{{ $badge }}</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name ?? '' }}</h5>
                                    <!-- Product reviews-->
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <!-- Product price-->
                                    &#8369;{{ $product->price ?? '' }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-body p-4">
                                <div class="text-center justify-content-center">
                                    <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                    <input type="text" name="quantity" style="width: 75px;"  placeholder="Quantity">
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <button type="submit" id="save" class="btn btn-outline-dark mt-auto" value="submit">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @empty
                <p class="bg-danger text-white p-1">No products available</p>
            @endforelse    
                
        </div>
    </div>
</section>


@endsection