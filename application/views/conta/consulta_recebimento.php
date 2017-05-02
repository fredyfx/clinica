
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Contas a receber
</h4>
  </div>
     <div class="modal-body">
      <?php echo form_open('Clinica/atualiza_recebimento',"id='formu'");?>    
          <input type="hidden" name="codigo" id="codigo">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Paciente</label>
            <input type="text" name="nome" class="form-control" id="paciente" required>
          </div>

          <div class="form-group">
          <label for="message-text" class="control-label">Serviço</label>
           <select class="form-control" required name="servico" id="servico">
         
            <?php foreach ($ser as $ob) { ;?>
   <option value="<?php echo $ob->codigo ;?>"><?php echo $ob->descricao ;}?></option>
          </select>
          </div>
        
   <div class="form-group">
            <label for="message-text" class="control-label">Valor</label>
            <input type="text" name="valor" class="form-control" id="valor"  required>
          </div>


         <div class="form-group">
            <label for="message-text" class="control-label">Vencimento</label>
            <input type="text" name="vencimento" class="form-control" id="vencimento"  required>
          </div>


<div class="form-group">
<label for="categoria" class="control-label">Forma de pagamento</label>
<select class="form-control" required name="tipo" id='tipo'>
  <option value="Cartão de credito">Cartão de crédito</option>
  <option value="Cartão de débito">Cartão de débito </option>
  <option value="Dinheiro">Dinheiro</option>
  <option value="Conta no Banco">Conta no Banco</option>
</select>
</div>
        

        <div class="form-group">
          <label class="control-label">Data de pagamento</label>
          <input type="text" name="data" class="form-control datepicker" id="pagamento" class="datepicker">
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary"><span class='glyphicon glyphicon-ok'></span> Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>








   <div class="container-fluid">
            <div class="row">
             
<div class="col-md-12">
 <h3 class="page-header" style="color: white;">
   <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Recebimento
 </h3>
 <p><?php echo validation_errors(); ?></p>
</div> 

</div>

   <div class="row">
<div class="col-md-4 col-md-offset-8 busca">
<?php echo form_open('Clinica/busca_recebimento', 'class="form-inline"'); ?>
<div class="form-group has-success">
<input type="text" placeholder="Nome do paciente" class="form-control" name="nome" required autofocus>
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
    
      <th>Pacientes</th>
      <th>Serviços</th>
      <th>Valor</th>
      <th>Vencimento</th>
      <th>Pagamento</th>
      <th>Data de Pagamento</th>
    </tr>
  </thead>
  <tbody id="tabela">

    <?php foreach($rece as $r){;?>
    <tr>
      <td class="codigo escode"><?php echo $r->codigo;?></td>
      <td class="paciente"><?php echo $r->nome;?></td>
      <td class="ser_cod escode"><?php echo $r->servicos_codigo;?></td>
      <td class="servico"><?php echo $r->descricao;?></td>
      <td class="valor"><?php echo 'R$'.number_format($r->valor,2,',','.');?></td>
      <td class="vencimento"><?php echo date('d/m/Y',strtotime($r->vencimento));?></td>
      <td class="pagamento"><?php echo $r->tipo_pagamento;?></td>
      <td class="d_p"><?php if($r->data_pagamento!='0000-00-00'){echo date('d/m/Y', strtotime($r->data_pagamento));}?></td>
      <td><?php if($r->data_pagamento=='0000-00-00'){;?> <a href="<?php echo base_url('Clinica/pagar_conta/'.$r->codigo);?>" class="btn  btn-default">Pagar</a> <?php ;}?></td>
      <td><a href="#exampleModal" class="btn btn-warning" data-toggle="modal">Editar <span class="glyphicon glyphicon-pencil"></span></a></td>
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

   
         
         
        