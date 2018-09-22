<?php $jenis = $this->input->get('jenis'); ?>


<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <h2 class="pull-right">Form Tambah Peminjaman <?= ucfirst($jenis) ?></h2>
      </div>
      <div class="body">
        
     <form action="<?=site_url('peminjaman/simpan')?>" method="post">
         <input type="hidden" name="jenis" value="<?= $jenis ?>">
         <input type="hidden" name="id" value="<?= $this->session->userdata('id_peminjaman'); ?>">
         <div class="form-group">
             <label for="id_peminjam">No Surat</label>
             <select name="id_peminjam" class="form-control">
                 <option  selected disabled >Pilih No Surat</option>
                 <?php foreach ($peminjam as $row): ?>
                     <option value="<?=$row->id?>"><?=$row->no_surat?></option>
                 <?php endforeach?>
             </select>
         </div>
         <div class="form-group  <?=$jenis=='mobil'?'d-none':''?> ">
             <label for="ruang_id">Ruang yang dipinjam</label>
             <select name="ruang_id" class="form-control">
                 <option value="" selected disabled >Pilih Ruang</option>
                 <?php foreach ($ruang as $row): ?>
                     <option value="<?=$row->id?>"><?=$row->nama_ruang?></option>
                 <?php endforeach?>
             </select>
             <div class="invalid-feedback"><?=form_error('ruang_id')?></div>
         </div>
         <div class="form-group <?=$jenis=='ruang'?'d-none':''?>">
             <label for="mobil_id">Mobil yang dipinjam</label>
             <select name="mobil_id" class="form-control">
                 <option value="" selected disabled >Pilih Mobil</option>
                 <?php foreach ($mobil as $row): ?>
                     <option value="<?=$row->id?>"><?=$row->merk . '--' . $row->nopol?></option>
                 <?php endforeach?>
             </select>
             <div class="invalid-feedback"><?=form_error('mobil_id')?></div>
         </div>
         <div class="form-group <?=$jenis=='ruang'?'d-none':''?>">
             <label for="tempat">Tujuan</label>
             <input type="text" class="form-control <?=form_error('tempat') ? 'is-invalid' : ''?>" id="tempat"  name="tempat" value="<?=set_value('tempat')?>" >
            <div class="invalid-feedback"><?=form_error('tempat')?></div>
            <span class="text-info"><i>Tempat tujuan mobil akan dipinjam</i></span>
         </div>
         <div class="form-group">
             <label for="acara">Nama Acara</label>
             <input type="text" class="form-control <?=form_error('acara') ? 'is-invalid' : ''?>" id="acara"  name="acara" value="<?=set_value('acara')?>" >
            <div class="invalid-feedback"><?=form_error('acara')?></div>
         </div>
         <div class="form-group">
             <label for="tanggal_peminjaman">Tanggal Pinjam</label>
             <input onchange="pilihTanggal()" type="date" class="form-control <?=form_error('tanggal_peminjaman') ? 'is-invalid' : ''?>" id="tanggal_peminjaman"  name="tanggal_peminjaman" value="<?=set_value('tanggal_peminjaman')?>" >
            <div class="invalid-feedback"><?=form_error('tanggal_peminjaman')?></div>
         </div>
         <div class="form-group  <?=$jenis=='ruang'?'d-none':''?>">
             <label for="ruang_id">Lama Pinjam ( hari )</label>
             <input type="date" class="form-control <?=form_error('tanggal_selesai') ? 'is-invalid' : ''?>" id="tanggal_selesai"  name="tanggal_selesai" value="<?=set_value('tanggal_selesai')?>" >
            <div class="invalid-feedback"><?=form_error('tanggal_selesai')?></div>
         </div>

         <div class="form-group  <?=$jenis=='mobil'?'d-none':''?>">
             <label for="ruang_id">Jam (ex: 08.00)</label>
             <input type="number" class="form-control <?=form_error('jam') ? 'is-invalid' : ''?>" id="jam"  name="jam" value="<?=set_value('jam')?>" >
         </div>
         <div class="form-group">
            <label for="jumlah_peserta">Jumlah Peserta</label>
            <input type="text" class="form-control <?=form_error('jumlah_peserta') ? 'is-invalid' : ''?>" id="jumlah_peserta"  name="jumlah_peserta" value="<?=set_value('jumlah_peserta')?>" >
           <div class="invalid-feedback"><?=form_error('jumlah_peserta')?></div>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <div class="form-group  <?=$jenis=='mobil'?'d-none':''?>">
            <label for="perlengkapan_id">Perlengkapan</label>
                 <table class="table table-bordered"  >
                 <tr>
                     <td>Nama Perlengkapan</td>
                     <td>Jumlah</td>
                     <td>Aksi</td>
                 </tr>
            <?php foreach ($perlengkapan as $row): ?>
                     <form id="form-detail<?=$row->id?>" >
                          <input type="hidden" name="peminjam_id" value="<?= $this->session->userdata('id_peminjaman'); ?>">
                         <input type="hidden" name="perlengkapan_id" value="<?= $row->id ?>">
                          <tr>
                              <td><?=$row->nama_perlengkapan?></td>
                              <td>
                                 <input placeholder="Masukkan jumlah yg akan dipinjam" type="number" name="jumlah_<?= $row->id?>">
                                 <p id="stok_<?=$row->id ?>">Stok tersedia <?= $row->jumlah ?></p>
                             </td>
                              <td><button class="btn btn-primary" type="button" onclick="simpanDetail(<?= $row->id?>)">Tambahkan</button></td>
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


<script type="text/javascript">


    function simpanDetail(id) {
        var jumlah = $(`input[name=jumlah_${id}`).val()
        var peminjaman_id = "<?=  $this->session->userdata('id_peminjaman') ?>";
        $.ajax({
            url:"<?= site_url('peminjaman_detail/simpan') ?>",
            type:"POST",
            data:{
                perlengkapan_id:id,
                jumlah:jumlah,
                peminjaman_id:peminjaman_id
            },
            success:(response)=>{
                loadTable()
                pilihTanggal()
                $(`input[name=jumlah_${id}`).val('');
                // location.reload();
            },
            error:(error)=>{

            }
        })
    }

    function loadTable() {
        // body...
        $('#tabel-perlengkapan > tbody').html('')
        var peminjaman_id = "<?=  $this->session->userdata('id_peminjaman') ?>";
        $.get("<?= site_url('peminjaman_detail/get_peminjaman_detail/') ?>"+peminjaman_id,{},(response)=>{
            console.log(response)
            $.each(response,(key,val)=>{
                let output=''
                output+=`<tr>
                                <td>${val.nama_perlengkapan}</td>
                                <td>${val.jumlah}</td>
                                <td>
                                    <button type="button" class="btn btn-danger" onclick="hapus(${val.id},${val.perlengkapan_id},${val.jumlah})" >Hapus</button>
                                </td>
                        </tr>`
                $('#tabel-perlengkapan > tbody').append(output)
            })
        },'JSON')
    }

    function hapus(id,perlengkapan_id,jumlah) {
        // body...
        $.post("<?= site_url('peminjaman_detail/hapus/') ?>",{id:id,perlengkapan_id:perlengkapan_id,jumlah:jumlah},(response)=>{
            if (response.success) {
               loadTable();
               pilihTanggal();
            }
        },'JSON')
    }

    function pilihTanggal() {

        // body...
        var jumlah_kursi,jumlah_meja,jumlah_sound,jumlah_layos;
        var tanggal =  $('#tanggal_peminjaman').val()
        $.post("<?= site_url('peminjaman/get_jumlah_perlengkapan') ?>",{tanggal:tanggal},(response)=>{
            console.log(response)
            $.each(response,(key,val)=>{
              
                $(`#stok_${val.perlengkapan_id}`).text(`Stok Tersedia ${val.qty-val.jumlah}`)
            })
        },'JSON')
    }

</script>
