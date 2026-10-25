@extends('layouts.app')

@section('content')
    <div>
        <livewire:admin.messages.show :id="$message->id" />
    </div>
@endsection