<div class="container-fluid h-100">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Proyek</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 mt-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-dark">Daftar Proyek</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Client</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Pimpinan Proyek</th>
                            <th>Keterangan</th>
                            <th>Dibuat tanggal</th>
                            <th>Nama Lokasi</th>
                            <th>Negara</th>
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $.ajax({
            url: 'http://localhost:8080/api/proyek',
            method: 'GET',
            success: function (response) {
                var tbody = $('#dataTable tbody');
                tbody.empty();

                response.forEach(function (proyek, index) {
                    var row = $('<tr>');
                    row.append($('<td>').text(index + 1));
                    row.append($('<td>').text(proyek.namaProyek));
                    row.append($('<td>').text(proyek.client));
                    row.append($('<td>').text(formatTanggal(proyek.tglMulai)));
                    row.append($('<td>').text(formatTanggal(proyek.tglSelesai)));
                    row.append($('<td>').text(proyek.pimpinanProyek));
                    row.append($('<td>').text(proyek.keterangan));
                    row.append($('<td>').text(formatTanggal(proyek.createdAt)));

                    if (proyek.lokasiList && proyek.lokasiList.length > 0) {
                        var lokasi = proyek.lokasiList[0];
                        row.append($('<td>').text(lokasi.namaLokasi));
                        row.append($('<td>').text(lokasi.negara));
                        row.append($('<td>').text(lokasi.provinsi));
                        row.append($('<td>').text(lokasi.kota));
                    } else {
                        row.append($('<td colspan="4">').text('Lokasi tidak tersedia'));
                    }
                    row.append($('<td>').html('<button class="btn btn-primary btn-sm">Edit</button> <button class="btn btn-danger btn-sm">Delete</button>'));
                    tbody.append(row);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Gagal mengambil data proyek:', textStatus, errorThrown);
            }
        });

        function formatTanggal(tanggal) {
            var date = new Date(tanggal);
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }

    });
</script>