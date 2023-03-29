@extends('layouts.main')
@section('container')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bahagian Pengurusan Fail</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Senarai/Urus Fail</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                    Rekod Fail
            </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>No Fail</th>
                                <th>Nama Fail</th>
                                <th>Status</th>
                                <th>Tarikh Buka</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>No Fail</th>
                                <th>Nama Fail</th>
                                <th>Status</th>
                                <th>Tarikh Buka</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($files as $f)
                        <tr>
                            <td>{{ $f->id }}</td>
                            <td>{{ $f->no_fail }}</td>
                            <td>{{ $f->nama_fail }}</td>
                            <td>
                                <h6>
                                    <span
                                        class="badge bg-success badge-border-radius">Aktif
                                    </span>
                                </h6>
                            </td>
                            <td>{{ $f->tarikh_buka }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm"
                                    onClick="show({{ $f->id }})"><i class="fa-solid fa-pen-to-square"></i></button>
                                <button type="button" class="btn btn-outline-danger btn-sm"
                                    onClick="destroy({{ $f->id }});window.location.reload();"><i
                                        class="fa-solid fa-trash"></i></button>                                
                                <button type="button" class="btn btn-outline-secondary btn-sm"
                                    onClick="lupus({{ $f->id }});window.location.reload();"><i
                                        class="fa-solid fa-calendar-xmark"></i></button>
                                                               
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                  </table>
                <br>
                <button type="button" class="btn btn-primary" onClick="create()">Tambah Fail</button>
        </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="page" class="p-1"></div>
            </div>
        </div>
    </div>
</div>

<!-- Js Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


<script>
    // Popup modal create
    function create() {
        $.get("{{ url('/file/create') }}", {}, function(data, status) {
            $("#exampleModalLabel").html('Tambah Fail')
            $("#page").html(data);
            $("#exampleModal").modal('show');

        });
    }

    // Store
    function store() {
        var no_fail = $("#no_fail").val();
        var nama_fail = $("#nama_fail").val();
        var tarikh_buka = $("#tarikh_buka").val();

        $.ajax({
            type: "get",
            url: "{{ url('/file/store') }}",
            data: "no_fail=" + no_fail + "&nama_fail=" + nama_fail + "&tarikh_buka=" + tarikh_buka,
            success: function(data) {
                $(".btn-close").click();
            }
        });
    }

    // Popup modal edit
    function show(id) {
        $.get("{{ url('/file/show/') }}/" + id, {}, function(data, status) {
            $("#exampleModalLabel").html('Edit Product')
            $("#page").html(data);
            $("#exampleModal").modal('show');
        });
    }

    // Update
    function update(id) {
        var no_fail = $("#no_fail").val();
        var nama_fail = $("#nama_fail").val();
        var tarikh_buka = $("#tarikh_buka").val();
        $.ajax({
            type: "get",
            url: "{{ url('/file/update/') }}/" + id,
            data: "no_fail=" + no_fail + "&nama_fail=" + nama_fail + "&tarikh_buka=" + tarikh_buka,

        });
    }

    // Destroy
    function destroy(id) {
        confirm("Please Confirm");

        $.ajax({
            type: "get",
            url: "{{ url('/file/destroy/') }}/" + id,

        });
    }

    // Lupus
    function lupus(id) {
        confirm("Please Confirm");

        $.ajax({
            type: "get",
            url: "{{ url('/file/lupus/') }}/" + id,

        });
    }
</script>

@endsection