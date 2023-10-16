@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="text-white">
        @include('components.admin.content.table')
        </div>
@endsection
