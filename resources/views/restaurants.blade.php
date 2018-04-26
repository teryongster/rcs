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
<div class="res-filter">
    <div class="container padding50 text-center">
        <h4>Filter</h4>
        <div class="search-form">
            <form method="get" action="/restaurants/search">
                <input type="text" name="q" placeholder="Query" value="{{ (!empty($query)) ? $query : '' }}">
                <select name="category">
                    <option disabled selected>Select Category</option>
                    <option {{ (!empty($category) && $category == 'Fastfood Chain') ? 'selected' : '' }}>Fastfood Chain</option>
                    <option {{ (!empty($category) && $category == 'Eatery') ? 'selected' : '' }}>Eatery</option>
                    <option {{ (!empty($category) && $category == 'Restaurant') ? 'selected' : '' }}>Restaurant</option>
                </select>
                <button type="submit" class="btn btn-info">Search</button>
            </form>
        </div>
    </div>
</div>
<section id="services">
    @if($restaurants->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h6 class="pull-left section-heading">Sort By:
                    <select class="res-sort">
                        <option value="">Default</option>
                        <option {{ (!empty($sort) && $sort == 'name') ? 'selected' : '' }} value="name">Name</option>
                        <option {{ (!empty($sort) && $sort == 'created_at') ? 'selected' : '' }} value="created_at">Date</option>
                        <option {{ (!empty($sort) && $sort == 'address') ? 'selected' : '' }} value="address">Address</option>
                        <option {{ (!empty($sort) && $sort == 'category') ? 'selected' : '' }} value="category">Category</option>
                    </select>
                    </h6>
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
                        <h6><small>{{ $res->category }}</small></h6>
                        <p class="text-muted mb-0">{{ $res->address }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="container text-center">
            <h3>No Results Found</h3>
        </div>
    @endif
</section>
@stop