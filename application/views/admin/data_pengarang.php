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
          <button type="button" class="btn"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i></button>
          <table class="table">
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
                  <td><a href="#" onclick="edit_pengarang(<?php echo $hai->id_pengarang;?>)"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button></a>

                  <a href="#" onclick="delete_pengarang(<?php echo $hai->id_pengarang;?>)"><button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
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
          <h4 class="modal-title" id="myModalLabel">Tambah Pengarang</h4>
        </div>
        <form action="<?php echo base_url(''); ?>admin/data_pengarang/add_pengarang" method="POST">
          <div class="modal-body">
            <!-- <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">ID User</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="id_user">
              </div>
            </div><br><br> -->

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama Pengarang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_pengarang">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">No Telepon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="no_telepon">
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


<div id="modal_edit_pengarang" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo base_url(''); ?>admin/data_pengarang/edited_pengarang" method = "POST">
        <div class="modal-header">
          <h4 class="modal-title">Edit Pengarang</h4>
        </div>
         <div class="modal-body">
            <div class="form-group">
               <input type="hidden" class="form-control" name="id_pengarang_edit" id="id_pengarang_edit">
              <label class="col-sm-2 col-sm-2 control-label">Nama Pengarang</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_pengarang" id="nama_pengarang">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="alamat" id="alamat">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">No Telepon</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="no_telepon" id="no_telepon">
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
    <form method="POST" action="<?php echo base_url(''); ?>admin/data_pengarang/delete_pengarang">
      <div class="modal-content">
        <div class="modal-body">
          <span>Apakah anda yakin menghapus data ini?</span>
          <input type="hidden" name="id_pengarang" id="id_pengarang">
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
  function edit_pengarang(id_pengarang)
  {
    $.ajax({
      url : "<?php echo base_url('admin/data_pengarang/get_pengarang_edit/')?>" + id_pengarang,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);
        $('[id="id_pengarang_edit"]').val(data.id_pengarang);
        $('[id="nama_pengarang"]').val(data.nama_pengarang);
        $('[id="alamat"]').val(data.Alamat);
        $('[id="no_telepon"]').val(data.No_telp);        
        $('#modal_edit_pengarang').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
  }
   function delete_pengarang(id_pengarang)
  {
    console.log(id_pengarang);
    var pengarangId = id_pengarang;
 
     $('[id="id_pengarang"]').val(pengarangId);
     $('#modal_delete').modal('show');
    
  }
  
  </script>