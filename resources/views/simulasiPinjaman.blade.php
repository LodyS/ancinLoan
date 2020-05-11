<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <h1>Simulasi Pinjaman Anda {{ Auth::user()->name }}</h1>
        <table class="table table-sm">
            <tr>
               <th scope="col">Jumlah Pinjaman</th>
                <th scope="col">Tenor dalam bentuk bulan</th>
                <th scope="col">Angsuran</th>
            </tr>
            <tr>
                <td>Rp. {{ number_format($data['nominal']) }}</td>
                <td>{{ $data['tenor'] }} Bulan</td>
                <td>Rp. {{ number_format($data['angsuran']) }}</td>
                <form action="{{ url('pengajuannPinjaman') }}" method="post">
                {{ @csrf_field() }}
                <input type="hidden" name="id_nasabah" value="{{  Auth::user()->id }}">
                <input type="hidden" name="nominal" value="{{ $data['nominal'] }}">
                <input type="hidden" name="statusPeminjaman" value="Sedang ditinjau">
                <input type="hidden" name="tenor" value="{{ $data['tenor'] }}">
                <td><button type="submit" class="btn btn-outline-primary">Ajukan peminjaman</button></td>
            </tr>
        </table>