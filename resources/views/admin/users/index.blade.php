 @extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 px-4 py-8 sm:px-6 lg:px-8">

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Page Header --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <div class="mb-2 flex items-center gap-2 text-sm text-slate-500">
                   <a href=""> <span>Dashboard</span></a>
                    <span>/</span>
                    <span class="text-indigo-600">User Management</span>
                </div>

                <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                    Users Management
                </h1>

                <p class="mt-1 text-sm text-slate-500">
                    Manage user accounts, roles, and access permissions.
                </p>
            </div>

            <div class="flex items-center gap-3">
                <div class="rounded-xl border border-slate-200 bg-white px-4 py-3 shadow-sm">
                    <p class="text-xs font-medium text-slate-500">Total Users</p>
                    <p class="mt-1 text-xl font-bold text-slate-900">
                        {{ $users->count() }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Success / Error Messages --}}
        @if (session('success'))
            <div class="flex items-center gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke-width="1.8"
                     stroke="currentColor" class="h-5 w-5 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m4.5 12.75 4.5 4.5 10.5-10.5"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        {{-- Users Table Card --}}
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            {{-- Table Header --}}
            <div class="flex flex-col gap-1 border-b border-slate-100 px-5 py-5 sm:px-6">
                <h2 class="text-base font-semibold text-slate-900">
                    All Users
                </h2>
                <p class="text-sm text-slate-500">
                    View and manage registered user accounts.
                </p>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">

                    <thead>
                        <tr class="border-b border-slate-200 bg-slate-50/80">
                            <th class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                #
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                User
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Email Address
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Roles
                            </th>

                            <th class="whitespace-nowrap px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-slate-500">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse ($users as $user)
                            <tr class="transition-colors duration-150 hover:bg-slate-50/80">

                                {{-- Serial Number --}}
                                <td class="whitespace-nowrap px-5 py-4 text-slate-400">
                                    {{ $loop->iteration }}
                                </td>

                                {{-- User Information --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-50 text-sm font-bold uppercase text-indigo-600 ring-1 ring-indigo-100">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>

                                        <div>
                                            <p class="font-semibold text-slate-800">
                                                {{ $user->name }}
                                            </p>
                                            <p class="mt-0.5 text-xs text-slate-400">
                                                User ID: {{ $user->id }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                {{-- Email --}}
                                <td class="whitespace-nowrap px-5 py-4">
                                    <div class="flex items-center gap-2 text-slate-600">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.7" stroke="currentColor"
                                             class="h-4 w-4 text-slate-400">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75m19.5 0-9.75 6.75L2.25 6.75"/>
                                        </svg>

                                        {{ $user->email }}
                                    </div>
                                </td>

                                {{-- Roles --}}
                                <td class="px-5 py-4">
                                    <div class="flex flex-wrap gap-1.5">
                                        @forelse ($user->getRoleNames() as $role)
                                            <span class="inline-flex items-center rounded-lg border border-indigo-100 bg-indigo-50 px-2.5 py-1 text-xs font-medium text-indigo-700">
                                                {{ $role }}
                                            </span>
                                        @empty
                                            <span class="inline-flex items-center rounded-lg border border-slate-200 bg-slate-50 px-2.5 py-1 text-xs font-medium text-slate-500">
                                                No role assigned
                                            </span>
                                        @endforelse
                                    </div>
                                </td>

                                {{-- Actions --}}
                                <td class="px-5 py-4">
                                    <div class="flex flex-wrap items-center justify-center gap-2">

                                        {{-- Manage --}}
                                        <a href=""
                                           title="Manage user"
                                           class="inline-flex items-center gap-1.5 rounded-lg border border-emerald-200 bg-emerald-50 px-3 py-2 text-xs font-semibold text-emerald-700 transition hover:border-emerald-300 hover:bg-emerald-100">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.8" stroke="currentColor"
                                                 class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M11.25 11.25 15 15m-3.75-3.75a3.75 3.75 0 1 0 7.5 0 3.75 3.75 0 0 0-7.5 0ZM3 20.25a7.5 7.5 0 0 1 15 0"/>
                                            </svg>
                                            Manage
                                        </a>

                                        {{-- Assign Role --}}
                                        <a href="{{ route('admin.roles.show', $user->id) }}"
                                           title="Assign role"
                                           class="inline-flex items-center gap-1.5 rounded-lg border border-violet-200 bg-violet-50 px-3 py-2 text-xs font-semibold text-violet-700 transition hover:border-violet-300 hover:bg-violet-100">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.8" stroke="currentColor"
                                                 class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15 19.5a6 6 0 0 0-12 0m9-13.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 1.5v6m-3-3h6"/>
                                            </svg>
                                            Assign Role
                                        </a>

                                        {{-- Edit --}}
                                        <a href=""
                                           title="Edit user"
                                           class="inline-flex items-center gap-1.5 rounded-lg border border-blue-200 bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-700 transition hover:border-blue-300 hover:bg-blue-100">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.8" stroke="currentColor"
                                                 class="h-4 w-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="m16.862 4.487 1.687-1.687a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.862 4.487ZM19.5 15v3.75A2.25 2.25 0 0 1 17.25 21h-12A2.25 2.25 0 0 1 3 18.75v-12A2.25 2.25 0 0 1 5.25 4.5H9"/>
                                            </svg>
                                            Edit
                                        </a>


                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-5 py-16 text-center">
                                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-slate-400">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor"
                                             class="h-7 w-7">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 19.5a6 6 0 0 0-12 0m9-13.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 1.5v6m-3-3h6"/>
                                        </svg>
                                    </div>

                                    <h3 class="mt-4 text-sm font-semibold text-slate-800">
                                        No users found
                                    </h3>
                                    <p class="mt-1 text-sm text-slate-500">
                                        Registered users will appear here.
                                    </p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Footer --}}
            <div class="border-t border-slate-100 bg-slate-50/50 px-5 py-4 sm:px-6">
                <p class="text-xs text-slate-500">
                    Showing {{ $users->count() }} user(s) on this page
                </p>
            </div>

        </div>
    </div>
</div>
@endsection