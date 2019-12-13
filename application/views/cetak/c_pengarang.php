<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-user"></i> Data Pengarang</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Data Pengarang</h4>
          <hr>
          <table class="table" border="1">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Pengarang</th>
                <th>Nama Pengarang</th>
                <th>Alamat</th>
                <th>No Telpon</th>                
              </tr>
            </thead>
            <tbody>
              <?php $n=1; foreach($pengarang as $hai){?>
                <tr>
                  <td><?php echo $n++?></td>
                  <td><?php echo $hai->id_pengarang?></td>
                  <td><?php echo $hai->nama_pengarang?></td>
                  <td><?php echo $hai->Alamat?></td>
                  <td><?php echo $hai->No_telp?></td> 
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div><! --/content-panel -->
      </div><!-- /col-md-12 -->