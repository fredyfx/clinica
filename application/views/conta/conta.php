<div class="container">
            <div class="row">
             


                <div class="col-md-12 well">
                    <h3 class="page-header">
                      <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> Contas a pagar</h3>
<p><?php  echo validation_errors(); ?></p>
<?php 
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
        ;?>
 
    <?php echo form_open('Clinica/cadastra_conta'); ?>    
      <div class="row"> 

  <div class="col-md-8">
<div class="form-group">
     <label for="exampleInputEmail1">Descrição</label>
<input type="text" name="descricao" class="form-control" value="<?php echo set_value('nome');?>" required>
  </div>
</div>


  <div class="col-md-3">
<div class="form-group">
     <label for="exampleInputEmail1">Valor</label>
    <input type="text"  name="valor" class="form-control" required id="moeda" value="<?php echo set_value('valor'); ?>" 
>
  </div>
  </div>


<div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Data de vencimento</label>
    <input type="text" name="vencimento" class="form-control datepicker" required value="<?php echo set_value('vencimento'); ?>" 
>
  </div>
</div>


  <div class="col-md-5">
   <div class="form-group">
     <label for="exampleInputEmail1">Categoria</label>
  <select class="form-control" name="categoria">
  <option value="">Selecione</option>
  <option value="Infraestrutura">Infraestrutura</option>
  <option value="Encargos de funcionários">Encargos de funcionários</option>
  <option value="Laboratórios">Laboratórios</option>
  <option value="Materiais odontológicos">Materiais odontológicos</option>
  <option value="Custos Fixos">Custos Fixos (aluguel, telefone, internet)</option>
  <option value="Outras">Outros</option>
  </select>
  </div>
</div>


<div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Forma de pagamento</label>
   <select class="form-control" required name="tipo">
    <option value="">Selecione</option>
  <option value="Cartão de credito">Cartão de crédito</option>
  <option value="Cartão de débito">Cartão de débito </option>
  <option value="Dinheiro">Dinheiro</option>
  <option value="Conta no Banco">Conta no Banco</option>
</select>
  </div>
</div>


<div class="col-md-3">
   <div class="form-group">
    <div class="checkbox">
    <label>
  <input type="checkbox" id="despe"> Essa despesa já foi paga.
    </label>
  </div>
  </div>
</div>


<div class="col-md-3 escode">
  <input type="text" name="data" id="pg" class="form-control datepicker" placeholder="Data de pagamento" value="<?php echo set_value('data'); ?>" 
>
</div>


<div class="col-md-12">
   <div class="form-group">
    <button class="btn btn-primary">
    <span class="glyphicon glyphicon-ok"></span> Salvar</button>
  </div>
</div>
 
</form>
   
  

  

 
           
           
         </div> 
        </div>
        
        </div>
        
        
        
        
      <script src="<?php echo base_url();?>bootstrap-3.3.6-dist/pluguin/jquery.maskMoney.js" type="text/javascript"></script>
  
        
           
<script type="text/javascript">
$(function(){
 $("#moeda").maskMoney({symbol:'R$ ', 
showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 })


$('.datepicker').datepicker({
format: 'dd/mm/yyyy',                
language: 'pt-BR',
orientation: "bottom left",
 });

$( "#despe" ).on( "click", function( event ) {
$('.escode').toggle();



if(document.getElementById("pg").required == true){
      document.getElementById("pg").required = false;
     
    }else{
      document.getElementById("pg").required = true;
      
    }


});

</script>
 
        
        
    </body>
</html>
