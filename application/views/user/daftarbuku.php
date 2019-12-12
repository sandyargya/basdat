<html>
<head>
    <title> Dashboard User</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?> assets/plugins/images/favicon.png">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SMAN 70 Wamena, Zimbawe Barat</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="navbar-form navbar-right">
                <a href="<?php echo base_url() ?>index.php/user/dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                USER
              </a>
              <a href="<?php echo base_url('user/dashboard')?>" class="list-group-item"><i class="fa fa-dashboard"></i> Dashboard</a>
              <a href="<?php echo base_url('user/daftar_buku');?>" class="list-group-item"><i class="fa fa-book"></i> Daftar Buku</a>
              <a href="#" class="list-group-item"><i class="fa fa-folder"></i> Histori Peminjaman</a>
              <a href="<?php echo base_url() ?>/user/dashboard/logout" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
        </div>
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
                  <td><a href="<?php echo base_url('user/daftar_buku/request/' . $asu->id_buku)?>" onclick="#"><button class="btn btn-primary btn-xs" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></button></a>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div><! --/content-panel -->
        </div><!-- /col-md-12 -->

      </div>
    </div>
  </div>
    </div>
</div>





<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>