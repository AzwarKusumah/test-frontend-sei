<div class="container-fluid h-100">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tambah Proyek</h1>
    <form action="#" method="PUT">
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
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        // Fetch data lokasi dari API dan isi dropdown
        $.ajax({
            url: 'http://localhost:8080/api/lokasi',
            method: 'GET',
            success: function (response) {
                var lokasiSelect = $('#lokasiSelect');
                response.forEach(function (lokasi) {
                    var option = $('<option>', {
                        value: lokasi.id,
                        text: lokasi.namaLokasi
                    });
                    lokasiSelect.append(option);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Gagal mengambil data lokasi:', textStatus, errorThrown);
            }
        });

        // Submit form untuk menambahkan proyek
        $('form').on('submit', function (e) {
            e.preventDefault(); // Mencegah form dari submit default

            // Ambil nilai dari input form
            var namaProyek = $('#inputName').val();
            var client = $('#inputClient').val();
            var tglMulai = $('#inputTglMulai').val();
            var tglSelesai = $('#inputTglSelesai').val();
            var pimpinanProyek = $('#inputPimpinan').val();
            var keterangan = $('#inputKeterangan').val();
            var lokasiId = $('#lokasiSelect').val();

            // Format tanggal menjadi format ISO
            var formattedTglMulai = new Date(tglMulai).toISOString();
            var formattedTglSelesai = new Date(tglSelesai).toISOString();

            // Data yang akan di-post
            var data = {
                "namaProyek": namaProyek,
                "client": client,
                "tglMulai": formattedTglMulai,
                "tglSelesai": formattedTglSelesai,
                "pimpinanProyek": pimpinanProyek,
                "keterangan": keterangan,
                "lokasiList": [
                    {
                        "id": lokasiId
                    }
                ]
            };

            // POST request menggunakan jQuery AJAX
            $.ajax({
                url: 'http://localhost:8080/api/proyek',
                method: 'PUT',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: function (response) {
                    console.log('Proyek berhasil ditambahkan:', response);
                    alert('Proyek berhasil ditambahkan!');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Gagal menambahkan proyek:', textStatus, errorThrown);
                    alert('Gagal menambahkan proyek!');
                }
            });
        });

    });
</script>