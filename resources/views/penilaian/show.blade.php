<div class="container-fluid">
    <form method="POST" id="formEdit">
        @csrf
        @method("POST")

        <h2>Nama : {{ $data[0]->nama_dosen}}</h2>
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
                @foreach ($data as $i => $k)
                    <tr>
                        <td>{{ $i+1 }}</td>
                        <td>{{ $k->kode_kriteria }}</td>
                        <td>{{ $k->nama_kriteria }}</td>
                        <td>{{ $k->nama_subkriteria }}</td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</div>