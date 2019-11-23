
<div class="col-md-9">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-book"></i> Data Buku</h3>
    </div>
    <div class="panel-body">
      <div class="col-md-12">
        <div class="content-panel">
          <h4><i class="fa fa-angle-right"></i> Data Buku</h4>
          <hr>
          <button type="button" class="btn"  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i></button>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>ID Buku</th>
                <th>Judul</th>
                <th>ISBN</th>
                <th>Genre</th>
                <th>Pengarang</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $n=1; foreach($buku as $asu){?>
                <tr>
                  <td><?php echo $n++?></td>
                  <td><?php echo $asu->id_buku?></td>
                  <td><?php echo $asu->judul?></td>
                  <td><?php echo $asu->isbn?></td>
                  <td><?php echo $asu->genre?></td>
                  <td><?php echo $asu->nama_pengarang?></td>
                  <td><a href="<?php echo base_url("admin/data_buku/editbuku")?>"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button></a>
                  <a href="<?php echo base_url("admin/data_buku/hapus")?>"><button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="ConfirmDelete()"><i class="fa fa-trash-o"></i></button></a></td>
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
                    <h4 class="modal-title" id="myModalLabel">Tambah Buku</h4>
                  </div>
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                  </div>
              </form>
                </div>
              </div>
            </div>


  <script type="text/javascript">
      function ConfirmDelete()
      {
            if (confirm("Hapus Data ini?"))
                 location.href=baseUrl+'<?php echo base_url("admin/data_buku/hapus".$data->buku);?>';
      }
  </script>
