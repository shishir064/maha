<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Maintenance | Mahasasto Shop</title>
    @vite(['resources/css/app.css'])
</head>
<body class="flex min-h-screen items-center justify-center bg-white px-6 py-12 text-slate-900">

    <main class="w-full max-w-3xl text-center">

        {{-- Maintenance illustration --}}
        <div class="mx-auto mb-8 max-w-xl">
            <svg viewBox="0 0 400 240" class="h-auto w-full"
                 xmlns="http://www.w3.org/2000/svg" fill="none">
                <circle cx="200" cy="120" r="105" fill="#EFF6FF"/>

                {{-- Monitor --}}
                <rect x="100" y="35" width="200" height="135"
                      rx="12" fill="#1E3A5F"/>
                <rect x="110" y="45" width="180" height="112"
                      rx="5" fill="#FFFFFF"/>

                {{-- Gear --}}
                <path d="M196 65 L204 65 L207 77 L217 81
                    L227 76 L233 83 L228 94 L232 104
                    L244 107 L244 116 L232 119 L228 129
                    L233 140 L226 146 L216 140 L206 144
                    L203 156 L194 156 L191 144 L181 140
                    L171 146 L165 139 L170 129 L166 119
                    L154 116 L154 107 L166 104 L170 94
                    L165 83 L172 76 L182 81 L192 77 Z"
                    fill="#2563EB"
                    transform="translate(0,-6) scale(1,0.85) translate(0,12)"/>

                <circle cx="200" cy="107" r="14" fill="white"/>

                {{-- Progress bar --}}
                <rect x="145" y="140" width="110" height="9"
                      rx="4.5" fill="#DBEAFE"/>
                <rect x="145" y="140" width="65" height="9"
                      rx="4.5" fill="#2563EB"/>

                {{-- Monitor stand --}}
                <path d="M180 170 H220 L228 190 H172 Z"
                      fill="#1E3A5F"/>
                <rect x="155" y="190" width="90" height="9"
                      rx="4.5" fill="#1E3A5F"/>

                {{-- Maintenance barriers --}}
                <path d="M45 154 H120 L110 180 H35 Z"
                      fill="#FBBF24"/>
                <path d="M55 154 H70 L55 180 H40 Z"
                      fill="#1E3A5F"/>
                <path d="M90 154 H105 L90 180 H75 Z"
                      fill="#1E3A5F"/>
                <path d="M42 180 V205 M112 180 V205"
                      stroke="#1E3A5F" stroke-width="7"
                      stroke-linecap="round"/>

                {{-- Plant --}}
                <path d="M330 190 V115" stroke="#16A34A"
                      stroke-width="4" stroke-linecap="round"/>
                <ellipse cx="317" cy="135" rx="8" ry="19"
                         transform="rotate(-35 317 135)" fill="#86EFAC"/>
                <ellipse cx="343" cy="119" rx="8" ry="19"
                         transform="rotate(35 343 119)" fill="#4ADE80"/>
                <ellipse cx="316" cy="163" rx="8" ry="17"
                         transform="rotate(-45 316 163)" fill="#4ADE80"/>
                <path d="M310 190 H350 L343 213 H317 Z"
                      fill="#CBD5E1"/>
                <path d="M310 190 H350" stroke="#64748B"
                      stroke-width="3" stroke-linecap="round"/>
            </svg>
        </div>

        <p class="mb-3 text-sm font-bold uppercase tracking-[0.2em] text-blue-600">
            Mahasasto Shop
        </p>

        <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl">
            We'll Be Back Soon!
        </h1>

        <p class="mx-auto mt-5 max-w-xl text-base leading-7 text-slate-600 sm:text-lg">
            Our website is currently undergoing maintenance
            to improve your shopping experience. We'll be back
            online soon. Thank you for your patience!
        </p>

        <div class="mx-auto mt-8 inline-flex items-center gap-3 rounded-2xl bg-blue-50 px-6 py-4 text-left">
            <svg class="h-8 w-8 text-blue-600" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor"
                 stroke-width="1.8">
                <circle cx="12" cy="12" r="9"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 7v5l3 2"/>
            </svg>
            <div>
                <p class="text-sm text-slate-500">Status</p>
                <p class="font-semibold text-slate-900">
                    Scheduled maintenance
                </p>
            </div>
        </div>

        <p class="mt-8 text-sm text-slate-500">
            Thank you for shopping with Mahasasto Shop.
        </p>

    </main>
</body>
</html>
