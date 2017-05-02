 <body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"  aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SGO</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
          
<ul class="nav navbar-nav"><li><a href="<?php echo base_url('Login/painel'); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Painel</a></li></ul>

          <ul class="nav navbar-nav">
 <li><a href="<?php echo base_url('clinica');?>">
  <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Clínica</a></li>
</ul>



          <ul class="nav navbar-nav">
           <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastrar<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url('Gerencia/paciente');?>"><span class="glyphicon glyphicon-user"></span>  Paciente</a></li>
            <li><a href="<?php echo base_url('Gerencia/funcionario');?>"><span class="glyphicon glyphicon-user"></span>  Funcionário</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('Servico');?>"><span class="glyphicon glyphicon-list"></span>  Serviços</a></li>
             <li><a href="<?php echo base_url('Gerencia/Agenda');?>"><span class="glyphicon glyphicon-tasks"></span>  Agenda</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_URL('Clinica/conta');?>"><span class="glyphicon glyphicon-minus"></span> Contas a pagar</a></li>
            <li><a href="<?php echo base_url('Clinica/recebimento');?>"><span class="glyphicon glyphicon-plus"></span>  Recebimento</a></li>
          </ul>
        </li>
      
 
 <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Consultar<span class="caret"></span></a>
          <ul class="dropdown-menu">
            
            <li><a href="<?php echo base_url('Gerencia/consulta_paciente');?>"><span class="glyphicon glyphicon-user"></span>  Paciente</a></li>
            <li><a href="<?php echo base_url('Gerencia/consulta_funcionario');?>"><span class="glyphicon glyphicon-user"></span>  Funcionário</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('Servico/consulta');?>"><span class="glyphicon glyphicon-list"></span>  Serviços</a></li>
             <li><a href="<?php echo base_url('Gerencia/consulta_agenda');?>"><span class="glyphicon glyphicon-tasks"></span>  Agenda</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url('Clinica/consulta_conta');?>"><span class="glyphicon glyphicon-minus"></span> Contas a pagar</a></li>
            <li><a href="<?php echo base_url('Clinica/consulta_recebimento');?>"><span class="glyphicon glyphicon-plus"></span>  Recebimento</a></li>
          </ul>
        </li>
        </ul>
        <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url('clinica/faturamento/');?>"><span class="glyphicon glyphicon-equalizer"></span> Relatório de faturamento</a></li>
        </ul>

<ul class="nav navbar-nav navbar-right">
  <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('user');?> <span class="caret"></span></a>
<ul class="dropdown-menu">   
<li><a href="<?php echo base_url('Gerencia/editar/'.$this->session->userdata('cod'));?>">Perfil</a></li>
<li><a href="<?php echo base_url('Login/Sair/');?>">Sair</a></li>
</ul>
</ul>    
         
        </div>
      </div>
    </nav>
