@extends('layouts.app')

@section('content')
    

<div class="mx-auto max-w-7xl px-4 py-8">

    <div class="mb-6 flex items-center justify-between">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                QR Code Management
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Manage your uploaded payment QR codes.
            </p>
        </div>

        <a href="{{ route('admin.qr-codes.create') }}"
           class="rounded-lg bg-indigo-600 px-5 py-2.5
                  text-sm font-medium text-white hover:bg-indigo-700">
            + Upload QR Code
        </a>

    </div>

    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">

                <thead class="bg-gray-50 text-xs uppercase text-gray-700">
                    <tr>
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">QR Code Name</th>
                        <th class="px-6 py-4">QR Code Image</th>
                        <th class="px-6 py-4">Uploaded Date</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">

                    @forelse($qrCodes as $qrCode)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $qrCode->name }}
                            </td>

                            <td class="px-6 py-4">
                                <img
                                    src="{{ asset('storage/' . $qrCode->image) }}"
                                    alt="QR Code"
                                    class="h-24 w-24 rounded-lg border border-gray-200 object-contain p-1"
                                >
                            </td>

                            <td class="px-6 py-4">
                                {{ $qrCode->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4">

                                <form action="{{ route('admin.qr-codes.destroy', $qrCode->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this QR code?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="rounded-lg bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                                        Delete
                                    </button>

                                </form>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="3"
                                class="px-6 py-10 text-center text-gray-500">
                                No QR code uploaded yet.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>


@endsection