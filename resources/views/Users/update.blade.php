@extends('welcome') @section('content') @if (session('success'))
<div class="alert">{{ session("success") }}</div>
@endif
<link rel="stylesheet" href="{{ asset('css/form.css') }}">

<ul>
    @foreach ($errors->all() as $error)
    <li class="alert-danger">{{ $error }}</li>
    @endforeach
</ul>

<form
     class="form-container"
    action="{{ route('users.update', $user->id) }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf @method('PUT')

    <label for="name">Name:</label>
    <input
        type="text"
        name="name"
        id="name"
        value="{{ $user->name }}"
        required
        autocomplete="on"
    />

    <label for="prenom">Prenom:</label>
    <input
        type="text"
        name="prenom"
        id="prenom"
        value="{{ $user->prenom }}"
        required
        autocomplete="on"
    />

    <label for="promotion">Promotion:</label>
    <input
        type="text"
        name="promotion"
        id="promotion"
        value="{{ $user->promotion }}"
        required
        autocomplete="on"
    />

    <label for="role">Role:</label>
    <select name="role" id="role" required autocomplete="on">
        <option value="admin" @if ($user->
            role === 'admin') selected @endif>Admin
        </option>
        <option value="etudiant" @if ($user->
            role === 'etudiant') selected @endif>Etudiant
        </option>
        <option value="pilote" @if ($user->
            role === 'pilote') selected @endif>Pilote
        </option>
    </select>

    <label for="email">Email:</label>
    <input
        type="email"
        name="email"
        id="email"
        value="{{ $user->email }}"
        required
        autocomplete="on"
    />

    <label for="photo">Photo:</label>
    <input
        type="file"
        name="photo"
        id="photo"
        accept="image/*"
        autocomplete="on"
    />

    <label for="password">Password:</label>
    <input
        type="password"
        name="password"
        id="password"
        required
        autocomplete="on"
    />

    <button type="submit">Update User</button>
</form>
@endsection
