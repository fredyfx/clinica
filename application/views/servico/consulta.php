
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Serviço</h4>
      </div>
      
      <div class="modal-body">
      <?php echo form_open('Servico/atualiza');?>    
          <input type="hidden" name="codigo" id="codigo">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Descrição</label>
            <input type="text" name="nome" class="form-control" id="descricao" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Especialidade</label>
            <input type="text" name="espe" class="form-control" id="especialidade" required>
          </div>
        
         <div class="form-group">
            <label for="message-text" class="control-label">Valor</label>
            <input type="text" name="valor" class="form-control" id="valor"  required>
          </div>



<div class="form-group">
<label for="status" class="control-label">Status</label>
<select class="form-control" name="status" required id="op">
  <option value="ativo">Ativo</option>
  <option value="inativo">Inativo</option>
 </select>
</div>

        
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">
  <span class='glyphicon glyphicon-ok'></span> Salvar </button>
        </form>
      </div>
    </div>
  </div>
</div>








   <div class="container-fluid">
            <div class="row">
             
<div class="col-md-12">
 <h3 class="page-header" style="color: white;">
   <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Serviços
 </h3>
 <p><?php echo validation_errors(); ?></p>
</div> 

</div>

   <div class="row">
<div class="col-md-4 col-md-offset-8 busca">
<?php echo form_open('Servico/busca_des', 'class="form-inline"'); ?>
<div class="form-group has-success">
<input type="text" placeholder="Descrição de serviço" class="form-control" name="descricao">
 <input type="submit" value="Pesquisar" class="btn btn-success">
  </div>
  </form>
</div>
   </div>
       


<div class="row">
<div class="col-md-10 col-md-offset-1 wella">
  <div class="table-responsive">
<table class="table table-hover table-striped">
  <thead>
    <tr>
    
      <th>Descrição</th>
      <th>Especialidade</th>
      <th>Valor</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody id="tabela">
    <?php foreach($info as $ser){;?>
    <tr>
      <td class="codigo  escode"><?php echo $ser->codigo;?></td>
      <td class="descricao"><?php echo $ser->descricao;?></td>
      <td class="especialidade"><?php echo $ser->especialidade;?></td>
      <td class="valor"><?php echo $ser->valor;?></td>
      <td class="status"><?php echo $ser->status;?></td>
      <td><a href="#exampleModal" class="btn btn-warning" data-toggle="modal">Editar <span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><a href="<?php echo base_url('Servico/excluir/'.$ser->codigo);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</a></td>
      <?php }; ?>
    </tr>
  </tbody>
</table>


</div>
</div>


</div>

<div class="row">
<div class="col-md-8 col-md-offset-4">
<?php if(!empty($pagi)){echo $pagi;}  ?>


</div>
<hr>
</div>
</div>     
        
        
        
        


     <script type="text/javascript">

$(function(){
 $('#valor').maskMoney({symbol:'R$ ', 
showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 })


 jQuery('tr').click(function () {
                // captura o matriz td clicado
                var valor = $(this);
                // captura o posicao da  linha da matriz
                var cod = valor[0];
                // captira o indice que e uma classe das td
                var c=  $(cod).find('.codigo').text();
                var d = $(cod).find('.descricao').text();
                var e = $(cod).find('.especialidade').text();
                var v = $(cod).find('.valor').text();
                var s=  $(cod).find('.status').text();
             
             $('#codigo').val(c);
             $('#descricao').val(d);
             $('#especialidade').val(e);
             $('#valor').val(v);
          //pergorre o select e seleciona 
    $('#op').find('[value="' + s + '"]').attr('selected', true);
});

</script>   
        
      
  



<script src="<?php echo base_url();?>bootstrap-3.3.6-dist/pluguin/jquery.maskMoney.js" type="text/javascript"></script>
  
    </body>
</html>

   
         
         
        