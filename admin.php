<?php

session_start(); 
require_once "config.php";
$us=$_SESSION['id_user'];
                   $queryi234 = mysqli_query($mysqli,"SELECT * FROM user WHERE id_user=$us ");
$data = mysqli_fetch_array($queryi234); ?>


<form role="form" class="form-horizontal" method="POST" action="modules/password/proses.php">
          <div class="box-body">
    
            <div class="form-group">
              <label class="col-sm-2 control-label">User Name</label>
              <div class="col-sm-5">
                <input name="old_pass" type="text" class="form-control" value="<?php echo $_SESSION['username']; ?>" autocomplete="off" required>
              </div>
			  <div class="form-group">
              <label class="col-sm-2 control-label">Prodi</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="old_pass" autocomplete="off" required>
              </div>
              <div class="form-group">
              <label class="col-sm-2 control-label">Password Lama</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="old_pass" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Password Baru</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="new_pass" autocomplete="off" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Ulangi Password Baru</label>
              <div class="col-sm-5">
                <input type="password" class="form-control" name="retype_pass" autocomplete="off" required>
              </div>
            </div>
          </div><!-- /.box-body -->
          
          <div class="box-footer bg-btn-action">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
              </div>
            </div>
          </div>
        </form>