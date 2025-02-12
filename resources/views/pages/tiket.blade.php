@extends('layouts.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" class="btn btn-secondary waves-effect waves-light"
                                data-bs-target="#basicModal">Import</button>
                            <button type="button" data-bs-toggle="modal" class="btn btn-secondary waves-effect waves-light"
                                data-bs-target="#basicModal">Export</button>
                        </div>
                    </div>
                    <div class="table-responsive text-nowrap text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Total Jumlah Tiket Down</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>
                                        <span class="fw-medium">{{ $totaltiket }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form class="modal-content" action="{{ route('tiket.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Import Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Default file input example</label>
                        <input class="form-control" type="file" id="file" name="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // resources/js/dropzone-config.js
        document.addEventListener('DOMContentLoaded', function() {
            Dropzone.autoDiscover = false;

            if (document.getElementById('dropzone-basic')) {
                new Dropzone("#dropzone-basic", {
                    url: document.getElementById('dropzone-basic').action,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    paramName: "file",
                    maxFiles: 1,
                    maxFilesize: 10, // MB
                    acceptedFiles: ".csv,.xls,.xlsx",
                    addRemoveLinks: true,
                    dictDefaultMessage: "Drop files here or click to upload",
                    autoProcessQueue: false,
                    init: function() {
                        var myDropzone = this;

                        // Handle form submission
                        document.querySelector("form.modal-content").addEventListener("submit",
                            function(e) {
                                e.preventDefault();
                                if (myDropzone.files.length > 0) {
                                    myDropzone.processQueue();
                                } else {
                                    alert("Please select a file to upload");
                                }
                            });

                        // Handle successful upload
                        this.on("success", function(file, response) {
                            window.location.href = response.redirect;
                        });

                        // Handle errors
                        this.on("error", function(file, errorMessage) {
                            alert(errorMessage);
                        });
                    }
                });
            }
        });
    </script>
@endpush
