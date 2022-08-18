<div class="container-fluid">
    <form method="POST" id="formCreate">
        @csrf
        @method("POST")
        <div class="row">
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
            <div class="col">
                <div class="form-group">
                    <label for="nama_subkriteria">Nama Sub Kriteria</label>
                    <input type="text" class="form-control" id="nama_subkriteria" name="nama_subkriteria" value="" aria-describedby="nama_subkriteria">
                    <small class="d-none text-danger" id="nama_subkriteria"></small>
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
        </div>
        <div class="form-actions">
                <div class="text-right">
                    <button type="submit" class="btn btn-success" id="btnCreate">Tambah</button>
                </div>
            </div>
    </form>
</div>