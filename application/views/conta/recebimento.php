<div class="container">
            <div class="row">
             


                <div class="col-md-12 well">
                    <h3 class="page-header">
                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Recebimento</h3>

<p><?php  echo validation_errors(); ?></p>
<?php 
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
        ;?>
 
     <?php echo form_open('Clinica/cadastra_recebimento'); ?>    
      <div class="row">

  <div class="col-md-10">
<div class="form-group">
     <label for="exampleInputEmail1">Paciente</label>
  <input type="text" name="nome" class="form-control" required value="<?php echo set_value('nome'); ?>" id="paciente">
  </div>
</div>

<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Valor</label>
    <input type="text" name="valor" class="form-control" 
   required value="<?php echo set_value('valor'); ?>" id="moeda"> 
  </div>
</div>
  


<div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Serviços</label>
  <select name="servico" class="form-control" required
  onchange="mostra()" id="ser">
     <option value="">Selecione</option>
     <?php foreach ($dados as $ob) { ;?>
   <option value="<?php echo $ob->codigo ;?>"><?php echo $ob->descricao ;}?></option>
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



<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Data de vencimento</label>
    <input type="text" name="vencimento" class="form-control datepicker" required value="<?php echo set_value('vencimento'); ?>" >
  </div>
</div>


<div class="col-md-2">
<label class="checkbox-inline">
  <input type="checkbox" name="receita" onclick="aparece()">
  <p>Receber receita</p>
</label>


<div class="form-group escode">
   <input type="text"  name="data" id="pg" class="form-control datepicker" placeholder="Data de pagamento" value="<?php echo set_value('data'); ?>" >
</div>
</div>


<div class="col-md-12">
   <div class="form-group">
    <button class="btn btn-primary"><span class='glyphicon glyphicon-ok'></span> Salvar</button>
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

function aparece(){
$('.escode').toggle();
if(document.getElementById("pg").required == true){
  document.getElementById("pg").required = false;
     
    }else{
      document.getElementById("pg").required = true;
      }
}


$('#paciente').autocomplete({
    source: function( request, response ) {
    $.ajax({
          method:"POST",
          url:"<?php echo base_url('Gerencia/auto');?>",
          dataType: "json",
          data: {
            paciente: request.term
          },
          success: function(data) {
          response(data);
}

});
      
 },
 minLength: 3,
});


function mostra() {
 $.ajax({
          method:"POST",
          url:"<?php echo base_url('Clinica/valor_servico');?>",
          dataType: "json",
          data: {
            codigo: $('#ser').val()
          },
          success: function(data) {
     $('#moeda').val(data.valor);
}
});
};
</script>
        
        
        
        
        
        
    </body>
</html>
