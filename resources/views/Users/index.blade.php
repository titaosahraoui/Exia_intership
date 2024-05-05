@extends('welcome') @section ('content')


<script>
    $(document).ready(function () {
        $(document).on("click", ".user-row", function () {
            var userId = $(this).data("user-id");
            $("#modifier-btn").attr("href", "/users/update/" + userId);
            $("#modifier-btn-supp").attr("href", "/users/delete/" + userId);
        });
    });
</script>
<div class="hero">
    <div class="CRUDbutton">
        <button class="btn-index"><a href="/users/ajouter">Cree</a></button>
        <button class="btn-index" ><a id="modifier-btn" href="">Modifier</a></button>
        <button class="btn-index"><a id="modifier-btn-supp" href="">Suprimer</a></button>
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
                        <th>Role</th>
                        <th>CV</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr class="user-row" data-user-id="{{ $user->id }}">
                        <td>
                            <div class="student-info">
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

                                {{ $user->name }} {{ $user->prenom }}
                            </div>
                        </td>
                        <td>{{ $user->promotion }}</td>
                        <td>Computer Science</td>
                        <td>12/25/2016</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <img
                                src="{{ asset('images/image.png') }}"
                                width="17"
                                alt=""
                            />
                            {{ $user->id }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{ $users->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
