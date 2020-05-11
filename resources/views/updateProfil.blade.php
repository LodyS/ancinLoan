<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <h1>Profil</h1>
        @foreach ($profil as $u)
            <table class="table table-hover">
            <form action="{{ url('prosesUpdateProfil') }}" method="post">
                            {{ @csrf_field() }} 

                <input type="hidden" name="id" value="{{ $u->id}}">
                <tr>
                    <th scope="row">Nama</th>
                    <td><input type="text" class="form-control" name="name" value="{{ $u->name }}"></td>
                </tr>

                <tr>
                    <th scope="row">No Hp</th>
                    <td><input type="text" class="form-control" name="no_hp" value="{{ $u->no_hp }}"></td>
                </tr>

                <tr>
                    <th scope="row">Email</th>
                    <td><input type="email" class="form-control" name="email" value="{{ $u->email }}"></td>
                </tr>

                <tr>
                    <th scope="row">Alamat</th>
                    <td><input type="text" class="form-control" name="alamat" value="{{ $u->alamat }}"></td>
                </tr>

                <tr>
                    <th scope="row">Pekerjaan</th>
                    <td><input type="text" class="form-control" name="pekerjaan" value="{{ $u->pekerjaan }}"></td>
                </tr>

                <tr>
                    <th scope="row">Penghasilan</th>
                    <td><input type="number" class="form-control" name="penghasilan" value="{{$u->penghasilan }}"></td>
                </tr>
            </table>
                <button type="submit" class="btn btn-info">Simpan</button>
            </form>
@endforeach