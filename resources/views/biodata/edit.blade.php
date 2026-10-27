@extends('layouts.app')
@section('title', 'Edit Biodata')

@section('header')
    <h1 class="h4">Edit Biodata</h1>
    <p class="mb-0">Perbarui data CV</p>
@endsection

@section('content')
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('biodata.update', $biodata) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('biodata._form')
            </form>
        </div>
    </div>
@endsection
