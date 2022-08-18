<div class="container-fluid">
    <form method="POST" id="formEdit">
        @csrf
        @method("POST")
        <input type="text" class="form-control" id="id" name="id" value="{{ $id }}" aria-describedby="id" hidden>
        
        <div class="row">
            <div class="col-sm-8">
                <div class="form-group">    
                    <label for="bobot">Kriteria A</label>                
                    <select class="form-control" id="id_kriteria_a" name="id_kriteria_a">
                        <option value="">Pilih Kriteria A</option>
                        @foreach ($kriteria as $k)
                            <option value="{{ $k->id }}" {{ ($k->id == $data->id_kriteria_a) ? "selected" : ""}}>{{ $k->nama_kriteria }}</option>
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
                            <option value="{{ $k->id }}" {{ ($k->id == $data->id_kriteria_b) ? "selected" : ""}}>{{ $k->nama_kriteria }}</option>
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
                    <input type="number" class="form-control" id="bobot" name="bobot" value="{{ $data->bobot }}" aria-describedby="bobot">
                    <small class="d-none text-danger" id="bobot"></small>
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