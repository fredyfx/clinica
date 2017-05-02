
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
<h4 class="modal-title" id="exampleModalLabel"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Contas a pagar
</h4>
  </div>
     <div class="modal-body">
      <?php echo form_open('Clinica/atualiza_conta',"id='formu'");?>    
          <input type="hidden" name="codigo" id="codigo">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Descrição</label>
            <input type="text" name="descricao" class="form-control" id="descricao" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Valor</label>
            <input type="text" name="valor" class="form-control" id="valor" required>
          </div>
        
         <div class="form-group">
            <label for="message-text" class="control-label">Vencimento</label>
            <input type="text" name="vencimento" class="form-control" id="vencimento"  required>
          </div>



<div class="form-group">
<label for="categoria" class="control-label">Categoria</label>
 <select class="form-control" name="categoria" required id="cate">
  <option value="Infraestrutura">Infraestrutura</option>
  <option value="Encargos de funcionários">Encargos de funcionários</option>
  <option value="Laboratórios">Laboratórios</option>
  <option value="Materiais odontológicos">Materiais odontológicos</option>
  <option value="Custos Fixos">Custos Fixos (aluguel, telefone, internet)</option>
  <option value="Outras">Outros</option>
 </select>
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
   <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Contas a pagar
 </h3>
 <p><?php echo validation_errors(); ?></p>
</div> 

</div>

   <div class="row">
<div class="col-md-4 col-md-offset-8 busca">
<?php echo form_open('Clinica/busca_conta', 'class="form-inline"'); ?>
<div class="form-group has-success">
<input type="text" placeholder="Descrição da conta" class="form-control" name="descricao" required autofocus>
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
    
      <th>Descrição</th>
      <th>Valor</th>
      <th>Vencimento</th>
      <th>Categoria</th>
      <th>Pagamento</th>
      <th>Data de Pagamento</th>

    </tr>
  </thead>
  <tbody id="tabela">

    <?php foreach($conta as $c){;?>
    <tr>
      <td class="codigo  escode"><?php echo $c->codigo;?></td>
      <td class="descricao"><?php echo $c->descricao;?></td>
      <td class="valor"><?php echo 'R$'.number_format($c->valor,2,',','.');?></td>
      <td class="vencimento"><?php echo date('d/m/Y',strtotime($c->vencimento));?></td>
      <td class="categoria"><?php echo $c->categoria;?></td>
      <td class="pagamento"><?php echo $c->tipo_pagamento;?></td>
      <td class="d_p"><?php if($c->data_pagamento!='0000-00-00'){echo date('d/m/Y', strtotime($c->data_pagamento));} ?></td>
      <td><?php if($c->data_pagamento=='0000-00-00'){;?> <a href="<?php echo base_url('Clinica/pagar_recebimento/'.$c->codigo);?>" class="btn  btn-default">Pagar</a> <?php ;}?></td>
      <td><a href="#exampleModal" class="btn btn-warning" data-toggle="modal">Editar <span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><a href="<?php echo base_url('Clinica/excluir_conta/'.$c->codigo);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</a></td>
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
               var d= $(cod).find('.descricao').text();
               var v= $(cod).find('.valor').text();
               var venc= $(cod).find('.vencimento').text();
               var cat= $(cod).find('.categoria').text();
               var p= $(cod).find('.pagamento').text();
               var data= $(cod).find('.d_p').text();
              // sbstitui o RS
              var valor =v.replace("R$","");
             $('#codigo').val(c);
             $('#descricao').val(d);
             $('#valor').val(valor);
             $('#vencimento').val(venc);
             $("#cate").val(cat);
             $("#tipo").val(p);
          //pergorre o select e seleciona 
      //$('#cate').find('[value="' + cat + '"]').attr('selected', true);
      //$('#tipo').find('[value="' + p + '"]').attr('selected', true);
      $('#pagamento').val(data);
});


</script>   





   



<script src="<?php echo base_url();?>bootstrap-3.3.6-dist/pluguin/jquery.maskMoney.js" type="text/javascript"></script>
  
    </body>
</html>

   
         
         
        