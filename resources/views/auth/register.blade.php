@extends('layouts.home')
@section('content')
    <div class="min-h-[80vh] flex items-center justify-center px-4 py-12 bg-gradient-to-br from-indigo-50 via-white to-purple-50">
        <div class="w-full max-w-md">

            <!-- Heading -->
            <div class="text-center mb-8">
                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-600 to-purple-600 shadow-lg shadow-indigo-200">
                    <svg class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM3 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 019.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                    </svg>
                </div>
                <h1 class="mt-5 text-3xl font-bold tracking-tight text-gray-900">Create your account</h1>
                <p class="mt-2 text-sm text-gray-500">Fill in the details below to get started</p>
            </div>

            <!-- Card -->
            <div class="rounded-2xl bg-white/90 p-8 shadow-xl shadow-indigo-100/60 ring-1 ring-gray-100 backdrop-blur">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-2.5 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-5">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-2.5 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-5">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-2.5 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-5">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-2.5 focus:bg-white focus:border-indigo-500 focus:ring-indigo-500"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-primary-button class="w-full justify-center rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 py-3 text-sm font-semibold shadow-lg shadow-indigo-200 transition hover:from-indigo-700 hover:to-purple-700 hover:shadow-xl">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>

                    <div class="mt-5 text-center">
                        <a class="text-sm font-medium text-indigo-600 hover:text-indigo-800 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection