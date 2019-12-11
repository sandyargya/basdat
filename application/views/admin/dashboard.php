<!DOCTYPE html>
<html>
<head>
    <title> Dashboard Admin</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?> assets/plugins/images/favicon.png">
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
                <a href="<?php echo base_url() ?>/admin/dashboard/logout" type="submit" class="btn btn-success"><i class="fa fa-sign-out"></i> Logout</a>
            </div>
      </div>
    </nav>
<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
                ADMINISTRATOR
              </a>
              <a href="<?php echo base_url('admin/dashboard')?>" class="list-group-item"><i class="fa fa-dashboard"></i>&nbsp Dashboard</a>
              <a href="<?php echo base_url('admin/data_pengarang')?>" class="list-group-item"><i class="fa fa-user"></i>&nbsp Data Pengarang</a>
              <a href="<?php echo base_url('admin/data_buku')?>" class="list-group-item"><i class="fa fa-book"></i>&nbsp Data Buku</a>
              <a href="<?php echo base_url('admin/data_pengunjung')?>" class="list-group-item"><i class="fa fa-list-ul"></i>&nbsp Data Pengunjung</a>
              <a href="<?php echo base_url('admin/data_peminjam')?>" class="list-group-item"><i class="fa fa-folder-open"></i>&nbsp Data Peminjam </a>
              <a href="<?php echo base_url('admin/data_user')?>" class="list-group-item"><i class="fa fa-user"></i>&nbsp Data User </a>
              <a href="<?php echo base_url() ?>/admin/dashboard/logout" class="list-group-item"><i class="fa fa-sign-out"></i>&nbsp Logout</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-dashboard"></i> Dashboard</h3>
              </div>
              <div class="panel-body">
                Selamat Datang <b><?php echo $this->session->userdata("user_nama") ?></b> di halaman Administrator System
              </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>