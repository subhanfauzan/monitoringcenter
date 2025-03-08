@extends('layouts.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">
            <div class="container mt-5">
                <div class="card" style="overflow-x: scroll;">
                    <div class="card-header">
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" class="btn btn-secondary waves-effect waves-light"
                                data-bs-target="#basicModal">Tambah Data</button>
                            <button type="button" data-bs-toggle="modal" class="btn btn-secondary waves-effect waves-light"
                                data-bs-target="#exportmodal">Export</button>
                            <button type="button" class="btn btn-secondary waves-effect waves-light"
                                data-nama="{{ $nop->nama_nop }}" onclick="confirmDeleteNop(this)">Hapus Data
                                {{ $nop->nama_nop }}</button>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Create Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tiket.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-4">
                                <label for="nameBasic" class="form-label">Site ID</label>
                                <input type="text" id="site_id" name="site_id" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="exportmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Export</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-4">
                                <div class="">
                                    <label for="nameBasic" class="form-label">Jam</label>
                                    <input type="text" id="site_id" name="site_id" class="form-control" placeholder="">
                                </div>
                                <div class="pt-2">
                                    <label for="nameBasic" class="form-label">Piket 1</label>
                                    <input type="text" id="site_id" name="site_id" class="form-control" placeholder="">
                                </div>
                                <div class="pt-2">
                                    <label for="nameBasic" class="form-label">Piket 2</label>
                                    <input type="text" id="site_id" name="site_id" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function() {
            window.confirmDelete = function(e) {
                let id = e.getAttribute('data-id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: `/tiket/${id}`,
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "_method": 'DELETE',
                            },
                            success: function(data) {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    }); //inialisasi datatable
                                    $('#tiket-table').DataTable().ajax.reload(null, false);
                                }
                            }
                        });
                    }
                });
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            window.confirmDeleteNop = function(e) {
                let id = e.getAttribute('data-nama');

                Swal.fire({
                    title: "Are you sure?",
                    text: `Data dengan NOP ${id} akan dihapus semua dan tidak dapat dikembalikan!`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: `/daftartiketnop/${id}`,
                            data: {
                                "_token": "{{ csrf_token() }}",
                                "_method": 'DELETE',
                            },
                            success: function(data) {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Deleted!",
                                        text: "Your file has been deleted.",
                                        icon: "success"
                                    }); //inialisasi datatable
                                    $('#tiket-table').DataTable().ajax.reload(null, false);
                                }
                            }
                        });
                    }
                });
            }
        });
    </script>
@endpush
