

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
                <th>Stok Buku</th>
                <th>Action</th>
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
                <td><a href="#" onclick="edit_buku(<?php echo $asu->id_buku;?>)"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button></a>

                    <a href="#" onclick="delete_buku(<?php echo $asu->id_buku;?>)"><button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></button></a></td>
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
        <form action="<?php echo base_url(''); ?>admin/data_buku/add_buku" method="POST">
          <div class="modal-body">
            <!--<div class="form-group">
               ID BUKU lek digae auto yaopo ? maksute IDne melanjutkan urutan sebelum e
              <label class="col-sm-2 col-sm-2 control-label">ID Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="id_buku">
              </div>
            </div><br><br>-->

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Judul Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="judul">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">ISBN</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="isbn">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Genre Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="genre">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Stok Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="stok">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
              <div class="col-sm-10">
               <select class="form-control" name="id_pengarang" >
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


<div id="modal_edit_buku" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form action="<?php echo base_url(''); ?>admin/data_buku/edited_buku" method = "POST">
        <div class="modal-header">
          <h4 class="modal-title">Edit buku</h4>
        </div>
         <div class="modal-body">
            <div class="form-group">
               <input type="hidden" class="form-control" name="id_buku_edit" id="id_buku_edit">
              <label class="col-sm-2 col-sm-2 control-label">Judul Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="judul" id="judul">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">ISBN</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="isbn" id="isbn">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Genre Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="genre" id="genre">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Stok Buku</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="stok">
              </div>
            </div><br><br>

            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
              <div class="col-sm-10">
               <select class="form-control" name="id_pengarang" id="id_pengarang">
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


<div class="modal fade" id="modal_delete" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <form method="POST" action="<?php echo base_url(''); ?>admin/data_buku/delete_buku">
      <div class="modal-content">
        <div class="modal-body">
          <span>Apakah anda yakin menghapus data ini?</span>
          <input type="hidden" name="id_buku" id="id_buku">
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
  function edit_buku(id_buku)
  {
    $.ajax({
      url : "<?php echo base_url('admin/data_buku/get_buku_edit/')?>" + id_buku,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);
        $('[id="id_buku_edit"]').val(data.id_buku);
        $('[id="judul"]').val(data.judul);
        $('[id="isbn"]').val(data.isbn);
        $('[id="genre"]').val(data.genre);
        $('[id="stok"]').val(data.stok);
        $('[id="id_pengarang"]').val(data.id_pengarang);
        $('#modal_edit_buku').modal('show');
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
  }
   function delete_buku(id_buku)
  {
    console.log(id_buku);
    var id_bukunya = id_buku;
 
     $('[id="id_buku"]').val(id_bukunya);
     $('#modal_delete').modal('show');
    
  }
  
  </script>