@extends('welcome') @section ('content')

<link rel="stylesheet" href="{{ asset('css/entreprise.css') }}">


<style>
    .user-card {
    width: 300px;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin: 10px;
    overflow: hidden;
}

.card-header {
    background-color: #f4f4f4;
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

.card-body {
    padding: 10px;
}

</style>



@forelse($userResults as $user)
<div class="user-card">
    <div class="card-header">
        <img
                                    src="data:image/jpeg;base64,{{ $user->photo }}"
                                    alt="User Photo"
                                    style="
                                        border-radius: 50%;
                                        width: 50px;
                                        height: 50px;
                                        object-fit: cover;
                                        margin-right: 10px;
                                    "
                                />
        <h3>{{ $user->name }} {{ $user->prenom }}</h3>
    </div>
    <div class="card-body">
        <p>Promotion: {{ $user->promotion }}</p>
        <p>Role: {{ $user->role }}</p>
    </div>
</div>
@empty
<div style="display: flex; color: white; justify-content: center;">
  <p>No User Results.</p>
</div>
@endforelse


@forelse($entrepriseResults as $ent)
<div class="job-card" data-user-id="{{ $ent->id }}">
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
    <div class="job-card-title"><h2>{{ $ent->name }}</h2></div>
    <div class="job-card-title">{{ $ent->secteur }}</div>
    <div class="job-card-subtitle">
      {{ $ent->description }}
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
      <button class="search-buttons card-buttons">Apply Now</button>
      <button class="search-buttons card-buttons-msg">
        Messages
      </button>
    </div>
  </div>
@empty
<div style="display: flex; color: white; justify-content: center;">
  <p>No User Results.</p>
</div>
@endforelse


@forelse($offres as $offre)

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
  <form action="{{ route('wishlist.add', $offre->id) }}" method="POST">
    @csrf
    <button class="search-buttons card-buttons-msg" type="submit" class="search-buttons card-buttons">Add to Wishlist</button>
</form>
</div>
</div>

@empty
<div style="display: flex; color: white; justify-content: center;">
  <p>No User Results.</p>
</div>
@endforelse


@endsection