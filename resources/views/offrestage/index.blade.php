@extends('welcome') @section ('content')
<link rel="stylesheet" href="{{ asset('css/offre.css') }}">
<style>
    .pagination {
    display: flex;
    justify-content: center;
    padding: 20px;
}

.pagination li {
    display: inline-block;
    margin: 0 5px;
}

.pagination li.active span {
    background-color: #007bff;
    color: white;
}

.pagination li a {
    color: #007bff;
    text-decoration: none;
}

</style>



<div class="CRUDbutton">
    <button class="btn-index"><a href="/offrestages/create">Ajouter</a></button>
    <button class="btn-index" ><a id="modifier-btn" href="">Modifier</a></button>
    <button class="btn-index"><a id="modifier-btn-supp" href="">Suprimer</a></button>
</div>
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
    <form action="{{ route('wishlist.add', $offre->id) }}" method="POST">
        @csrf
        <button class="search-buttons card-buttons-msg" type="submit" class="search-buttons card-buttons">Add to Wishlist</button>
    </form>
    </div>
    <button class="search-buttons card-buttons-msg" ><a id="modifier-btn" href="{{ route('offrestages.edit', $offre->id) }}">Modifier</a></button>
  </div>

  @endforeach
</div>

<div class="pagination">
    {{ $offres->links('vendor.pagination.bootstrap-4') }}

</div>

@endsection