
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 px-4 py-8">
    <div class="mx-auto max-w-2xl">

        <div class="mb-6">
            <h1 class="text-2xl font-bold text-slate-800">
                Create New Role
            </h1>
            <p class="mt-1 text-sm text-slate-500">
                Add a new role to manage user access.
            </p>
        </div>

        <div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">

            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-50 p-3 text-sm text-green-700">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-50 p-3 text-sm text-red-700">
                    <ul class="list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.roles.store') }}"
                  method="POST"
                  class="space-y-5">
                @csrf
<div>
    <label for="name"
           class="mb-2 block text-sm font-medium text-slate-700">
        Role Name
    </label>

    <div class="relative">
        <select
            id="name"
            name="name"
            required
            class="w-full appearance-none rounded-lg border border-slate-300 bg-white px-4 py-3 pr-10
                   text-sm text-slate-700 outline-none
                   focus:border-teal-500 focus:ring-2 focus:ring-teal-100"
        >
            <option value="" disabled {{ old('name') ? '' : 'selected' }}>Select a role</option>
            <option value="admin"       {{ old('name') === 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="super-admin" {{ old('name') === 'super-admin' ? 'selected' : '' }}>Super Admin</option>
            <option value="manager"     {{ old('name') === 'manager' ? 'selected' : '' }}>Manager</option>
            <option value="employee"    {{ old('name') === 'employee' ? 'selected' : '' }}>Employee</option>
            <option value="customer"    {{ old('name') === 'customer' ? 'selected' : '' }}>Customer</option>
        </select>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
        </svg>
    </div>

    @error('name')
        <p class="mt-2 text-xs text-rose-600">{{ $message }}</p>
    @enderror

    <p class="mt-2 text-xs text-slate-500">
        Choose one of: admin, super-admin, manager, employee, or customer.
    </p>
</div>

                <div class="flex items-center justify-between border-t border-slate-100 pt-5">
                    <a href="{{ route('admin.roles.index') }}"
                       class="rounded-lg border border-slate-300 px-4 py-2.5
                              text-sm font-medium text-slate-700 hover:bg-slate-50">
                        Cancel
                    </a>

                    <button type="submit"
                            class="rounded-lg bg-teal-600 px-5 py-2.5
                                   text-sm font-semibold text-white
                                   hover:bg-teal-700">
                        Create Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
