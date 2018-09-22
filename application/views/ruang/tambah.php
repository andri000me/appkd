<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Tambah Ruang</h2>
      </div>
      <div class="body">
        
       <form action="<?= site_url('ruang/simpan') ?>" method="post">
           
           <div class="form-group">
               <label for="nama_ruang">Nama Ruang</label>
               <input type="text" name="nama_ruang" class="form-control <?= form_error('nama_ruang')?'is-invalid':'' ?>" id="nama_ruang" placeholder="Masukkan Nama Ruang" value="<?= set_value('nama_ruang') ?>">
               <div class="invalid-feedback"><?= form_error('nama_ruang') ?></div>
           </div>
           <div class="form-group">
               <label for="fasilitas">Fasilitas</label>
               <textarea class="form-control <?= form_error('fasilitas')?'is-invalid':'' ?>" name="fasilitas" ></textarea>
               <div class="invalid-feedback"><?= form_error('fasilitas') ?></div>

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
