@extends('layouts.layout')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-6">
            <div class="container mt-4">
                <!-- Header -->
                <div class="text-center p-3 bg-success text-white fw-bold">
                    <h4>UPDATE INFO SITE DOWN NOP MALANG 00:00 WIB</h4>
                </div>

                <!-- Piket Section -->
                <div class="row text-center text-white fw-bold bg-success py-2">
                    <div class="col">Piket OMC 1 : Alif</div>
                    <div class="col">Piket OMC 2 : Danang</div>
                    <div class="col">Reporting : -</div>
                </div>

                <!-- Table Section -->
                <div class="mt-3">
                    <!-- MALANG INNER -->
                    <div class="fw-bold text-white bg-warning p-2">MALANG INNER</div>
                    <table class="table table-bordered text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Site Name</th>
                                <th>Suspect Problem</th>
                                <th>Time Down</th>
                                <th>Waktu Saat Ini</th>
                                <th>Durasi</th>
                                <th>Status Site</th>
                                <th>Tim FOP</th>
                                <th>Remark</th>
                                <th>Ticket SWFM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 4; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                    <!-- MALANG OUTER -->
                    <div class="fw-bold text-white bg-warning p-2">MALANG OUTER</div>
                    <table class="table table-bordered text-center">
                        <thead class="table-primary">
                            <tr>
                                <th>No</th>
                                <th>Site Name</th>
                                <th>Suspect Problem</th>
                                <th>Time Down</th>
                                <th>Waktu Saat Ini</th>
                                <th>Durasi</th>
                                <th>Status Site</th>
                                <th>Tim FOP</th>
                                <th>Remark</th>
                                <th>Ticket SWFM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= 4; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
