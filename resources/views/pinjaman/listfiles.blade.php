@extends('layouts.user')
@section('usercontainer')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bahagian Pinjaman Fail</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Senarai fail untuk dipinjam</li>
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
                            <th>No Fail</th>
                            <th>Name Fail</th>
                            <th>Status</th>
                            <th>Konfigurasi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listfiles as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->no_fail }}</td>
                            <td>{{ $f->nama_fail }}</td>
                            @if($f->status == 1)
                            <td>
                                <h6><span class="badge bg-success">{{ $f->status_r->status }}</span>
                                </h6>
                            </td>
                            @elseif($f->status == 2)
                            <td>
                                <h6><span class="badge bg-warning text-dark">{{ $f->status_r->status }}</span>
                                </h6>
                            </td>
                            @else
                            <td>
                                <h6><span class="badge bg-danger">{{ $f->status_r->status }}</span>
                                </h6>
                            </td>
                            @endif
                            @if($f->status == 1)
                            <td>
                                <a href="{{ url('pinjam/'.$f->id) }}"><button type="button"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fa-solid fa-hand-point-right"></i> Pinjam</button></a>
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