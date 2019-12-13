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
                <th>Status</th>
                <th>Action</th>
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
                  <td><a href="#" onclick="edit_peminjam(<?php echo $hai->id_peminjam;?>)"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button></a>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div><! --/content-panel -->
      </div><!-- /col-md-12 -->

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
                <input type="text" class="form-control" name="nama_peminjam" id="nama_peminjam" readonly="">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_buku" id="nama_buku" readonly="">
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
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Status</label>
              <div class="col-sm-10">
               <select class="form-control" name="status" >
                <option value="" selected="" disabled="">Pilih status</option>
                <option value="Request">Request</option>
                <option value="Approve">Approve</option>
                <option value="Decline">Decline</option>
              </select>
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

<script type="text/javascript">
  
  function edit_peminjam(id_peminjam)
  {
    $.ajax({
      url : "<?php echo base_url('admin/data_peminjam/get_peminjam_edit/')?>" + id_peminjam,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);
        $('[id="id_peminjam_edit"]').val(data.id_peminjam);
        $('[id="nama_peminjam"]').val(data.nama_user);
        $('[id="nama_buku"]').val(data.judul);
        $('#modal_edit_peminjam').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
  }
  </script>