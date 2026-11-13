
@extends('layouts.app')

@section('content')

<div class="mx-auto w-full px-4 py-8">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Upload QR Code
        </h1>
        <p class="mt-1 text-sm text-gray-500">
            Upload a QR code image for payment.
        </p>
    </div>

    <div class="rounded-xl bg-white p-6 shadow-sm border border-gray-200">

        <form action="{{ route('admin.qr-codes.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            {{-- QR Code Name --}}
            <div class="mb-5">
                <label for="name"
                       class="mb-2 block text-sm font-medium text-gray-700">
                    QR Code Name
                </label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    placeholder="e.g. eSewa, Khalti, Bank QR"
                    required
                    class="block w-full rounded-lg border border-gray-300
                           p-2.5 text-sm text-gray-700
                           focus:border-indigo-500 focus:ring-indigo-500"
                >

                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- QR Code Image --}}
            <div>
                <label for="image"
                       class="mb-2 block text-sm font-medium text-gray-700">
                    QR Code Image
                </label>

                <input
                    type="file"
                    name="image"
                    id="image"
                    accept="image/*"
                    required
                    class="block w-full rounded-lg border border-gray-300
                           p-2.5 text-sm text-gray-700
                           focus:border-indigo-500 focus:ring-indigo-500"
                >

                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex items-center gap-3">

                <button type="submit"
                        class="rounded-lg bg-indigo-600 px-5 py-2.5
                               text-sm font-medium text-white
                               hover:bg-indigo-700">
                    Upload QR Code
                </button>

                <a href="{{ route('admin.qr-codes.index') }}"
                   class="rounded-lg border border-gray-300 px-5 py-2.5
                          text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Cancel
                </a>

            </div>

        </form>

    </div>
</div>

@endsection
