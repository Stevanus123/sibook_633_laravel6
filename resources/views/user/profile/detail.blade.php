@extends('layouts.main')
@section('title', 'Detail Profil | SIBOOK')
@section('content')
    <div class="row my-3 card shadow-sm p-4" style="border-radius: 10px">
        <div class="container my-2">

            {{-- Riwayat Saldo --}}
            @if ($saldo)
                <div class="card shadow p-4">
                    <h5 class="mb-3">💰 Riwayat Saldo</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Tipe</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($saldo as $s)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->created_at->format('d M Y H:i') }}</td>
                                    <td>{{ ucfirst($s->tipe) }}</td>
                                    <td
                                        class="{{ $s->tipe == 'topup' || $s->tipe == 'reward' ? 'text-success' : 'text-danger' }}">
                                        {{ $s->tipe == 'topup' || $s->tipe == 'reward' ? '+' : '-' }}Rp.
                                        {{ number_format(abs($s->jumlah), 0, ',', '.') }}
                                    </td>
                                    <td>{{ $s->keterangan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            {{-- Riwayat Pembelian --}}
            @if ($beli)
                <div class="card shadow p-4">
                    <h5 class="mb-3">🛍️ Riwayat Pembelian</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($beli as $o)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $o->created_at->format('d M Y') }}</td>
                                    <td>{{ ucfirst($o->status) }}</td>
                                    <td>Rp. {{ number_format($o->total_harga, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            {{-- Daftar buku yang dibeli --}}
            @if ($buku)
                <div class="card shadow p-4 my-4">
                    <h5 class="mb-3">📚 Buku yang Sudah Dibeli</h5>
                    <ul class="list-group">
                        @foreach ($buku as $b)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $b->judul }}</strong> <br>
                                    <small class="text-muted">oleh {{ $b->penulis }}</small>
                                </div>
                                <a href="/profile/baca/{{ Str::slug($b->judul) }}"
                                    class="btn btn-sm btn-outline-primary">Baca Buku</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Riwayat Pengajuan --}}
            @if ($terbit)
                <div class="card shadow p-4">
                    <h5 class="mb-3">🛍️ Riwayat Pengajuan</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($terbit as $t)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $t->judul }}</td>
                                    <td>{{ $t->created_at->format('d M Y') }}</td>
                                    <td>{{ ucfirst($t->status) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            {{-- kembali ke profile --}}
            <div class="mt-4">
                <a href="{{ url('/profile') }}" class="btn btn-secondary">⬅️ Kembali ke Profil</a>
            </div>
        </div>
    </div>
@endsection
