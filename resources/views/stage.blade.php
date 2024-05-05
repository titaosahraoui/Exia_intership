@extends('welcome') @section('content')

<link rel="stylesheet" href="{{ asset('css/offre.css') }}">

<style>
.main-content {
    flex-grow: 1; 
}

.hero {
    background: linear-gradient(to right, #a8a8a8,#5a5f8d, #1e2880); /* Replace with the exact gradient/colors you need */
    color: black; /* Text color */
    text-align: left; /* Align text to the left */
    padding: 151px 20px 174px 20px; 
    margin-top: -10vh;
    border-radius: 0px; /* Rounded corners */
    display: flex;
    flex-direction: column;
    max-width: 100%; /* Maximum width with respect to its parent */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Add shadow for depth */
}

.hero h1 {
    font-size: 3rem; /* Adjust the size as needed */
    margin-bottom: 10px; /* Space below the heading */
    
}

.hero p {
    font-size: 1.25rem; /* Adjust the size as needed */
    margin-bottom: 20px; /* Space below the paragraph */
}

.search-bar {
    display: flex;
    gap: 0px;
}

.search-bar input[type="text"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: px; /* Rounded corners for inputs */
    width: calc(50% - 4px); /* Adjust width, subtract the gap */
    margin: 0;
    flex: 1;
}

.search-bar button { 
    padding: 20px 30px;
    border: none;
    border-radius: px; /* Rounded corners for button */
    background-color: #3575E2; /* Button background color */
    color: white; /* Button text color */
    cursor: pointer; /* Cursor to pointer to indicate clickable */
    display: flex;
}

.hero h1 .highlight {
    color: #3945a7; /* The extracted blue color */
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .hero {
        padding: 30px;
        margin: 10px;
        max-width: 95%;
    }

    .search-bar input[type="text"],
    .search-bar button {
        width: 100%; /* Full width on smaller screens */
        margin-right: 0; /* No margin right on smaller screens */
        margin-bottom: 10px; /* Add some margin bottom */
    }

    .search-bar button {
        width: auto; /* Auto width to adjust as per text */
    }
}

</style>


<main class="main-content">
    <section class="hero">
      <h1>Find your <span class="highlight">new job</span> today</h1>
      <p>
        Thousands of jobs in the computer, engineering and technology
        sectors are waiting for you.
      </p>
      <div class="search-bar">
        <input
          type="text"
          placeholder="What position are you looking for?"
        />
        <input type="text" placeholder="Location" />
        <button>Search Job</button>
      </div>
    </section>
    <div class="job-cards">
        @foreach($offres as $offre)
    
        <div class="job-card" data-user-id="{{ $offre->id }}">
        <div class="job-card-header">
          <svg
            viewBox="0 -13 512 512"
            xmlns="http://www.w3.org/2000/svg"
            style="background-color: #2e2882"
          >
            <g fill="#feb0a5">
              <path
                d="M256 92.5l127.7 91.6L512 92 383.7 0 256 91.5 128.3 0 0 92l128.3 92zm0 0M256 275.9l-127.7-91.5L0 276.4l128.3 92L256 277l127.7 91.5 128.3-92-128.3-92zm0 0"
              />
              <path d="M127.7 394.1l128.4 92 128.3-92-128.3-92zm0 0" />
            </g>
            <path
              d="M512 92L383.7 0 256 91.5v1l127.7 91.6zm0 0M512 276.4l-128.3-92L256 275.9v1l127.7 91.5zm0 0M256 486.1l128.4-92-128.3-92zm0 0"
              fill="#feb0a5"
            />
          </svg>
          <div class="menu-dot"></div>
        </div>
        <div class="job-card-title">{{ $offre->titre }}</div>
        <div class="job-card-subtitle">
          {{ $offre->competance }}
        </div>
        <div class="job-detail-buttons">
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
          <button class="search-buttons card-buttons"><a href="/condidatures/create/{{ $offre->id }}">Apply Now</a></button>
          <button class="search-buttons card-buttons-msg">
            Messages
          </button>
        </div>
      </div>
    
      @endforeach
    </div>
   
  </main>





@endsection