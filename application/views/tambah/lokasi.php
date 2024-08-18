<div class="container-fluid h-100">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Proyek</h1>
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputLokasi">Nama Lokasi</label>
                <input type="text" class="form-control" id="inputLokasi" placeholder=" Nama Lokasi">
            </div>
            <div class="form-group col-md-6">
                <label for="inputNegara">Negara</label>
                <input type="text" class="form-control" id="inputNegara" placeholder="Negara">
            </div>
        </div>
        <div class="form-group">
            <label for="inputProvinsi">Provinsi</label>
            <input type="text" class="form-control" id="inputProvinsi" placeholder="Provinsi">
        </div>
        <div class="form-group">
            <label for="inputKota">Kota</label>
            <input type="text" class="form-control" id="inputKota" placeholder="Kota">
        </div>
        <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
</div>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('form').on('submit', function (e) {
            e.preventDefault();


            var namaLokasi = $('#inputLokasi').val();
            var negara = $('#inputNegara').val();
            var provinsi = $('#inputProvinsi').val();
            var kota = $('#inputKota').val();

            var data = {
                "namaLokasi": namaLokasi,
                "negara": negara,
                "provinsi": provinsi,
                "kota": kota,
            };

            $.ajax({
                url: 'http://localhost:8080/api/lokasi',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function (response) {
                    console.log('Lokasi berhasil ditambahkan:', response);
                    alert('Lokasi berhasil ditambahkan!');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Gagal menambahkan proyek:', textStatus, errorThrown);
                    alert('Gagal menambahkan Lokasi!');
                }
            });
        });

    });
</script>