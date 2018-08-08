
<?php $this->load->view('template/css'); ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMANIS</title>

</head>
<body class="hold-transition login-page">
<div class="login-box">
<!--   <div class="login-logo">
    <b>SI</b>MANIS
  </div> -->
  
  <!-- /.login-logo -->
  <div class="login-box-body">
  <div align="center">
      <img style="width: 200px; " src="http://localhost/simanis/assets/img/simanis.png">
      <br><h4>Sistem Informasi Manajemen Servis</h4><br>
  </div>
    <form action="https://www.youtube.com/watch?v=6eoETnxjI4k" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
<!--             <label>
              <input type="checkbox"> Remember Me
            </label> -->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <br>
          <button type="submit" class="fa fa-sign-in btn btn-primary btn-block btn-flat "> Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php $this->load->view('template/08javascript'); ?>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

