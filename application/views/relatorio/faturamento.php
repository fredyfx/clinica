
<!DOCTYPE html>

<html lang="pt-BR">
    <head>
      <title>Sistema de Gerenciamento Odontológico</title>
       <meta charset="UTF-8">
       <link rel="shortcut icon" href="<?php echo base_url();?>bootstrap-3.3.6-dist/img/icon.jpg">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.6-dist/css/bootstrap.min.css">
    <script src=" <?php echo base_url();?>bootstrap-3.3.6-dist/js/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>bootstrap-3.3.6-dist/js/bootstrap.min.js" type="text/javascript"></script>
       </head>
<body>


<div class="container-fluid">
<div class="row">
<div class="col-md-12">
 <p class="lead text-center">Sistema de Gerenciamento Odontológico (SGO) </p>
</div> 
</div>
<div class="row">
<div class="col-md-4 col-md-offset-4 text-center">
<h4 class="alert alert-info">Relatório de Faturamento</h4>
</div>
</div>


<div class="row">
<div class="col-md-12 wella">
  <div class="table-responsive">
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th><h4>Data</h4></th>
      <th><h4>Recebimento</h4></th>
      <th><h4>Contas a pagar</h4></th>
      <th><h4>Faturamento</h4></th>
     
      </tr>
  </thead>
  <tbody id="tabela">

    <?php //foreach($fun as $f){;?>
    <tr>
     
      <td><h4><?php echo $rece->mes."/".$rece->ano;?></h4></td>
      <td><h4><?php echo "R$". number_format($rece->valor,2,',','.');?></h4></td>
      <td><h4><?php echo "R$". number_format($contas->valor,2,',','.');?></h4></td>
     <td><h4><?php $fat= $rece->valor - $contas->valor; echo "R$ ".number_format($fat,2,',','.');?></h3></td>
     
      <?php //; }?>
    </tr>
  </tbody>
</table>


</div>
</div>

</div>
 </div> 

 <div class="container-fluid">
<div class="row">
<div class="col-md-12 wella">
<hr>
<div class="panel panel-default">
 
  <div class="panel-heading">Contas a pagar</div>
 <div class="table-responsive">
<table class="table table-hover table-striped">
<thead>
<tr>
<th>Descrição</th>
<th>Valor</th>
<th>Data de pagamento</th>
<th>Forma de pagamento</th>
</tr>
</thead>

<tbody>
<?php foreach ($des as  $v) {;?>
  <tr>
<td><?php echo $v->descricao; ?></td>
<td><?php echo  number_format($v->valor,2,',','.'); ?></td>
<td><?php echo date('d/m/Y', strtotime($v->data_pagamento));?></td>
<td><?php echo $v->tipo_pagamento; ?></td>
  </tr>
<?php ;} ?>
</tbody>

</table>
</div>
</div>
</div>
</div>  
</div>







 <div class="container-fluid">
<div class="row">
<div class="col-md-12 wella">
<hr>
<div class="panel panel-default">
 
  <div class="panel-heading">Recebimento</div>
 <div class="table-responsive">
<table class="table table-hover table-striped">
<thead>
<tr>
<th>Pacientes</th>
<th>Serviços</th>
<th>Valor</th>
<th>Data de pagamento</th>
</tr>
</thead>

<tbody>
<?php foreach ($des_re as  $va) {;?>
  <tr>
<td><?php echo $va->nome; ?></td>
<td><?php echo $va->descricao; ?></td>
<td><?php echo number_format($va->valor,2,',','.'); ?></td>
<td><?php echo date('d/m/Y',strtotime($va->data_pagamento)); ?></td>
  </tr>
<?php ;} ?>
</tbody>

</table>
</div>
</div>
</div>
</div>  
</div>






 </body>
</html>

   
         
         
        