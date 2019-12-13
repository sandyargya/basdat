<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-user"></i> Data Peminjam</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Data Peminjam</h4>
          <hr>
          <table class="table" border="1">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Peminjam</th>
                <th>Nama Peminjam</th>
                <th>Nama Buku</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $n=1; foreach($peminjam as $hai){?>
                <tr>
                  <td><?php echo $n++?></td>
                  <td><?php echo $hai->id_peminjam?></td>
                  <td><?php echo $hai->nama_user?></td>
                  <td><?php echo $hai->judul?></td>
                  <td><?php echo $hai->start?></td>
                  <td><?php echo $hai->end?></td>
                  <td><?php echo $hai->status?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div><! --/content-panel -->
      </div><!-- /col-md-12 -->

      </div>
    </div>
  </div>

