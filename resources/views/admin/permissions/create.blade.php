@extends('layouts.app')
@section('content')

    <div class="py-8">
        <div class="max-w-md mx-auto">

            <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-100">

                <h3 class="text-lg font-semibold text-gray-700 mb-5">
                    Create New Permission
                </h3>

                <form action="{{ route('admin.permissions.store') }}" method="POST">
                    @csrf

                   <div>
    <label for="permission-name" class="block text-sm font-medium text-gray-700 mb-2">
        Permission Name
    </label>

    <div class="relative">
        <select
            id="permission-name"
            name="name"
            required
            class="w-full appearance-none px-4 py-3 pr-10 bg-white border border-gray-300 rounded-xl text-sm text-gray-700 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
        >
            <option value="" disabled {{ old('name') ? '' : 'selected' }}>Select a permission</option>
            <option value="view"   {{ old('name') === 'view' ? 'selected' : '' }}>View</option>
            <option value="create" {{ old('name') === 'create' ? 'selected' : '' }}>Create</option>
            <option value="update" {{ old('name') === 'update' ? 'selected' : '' }}>Update</option>
            <option value="delete" {{ old('name') === 'delete' ? 'selected' : '' }}>Delete</option>
        </select>

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
             class="pointer-events-none absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/>
        </svg>
    </div>

    @error('name')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
    @enderror
</div>

                    <div class="mt-6 flex gap-3">
                        <button
                            type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-xl font-medium transition">
                            Save Permission
                        </button>

                        <a href=""
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-5 py-3 rounded-xl font-medium transition">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>

        </div>
    </div>
@endsection