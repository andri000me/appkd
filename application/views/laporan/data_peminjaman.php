<div class="container-fluid">
  <div class="row clearfix">
    <div class="card">
      <div class="header">
      <a href="<?= site_url('penanggung_jawab/tambah') ?>" class="btn btn-primary" title="Tambah">Tambah</a>
        <h2 class="pull-right">Daftar Penanggung Jawab</h2>
      </div>
      <div class="body">
        <div class="table-responsive">
            <table class="display table table-bordered" class="full-width">

                <thead>
                    <tr>
                        <th>No Surat</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Selesai</th>
                        <th>Peminjaman</th>
                        <th>Jumlah Peserta</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Peminjam</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1?>
                    <?php foreach ($peminjaman as $row): ?>
                        <tr>
                            <td><?=getColumn('peminjam', ['id' => $row->peminjam_id])->no_surat?></td>
                           <td><?=tanggal_indo($row->tanggal_peminjaman, true)?></td>
                           <td>
                            <?=tanggal_indo($row->tanggal_selesai, true)?>
                                
                            </td>
                            <td>
                                <?php if (!empty($row->mobil_id)): ?>
                                    <?= getColumn('mobil',['id'=>$row->mobil_id])->merk ?>
                                <?php elseif(!empty($row->ruang_id)): ?>
                                    <?= getColumn('ruang',['id'=>$row->ruang_id])->nama_ruang ?>
                                <?php endif ?>
                            </td>
                            <td><?=$row->jumlah_peserta?></td>
                            <td><?=$row->status?></td>
                            <td><?=$row->keterangan?></td>
                            <td><?=getColumn('peminjam', ['id' => $row->peminjam_id])->nama_peminjam?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                 <a href="<?=site_url('peminjaman/edit/' . $row->id)?>" class="btn btn-warning" title="Edit">Edit</a>
                                 <a onclick=" return confirm('Apakah Anda yakin akan Hapus?') " href="<?=site_url('peminjaman/delete/' . $row->id)?>" class="btn btn-danger">Hapus</a>
                                 <a class="btn btn-success" href="<?=site_url('peminjaman/copy/' . $row->id)?>">Copy</a>
                                </div>

                            </td>
                        </tr>
                    <?php $no++?>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
    
  </div>
</div>

