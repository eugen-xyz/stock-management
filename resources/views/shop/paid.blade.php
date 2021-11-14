@extends('layouts.base')

@section('content')
@include('layouts.navigation')
@include('layouts.header')

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">

        <div class="">
    
            <a href="{{ route('get.shop') }}"><button type="button" class="btn btn-success">back to shop</button></a>
        </div>

        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center"><br><br></div>
    </div>
</section>

@endsection