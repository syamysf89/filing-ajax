@extends('layouts.user')
@section('usercontainer')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bahagian Pemulangan Fail</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pinjaman saya</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Senarai Fail
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name Fail</th>
                            <th>Peminjam</th>
                            <th>Status</th>
                            <th>Tarikh</th>
                            <th>Konfigurasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $e=>$dt)
                        <tr>
                            <td>{{ $e+1 }}</td>
                            <td>{{ $dt->fail_r->nama_fail }}</td>
                            <td>{{ $dt->user_r->name }}</td>
                            @if($dt->status == 2)
                            <td>
                                <h6><label class="badge bg-warning text-dark">{{ $dt->status_r->status }}</label></h6>
                            </td>
                            @elseif($dt->status == 3)
                            <td>
                                <h6><label class="badge bg-warning text-dark">{{ $dt->status_r->status }}</label></h6>
                            </td>
                            @elseif($dt->status == 4)
                            <td>
                                <h6><span class="badge bg-danger badge-border-radius">{{ $dt->status_r->status }}</span></h6>
                            </td>
                            @else
                            <td>
                                <h6><span class="badge bg-success badge-border-radius">{{ $dt->status_r->status }}</span></h6>
                            </td>
                            @endif
                            <td>{{ $dt->created_at }}</td>
                            @if($dt->status==3)
                            <td>
                                <a href="{{ url('pemulangan/'.$dt->id) }}"><button type="button"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fa-solid fa-hand-point-right"></i> Pulang</button></a>
                            </td>
                            @else
                            <td></td>
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