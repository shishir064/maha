@extends('layouts.app')

@section('content')
    <div>
        <livewire:admin.orders.order-details :order="$order" />
    </div>
@endsection