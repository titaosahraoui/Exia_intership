@extends('welcome') @section ('content') @if (session('success'))

<div class="alert alert-success" role="alert"></div>>{{ session("success") }}</div>

@endif

<style>
    /* CSS for the form */

.form-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.form-container label {
    display: block;
    margin-bottom: 8px;
}

.form-container input[type="text"],
.form-container input[type="email"],
.form-container input[type="password"],
.form-container select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.form-container input[type="file"] {
    margin-bottom: 15px;
}

.form-container button[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-container button[type="submit"]:hover {
    background-color: #0056b3;
}

.alert {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}

.alert-success {
    background-color: #dff0d8;
    border-color: #d0e9c6;
    color: #3c763d;
}

.alert-danger {
    background-color: #f2dede;
    border-color: #ebccd1;
    color: #a94442;
}

</style>

<ul>
    @foreach ($errors->all() as $error)
    <li class="alert alert-danger" role="alert">{{ $error }}</li>
    @endforeach
</ul>
<form class="form-container"
    action="{{ route('users.store') }}"
    method="POST"
    enctype="multipart/form-data"
>
    @csrf

    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required />

    <label for="prenom">Prenom:</label>
    <input type="text" name="prenom" id="prenom" required />

    <label for="promotion">Promotion:</label>
    <input type="text" name="promotion" id="promotion" required />

    <label for="role">Role:</label>
    <select name="role" id="role" required>
        <option value="admin">Admin</option>
        <option value="etudiant">Etudiant</option>
        <option value="pilote">Pilote</option>
    </select>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required />

    <label for="photo">Photo:</label>
    <input type="file" name="photo" id="photo" accept="image/*" required />

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required />

    <button type="submit">Create User</button>
</form>

@endsection
