<div class="container-fluid h-100">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Proyek</h1>
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Nama Proyek</label>
                <input type="text" class="form-control" id="inputName" placeholder=" Nama Proyek">
            </div>
            <div class="form-group col-md-6">
                <label for="inputClient">Client</label>
                <input type="text" class="form-control" id="inputClient" placeholder="Client">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputTglMulai">Tanggal Mulai</label>
                <input class="form-control datepicker" id="inputTglMulai" data-date-format="mm/dd/yyyy"
                    placeholder="Tanggal Mulai">
            </div>
            <div class="form-group col-md-6">
                <label for="inputTglSelesai">Tanggal Selesai</label>
                <input class="form-control datepicker" id="inputTglSelesai" data-date-format="mm/dd/yyyy"
                    placeholder="Tanggal Selesai">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPimpinan">Pimpinan Proyek</label>
            <input type="text" class="form-control" id="inputPimpinan" placeholder="Pimpinan Proyek">
        </div>
        <div class="form-group">
            <label for="inputKeterangan">Keterangan</label>
            <textarea class="form-control" id="inputKeterangan" rows="3"></textarea>
        </div>
        <select class="form-control form-control-lg" id="lokasiSelect">
            <option value="">Pilih Lokasi</option>
        </select>
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
</div>