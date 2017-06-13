<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="<?php echo base_url() ?>home">
            <i class="fa fa-home"></i> <span>HOME</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"></small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>diretor">
            <i class="fa fa-home"></i> <span>Diretores(Coordenadores)</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-red">
                    <?php
                    $max = count($contar_diretor);
                    for ($i = 0; $i < $max; $i++) {
                    }
                    ?>
                    <?= $contar_diretor; ?>

            </small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>departamento">
            <i class="fa fa-home"></i> <span>Departamentos</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-red">
                    <?php
                    $max = count($contar_departamento);
                    for ($i = 0; $i < $max; $i++) {
                    }
                    ?>
                    <?= $contar_departamento ?>
                </small>
            </span>
          </a>
        </li>
       <li>
          <a href="<?php echo base_url() ?>curso">
            <i class="fa fa-home"></i> <span>Cursos</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-red">
                    <?php
                        $max = count($contar_cursos);
                        for($i = 0; $i < $max; $i++){
                        }
                    ?>
                    <?= $contar_cursos ?> 
                </small>
            </span>
          </a>
        </li>
         <li>
          <a href="<?php echo base_url() ?>professor">
            <i class="fa fa-home"></i> <span>Professores</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-red">
                    <?php
                        $max = count($contar_professor);
                        for ($i = 0; $i < $max; $i++){
                        }
                    ?>
                    <?= $contar_professor ?>
                </small>
            </span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url() ?>aluno">
            <i class="fa fa-home"></i> <span>Alunos</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-red">
                    <?php 
                        $max = count($contar_aluno);
                        for($i=0;$i<$max;$i++){
                        }
                    ?>
                    <?= $contar_aluno ?>
                </small>
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url() ?>operador">
            <i class="fa fa-home"></i> <span>Operadores</span>
            <span class="pull-right-container">
                <small class="label pull-right bg-red">
                    <?php 
                        $max = count($contar_operador);
                        for($i=0;$i<$max;$i++){
                        }
                    ?>
                    <?= $contar_operador ?>
                </small>
            </span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
