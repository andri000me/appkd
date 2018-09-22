<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Edit Perlengkapan</h2>
      </div>
      <div class="body">
        <form action="<?= site_url('perlengkapan/update') ?>" method="post">
            <input type="hidden" name="id" value="<?= $perlengkapan->id ?>">
            <div class="form-group">
                <label for="nama_perlengkapan">Nama Perlengkapan</label>
                <input type="text" name="nama_perlengkapan" class="form-control <?= form_error('nama_perlengkapan')?'is-invalid':'' ?>" id="nama_perlengkapan" placeholder="Masukkan Nama Perlengkapan" value="<?= $perlengkapan->nama_perlengkapan ?>">
                <div class="invalid-feedback"><?= form_error('nama_perlengkapan') ?></div>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" class="form-control <?= form_error('jumlah')?'is-invalid':'' ?>" id="jumlah" placeholder="Jumlah" name="jumlah" value="<?= $perlengkapan->jumlah ?>" >
               <div class="invalid-feedback"><?= form_error('jumlah') ?></div>
            </div>
            <div class="form-group">
                <label for="penanggung_jawab_id">Penanggung Jawab</label>
                <select name="penanggung_jawab_id" class="form-control">
                    <option disabled selected >Pilih Penanggung Jawab</option>
                    <?php foreach ($penanggung_jawab as $p): ?>
                        <option  <?= $p->id==$perlengkapan->penanggung_jawab_id?'selected':'' ?> value="<?= $p->id ?>" ><?= $p->nama ?></option>
                    <?php endforeach ?>
                </select>
               <div class="invalid-feedback"><?= form_error('penanggung_jawab_id') ?></div>
            </div>
          
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= site_url('perlengkapan') ?>" class="btn btn-warning">Batal</a>
        </form>
      </div>
    </div>
  </div>
</div>


