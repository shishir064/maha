@extends('layouts.app')

@section('content')

    <x-slot name="header">
        <h2 class="text-2xl font-bold">
            Assign Permissions
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">

        <div class="bg-white shadow rounded-xl p-6">

            <h3 class="text-lg font-semibold mb-4">
                Role: {{ $role->name }}
            </h3>

            <form action="{{ route('admin.permissions.assign', ['role' => $role->id]) }}"
                method="POST">

                @csrf

                <div class="grid grid-cols-2 gap-4">

                    @foreach($permissions as $permission)

                        <label class="flex items-center gap-2">

                            <input
                                type="checkbox"
                                name="permissions[]"
                                value="{{ $permission->name }}"
                                {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                            >

                            {{ $permission->name }}

                        </label>

                    @endforeach

                </div>

                <button
                    type="submit"
                    class="mt-6 bg-indigo-600 text-white px-5 py-2 rounded-lg">
                assign Permissions to roles
                </button>

            </form>

        </div>

    </div>

@endsection