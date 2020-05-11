@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar permintaan pinjaman</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                    
                    <div>
                        <table class="table table-hover">
                             <tr>
                                 <th>Nama Peminjam</th>
                                 <th>Nominal</th>
                                 <th>Tenor</th>
                                 <th>Tanggal Pinjam</th>
                                 <th>Detail Angsuran</th>
                            </tr>
                            @foreach ($ajuanPinjaman as $ajuan)
                                <tr>
                                    <td>{{ $ajuan->name }}</td>
                                    <td>Rp. {{ number_format($ajuan->nominal )}}</td>
                                    <td>{{ $ajuan->tenor }}</td>
                                    <td>{{ $ajuan->tanggal_pinjam }}</td>
                                    <form action="{{ url('detailAngsuran') }}" method="post">
                                    {{ @csrf_field() }} 
                                    <input type="hidden" name="id_nasabah"    value="{{ $ajuan->id_nasabah }}">
                                    <input type="hidden" name="id_pinjam"     value="{{ $ajuan->id_pinjam }}">
                                    <input type="hidden" name="nama_peminjam" value="{{ $ajuan->name }}"> 
                                    <input type="hidden" name="nominal"       value="{{ $ajuan->nominal }}"> 
                                    <input type="hidden" name="penghasilan"   value="{{ $ajuan->penghasilan }}"> 
                                    <input type="hidden" name="tenor"         value="{{ $ajuan->tenor }}">
                                    <td><button type="submit" class="btn btn-outline-primary">Detail Angsuran</button><br/>
                                    </td>
                                </tr>
                             @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection