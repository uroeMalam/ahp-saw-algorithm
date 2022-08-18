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
              <h2 class="mb-0">Nilai Preferensi AHP</h2>
              <div class="col-auto">
                <div class="form-actions">
                  <div class="text-right">
                    <button type="submit" class="btn btn-info btn-sm" id="tambah">Tambah Data</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive py-4">
              {{-- <table class="table table-flush text-center data-table">
                <thead class="thead-light">
                  <tr>
                    <th style="font-size: 13px;">No.</th>
                    <th style="font-size: 13px;">Kriteria A</th>
                    <th style="font-size: 13px">Kriteria B</th>
                    <th style="font-size: 13px">Bobot</th>
                    <th style="font-size: 13px">Actions</th>
                  </tr>
                </thead>
              </table> --}}
              <table>
                <thead>
                    <tr>
                        <th>Code</th>
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
                                        value="{{ $n->bobot }}"
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
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@push('page-scripts')
    <script type="text/javascript">
    $(document).ready(function () {
        
      // menjalankan tombol tambah
      $(document).on('click', '#tambah',function (e) {
          e.preventDefault();
          let element = $(this);
          show_loading(element, "full");
          $.ajax({
              type: 'get',
              url: "/nilaiahp/tambah",
              success: function(data) {
              hide_loading(element, '', 'full', ' Tambah Data');
              $('#modalDialogLabel').html("Tambah Data")
              $('#modalDialogSize').addClass("modal-lg")
              $('#modalDialogData').html(data);
              $('#modalDialog').modal({
                  backdrop: 'static'
              })
              $('#modalDialog').modal("show");
              }
          });
      });

      // menjalankan fungsi tambah
      $(document).on('submit', '#formCreate', function(e) {
          e.preventDefault();
          clear_error_withStyle()
          show_loading("#btnCreate", "full");
          $.ajax({
              url: '/nilaiahp/simpan',
              method: "POST",
              data: new FormData(this),
              dataType: 'JSON',
              contentType: false,
              cache: false,
              processData: false,
              success: function(data) {
                  hide_loading('#btnCreate', '', 'full', 'Create');
                  if (data.status) {
                      clearInput();
                      $('#modalDialog').modal("hide");
                      Swal.fire("Berhasil!", data.message, "success").then(function() {
                          location.reload();
                          console.log(data.data);
                      });
                  }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                  hide_loading('#btnCreate', '', 'full', 'Create');
                  check_errors_withStyle(xhr.responseJSON.errors);
              }
          });
      });


      // fungsi tombil edit
      $(document).on('click', '#edit',function (e) {
          e.preventDefault();
          let element = $(this);
          show_loading(element, "full");
          let id=$(this).attr('data-id');
          console.log(id);
          $.ajax({
              type: 'get',
              url: "/nilaiahp/edit/"+id,
              success: function(data) {
              hide_loading(element, 'edit', '', ' Edit');
              $('#modalDialogLabel').html("Edit")
              $('#modalDialogSize').addClass("modal-lg")
              $('#modalDialogData').html(data);
              $('#modalDialog').modal({
                  backdrop: 'static'
              })
              $('#modalDialog').modal("show");
              }
          });
      });

      // menjalankan fungsi edit
      $(document).on('submit', '#formEdit', function(e) {
        e.preventDefault();
        clear_error_withStyle()
        show_loading("#btnEdit", "");
        $.ajax({
            url: `/nilaiahp/update`,
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                hide_loading('#btnEdit', '', '', 'Edit');
                if (data.status) {
                    clearInput();
                    $('#modalDialog').modal("hide");
                    Swal.fire("Berhasil!", data.message, "success").then(function() {
                        table.ajax.reload();
                    });
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                hide_loading('#btnEdit', '', '', 'Edit');
                check_errors_withStyle(xhr.responseJSON.errors);
            }
        });
      });

      // fungsi tombol hapus
      $(document).on('click', '#hapusData', function(e) {
        e.preventDefault();
        var url = "{{ route('nilaiahp-delete') }}";
        var csrf= '{{ csrf_token() }}';
        var dataText= $(this).attr('data-text');
        var id= $(this).attr('data-id');
        deleteConfirm(url,table,dataText,csrf,id);
      });
    });
        
    </script>
@endpush