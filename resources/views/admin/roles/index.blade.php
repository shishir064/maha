@extends('layouts.app')
@section('content')
    <div class="mx-auto max-w-7xl">

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 4.5 4.5 10.5-10.5"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Page Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">Roles</h1>
                <p class="mt-1 text-sm text-slate-500">Manage roles and the permissions assigned to them.</p>
            </div>

            <a href="{{ route('admin.roles.create') }}"
               class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-500 to-violet-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 transition hover:from-indigo-600 hover:to-violet-600 hover:shadow-indigo-500/40 focus:outline-none focus:ring-4 focus:ring-indigo-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Create Role
            </a>
        </div>

        {{-- Table Card --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200/70 bg-white shadow-sm">

            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-5 w-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M12 3l2.1 1.5 2.55-.15.9 2.4 2.1 1.5-.9 2.4.9 2.4-2.1 1.5-.9 2.4-2.55-.15L12 21l-2.1-1.5-2.55.15-.9-2.4-2.1-1.5.9-2.4-.9-2.4 2.1-1.5.9-2.4 2.55.15L12 3Z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-slate-900">Available Roles</h3>
                </div>

                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                    {{ $roles->count() }} {{ \Illuminate\Support\Str::plural('role', $roles->count()) }}
                </span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">

                    <thead>
                        <tr class="bg-slate-50/80 text-xs font-semibold uppercase tracking-wider text-slate-500">
                            <th class="px-6 py-3.5 text-left">SN</th>
                            <th class="px-6 py-3.5 text-left">Role Name</th>
                            <th class="px-6 py-3.5 text-left">Permissions</th>
                            <th class="px-6 py-3.5 text-left">Created</th>
                            <th class="px-6 py-3.5 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse($roles as $role)

                            <tr class="transition hover:bg-slate-50/70">

                                <td class="px-6 py-4 text-slate-400">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-indigo-500 to-violet-500 text-sm font-bold text-white">
                                            {{ strtoupper(substr($role->name, 0, 1)) }}
                                        </div>
                                        <span class="font-semibold text-slate-900">{{ ucfirst($role->name) }}</span>
                                    </div>
                                </td>

                                {{-- Permissions --}}
                                <td class="px-6 py-4">
                                    @if($role->permissions->count())
                                        <div class="flex max-w-md flex-wrap gap-1.5">
                                            @foreach($role->permissions as $permission)
                                                <span class="rounded-full bg-indigo-50 px-2.5 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-100">
                                                    {{ $permission->name }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-400">No permissions</span>
                                    @endif
                                </td>

                                <td class="whitespace-nowrap px-6 py-4 text-slate-500">
                                    {{ $role->created_at->format('d M Y') }}
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">

                                     

                                        <a href="{{route('admin.permissions.show',$role->id)}}"
                                           class="inline-flex items-center gap-1.5 rounded-lg bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-700 ring-1 ring-inset ring-indigo-100 transition hover:bg-indigo-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-3.5 w-3.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/>
                                            </svg>
                                            Assign Permissions
                                        </a>

                                        <form action="" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="inline-flex items-center gap-1.5 rounded-lg bg-rose-50 px-3 py-1.5 text-xs font-semibold text-rose-600 ring-1 ring-inset ring-rose-100 transition hover:bg-rose-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-3.5 w-3.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.35 9m-4.78 0L9.26 9m9.97-3.21c.34.05.68.11 1.02.17m-1.02-.17L18.16 19.67a2.25 2.25 0 0 1-2.24 2.08H8.08a2.25 2.25 0 0 1-2.24-2.08L4.77 5.79m14.46 0a48.1 48.1 0 0 0-3.48-.4m-12 .56c.34-.06.68-.12 1.02-.17m0 0a48.1 48.1 0 0 1 3.48-.4m7.5 0v-.92c0-1.18-.91-2.16-2.09-2.2a51.96 51.96 0 0 0-3.32 0c-1.18.04-2.09 1.02-2.09 2.2v.92m7.5 0a48.67 48.67 0 0 0-7.5 0"/>
                                                </svg>
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor" class="h-7 w-7">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M12 3l2.1 1.5 2.55-.15.9 2.4 2.1 1.5-.9 2.4.9 2.4-2.1 1.5-.9 2.4-2.55-.15L12 21l-2.1-1.5-2.55.15-.9-2.4-2.1-1.5.9-2.4-.9-2.4 2.1-1.5.9-2.4 2.55.15L12 3Z"/>
                                        </svg>
                                    </div>
                                    <p class="mt-4 text-sm font-semibold text-slate-700">No roles found</p>
                                    <p class="mt-1 text-sm text-slate-500">Create your first role to get started.</p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection