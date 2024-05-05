@extends('welcome') @section('content')
<div>
    <h1>Create User</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label for="nom">Nom:</label>
        <input type="text" name="nom" id="nom" />

        <label for="prenom">Prenom:</label>
        <input type="text" name="prenom" id="prenom" />

        <label for="role">Role:</label>
        <select name="role" id="role">
            <option value="admin">Admin</option>
            <option value="etudiant">Etudiant</option>
            <option value="chef promo">Chef Promo</option>
        </select>

        <button type="submit">Create User</button>
    </form>
</div>
@endsection
