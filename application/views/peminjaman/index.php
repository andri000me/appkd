<?php $jenis = $this->input->get('jenis'); ?>

<?php if ($this->session->userdata('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong><?= $this->session->userdata('success'); ?>.
    </div>
<?php endif ?>


<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <a href="<?= site_url('peminjaman/tambah?jenis='.$jenis) ?>" class="btn btn-primary" title="Tambah">Tambah</a>
        <h2 class="pull-right">Daftar Peminjaman <?= strtoupper($jenis) ?></h2>
      </div>
      <div class="body">
        <div class="table-responsive">
          <table class="table">
          <thead>
              <tr>
                  <th>No Surat</th>
                  <th>Tanggal Peminjaman</th>
                  <th class="<?= $jenis=='ruang'?'d-none':'' ?>">Tanggal Selesai</th>
                  <th class="<?= $jenis=='mobil'?'d-none':'' ?>">Ruang</th>
                  <th class="<?= $jenis=='ruang'?'d-none':'' ?>">Mobil</th>
                  <th>Jumlah Peserta</th>
                  <th>Status</th>
                  <th>Keterangan</th>
                  <th>Peminjam</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
              <?php $no=1 ?>
              <?php foreach ($peminjaman as $row): ?>
                  <?php if ($row->mobil_id > 0): ?>
                      <tr class="<?= $jenis=='ruang'?'d-none':'' ?>">
                          <td><?= getColumn('peminjam',['id'=>$row->peminjam_id])->no_surat ?></td>
                          <td><?= tanggal_indo($row->tanggal_peminjaman,true) ?></td>
                          <td><?= tanggal_indo($row->tanggal_selesai,true) ?></td>
                          <td class="<?= $jenis=='mobil'?'d-none':'' ?>"><?= getColumn('ruang',['id'=>$row->ruang_id])->nama_ruang ?></td>
                          <td class="<?= $jenis=='ruang'?'d-none':'' ?>"><?= getColumn('mobil',['id'=>$row->mobil_id])->merk ?></td>
                          <td><?= $row->jumlah_peserta ?></td>
                          <td><?= $row->status ?></td>
                          <td><?= $row->keterangan ?></td>
                          <td><?= getColumn('peminjam',['id'=>$row->peminjam_id])->nama_peminjam ?></td>
                          <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                               <a href="<?= site_url('peminjaman/edit/'.$row->id) ?>" class="btn btn-warning" title="Edit">Edit</a>
                               <a onclick=" return confirm('Apakah Anda yakin akan Hapus?') " href="<?= site_url('peminjaman/delete/'.$row->id.'/'.$jenis) ?>" class="btn btn-danger">Hapus</a>
                               <a class="btn btn-success" href="<?= site_url('peminjaman/copy/'.$row->id.'/'.$jenis) ?>">Copy</a>
                              </div>
                             
                          </td>
                      </tr>
                  <?php elseif ($row->ruang_id > 0): ?>
                      <tr class="<?= $jenis=='mobil'?'d-none':'' ?>">
                          <td><?= getColumn('peminjam',['id'=>$row->peminjam_id])->no_surat ?></td>
                         <td><?= tanggal_indo($row->tanggal_peminjaman,true) ?></td>
                          <td class="<?= $jenis=='mobil'?'d-none':'' ?>"><?= getColumn('ruang',['id'=>$row->ruang_id])->nama_ruang ?></td>
                          <td class="<?= $jenis=='ruang'?'d-none':'' ?>"><?= getColumn('mobil',['id'=>$row->mobil_id])->merk ?></td>
                          <td><?= $row->jumlah_peserta ?></td>
                          <td><?= $row->status ?></td>
                          <td><?= $row->keterangan ?></td>
                          <td><?= getColumn('peminjam',['id'=>$row->peminjam_id])->nama_peminjam ?></td>
                          <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                               <a href="<?= site_url('peminjaman/edit/'.$row->id) ?>" class="btn btn-warning" title="Edit">Edit</a>
                               <a onclick=" return confirm('Apakah Anda yakin akan Hapus?') " href="<?= site_url('peminjaman/delete/'.$row->id.'/'.$jenis) ?>" class="btn btn-danger">Hapus</a>
                               <a class="btn btn-success" href="<?= site_url('peminjaman/copy/'.$row->id.'/'.$jenis) ?>">Copy</a>
                              </div>
                             
                          </td>
                      </tr>
                  <?php endif ?>

                  <?php $no++ ?>
              <?php endforeach ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </div>
</div>


