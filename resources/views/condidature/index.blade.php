@extends('welcome') @section ('content')


<div class="CRUDbutton">
<h1 style="font-size: 1.8rem; color: white;"> Condidatures</h1>

</div>

<div class="table">
    <div class="container">
        <table class="rwd-table">
            <tbody>
                <tr>
                    <th>Etudiant nom</th>
                    <th>Promostion</th>
                    <th>Stage</th>
                    <th>Application Date</th>
                    <th>CV</th>
                </tr>
                @foreach ($condidatures as $condidature)
                <tr class="user-row" >
                    <td>
                        <div class="student-info">
                            <img
                                src="data:image/jpeg;base64,{{ $condidature->user->photo}}"
                                alt="User Photo"
                                style="
                                    border-radius: 50%;
                                    width: 50px;
                                    height: 50px;
                                    object-fit: cover;
                                    margin-right: 10px;
                                "
                            />

                            {{ $condidature->user->name }} {{ $condidature->user->prenom }}
                        </div>
                    </td>
                    <td>{{ $condidature->offreStage->titre }}</td>
                    <td>{{ $condidature->created_at?->format('m/d/Y') ?? 'Date not set' }}</td>
                    <td>{{ $condidature->user->role }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $condidature->cv) }}" target="_blank">
                            <img
                                src="{{ asset('images/image.png') }}" 
                                width="17"
                                alt=""
                            />
                            CV
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


@endsection