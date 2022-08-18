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
              <h2 class="mb-0">Hasil Akhir</h2>
            </div>
            {{-- step 1 --}}
            <br>
            <h3 class="pl-4">Step 1 : Matrik Keputusan</h3>
            <div class="table-responsive px-4">
              <table class="table table-flush text-center data-table">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No</th>
                    <th style="font-size: 13px;">Nama</th>
                    @foreach ($kriteria as $item)
                        <th style="font-size: 13px;">{{ $item->kode_kriteria }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_dosen }}</td>
                        @foreach ($kriteria as $item)
                          <td>
                            {{-- check kalau kategori dan alternatif sama maka tampilkan bobot sub kriteria --}}
                            @foreach ($isi as $i)
                              @if ($d->id == $i->id_alternatif && $item->id == $i->id_kriteria)
                                  {{ $i->bobot }}
                                  @break
                              @endif
                            @endforeach
                          </td>
                        @endforeach
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- step 2 --}}
            <br>
            <br>
            <h3 class="pl-4">Step 2 : Matrik Normalisasi</h3>
            <div class="table-responsive px-4">
              <table class="table table-flush text-center data-table">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No</th>
                    <th style="font-size: 13px;">Nama</th>
                    @foreach ($kriteria as $item)
                        <th style="font-size: 13px;">{{ $item->kode_kriteria }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_dosen }}</td>
                        @foreach ($kriteria as $item)
                          <td>
                            {{-- check kalau kategori dan alternatif sama maka tampilkan bobot sub kriteria --}}
                            @foreach ($normalisasi as $i)
                              @if ($d->id == $i->id_alternatif && $item->id == $i->id_kriteria)
                                  {{-- menentukan perhitungan benefit atau cost --}}
                                  @if ($i->jenis == "Benefit")
                                      {{ $i->bobot / $i->max_data }}
                                      @break
                                  @endif
                                  @if ($i->jenis == "Cost")
                                      {{ $i->bobot / $i->min_data }}
                                      @break
                                  @endif
                              @endif
                            @endforeach
                          </td>
                        @endforeach
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- step 3 --}}
            <br>
            <br>
            <h3 class="pl-4">Step 3 : Matrik Perangkingan</h3>
            <div class="table-responsive px-4">
              <table class="table table-flush text-center data-table">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No</th>
                    <th style="font-size: 13px;">Nama</th>
                    @foreach ($kriteria as $item)
                        <th style="font-size: 13px;">{{ $item->kode_kriteria }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_dosen }}</td>
                        @foreach ($kriteria as $item)
                          <td>
                            {{-- check kalau kategori dan alternatif sama maka tampilkan bobot sub kriteria --}}
                            @foreach ($normalisasi as $i)
                              @if ($d->id == $i->id_alternatif && $item->id == $i->id_kriteria)
                                  {{-- menentukan perhitungan benefit atau cost --}}
                                  @if ($i->jenis == "Benefit")
                                      {{-- di kali dengan hasil AHP --}}
                                      @foreach ($hasil as $h)
                                          @if ($h->id == $i->id_kriteria)
                                              {{ ($i->bobot / $i->max_data) * $h->bobot_total }}
                                              @break
                                          @endif
                                      @endforeach
                                  @endif
                                  @if ($i->jenis == "Cost")
                                      {{-- di kali dengan hasil AHP --}}
                                      @foreach ($hasil as $h)
                                          @if ($h->id == $i->id_kriteria)
                                              {{ ($i->bobot / $i->min_data) * $h->bobot_total }}
                                              @break
                                          @endif
                                      @endforeach
                                  @endif
                              @endif
                            @endforeach
                          </td>
                        @endforeach
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{-- step 4 --}}
            <br>
            <br>
            <h3 class="pl-4">Step 3 : Hasil</h3>
            <div class="table-responsive px-4">
              <table class="table table-flush text-center data-table">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No</th>
                    <th style="font-size: 13px;">Nama</th>
                    @foreach ($kriteria as $item)
                        <th style="font-size: 13px;">{{ $item->kode_kriteria }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $d)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->nama_dosen }}</td>
                        @foreach ($kriteria as $item)
                          <td>
                            {{-- check kalau kategori dan alternatif sama maka tampilkan bobot sub kriteria --}}
                            @foreach ($normalisasi as $i)
                              @if ($d->id == $i->id_alternatif && $item->id == $i->id_kriteria)
                                  {{-- menentukan perhitungan benefit atau cost --}}
                                  @if ($i->jenis == "Benefit")
                                      {{-- di kali dengan hasil AHP --}}
                                      @foreach ($hasil as $h)
                                          @if ($h->id == $i->id_kriteria)
                                              {{ ($i->bobot / $i->max_data) * $h->bobot_total }}
                                              @break
                                          @endif
                                      @endforeach
                                  @endif
                                  @if ($i->jenis == "Cost")
                                      {{-- di kali dengan hasil AHP --}}
                                      @foreach ($hasil as $h)
                                          @if ($h->id == $i->id_kriteria)
                                              {{ ($i->bobot / $i->min_data) * $h->bobot_total }}
                                              @break
                                          @endif
                                      @endforeach
                                  @endif
                              @endif
                            @endforeach
                          </td>
                        @endforeach
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{--  --}}
          </div>
        </div>
      </div>
    </div>
@endsection

@push('page-scripts')
@endpush