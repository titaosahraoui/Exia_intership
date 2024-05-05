@extends('welcome') @section ('content') @if (session('success'))



<div class="alert">{{ session("success") }}</div>

@endif

<style>
    .container {
        width: 100%;
        max-width: 600px; /* Adjust the width as needed */
        margin: 0 auto; /* Center the container */
        padding: 20px;
    }
    
    .card {
        background-color: #ffffff; /* White background for the card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Card shadow for 3D effect */
        border-radius: 8px; /* Rounded corners */
        padding: 20px;
        margin-top: 20px;
    }
    
    .form-group {
        margin-bottom: 15px; /* Space between form groups */
    }
    
    label {
        display: block;
        margin-bottom: 5px; /* Space between label and input field */
    }
    
    input[type="file"] {
        display: block;
        margin-top: 5px;
    }
    
    .btn {
        background-color: #007bff; /* Bootstrap primary button color */
        color: white;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
    }
    
    .btn:hover {
        background-color: #0056b3; /* Darken the button on hover */
    }
    </style>

<ul>
    @foreach ($errors->all() as $error)
    <li class="alert alert-danger">{{ $error }}</li>
    @endforeach
</ul>
<div class="container">
    <div class="card">
        <h2>Apply for {{ $offreStage->titre }}</h2>
        <form action="{{ route('condidature.store', ['offreStageId' => $offreStage->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="offre_stage_id" value="{{ $offreStage->id }}">
            

            <div class="form-group">
                <label for="lettre_de_motivation">Cover Letter:</label>
                <textarea id="lettre_de_motivation" name="lettre_de_motivation" required rows="4" placeholder="Type your cover letter here"></textarea>
            </div>

            <div class="form-group">
                <label for="date_de_soumission">Submission Date:</label>
                <input type="date" id="date_de_soumission" name="date_de_soumission" required>
            </div>

            <div class="form-group">
                <label for="cv">Upload CV:</label>
                <input type="file" id="cv" name="cv" required>
            </div>
            

            <!-- Additional fields can be added here -->

            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>
</div>


@endsection