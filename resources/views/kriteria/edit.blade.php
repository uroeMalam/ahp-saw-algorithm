<div class="container-fluid">
    <form method="POST" id="formEdit">
        @csrf
        @method("POST")
        <input type="text" class="form-control" id="id" name="id" value="{{ $id }}" aria-describedby="id" hidden>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="kode_kriteria">Kode Kriteria</label>
                    <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria" value="{{ $data->kode_kriteria }}" aria-describedby="kode_kriteria">
                    <small class="d-none text-danger" id="kode_kriteria"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="nama_kriteria">Nama Kriteria</label>
                    <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ $data->nama_kriteria }}" aria-describedby="nama_kriteria">
                    <small class="d-none text-danger" id="nama_kriteria"></small>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">      
                    <label for="bobot">Jenis Kriteria</label>              
                    <select class="form-control" id="jenis" name="jenis">
                        <option value=""  {{ ($data->jenis == "") ? "selected" : ""}}>Pilihan Jenis</option>
                        <option value="Benefit" {{ ($data->jenis == "Benefit") ? "selected" : ""}}> Benefit</option>
                        <option value="Cost" {{ ($data->jenis == "Cost") ? "selected" : ""}}> Cost</option>
                    </select>
                    <small class="d-none text-danger" id="jenis"></small>
                </div>
            </div>
        </div>

        <div class="form-actions">
                <div class="text-right">
                    <button type="submit" class="btn btn-info" id="btnEdit">Edit</button>
                </div>
            </div>
    </form>
</div>