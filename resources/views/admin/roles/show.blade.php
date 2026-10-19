@extends('layouts.app')
@section('content') 
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Assign User Role
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto">
        

            <div class="bg-white shadow-lg rounded-2xl p-6">

                <form action="{{route('admin.roles.assign',$user->id)}}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Select Role
                        </label>

                        <select
                            name="role_id" required
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-indigo-500"
                            required>

                            <option value="">Choose Role</option>
                

                            @foreach($roles as $role)
                                <option
                                    value="{{ $role->id }}"     
                                    {{ $user->hasRole($role->name) ? 'selected' : '' }}

                                    >
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 rounded-xl font-medium">
                        assign Role
                    </button>

                </form>

            </div>

        </div>
    </div>
    @endsection