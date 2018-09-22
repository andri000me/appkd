<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Edit Mobil</h2>
      </div>
      <div class="body">
        
       <form action="<?= site_url('mobil/update') ?>" method="post">
           <input type="hidden" name="id" value="<?= $mobil->id ?>">
           <div class="form-group">
               <label for="nopol">No. Polisi</label>
               <input type="text" name="nopol" class="form-control <?= form_error('nopol')?'is-invalid':'' ?>" id="nopol" placeholder="Masukkan No Polisi" value="<?= $mobil->nopol ?>">
               <div class="invalid-feedback"><?= form_error('nopol') ?></div>
           </div>
           <div class="form-group">
               <label for="merk">Merk Mobil</label>
               <input type="text" class="form-control <?= form_error('merk')?'is-invalid':'' ?>" id="merk" placeholder="Masukkan Merk Mobil" name="merk" value="<?= $mobil->merk ?>" >
              <div class="invalid-feedback"><?= form_error('merk') ?></div>
           </div>
           <div class="form-group">
               <label for="penanggung_jawab_id">Penanggung Jawab</label>
               <select name="penanggung_jawab_id" class="form-control">
                   <option disabled selected >Pilih Penanggung Jawab</option>
                   <?php foreach ($penanggung_jawab as $p): ?>
                       <option <?= $p->id==$mobil->penanggung_jawab_id?'selected':'' ?> value="<?= $p->id ?>" ><?= $p->nama ?></option>
                   <?php endforeach ?>
               </select>
              <div class="invalid-feedback"><?= form_error('penanggung_jawab_id') ?></div>
           </div>
           <button type="submit" class="btn btn-primary">Update</button>
           <a href="<?= site_url('mobil') ?>" class="btn btn-warning">Batal</a>
       </form>
      </div>
    </div>
    
  </div>
</div>
