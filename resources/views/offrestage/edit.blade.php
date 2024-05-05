@extends('welcome') 
@section ('content')

<style>
.container {
    max-width: 600px;
    margin: auto;
    padding: 20px;
}

.offre-stage-form {
    background-color: #f4f4f4;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}

</style>

<div class="container">
    <form action="{{ route('offrestage.update', ['id' => $offreStageId->id]) }}" method="POST"></form>
        @csrf
        @method('PUT')
        <h2>Edit Offre de Stage</h2>

        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" class="form-control" value="{{ $offreStage->titre }}" required>
        </div>

        <div class="form-group">
            <label for="competance">Compétences:</label>
            <input type="text" id="competance" name="competance" class="form-control" value="{{ $offreStage->competance }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control" required>{{ $offreStage->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_debut">Date de début:</label>
            <input type="date" id="date_debut" name="date_debut" class="form-control" value="{{ $offreStage->date_debut }}">
        </div>

        <div class="form-group">
            <label for="duree">Durée:</label>
            <input type="text" id="duree" name="duree" class="form-control" value="{{ $offreStage->duree }}">
        </div>

        <div class="form-group">
            <label for="entreprise_id">Entreprise ID:</label>
            <input type="number" id="entreprise_id" name="entreprise_id" class="form-control" value="{{ $offreStage->entreprise_id }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
