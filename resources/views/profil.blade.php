<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <h1>Profil</h1>
        @foreach ($profil as $u)
            <table class="table table-hover">

                <tr>
                    <th scope="row">Nama</th>
                    <td>{{ $u->name }}</td>
                </tr>

                <tr>
                    <th scope="row">No Hp</th>
                    <td>{{ $u->no_hp }}</td>
                </tr>

                <tr>
                    <th scope="row">Tanggal lahir</th>
                    <td>{{ $u->tanggal_lahir }}</td>
                </tr>

                <tr>
                    <th scope="row">Pekerjaan</th>
                    <td>{{ $u->pekerjaan }}</td>
                </tr>

                <tr>
                    <th scope="row">Penghasilan</th>
                    <td>Rp. {{ number_format($u->penghasilan) }}</td>
                </tr>
            </table>
     <a href="updateProfil/{{$u->id}}"><button type="submit" class="btn btn-info">Update profil</button></a>
@endforeach