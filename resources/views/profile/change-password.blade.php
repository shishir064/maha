@extends('layouts.home')
@section('content')
@include('profile.partials.profile-sidebar')
 <main class="min-w-0">

                {{-- Page Heading --}}
                <div class="mb-6">
                    <h1 class="text-3xl font-semibold tracking-tight text-slate-800">
                        my profile
                    </h1>
                </div>

                {{-- Password Form Card --}}
                <div class="rounded-xl bg-white p-6 shadow-sm sm:p-8">
                    <div class="max-w-full">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

            </main>
  @include('profile.partials.profile-sidebar-footer')          
@endsection