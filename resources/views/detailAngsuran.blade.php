<link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <h1>Detail Angsuran {{ $data['nama_peminjam'] }}</h1>
        <table class="table table-sm">
            <tr>
                <th scope="col">Nomor pinjaman</th>
                <th scope="col">Penghasilan</th>
                <th scope="col">Jumlah Pinjaman</th>
                <th scope="col">Tenor</th>
                <th scope="col">Total pinjaman</th>
                <th scope="col">Angsuran</th>
                <th scope="col">Persentase angsuran dari cicilan</th>
                <th scope="col">Rekomendasi</th>
                <th scope="col">Angsuran maksimal</th>
            </tr>
            <tr>
                <td>{{ $data['id_pinjam'] }}</td>
                <td>Rp. {{ number_format($data['penghasilan']) }}</td>
                <td>Rp. {{ number_format($data['nominal']) }}</td>
                <td>{{ $data['tenor'] }} Bulan</td>
                <td>Rp. {{ number_format($data['total_pinjaman']) }}
                <td>Rp. {{ number_format($data['angsuran']) }}</td>
                <td>{{ number_format($data['persentase_angsuran_dari_penghasilan']) }} %</td>
                <td>
                        @if( $data['angsuran'] < $data['angsuran_maksimal'] )
                              Jumlah Angsuran aman
                        @else
                             Angsuran bisa mengganggu keuangan Anda
                        @endif
                </td>
                <td>Rp. {{ number_format($data['angsuran_maksimal']) }}</td>
            </tr>
        </table>

        <form action="{{ url('terimaPinjaman') }}" method="post">
                            {{ @csrf_field() }} 
                 <input type="hidden" name="id_pinjam" value="{{ $data['id_pinjam'] }}">
                 <input type="hidden" name="id_nasabah" value="{{ $data['id_nasabah'] }}">
                 <input type="hidden" name="nominal" value="{{ $data['nominal']}}">
            <button type="submit" class="btn btn-outline-success">Terima</button>
        </form>

        <form action="{{ url('tolakPinjaman') }}" method="post">
                            {{ @csrf_field() }} 
            <button type="submit" class="btn btn-outline-danger">Tolak</button>
        </form>

        <form action="{{ url('hapusPinjaman') }}" method="post">
                            {{ @csrf_field() }} 
                <input type="hidden" name="id_pinjam" value="{{ $data['id_pinjam']}}">
            <button type="submit" class="btn btn-outline-danger">Hapus Pinjaman</button>
        </form>