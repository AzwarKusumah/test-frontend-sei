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
                            <th>Nama Lokasi</th>
                            <th>Negara</th>
                            <th>Provinsi</th>
                            <th>Kota</th>
                            <th>Tanggal</th>
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
            url: 'http://localhost:8080/api/lokasi',
            method: 'GET',
            success: function (response) {
                var tbody = $('#dataTable tbody');
                tbody.empty();

                response.forEach(function (lokasi, index) {
                    var row = $('<tr>');
                    row.append($('<td>').text(index + 1));
                    row.append($('<td>').text(lokasi.namaLokasi));
                    row.append($('<td>').text(lokasi.negara));
                    row.append($('<td>').text(lokasi.provinsi));
                    row.append($('<td>').text(lokasi.kota));
                    row.append($('<td>').text(formatTanggal(lokasi.createdAt)));

                    var editButton = $('<button>', {
                        class: 'btn btn-primary btn-sm',
                        text: 'Edit',
                        click: function () {
                            window.location.href = `<?= base_url('edit/lokasi/') ?>${lokasi.id}`;
                        }
                    });

                    var deleteButton = $('<button>', {
                        class: 'btn btn-danger btn-sm',
                        text: 'Delete',
                        click: function () {
                            if (confirm('Apakah Anda yakin ingin menghapus lokasi ini?')) {
                                deleteProyek(lokasi.id, row);
                            }
                        }
                    });

                    row.append($('<td>').append(editButton).append(' ').append(deleteButton));
                    tbody.append(row);
                });
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('Gagal mengambil data lokasi:', textStatus, errorThrown);
            }
        });

        function formatTanggal(tanggal) {
            var date = new Date(tanggal);
            var options = { year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }

        function deleteProyek(id, rowElement) {
            $.ajax({
                url: `http://localhost:8080/api/lokasi/${id}`,
                method: 'DELETE',
                success: function () {
                    alert('Proyek berhasil dihapus');
                    rowElement.remove();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Gagal menghapus lokasi:', textStatus, errorThrown);
                    alert('Gagal menghapus lokasi!');
                }
            });
        }

    });
</script>