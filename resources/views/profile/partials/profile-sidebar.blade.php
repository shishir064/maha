
<div class="min-h-[80vh] bg-[#edf2f8] py-8 sm:py-10">
    <div class="mx-auto max-w-screen-2xl px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-[360px_minmax(0,1fr)] xl:grid-cols-[400px_minmax(0,1fr)]">

            {{-- Account Sidebar --}}
            <aside class="space-y-6">

                {{-- User Information --}}
                <div class="flex items-center gap-4 rounded-xl border border-gray-200/70 bg-white/40 p-4">
                    <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-full bg-gray-200 text-2xl font-medium text-gray-700">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div class="min-w-0">
                        <h2 class="truncate text-xl font-bold text-slate-700">
                            {{ auth()->user()->name }}
                        </h2>

                        @if(auth()->user()->hasVerifiedEmail())
                            <p class="mt-1 flex items-center gap-2 text-sm text-green-600">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M12 3l8.25 3v5.25c0 4.5-3.75 7.5-8.25 9.75C7.5 18.75 3.75 15.75 3.75 11.25V6L12 3Z"/>
                                </svg>
                                Verified
                            </p>
                        @else
                            <p class="mt-1 flex items-center gap-2 text-sm text-red-500">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 3 20.25 6v5.25c0 4.5-3.75 7.5-8.25 9.75-4.5-2.25-8.25-5.25-8.25-9.75V6L12 3Z"/>
                                </svg>
                                Not verified
                            </p>
                        @endif
                    </div>
                </div>

                {{-- Navigation --}}
                <nav class="space-y-2">

                    {{-- My Profile --}}
                    <a href="{{ url('/profile') }}"
                       class="flex items-center gap-4 rounded-lg px-4 py-4 text-base font-medium text-slate-700 transition hover:bg-white/70 hover:text-indigo-700">
                        <svg class="h-6 w-6 shrink-0 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.5 20.118a7.5 7.5 0 0 1 15 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.5-1.632Z"/>
                        </svg>
                        My profile
                    </a>

                    {{-- My Orders --}}
                    <a href="{{ url('/orders') }}"
                       class="flex items-center gap-4 rounded-lg px-4 py-4 text-base font-medium text-slate-700 transition hover:bg-white/70 hover:text-indigo-700">
                        <svg class="h-6 w-6 shrink-0 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h13.5l1.125 12H4.125l1.125-12Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25V6a3 3 0 0 1 6 0v2.25"/>
                        </svg>
                        My orders
                    </a>

                    {{-- My Reviews --}}
                    <a href="{{ url('/my-reviews') }}"
                       class="flex items-center gap-4 rounded-lg px-4 py-4 text-base font-medium text-slate-700 transition hover:bg-white/70 hover:text-indigo-700">
                        <svg class="h-6 w-6 shrink-0 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m12 3 2.75 5.58 6.16.9-4.45 4.34 1.05 6.13L12 17.06l-5.51 2.89 1.05-6.13-4.45-4.34 6.16-.9L12 3Z"/>
                        </svg>
                        My Reviews
                    </a>

                    {{-- Wishlist --}}
                    <a href="{{ url('/wishlist') }}"
                       class="flex items-center gap-4 rounded-lg px-4 py-4 text-base font-medium text-slate-700 transition hover:bg-white/70 hover:text-indigo-700">
                        <svg class="h-6 w-6 shrink-0 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78Z"/>
                        </svg>
                        My wishlist
                    </a>

                    {{-- Change Password --}}
                    <a href=""
                       class="flex items-center gap-4 rounded-lg bg-gray-200/80 px-4 py-4 text-base font-semibold text-slate-800 transition hover:bg-gray-200">
                        <svg class="h-6 w-6 shrink-0 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <rect x="4.5" y="10" width="15" height="11" rx="2"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10V7a4 4 0 1 1 8 0v3M12 14.5v2"/>
                        </svg>
                        Change password
                    </a>

                    {{-- Logout --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                                class="flex w-full items-center gap-4 rounded-lg px-4 py-4 text-left text-base font-medium text-slate-700 transition hover:bg-white/70 hover:text-red-600">
                            <svg class="h-6 w-6 shrink-0 text-slate-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6A2.25 2.25 0 0 0 5.25 5.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 15l3-3-3-3m3 3H9"/>
                            </svg>
                            Logout
                        </button>
                    </form>

                </nav>
            </aside>


            