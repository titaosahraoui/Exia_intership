@extends('welcome') @section ('content') @if (session('success'))

<div class="alert">{{ session("success") }}</div>

@endif

<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<ul>
    @foreach ($errors->all() as $error)
    <li class="alert alert-danger">{{ $error }}</li>
    @endforeach
</ul>
<form class="form-container" action="{{ route('entreprises.store') }}" method="POST" enctype="multipart/form-data">
    @csrf   

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required />

    <label for="secteur">Secteur:</label>
    <input type="text" name="secteur" id="secteur" required />

    <label for="address">Address:</label>
    <input type="text" name="address" id="address" required />

    <label for="contact">Contact:</label>
    <input type="text" name="contact" id="contact" required />

    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>

    <label for="photo">Photo:</label>
    <input type="file" name="photo" id="photo" accept="image/*" required />

    <button type="submit">Add Entreprise</button>
</form>


@endsection
