<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Edit Peminjaman</h2>
      </div>
      <div class="body">
        
    <?php
         $jenis = '';
         if ($peminjaman->mobil_id > 0) {
             $jenis = 'mobil';
         } elseif ($peminjaman->ruang_id > 0) {
             $jenis = 'ruang';
         } else {
             $jenis = '';
         }
     ?>
     <form action="<?=site_url('peminjaman/update')?>" method="post">
         <input type="hidden" name="jenis" value="<?=$jenis?>">
         <input type="hidden" name="id" value="<?=$peminjaman->id?>">
         <div class="form-group">
             <label for="id_peminjam">No Surat</label>
             <select name="id_peminjam" class="form-control">
                 <option  selected disabled >Pilih No Surat</option>
                 <?php foreach ($peminjam as $row): ?>
                     <option <?=$peminjaman->peminjam_id == $row->id ? 'selected' : ''?> value="<?=$row->id?>"><?=$row->no_surat?></option>
                 <?php endforeach?>
             </select>
         </div>
         <div class="form-group  <?=$peminjaman->ruang_id < 1 ? 'd-none' : ''?> ">
             <label for="ruang_id">Ruang yang dipinjam</label>
             <select name="ruang_id" class="form-control">
                 <option value="" selected disabled >Pilih Ruang</option>
                 <?php foreach ($ruang as $row): ?>
                     <option <?=$peminjaman->ruang_id == $row->id ? 'selected' : ''?> value="<?=$row->id?>"><?=$row->nama_ruang?></option>
                 <?php endforeach?>
             </select>
             <div class="invalid-feedback"><?=form_error('ruang_id')?></div>
         </div>
         <div class="form-group <?=$peminjaman->mobil_id < 1 ? 'd-none' : ''?>">
             <label for="mobil_id">Mobil yang dipinjam</label>
             <select name="mobil_id" class="form-control">
                 <option value="" selected disabled >Pilih Mobil</option>
                 <?php foreach ($mobil as $row): ?>
                     <option <?=$peminjaman->mobil_id == $row->id ? 'selected' : ''?> value="<?=$row->id?>"><?=$row->merk . '--' . $row->nopol?></option>
                 <?php endforeach?>
             </select>
             <div class="invalid-feedback"><?=form_error('mobil_id')?></div>
         </div>
         <div class="form-group <?=$peminjaman->mobil_id < 1 ? 'd-none' : ''?>">
             <label for="tempat">Tujuan</label>
             <input type="text" class="form-control <?=form_error('tempat') ? 'is-invalid' : ''?>" id="tempat"  name="tempat" value="<?=$peminjaman->tempat?>" >
            <div class="invalid-feedback"><?=form_error('tempat')?></div>
            <span class="text-info"><i>Tempat tujuan mobil akan dipinjam</i></span>
         </div>
         <div class="form-group <?=$peminjaman->ruang_id < 1 ? 'd-none' : ''?>">
             <label for="acara">Nama Acara</label>
             <input type="text" class="form-control <?=form_error('acara') ? 'is-invalid' : ''?>" id="acara"  name="acara" value="<?=$peminjaman->acara?>" >
            <div class="invalid-feedback"><?=form_error('acara')?></div>
         </div>
         <div class="form-group">
             <label for="tanggal_peminjaman">Tanggal Pinjam</label>
             <input onchange="pilihTanggal()" type="date" class="form-control <?=form_error('tanggal_peminjaman') ? 'is-invalid' : ''?>" id="tanggal_peminjaman"  name="tanggal_peminjaman" value="<?=$peminjaman->tanggal_peminjaman?>" >
            <div class="invalid-feedback"><?=form_error('tanggal_peminjaman')?></div>
         </div>
         <div class="form-group  <?=$jenis=='ruang'?'d-none':''?>">
             <label for="ruang_id">Lama Pinjam ( hari )</label>
             <input type="date" class="form-control <?=form_error('tanggal_selesai') ? 'is-invalid' : ''?>" id="tanggal_selesai"  name="tanggal_selesai" value="<?=$peminjaman->tanggal_selesai?>" >
            <div class="invalid-feedback"><?=form_error('tanggal_selesai')?></div>
         </div>
         <div class="form-group">
            <label for="jumlah_peserta">Jumlah Peserta</label>
            <input type="text" class="form-control <?=form_error('jumlah_peserta') ? 'is-invalid' : ''?>" id="jumlah_peserta"  name="jumlah_peserta" value="<?=$peminjaman->jumlah_peserta?>" >
           <div class="invalid-feedback"><?=form_error('jumlah_peserta')?></div>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control"><?=$peminjaman->keterangan?></textarea>
        </div>
      <!--   <div class="form-group">
            <label for="status">Mobil yang dipinjam</label>
            <select name="status" class="form-control">
                <option value="" selected disabled >Pilih Mobil</option>
                <?php foreach ($mobil as $row): ?>
                    <option <?=$peminjaman->mobil_id == $row->id ? 'selected' : ''?> value="<?=$row->id?>"><?=$row->merk . '--' . $row->nopol?></option>
                <?php endforeach?>
            </select>
            <div class="invalid-feedback"><?=form_error('mobil_id')?></div>
        </div> -->
        <div class="form-group <?=$peminjaman->ruang_id < 1 ? 'd-none' : ''?>">
            <label for="perlengkapan_id">Perlengkapan</label>
                 <table class="table table-bordered"  >
                 <tr>
                     <td>Nama Perlengkapan</td>
                     <td>Jumlah</td>
                     <td>Aksi</td>
                 </tr>
            <?php foreach ($perlengkapan as $row): ?>
                     <form id="form-detail<?=$row->id?>" >
                          <input type="hidden" name="peminjam_id" value="<?=$this->session->userdata('id_peminjaman');?>">
                         <input type="hidden" name="perlengkapan_id" value="<?=$row->id?>">
                          <tr>
                              <td><?=$row->nama_perlengkapan?></td>
                              <td>
                                 <input placeholder="Masukkan jumlah yg akan dipinjam" type="number" name="jumlah_<?=$row->id?>">
                                 <p id="stok_<?=$row->id?>">Stok tersedia <?=$row->jumlah?></p>
                             </td>
                              <td><button class="btn btn-primary" type="button" onclick="simpanDetail(<?=$row->id?>)">Tambahkan</button></td>
                          </tr>
               </form>
            <?php endforeach?>
         </table>
         <h3>Peralatan yang dipinjam</h3>
         <table class="table table-bordered" id="tabel-perlengkapan">
             <thead>
                 <tr>
                     <td>Nama Perlengkapan</td>
                     <td>Jumlah</td>
                     <td>Aksi</td>
                 </tr>
             </thead>
             <tbody>
               <?php foreach ($peminjaman_detail as $d): ?>
                 <tr>
                   <td><?= $d->nama_perlengkapan ?></td>
                   <td><?= $d->jumlah ?></td>
                   <td><a class="btn btn-danger" href="<?= site_url('peminjaman_detail/delete/'.$d->id.'/'.$peminjaman->id) ?>">Hapus</a></td>
                 </tr>
               <?php endforeach ?>
             </tbody>
         </table>
            </div>
            <div class="form-group">
                <label for="penanggung_jawab_id" class="control-label">Penanggung Jawab</label>
                <select name="penanggung_jawab_id" class="form-control">
                    <?php foreach ($penanggung_jawab as $row): ?>
                        <option value="<?=$row->id?>"><?=$row->nama?></option>

                    <?php endforeach?>
                </select>
            </div>
         <button type="submit" class="btn btn-primary">Simpan</button>
     </form>
      </div>
    </div>
    
  </div>
</div>
