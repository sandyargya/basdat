<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-user"></i> Data User</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Data User</h4>
          <hr>
          <button type="button" class="btn"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i></button>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>ID User</th>
                <th>Username</th>
                <th>Password</th>
                <th>Nama User</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $n=1; foreach($user as $hai){?>
                <tr>
                  <td><?php echo $n++?></td>
                  <td><?php echo $hai->id_user?></td>
                  <td><?php echo $hai->username?></td>
                  <td><?php echo $hai->password?></td>
                  <td><?php echo $hai->nama_user?></td>
                  <td><?php echo $hai->role?></td>
                  <td><a href="#" onclick="edit_user(<?php echo $hai->id_user;?>)"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button></a>
                  <a href="#" onclick="delete_user(<?php echo $hai->id_user;?>"><button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
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
          <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
        </div>
        <form action="<?php echo base_url(''); ?>admin/data_user/add_user" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">ID User</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="id_user">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="username">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="password">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_user">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Role</label>
              <div class="col-sm-10">
               <select class="form-control" name="role" >
                <option value="" selected="" disabled="">Pilih pengarang</option>
                <?php foreach ($pengarang as $p) {?>
                  <option value="<?php echo $p->id_pengarang ?>"><?php echo $p->nama_pengarang ?></option>
                <?php }?>
              </select>
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


<div id="modal_edit_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo base_url(''); ?>admin/data_user/edited_user" method = "POST">
        <div class="modal-header">
          <h4 class="modal-title">Edit User</h4>
        </div>
         <div class="modal-body">
            <div class="form-group">
               <input type="hidden" class="form-control" name="id_user_edit" id="id_user_edit">
              <label class="col-sm-2 col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="username" id="username">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="password" id="password">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama_user" id="nama_user">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Role</label>
              <div class="col-sm-10">
               <select class="form-control" name="role" id="role">
                <option value="" selected="" disabled="">Pilih</option>
                <?php foreach ($pengarang as $p) {?>
                  <option value="<?php echo $p->id_pengarang ?>"><?php echo $p->nama_pengarang ?></option>
                <?php }?>
              </select>
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
    <form method="POST" action="<?php echo base_url(''); ?>admin/data_user/delete_user">
      <div class="modal-content">
        <div class="modal-body">
          <span>Apakah anda yakin menghapus data ini?</span>
          <input type="hidden" name="id_user" id="id_user">
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
  function edit_user(id_user)
  {
    $.ajax({
      url : "<?php echo base_url('admin/data_user/get_user_edit/')?>" + id_user,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);
        $('[id="id_user_edit"]').val(data.id_user);
        $('[id="username"]').val(data.username);
        $('[id="password"]').val(data.password);
        $('[id="nama_user"]').val(data.nama_user);
        $('[id="role"]').val(data.id_pengarang);
        $('#modal_edit_buku').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
  }
   function delete_user(id_user)
  {
    console.log(id_user);
    var id_usernya = id_user;
 
     $('[id="id_user"]').val(id_userya);
     $('#modal_delete').modal('show');
    
  }
  
  </script>