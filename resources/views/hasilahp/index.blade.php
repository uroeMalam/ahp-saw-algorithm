@extends('layout.main')

{{-- aditional css for current page --}}
@push('page-css')

@endpush

@section('content')
<div class="container-fluid mt--6">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <h2 class="mb-0">Hasil Perhitungan AHP</h2>
            </div>
            <div class="table-responsive py-4 px-4" >
              <table>
                <thead>
                    <tr>
                        <th>Eigen</th>
                        @foreach ($data as $header)
                            <th class="text-center">{{ $header->kode_kriteria }}</th>
                        @endforeach
                    </tr>
                <tbody>
                    @foreach ($data as $keyCol => $col)
                    <tr>
                        <th>
                            {{ $col->kode_kriteria }}
                        </th>
                        @foreach ($data as $keyRow => $row)
                        <td>
                            <input class="form-control" type="number" readonly
                                @foreach ($nilai as $n)
                                    {{-- get data from database if avaiable --}}
                                    @if ($row->id == $n->id_kriteria_a && $col->id == $n->id_kriteria_b)
                                        value="{{ $n->eigen}}"
                                        @break
                                    @endif
                                @endforeach
                            >
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                <tbody>
            </table>
            <br>
            <br><br>
            <h2>Tabel Hasil</h2>
            <div class="table-responsive py-4 px-4" >
              <table class="table">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Kriteria</th>
                        <th>Jenis</th>
                        <th>vector</th>
                        <th>Bobot</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $key => $row)
                    <tr>
                        <td>{{ $row->kode_kriteria }}</td>
                        <td>{{ $row->nama_kriteria }}</td>
                        <td>{{ $row->jenis }}</td>
                        <td>{{ $row->vector }}</td>
                        <td>{{ $row->bobot_total }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('page-scripts')
@endpush