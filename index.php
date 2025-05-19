<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STI</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="admin/bootstrap/css/bootstrap.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href=""><img src="logonova.png"></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
    <a href="../siap1/index.php">  <img src="images/Mobile.png" title="Versão Mobile" width="15" height="20" style="float:right"></a>
	<h3 class="login-box-msg">STI</h3>
        <p align= "center" style="padding:15px;"><b>Tecnologia da Informação</b></p>
        <form action="entrar.php" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="email" class="form-control" placeholder="Nome" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
<br />
          <div class="form-group has-feedback">
            <input type="password" name="senha" class="form-control" placeholder="Senha" required> 
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <br />
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
          </div>
        </form><!-- /.social-auth-links -->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="admin/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="admin/plugins/iCheck/icheck.min.js"></script>
  </body>
</html>
