<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <h1>Detail Angsuran </h1>
        <table class="table table-sm">
            <tr>
                <th scope="col">Nomor pinjaman</th>
                <th scope="col">Penghasilan</th>
                <th scope="col">Jumlah Pinjaman</th>
                <th scope="col">Tenor</th>
                <th scope="col">Angsuran</th>
                <th scope="col">Total pinjaman</th>
                @foreach ($pinjam as $p)
            </tr>
            
            <tr>
                <td>{{ $p->id_pinjam }}</td>
                <td>Rp. {{ number_format($p->penghasilan) }}</td>
                <td>Rp. {{ number_format($p->nominal) }}</td>
                <td>{{ $p->tenor }} Bulan</td>
               
                <td>Rp. @if  ($p->tenor = 12)
                @php $angsuran = ($p->nominal / 12) * 0.05 + ($p->nominal / 12); @endphp
        @elseif ($p->tenor = 24)
              @php  $angsuran = ($p->nominal / 24) * 0.08 + ($p->nominal / 24); @endphp
        @elseif ($p->tenor = 36){
              @php  $angsuran = ($p->nominal / 36) * 0.11 + ($p->nominal / 36); @endphp
        @endif
                  @php echo number_format($angsuran);  @endphp
                </td>

                <td>Rp. @php  
                $total_pinjaman = $angsuran * $p->tenor; @endphp
                @php echo number_format($total_pinjaman);    @endphp @endforeach
                </td>
        </table>
      