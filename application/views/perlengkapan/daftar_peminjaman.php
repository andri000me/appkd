<?php if ($this->session->userdata('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong><?= $this->session->userdata('success'); ?>.
    </div>
<?php endif ?>

<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
      <a href="<?= site_url('penanggung_jawab/tambah') ?>" class="btn btn-primary" title="Tambah">Tambah</a>
        <h2 class="pull-right">Daftar Penanggung Jawab</h2>
      </div>
      <div class="body">
        <div class="table-responsive">
          <table class="table">
           <thead>
               <tr>
                   <th>No</th>
                   <th>No Surat</th>
                   <th>Tanggal Peminjaman</th>
                   <th>Peralatan</th>
                   <th>Jumlah Peserta</th>
                   <th>Status</th>
                   <th>Keterangan</th>
                   <th>Foto</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               <?php $no=1 ?>
               <?php foreach ($peminjaman as $row): ?>
                   <tr>
                       <td><?= $no ?></td>
                       <td><?= getColumn('peminjam',['id'=>$row->peminjam_id])->no_surat ?></td>
                       <td><?= $row->tanggal_peminjaman ?></td>
                       <td>
                           <?php foreach ($peminjaman_detail->get_peminjaman_detail($row->id) as $d): ?>
                               <ul>
                                   <li><?= getColumn('perlengkapan',['id'=>$d->perlengkapan_id])->nama_perlengkapan ?>@<?=$d->jumlah?></li>
                               </ul>
                           <?php endforeach ?>
                       </td>
                       <td><?= $row->jumlah_peserta ?></td>
                       <td><?= $row->status ?></td>
                       <td><?= $row->keterangan ?></td>
                       <td></td>
                       <td>
                           <a href="<?= site_url('perlengkapan/edit_peminjaman/'.$row->id) ?>" class="btn btn-warning" title="Edit">Edit</a>
                           <a onclick="return confirm('Apakah anda yakin akan hapus?')" href="<?= site_url('perlengkapan/delete_peminjaman/'.$row->id) ?>" class="btn btn-danger" title="Hapus">Hapus</a>
                           <a class="btn btn-success" href="<?= site_url('perlengkapan/copy/'.$row->id) ?>"> Copy</a>
                       </td>
                   </tr>
                   <?php $no++ ?>
               <?php endforeach ?>
           </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>
</div>




