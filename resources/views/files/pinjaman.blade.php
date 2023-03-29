
@extends('layouts.main')
@section('container')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bahagian Pengurusan Fail</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Senarai fail perlu disahkan</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Rekod Pinjaman
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Fail</th>
                            <th>Peminjam</th>
                            <th>Tarikh Pinjam</th>
                            <th>Status</th>
                            <th>Konfigurasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $e=>$dt)
                        <tr>
                            <td>{{ $e+1 }}</td>
                            <td>{{ $dt->files_r->nama_fail }}</td>
                            <td>{{ $dt->user_r->name }}</td>
                            <td>{{ $dt->created_at }}</td>
                            @if($dt->status == 2)
                            <td>
                                <h6><span class="badge bg-warning text-dark">{{ $dt->status_r->status }}</span>
                                </h6>
                            </td>
                            @elseif($dt->status == 3)
                            <td>
                                <h6><span class="badge bg-warning text-dark">{{ $dt->status_r->status }}</span></h6>
                            </td>
                            @elseif($dt->status == 4)
                            <td>
                                <h6><span class="badge bg-danger">{{ $dt->status_r->status }}</span></h6>
                            </td>
                            @else
                            <td>
                                <h6><span class="badge bg-success badge-border-radius">{{ $dt->status_r->status }}</span></h6>
                            </td>
                            @endif
                            @if($dt->status === 2)
                            <td>
                                <a href="{{ url('/file/accept/'.$dt->id) }}"><button type="button"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fa-solid fa-check"></i> Terima</button></a>
                                <a href="{{ url('/file/decline/'.$dt->id) }}"><button type="button"
                                        class="btn btn-outline-danger btn-sm">
                                        <i class="fa-solid fa-xmark"></i> Batal</button></a>
                            </td>
                            @else
                            <td>tEST</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            </div>
        </div>
    </div>
</main>
@endsection