<?php if ($this->session->userdata('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong><?= $this->session->userdata('success'); ?>.
    </div>
<?php endif ?>


<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Tambah Mobil</h2>
      </div>
      <div class="body">
        
        <form action="<?= site_url('mobil/simpan') ?>" method="post">
            <div class="form-group">
                <label for="nopol">No. Polisi</label>
                <input type="text" name="nopol" class="form-control <?= form_error('nopol')?'is-invalid':'' ?>" id="nopol" placeholder="Masukkan No Polisi" value="<?= set_value('nopol') ?>">
                <div class="invalid-feedback"><?= form_error('nopol') ?></div>
            </div>
            <div class="form-group">
                <label for="merk">Merk Mobil</label>
                <input type="text" class="form-control <?= form_error('merk')?'is-invalid':'' ?>" id="merk" placeholder="Masukkan Merk Mobil" name="merk" value="<?= set_value('merk') ?>" >
               <div class="invalid-feedback"><?= form_error('merk') ?></div>
            </div>
            <div class="form-group">
                <label for="penanggung_jawab_id">Penanggung Jawab</label>
                <select name="penanggung_jawab_id" class="form-control">
                    <option disabled selected >Pilih Penanggung Jawab</option>
                    <?php foreach ($penanggung_jawab as $p): ?>
                        <option value="<?= $p->id ?>" ><?= $p->nama ?></option>
                    <?php endforeach ?>
                </select>
               <div class="invalid-feedback"><?= form_error('penanggung_jawab_id') ?></div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
    
  </div>
</div>

