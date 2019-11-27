<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-book"></i> Data Buku</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Edit Buku</h4>
          <hr>
          <form action="<?php echo base_url(''); ?>admin/barang/tambah" method="POST">
                  <div class="modal-body">
                    <div class="form-group">
                      <!-- ID BUKU lek digae auto yaopo ? maksute IDne melanjutkan urutan sebelum e-->
                    <label class="col-sm-2 col-sm-2 control-label">ID Buku</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" name="namabarang">
                    </div>
                </div><br><br>
                  
              <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Judul Buku</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" name="serialnumber">
                    </div>
                </div><br><br>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">ISBN</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" name="serialnumber">
                    </div>
                </div><br><br>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Genre Buku</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" name="serialnumber">
                    </div>
                </div><br><br>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                    <div class="col-sm-10">
                  <input type="text" class="form-control" name="serialnumber">
                    </div>
                </div><br><br>
                  </div>
                  <div class="modal-footer">
                    <a href="<?php echo base_url("admin/data_buku")?>"><button type="button" class="btn btn-default">Cancel</button></a>
                    <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                  </div>
              </form>