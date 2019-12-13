<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-user"></i> Data Pengunjung</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Data Pengunjung</h4>
          <hr>
          <table class="table" border="1">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Pengunjung</th>
                <th>Nama Pengunjung</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php $n=1; foreach($pengunjung as $hai){?>
                <tr>
                  <td><?php echo $n++?></td>
                  <td><?php echo $hai->id_visitor?></td>
                  <td><?php echo $hai->nama_user?></td>
                  <td><?php echo $hai->tanggal?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div><! --/content-panel -->
      </div><!-- /col-md-12 -->

      </div>
    </div>
  </div>


<script type="text/javascript">  
  </script>