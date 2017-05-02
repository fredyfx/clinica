
<div class="container-fluid">
<div class="row">

<div class="col-md-12">
 <h3 class="page-header" style="color: white;">
   <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Funcionário
 </h3>
 <p><?php echo validation_errors(); ?></p>
</div> 

</div>

   <div class="row">
<div class="col-sm-7 col-md-4 col-sm-offset-5 col-md-offset-8 busca">
<?php echo form_open('Gerencia/busca_funcionario', 'class="form-inline"'); ?>
<div class="form-group has-success">
<input type="text" placeholder="Nome do funcionário" class="form-control" name="nome" required autofocus>
<input type="submit" value="Pesquisar" class="btn btn-success">
  </div>
  </form>
</div>
   </div>
       


<div class="row">
<div class="col-md-11 wella">
  <div class="table-responsive">
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Celular</th>
      <th>Perfil</th>
      <th>E-mail</th>
    <th>Especialização</th>
    <th>Status</th>
      </tr>
  </thead>
  <tbody id="tabela">

    <?php foreach($fun as $f){;?>
    <tr>
      <td class="codigo escode"><?php echo $f->codigo;?></td>
      <td class="nome"><?php echo $f->nome;?></td>
      <td class="celular"><?php echo $f->celular;?></td>
      <td class="perfil"><?php echo $f->perfil;?></td>
      <td class="email"><?php echo $f->email;?></td>
      <td class="espe"><?php echo $f->especializacao;?></td>
      <td><?php echo $f->status?></td>
      <td><a href="<?php echo base_url('Gerencia/editar/'.$f->codigo);?>" class="btn btn-warning">Editar <span class="glyphicon glyphicon-pencil"></span></a></td>
      <?php ; }?>
    </tr>
  </tbody>
</table>


</div>
</div>


</div>
 <div class="row">
<div class="col-md-8 col-md-offset-4">
<?php if(!empty($pagi)){echo $pagi;}?>
</div>
</div>
        

</div>     
        
       

 <script type="text/javascript">
$(function(){
 $('#valor').maskMoney({symbol:'R$ ', 
showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 })

$('.datepicker').datepicker({
format: 'dd/mm/yyyy',                
language: 'pt-BR',
});


jQuery('tr').click(function () {
                // captura o matriz td clicado
                var valor = $(this);
                // captura o posicao da  linha da matriz
                var cod = valor[0];
                // captira o indice que e uma classe das td

               var c=  $(cod).find('.codigo').text();
               var pa= $(cod).find('.paciente').text();
               var se= $(cod).find('.ser_cod').text();
               var v= $(cod).find('.valor').text();
               var venc= $(cod).find('.vencimento').text();
               var p= $(cod).find('.pagamento').text();
               var data= $(cod).find('.d_p').text();
           

              // sbstitui o RS
              var valor =v.replace("R$","");
             $('#codigo').val(c);
             $('#paciente').val(pa);
             $('#servico').val(se);
             $('#valor').val(valor);
             $('#vencimento').val(venc);
             $("#tipo").val(p);
             $('#pagamento').val(data);
});


</script>   





   



<script src="<?php echo base_url();?>bootstrap-3.3.6-dist/pluguin/jquery.maskMoney.js" type="text/javascript"></script>
  
    </body>
</html>

   
         
         
        