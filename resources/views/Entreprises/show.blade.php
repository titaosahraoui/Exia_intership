@extends('welcome') @section ('content')

<link rel="stylesheet" href="{{ asset('css/form.css') }}">
<link rel="stylesheet" href="{{ asset('css/entreprise.css') }}">




<div class="job-cards">
    <div class="job-card" data-user-id="{{ $enterprise->id }} ">
     <div class="job-card" data-user-id="{{ $enterprise->id }} " data-id="{{ $enterprise->id }}" data-secteur="{{ $enterprise->secteur }}" data-description="{{ $enterprise->description }}">
      <div class="job-card-header">
        <img class="job-detail-image" src="{{ $enterprise->photo }} " alt="ent logo" />
        <div class="menu-dot"></div>
      </div>
      <div class="job-card-title">{{ $enterprise->name }}</div>
      <div class="job-card-subtitle">
        {{ $enterprise->secteur }}
      </div>
      <div class="job-card-subtitle">
        {{ $enterprise->description }}
      </div>
      <div class="job-detail-buttons">
        <button class="search-buttons detail-button">
            Average Rating: {{ $enterprise->received_evaluations_avg_rating ?? 'N/A' }} / 5
        </button>
        </button>
        <button class="search-buttons detail-button">
          Full Time
        </button>
        <button class="search-buttons detail-button">
          Min. 1 Year
        </button>
        <button class="search-buttons detail-button">
          Senior Level
        </button>
      </div>
      <div class="job-card-buttons">
        <button class="search-buttons card-buttons">Apply Now</button>
        <button class="search-buttons card-buttons-msg">
          Messages
        </button>
      </div>
     </div>
 </div>

@if (Auth::check())  {{-- Check if the user is logged in --}}
    <div class="evaluation-form">
        <form class="form-container" action="{{ route('evaluations.store') }}" method="POST">
            @csrf
            <h3>Leave an Evaluation</h3>
            <input type="hidden" name="evaluator_id" value="{{ Auth::id() }}">
            <input type="hidden" name="evaluator_type" value="App\Models\User">
            <input type="hidden" name="evaluated_id" value="{{ $enterprise->id }}">
            <input type="hidden" name="evaluated_type" value="App\Models\Entreprise">
            <div class="form-group">
                <label for="rating">Rating</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required>
            </div>
            <div class="form-group">
                <label for="comment">Comment</label>
                <textarea id="comment" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Evaluation</button>
        </form>
    </div>
@endif





@endsection