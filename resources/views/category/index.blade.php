@extends('layouts.app')

@section('content')
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Menu</h1>
        <div class="d-inline-flex mb-lg-5">
            <p class="m-0 text-white"><a class="text-white" href="{{ url('/') }}">Home</a></p>
            <p class="m-0 text-white px-2">/</p>
            <p class="m-0 text-white">{{ $category->name ?? 'Category' }}</p>
        </div>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Pricing</h4>
            <h1 class="display-4">{{ $category->name ?? 'Menu' }}</h1>
        </div>

        <div class="row">
            {{-- ប្រើ $category->subcategories ត្រូវប្រាកដថា Controller បានប្រើ with('subcategories') --}}
            @forelse($category->subcategories as $subcategory)
                <div class="col-lg-6">
                    <div class="row align-items-center mb-5">
                        <div class="col-4 col-sm-3">
                            <img class="w-100 rounded-circle mb-3 mb-sm-0"
                                 src="{{ asset('img/menu-placeholder.jpg') }}"
                                 alt="{{ $subcategory->name }}">
                            
                            {{-- ការពារ Error: បើគ្មាន Column price ក្នុង DB ទេ វានឹងបង្ហាញ $5 ជានិច្ច --}}
                            <h5 class="menu-price">${{ $subcategory->price ?? '5' }}</h5>
                        </div>
                        <div class="col-8 col-sm-9">
                            <h4>{{ $subcategory->name }}</h4>
                            {{-- ការពារ Error: បើគ្មាន Column description ក្នុង DB ទេ --}}
                            <p class="m-0">{{ $subcategory->description ?? 'Delicious coffee and items.' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-danger">No subcategories available for this category.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection