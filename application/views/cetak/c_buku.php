<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-book"></i> Data Buku</h3>
    </div>
    <hr>
    <div class="panel-body">
      <div class="col-md-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Data Buku</h4>
          <hr>
          <br>
          <table class="table" border="1">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Buku</th>
                <th>Judul</th>
                <th>ISBN</th>
                <th>Genre</th>
                <th>Pengarang</th>
                <th>Stok Buku</th>
              </tr>
            </thead>
            <tbody>
              <?php $n=1; foreach($buku as $asu) { ?>
                <tr>
                  <td><?php echo $n++?></td>
                  <td><?php echo $asu->id_buku ?></td>
                  <td><?php echo $asu->judul ?></td>
                  <td><?php echo $asu->isbn ?></td>
                  <td><?php echo $asu->genre ?></td>
                  <td><?php echo $asu->nama_pengarang ?></td>
                  <td><?php echo $asu->stok ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><! --/content-panel -->
        </div><!-- /col-md-12 -->

      </div>
    </div>
  </div>