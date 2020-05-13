@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    @foreach ($user as $u)

                    @if ($u->jumlah_rekening == 0)

                    Selamat datang di Ancin Loan, Anda bisa meminjam uang untuk keperluan Anda dengan proses yang cepat, mudah, aman.<br/><br/>
                    <form action="{{ url('simulasiPinjaman') }}" method="post">
                    {{ @csrf_field() }}

                        <div class="form-group">
                            <div class="col-sm-7">
                                <label for="exampleFormControlSelect1">Dana yang Anda butuhkan</label>
                                    <select class="form-control" name="nominal">
                                            <option value="1000000">1 Juta rupiah</option>
                                            <option value="2000000">2 Juta rupiah</option>
                                            <option value="3000000">3 Juta rupiah</option>
                                            <option value="4000000">4 Juta rupiah</option>
                                            <option value="5000000">5 Juta rupiah</option>
                                            <option value="6000000">6 Juta rupiah</option>
                                            <option value="7000000">7 Juta rupiah</option>
                                            <option value="9000000">8 Juta rupiah</option>
                                            <option value="9000000">9 Juta rupiah</option>
                                            <option value="10000000">10 Juta rupiah</option>
                                        </select>
                                    </div>
                                </div>

                    <div class="form-group">
                        <div class="col-sm-7">
                            <label for="exampleFormControlSelect1">Tenor pinjaman Anda</label>
                                <select class="form-control" name="tenor">
                                    <option value="12">1 tahun & Bunga 5% per bulan</option>
                                    <option value="24">2 tahun & Bunga 8% per bulan</option>
                                    <option value="36">3 tahun & Bunga 11% per bulan</option>
                                </select>
                            </div>
                        </div>

                    <button type="submit" class="btn btn-outline-primary">Lihat simulasi pinjaman</button><br/>
                    <small>Anda hanya bisa meminjam uang dengan nominal maksimal Rp. 10.000.000 juta</small><br/>
                    @else
                         "Silahkan lunaskan angsuran Anda" 
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
