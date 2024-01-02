<!-- resources/views/mahasiswa/show.blade.php -->

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
    <div class="container">
        <h2>Mahasiswa Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $mahasiswa->nama }}</h5>
                <p class="card-text">
                    <strong>NIM:</strong> {{ $mahasiswa->nim }}<br>
                    <strong>Jurusan:</strong> {{ $mahasiswa->jurusan }}
                </p>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Back to Mahasiswa List</a>
            </div>
        </div>
    </div>
@endsection
