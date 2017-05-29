<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faculdade Oliveira</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <a href="../../index2.html"><b>Faculdade</b>&nbsp;Oliveira</a>
  </div>
  <!-- /.login-logo -->
   <?php 
         if($this->session->flashdata('errologin')) {?>
        <div class="alert alert-danger">
          <?=$this->session->flashdata('errologin')?>
        </div>
      <?php }  ?>
  <div class="login-box-body">
      <p class="login-box-msg"><b>Tipos de Usuários</b></p>

    <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="login_professor" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login Professor</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url() ?>logar_professor" id="formulario" method="post" role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Usuário</label>
              <input type="text" id="login_professor" name="login_professor"  class="form-control" id="usrname" placeholder="Login">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
              <input type="text" id="senha_professor" name="senha_professor"  class="form-control" id="psw" placeholder="Senha">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Lembrar me</label>
            </div>
            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                  </div>
      </div>
    </div>
  </div> 
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="login_diretor" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login Diretor</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url() ?>logar_diretor" id="formulario" method="post" role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Usuário</label>
              <input type="text" id="login_diretor" name="login_diretor"  class="form-control" id="usrname" placeholder="Login">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
              <input type="text" id="senha_diretor" name="senha_diretor"  class="form-control" id="psw" placeholder="Senha">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Lembrar me</label>
            </div>
            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                  </div>
      </div>
    </div>
  </div> 
</div>

    <div class="container">
  
  <!-- Modal -->
  <div class="modal fade" id="login_operador" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login Operador</h4>
        </div>
        <div class="modal-body">
          <form action="<?= base_url() ?>logar_operador" id="formulario" method="post" role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Usuário</label>
              <input type="text" id="login_diretor" name="login_operador"  class="form-control" id="usrname" placeholder="Login">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Senha</label>
              <input type="text" id="senha_diretor" name="senha_operador"  class="form-control" id="psw" placeholder="Senha">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Lembrar me</label>
            </div>
            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                  </div>
      </div>
    </div>
  </div> 
</div>
    <div class="social-auth-links text-center">
      <a data-toggle="modal"  href="#login_professor" class="btn btn-block btn-danger btn-primary btn-flat"></i> Logar Como
        Professor</a>
         <a data-toggle="modal"  href="#login_aluno" class="btn btn-block btn-success btn-primary btn-flat"></i> Logar Como
        Aluno</a>
      <a data-toggle="modal" href="#login_operador" class="btn btn-block btn-warning btn-warning btn-flat"></i> Logar Como
        Operador</a>
      <a data-toggle="modal"  href="#login_diretor" class="btn btn-block btn-primary btn-primary btn-flat"></i> Logar Como
        Diretor</a>
    </div>
    
    
    <!-- /.social-auth-links -->

   
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
