@extends('welcome') @section ('content')
<link rel="stylesheet" href="{{ asset('css/Condidature.css') }}" />


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
<div style="display: flex; justify-content: center; align-items: center;">
<form action="{{ route('users.delete', $user->id) }}" method="POST">
    @csrf @method('DELETE')

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
    <button
        class="btn-index"
        type="submit"
        onclick="return confirm('Are you sure you want to delete this user?')"
    >
        Delete
    </button>
</form>
</div>
@endsection
