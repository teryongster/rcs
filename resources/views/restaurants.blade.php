@extends('template')
@section('content')
<header class="masthead text-center text-white d-flex smallmast">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                <strong>Restaurants</strong>
                </h1>
            </div>
        </div>
    </div>
</header>
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">At Your Service</h2>
                <hr class="my-4">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row restaurants">
            @foreach($restaurants as $res)
            <div class="col-lg-4 col-md-6 text-center">
                <div class="service-box mt-5 mx-auto">
                    <div class="image" style="background-image: url('/{{ $res->image }}')"></div>
                    <h3 class="mb-3"><a href="/restaurants/{{ $res->id }}">{{ $res->name }}</a></h3>
                    <p class="text-muted mb-0">{{ $res->address }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop