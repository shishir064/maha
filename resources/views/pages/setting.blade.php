@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-4xl space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
                <a href="{{ url('/super-admin/dashboard') }}" class="transition hover:text-indigo-600">
                    Super Admin
                </a>
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 18 6-6-6-6" />
                </svg>
                <span class="font-medium text-slate-700">setting</span>
            </div>

            <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                Platform
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Manage your primary store details and contact information.
            </p>
        </div>

        <div class="flex items-center gap-3 self-start rounded-xl border border-indigo-100 bg-indigo-50 px-4 py-3 sm:self-auto">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-white text-indigo-600">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2Zm10-14V5a4 4 0 0 0-8 0v2" />
                </svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-indigo-900">Super Admin</p>
                <p class="text-xs text-indigo-600">Global configuration</p>
            </div>
        </div>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-800">
            <svg class="h-5 w-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="m5 12 4 4L19 6" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <livewire:setting.index />
</div>
@endsection