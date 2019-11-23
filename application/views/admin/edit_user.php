<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-book"></i> Data User</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Edit User</h4>
          <hr>
          <form action="<?php echo base_url(''); ?>admin/barang/tambah" method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                      <!-- ID USER lek digae auto yaopo ? maksute IDne melanjutkan urutan sebelum e-->
                    <label class="col-sm-2 col-sm-2 control-label">ID User</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" name="namabarang">
                    </div>
                </div><br><br>
                  
              <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" name="serialnumber">
                    </div>
                </div><br><br>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" name="serialnumber">
                    </div>
                </div><br><br>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nama User</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" name="serialnumber">
                    </div>
                </div><br><br>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Role</label>
                    <div class="col-sm-10">
                  <select>Bacot
                    <option></option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                    </div>
                </div><br><br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                  </div>
              </form>