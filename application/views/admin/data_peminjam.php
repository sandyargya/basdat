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
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Peminjam</th>
                <th>Nama Peminjam</th>
                <th>Nama Buku</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
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
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div><! --/content-panel -->
      </div><!-- /col-md-12 -->

      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Tambah Peminjam</h4>
        </div>
        <form action="<?php echo base_url(''); ?>admin/data_peminjam/add_peminjam" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Id Visitor</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="id_visitor">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Id Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="id_buku">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="start_date" value="<?php echo isset($itemOutData->date_out) ? set_value('date_out', date('Y-m-d', strtotime($itemOutData->date_out))) : set_value('date_out'); ?>">
              </div>
            </div><br><br>            
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Tanggal Selesai</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="end_date" value="<?php echo isset($itemOutData->date_out) ? set_value('date_out', date('Y-m-d', strtotime($itemOutData->date_out))) : set_value('date_out'); ?>">
              </div>
            </div><br><br>            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" name="submit">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div id="modal_edit_peminjam" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo base_url(''); ?>admin/data_peminjam/edited_peminjam" method = "POST">
        <div class="modal-header">
          <h4 class="modal-title">Edit Peminjam</h4>
        </div>
         <div class="modal-body">
            <div class="form-group">
               <input type="hidden" class="form-control" name="id_peminjam_edit" id="id_peminjam_edit">
              <label class="col-sm-2 col-sm-2 control-label">Nama Peminjam</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam" disabled>
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_buku" id="nama_buku">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Tanggal Mulai</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($itemOutData->date_out) ? set_value('date_out', date('Y-m-d', strtotime($itemOutData->date_out))) : set_value('date_out'); ?>">
              </div>
            </div><br><br>            
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Tanggal Selesai</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($itemOutData->date_out) ? set_value('date_out', date('Y-m-d', strtotime($itemOutData->date_out))) : set_value('date_out'); ?>">
              </div>
            </div><br><br>          
        </div>
        <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success" name="submit">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="modal fade" id="modal_delete" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form method="POST" action="<?php echo base_url(''); ?>admin/data_peminjam/delete_peminjam">
      <div class="modal-content">
        <div class="modal-body">
          <span>Apakah anda yakin menghapus data ini?</span>
          <input type="hidden" name="id_peminjam" id="id_peminjam">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button> 
          <button type="submit" class="btn btn-success" name="submit">Ya</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">  
  </script>