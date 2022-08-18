<div class="container-fluid">
    <form method="POST" id="formCreate">
        @csrf
        @method("POST")
        
        {{-- <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="bobot">Kriteria A</label>                  
                    <select class="form-control" id="id_kriteria_a" name="id_kriteria_a">
                        <option value="">Pilih Kriteria A</option>
                        @foreach ($kriteria as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kriteria}}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_kriteria_a"></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="form-group"> 
                    <label for="bobot">Kriteria B</label>                        
                    <select class="form-control" id="id_kriteria_b" name="id_kriteria_b">
                        <option value="">Pilih Kriteria B</option>
                        @foreach ($kriteria as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kriteria}}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_kriteria_b"></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="bobot">Bobot</label>
                    <input type="number" class="form-control" id="bobot" name="bobot" value="" aria-describedby="bobot">
                    <small class="d-none text-danger" id="bobot"></small>
                </div>
            </div>
        </div> --}}

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
                        {{-- id dan name nya itu id_kriteria_a_iteration --}}
                        {{-- id dan name nya itu id_kriteria_b_iteration --}}
                        {{-- id dan name nya itu data_iteration --}}
                        <input type="text" value="{{ $row->id }}" name="id_kriteria_a_{{ $loop->iteration + ((($keyCol+1) * 10) - 10) }}" id="id_kriteria_a_{{ $loop->iteration + ((($keyCol+1) * 10) - 10) }}" hidden>
                        <input type="text" value="{{ $col->id }}" name="id_kriteria_b_{{ $loop->iteration + ((($keyCol+1) * 10) - 10) }}" id="id_kriteria_b_{{ $loop->iteration + ((($keyCol+1) * 10) - 10) }}" hidden>
                        <input class="form-control" type="number" name="data_{{ $loop->iteration + ((($keyCol+1) * 10) - 10) }}" id="data_{{ $loop->iteration + ((($keyCol+1) * 10 )- 10)}}" 
                            {{-- checker kalau row dan colum nya sama makaform di disable --}}
                            {{ ($col->id == $row->id) ? "readonly" : "" }}
                            {{-- to prevent user changing the value, form will be disable automaticly--}}
                            {{ ($col->id < $row->id) ? "readonly" : ""  }}
                            {{-- checker kalau row dan colum nya sama maka data default 1 --}}
                            @if ($col->id == $row->id)
                                value="1"
                            @endif
                            @foreach ($nilai as $n)
                                {{-- get data from database if avaiable --}}
                                @if ($row->id == $n->id_kriteria_a && $col->id == $n->id_kriteria_b)
                                    value="{{ $n->bobot }}"
                                    @break
                                @endif
                                {{-- get data from database and devide by 1 --}}
                                @if ($col->id == $n->id_kriteria_a && $row->id == $n->id_kriteria_b)
                                    value="{{ 1 / ($n->bobot == 0 ? 0 : $n->bobot ) }}"
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
        <div class="form-actions">
                <div class="text-right">
                    <button type="submit" class="btn btn-success" id="btnCreate">Tambah</button>
                </div>
            </div>
    </form>
</div>