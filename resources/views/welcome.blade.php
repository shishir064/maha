@extends('layouts.home')

@section('content')
   {{-- Flash Sale / Offers --}}
    <x-home.offer-section />

    {{-- Latest Products --}}
    <x-home.latest-products />
    
    {{-- Product Categories --}}
    <x-home.categories />

    {{-- Featured Products --}}
    <x-home.product-section />

    {{-- Promotional Banner --}}
    <x-home.promo-banner />


    {{-- New Arrivals --}}
    <x-home.new-arrivals />

    {{-- brands --}}
    <x-home.brands />
@endsection



