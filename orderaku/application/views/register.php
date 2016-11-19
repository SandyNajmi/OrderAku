<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css">
    <!-- Bootstrap datepicker -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datepicker.min.css">
    <!--  Magic Suggest -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/magicsuggest/magicsuggest.css">
    <!--  Tag input -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-tagsinput.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css">

  </head>
  <body>
    <div class="container">
        <?php validation_errors() ?>
        <?php echo form_open_multipart('register/register_process'); ?>

        <h3>Informasi Profil:</h3>

        <div class="form-group">
          <label for="name">Nama Lengkap</label>
          <input class="form-control" type="text" name="name">
        </div>

        <div class="form-group">
          <label for="title">Title</label>
          <input class="form-control" type="text" name="title">
        </div>

        <div class="form-group">
          <label for="department">Departemen</label>
          <select class="form-control" name="department">
              <?php
                foreach ($departments as $row) {
                  echo "<option value='$row->department_id'>$row->department_name</option>";
                }
              ?>
          </select>
        </div>

        <div class="form-group">
          <label for="phone">Nomor telpon</label>
          <input class="form-control" type="text" name="phone">
        </div>

        <div class="form-group">
          <label for="gender">Jenis Kelamin</label><br>
          <label class="radio-inline"><input type="radio" name="gender" value="l" checked>Laki-laki</label>
          <label class="radio-inline"><input type="radio" name="gender" value="p">Perempuan</label>
        </div>

        <div class="form-group">
          <label for="birthdate">Tanggal lahir</label>
          <input class="form-control datepicker" type="text" name="birthdate">
        </div>

        <div class="form-group">
          <label for="address">Alamat</label>
          <input class="form-control" type="text" name="address">
        </div>

        <div class="form-group">
          <label for="about">Tentang kami</label>
          <textarea class="form-control" type="text" name="about"></textarea>
        </div>

        <div class="form-group">
          <label for="photo">Photo</label>
          <input class="form-control" type="file" name="photo">
        </div>

        <hr>

        <h3>Informasi Keahlian:</h3>

        <div class="form-group">
          <label for="user_skills">Keahlian</label>
          <input id="skill" class="form-control" type="text" name="user_skills[]">
        </div>

        <hr>

        <h3>Informasi Akun:</h3>

        <div class="form-group">
          <label for="username">Username</label>
          <input class="form-control" type="text" name="username">
        </div>

        <div class="form-group">
          <label for="password">password</label>
          <input class="form-control" type="password" name="password">
        </div>

        <button class="btn btn-primary pull-right" type="submit" name="submit">Daftar</button>

        <?php echo form_close(); ?>
    </div>

    <!-- REQUIRED JS SCRIPTS -->
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <!--  Bootstrap datepicker  -->
    <script src="<?php echo base_url()?>assets/js/bootstrap-datepicker.min.js"></script>

    <!-- Magic suggest -->
    <script src="<?php echo base_url()?>assets/magicsuggest/magicsuggest.js"></script>
    <!-- <script src="<?php echo base_url()?>assets/js/scriptMagicSuggest.js"></script> -->

    <script type="text/javascript">
    $(function() {

      $('#skill').magicSuggest({
          placeholder: 'ketik keahlian Anda',
          data: 'skills/getskill',
          valueField: 'skill_name',
          displayField: 'skill_name',
          renderer: function(data){
            return '<div style="padding: 5px; overflow:hidden;">' +
                '<div style="float: left; margin-left: 5px">' +
                    '<div>' + data.skill_name + '</div>' +
                '</div>' +
            '</div><div style="clear:both;"></div>'; // make sure we have closed our dom stuff
        }
      });

    });

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });

    </script>

  </body>
</html>
