@extends('layouts.app')
@section('title', 'Tambah Biodata')

@section('header')
    <h1 class="h4">Tambah Biodata</h1>
    <p class="mb-0">Isi data CV kamu</p>
@endsection

@section('content')
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('biodata._form')
            </form>
        </div>
    </div>
@endsection
