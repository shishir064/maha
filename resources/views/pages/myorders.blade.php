@extends('layouts.home')

@section('content')
@include('profile.partials.profile-sidebar')

<livewire:my-orders />
    
@endsection