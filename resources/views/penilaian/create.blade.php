<div class="container-fluid">
    <form method="POST" id="formCreate">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col-sm">
                <div class="form-group">   
                    <label for="bobot">Dosen</label>                 
                    <select class="form-control" id="id_alternatif" name="id_alternatif">
                        <option value="">Pilih Dosen</option>
                        @foreach ($alternatif as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_dosen }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_alternatif"></small>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="bobot">Kriteria</label>                    
                    <select class="form-control" id="id_kriteria" name="id_kriteria">
                        <option value="">Pilih Kriteria</option>
                        @foreach ($kriteria as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_kriteria }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_kriteria"></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="bobot">Nilai</label>                  
                    <select class="form-control" id="id_subkriteria" name="id_subkriteria">
                        <option value="">Pilih Nilai</option>
                        @foreach ($subkriteria as $n)
                            <option value="{{ $n->id }}">{{ $n->nama_subkriteria }}</option>
                        @endforeach
                    </select>
                    <small class="d-none text-danger" id="id_subkriteria"></small>
                </div>
            </div>
        </div> --}}

        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Kriteria</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kriteria as $i => $k)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $k->kode_kriteria }}</td>
                        <td>{{ $k->nama_kriteria }}</td>
                        <td>
                            <input type="test" id="id_kriteria" name="id_kriteria[{{ $k->id }}]" value="{{ $k->id }}" hidden>
                            <select class="form-control" id="id_subkriteria" name="id_subkriteria[{{ $k->id }}]">
                                @foreach ($subkriteria as $n)
                                    @if ($n->id_kriteria == $k->id)
                                        <option value="{{ $n->id }}">{{ $n->nama_subkriteria }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="form-actions">
                <div class="text-right">
                    <button type="submit" class="btn btn-success" id="btnCreate">Tambah</button>
                </div>
            </div>
    </form>
</div>