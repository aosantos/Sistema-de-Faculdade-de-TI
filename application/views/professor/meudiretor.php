<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Faculdade de TI | Oliveira</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/skins/_all-skins.min.css">
<script>
    function confirmaSaida(event) {
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        var teste = confirm("Tem certeza de que deseja sair?");
        if (teste) {
            location.href = "<?php echo base_url() ?>sair";
        }

    }
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>O</b>LI</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Faculdade</b>&nbsp;Oliveira</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Mensagens</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?php echo base_url() ?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Você tem 1 Notificação</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver todos</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                 
        /*if (!isset($_SESSION['login'])) {
            header("Location:login");
        }*/
        
        
					if($this->session->userdata('fotoUsuario') != '') {

						$imgPerfil = $this->session->userdata('fotoUsuario');
?>
						<img src="<?php echo base_url()?>images/perfil/<?=$imgPerfil?>" class="user-image" alt="User Image"/>
<?php
					} else {
?>
						<img src="<?php echo base_url()?>img/user-13.jpg" class="user-image" alt="User Image"/>
<?php
					}
?>
              
              <span class="hidden-xs"><?= $this->session->userdata('nome_professor') ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php
        
					if($this->session->userdata('fotoUsuario') != '') {

						$imgPerfil = $this->session->userdata('fotoUsuario');
?>
						<img src="<?php echo base_url()?>images/perfil/<?=$imgPerfil?>" class="img-circle" alt="User Image">
<?php
					} else {
?>
						<img src="<?php echo base_url()?>img/user-13.jpg" class="img-circle" alt="User Image">
<?php
					}
?>  
                
                <p>
                  <?= $this->session->userdata('nome_professor') ?>
                </p>
              </li>
             
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="#"onclick="confirmaSaida(event);"><i class="fa fa-fw fa-power-off"></i> Sair</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
        
					if($this->session->userdata('fotoUsuario') != '') {

						$imgPerfil = $this->session->userdata('fotoUsuario');
?>
						<img src="<?php echo base_url()?>images/perfil/<?=$imgPerfil?>" class="img-circle" alt="User Image" /> 
<?php
					} else {
?>
						<img src="<?php echo base_url()?>img/user-13.jpg" alt="" /> 
<?php
					}
?>
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nome_professor') ?></p>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="<?php echo base_url() ?>meudiretor">
            <i class="fa fa-home"></i> <span>Meu Diretor</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
            </span>
          </a>
        </li>
         
         <li>
          <a href="<?php echo base_url() ?>meualuno">
            <i class="fa fa-home"></i> <span>Meus Alunos</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
            </span>
          </a>
        </li>
       
         <li>
          <a href="<?php echo base_url() ?>chamada">
            <i class="fa fa-home"></i> <span>Chamada</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
            </span>
          </a>
        </li>
        
         <li>
          <a href="<?php echo base_url() ?>notas">
            <i class="fa fa-home"></i> <span>Notas</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
            </span>
          </a>
        </li>
        
         <li>
          <a href="<?php echo base_url() ?>arquivos">
            <i class="fa fa-home"></i> <span> Arquivos de Apoio</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
            </span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Meu Diretor
      </h1>
      <ol class="breadcrumb">
        
        <li><a href="<?php echo base_url() ?>meudiretor">Meu diretor</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Lista </h3>
              <?php 
         if (validation_errors()) {?>
        <div class="alert alert-danger">
          <?=  validation_errors()?>
        </div>
      <?php }  ?>
            </div>
              <div class="container">
  <!-- Modal -->
  <div class="modal fade" id="cadastrar_diretor" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
          
        
      </div>
    </div>
  </div> 
</div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome do Diretor</th>
                  <th>Departamento</th>
                  <th>Telefone</th>
                  <th>Email</th>
                  
                  <th></th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
                        $max = count($meudiretor);
                        for ($i = 0; $i < $max; $i++) {

                        $diretor        = $meudiretor[$i]['nome_diretor'];
                        $departamento   = $meudiretor[$i]['nome_departamento'];
                        $telefone       = $meudiretor[$i]['telefone_diretor'];
                        $email          = $meudiretor[$i]['email_diretor'];
                        
                        ?> 
                    <tr class="<?php ?>" id="odd_gradeX_<?php//($i + 1) ?>" data-id="<?php// $cursos[$i]['idcursos'] ?>">
                     <td><?= $diretor ?></td>
                     <td><?= $departamento ?></td>
                     <td><?= $telefone ?></td>
                     <td><?= $email ?></td>
                     
                     
                     
                         
<!--editar diretor-->                         
<!-- Modal -->
  <div class="modal fade" id="editar_diretor_<?php //echo $cursos[$i]['idcursos']  ?>" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        
    </div>
  </div> 
<!--fim do editar cursos-->                         
<td>
                
                </tr>
    <?php
}
?>      


                 </tbody>
                <tfoot>
 
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b>1.0
    </div>
    <strong>Copyright &copy; 2017-<?php echo date('Y') ?> <a href="">Faculdade de  Ti Oliveira</a>.</strong>Todos direitos
    reservados.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        
                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
    <script>
    $(document).ready(function () {

        remover = function (id) {
            var teste = confirm('Deseja mesmo excluir ?');
            if (teste)
                idx = id.split('_')[1];

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>removeCurso',
                data: {
                    id: $('#odd_gradeX_' + idx).data('id')
                },
                success: function (result) {
                    alert('O registro foi deletado!');
                },
                error: function () {
                    alert('Erro ao deletar o registro,Tente novamente mais tarde!');
                }
            });

            $('#remover_' + idx).closest('tr').fadeOut(400, function () {
                $('#remover_' + idx).closest('tr').remove();
            });

            return false;

        };

    });
</script>
<?php
if (!isset($_SESSION['login_professor'])) {
    // header("Location:login");
    redirect(base_url());
}
?>
</body>
</html>
