<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card card-box">
            <div class="card-head">
                <header>Form Tambah User</header>
            </div>
            <div class="card-body " id="bar-parent">
                <form action="<?= site_url('laporan/tampil') ?>" method="post">
                    <div class="form-group">
                        <label for="nopol">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai">
                      
                    </div>
                    <div class="form-group">
                        <label for="nopol">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai">
                      
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
