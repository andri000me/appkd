<?php if ($this->session->userdata('success')): ?>
    <div class="alert alert-success">
        <strong>Success!</strong><?= $this->session->userdata('success'); ?>.
    </div>
<?php endif ?>

<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
        <a href="<?= site_url('ruang/tambah') ?>" class="btn btn-primary" title="Tambah">Tambah</a>
        <h2 class="pull-right">Daftar Ruang</h2>
      </div>
      <div class="body">
        <div class="table-responsive">
          <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Ruang</th>
                    <th>Status</th>
                    <th>Penanggung Jawab</th>
                    <th>Fasilitas</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1 ?>
                <?php foreach ($ruang as $row): ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row->nama_ruang ?></td>
                        <td><?= status_ruang($row->status) ?></td>
                        <td><?= getColumn('penanggung_jawab',['id'=>$row->penanggung_jawab_id])->nama ?></td>
                        <td><?= $row->fasilitas ?></td>
                        <td>
                            <a href="<?= site_url('ruang/edit/'.$row->id) ?>" class="btn btn-warning" title="Edit">Edit</a>
                            <a onclick="return confirm('Apakah anda yaki hapus?')" href="<?= site_url('ruang/delete/'.$row->id) ?>" class="btn btn-danger">Hapus</a>
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



