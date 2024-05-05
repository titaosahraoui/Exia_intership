@extends('welcome') @section ('content')

<div class="CRUDbutton">
    <button>Cree</button>
    <button>Modifier</button>
    <button>Suprimer</button>
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
                <tr>
                    <td>
                        <div class="student-info">
                            <img
                                src="https://img.freepik.com/photos-gratuite/portrait-homme-blanc-isole_53876-40306.jpg?size=626&ext=jpg&ga=GA1.1.1700460183.1709683200&semt=sph"
                                alt="Student Photo"
                                class="student-photo"
                            />
                            {{ $user->nom }} {{ $user->prenom }}
                        </div>
                    </td>
                    <td>{{ $user->role }}</td>
                    <td>Computer Science</td>
                    <td>12/25/2016</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <img
                            src="{{ asset('images/image.png') }}"
                            width="17"
                            alt=""
                        />
                        files
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td data-th="Supplier Code">UPS5005</td>
                    <td data-th="Supplier Name">UPS</td>
                    <td data-th="Invoice Number">ASDF19218</td>
                    <td data-th="Invoice Date">06/25/2016</td>
                    <td data-th="Due Date">12/25/2016</td>
                    <td data-th="Net Amount">$8,322.12</td>
                </tr>
                <tr>
                    <td data-th="Supplier Code">UPS3449</td>
                    <td data-th="Supplier Name">UPS South Inc.</td>
                    <td data-th="Invoice Number">ASDF29301</td>
                    <td data-th="Invoice Date">6/24/2016</td>
                    <td data-th="Due Date">12/25/2016</td>
                    <td data-th="Net Amount">$3,255.49</td>
                </tr>
                <tr>
                    <td data-th="Supplier Code">BOX5599</td>
                    <td data-th="Supplier Name">BOX Pro West</td>
                    <td data-th="Invoice Number">ASDF43000</td>
                    <td data-th="Invoice Date">6/27/2016</td>
                    <td data-th="Due Date">12/25/2016</td>
                    <td data-th="Net Amount">$45,255.49</td>
                </tr>
                <tr>
                    <td data-th="Supplier Code">PAN9999</td>
                    <td data-th="Supplier Name">Pan Providers and Co.</td>
                    <td data-th="Invoice Number">ASDF33433</td>
                    <td data-th="Invoice Date">6/29/2016</td>
                    <td data-th="Due Date">12/25/2016</td>
                    <td data-th="Net Amount">$12,335.69</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
