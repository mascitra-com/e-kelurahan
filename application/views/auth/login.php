<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-KELURAHAN | SIGN-IN</title>
  <link rel="stylesheet" href="<?=base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/plugins/fontawesome/css/font-awesome.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/theme-helper.css')?>">
  <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:300,500');
    *{
      padding: 0;
      margin: 0;
      font-family: 'Roboto',sans-serif;
      font-weight: 300;
      transition: background-color 0.5s ease;
      color: #FFF;
    }

    html, body, #wrapper{
      width: 100%;
      height: 100vh;
      max-width: 100%;
      max-height: 100vh;
      overflow: hidden;
    }

    body{
      background: url(<?=base_url('assets/images/bg.jpg')?>);
}
#wrapper{
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgba(40, 57, 215,.8)
}
.box{
  width: 45%;
  padding: 15px;
}
.btn-default{
  background-color: #39BE91;
  border-color: #2f9d78;
  color: #fff;
  font-size: 14px;
  padding: 10px 50px;
  border-radius: 0;
}
.btn-default:hover{
  background-color: #23765a;
  color: #fff;
  border-color: transparent;
}
.form-control{
  border-radius: 0;
  background-color: rgba(0,0,0,.35);
  border:none;
  font-size: 14px;
}
.bold{
  font-weight: 500;
}
@media(max-width: 992px){
  .box{
    width: 75%;
  }
}
@media(max-width: 768px){
  .box{
    width: 90%;
  }
}
</style>
</head>
<body>
  <div id="wrapper">
    <div class="box">
      <span class="text-size-28 bold">E-KELURAHAN TOMPOKERSO</span><br>
      <span class="text-size-18" style="color:rgba(255,255,255,.5)">Kelurahan masa depan</span>
      <?php $message = $this->session->flashdata('message'); ?>
      <div id="infoMessage"><?php echo $message[0];?></div>
      <form action="<?= site_url($action.'/login') ?>" method="POST" class="break-top-30">
      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
        <div class="form-group">
          <?php echo lang('login_identity_label', 'identity');?>
          <input type="text" class="form-control input-lg" name="identity" placeholder="masukan username  --  contoh andre@tompokerso">
        </div>
        <div class="form-group">
          <?php echo lang('login_password_label', 'password');?>
          <input type="password" class="form-control input-lg" name="password" placeholder="masukkan password">
        </div>
        <div class="form-group">
          <button class="btn btn-default btn-lg" type="submit">Masuk</button>
          <a href="#" class="text-white pull-right" id="remember">lupa password? klik disini</a>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="<?=base_url('assets/plugins/jquery/jquery-3.1.1.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
<script></script>
</html>