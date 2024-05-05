@extends('welcome')
@section('content')

<style>
    .container {
        width: 80%;
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 50px; /* Adjust as needed */
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }

    .form-group input[type="text"],
    .form-group textarea,
    .form-group input[type="file"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-sizing: border-box; /* Added */
    }

    .form-group textarea {
        height: 100px; /* Increased height for textarea */
    }

    .form-group button[type="submit"] {
        background-color: #0056b3;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-group button[type="submit"]:hover {
        background-color: #004494;
    }
</style>

<div class="container">
    <h1>Modifier l'entreprise :</h1>
    <form action="{{ route('entreprises.update', $entreprise->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="companyName">Nom de votre entreprise</label>
            <input type="text" id="companyName" name="name" value="{{ $entreprise->name }}" required>
        </div>

        <div class="form-group">
            <label for="nature">Nature de l'entreprise</label>
            <input type="text" id="nature" name="secteur" value="{{ $entreprise->secteur }}" required>
        </div>

        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" value="{{ $entreprise->address }}" required>
        </div>

        <div class="form-group">
            <label for="postcode">Contact</label>
            <input type="text" id="postcode" name="contact" value="{{ $entreprise->contact }}" required>
        </div>

        <!-- Other fields here -->

        <div class="form-group">
            <label for="description">Parlez-nous de votre entreprise</label>
            <textarea id="description" name="description" required>{{ $entreprise->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="fileUpload">Télécharger un fichier supplémentaire</label>
            <input type="file" id="fileUpload" name="photo">
        </div>

        <div class="form-group">
            <button type="submit">SOUMETTRE</button>
        </div>
    </form>
</div>

@endsection
