<div class="container">
            <div class="row">
             
 <div class="col-md-12 well">
                    <h3 class="page-header">
                      <span class="glyphicon glyphicon-list" aria-hidden="true"></span> Serviços</h3>

<p><?php  echo validation_errors(); ?></p>
<?php 
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
        ;?>
 
     <?php echo form_open('Servico/cadastra'); ?>    
      <div class="row">

  <div class="col-md-10">
<div class="form-group">
     <label for="exampleInputEmail1">Nome</label>
    <input type="text"  name="nome" class="form-control" value="<?php echo set_value('nome'); ?>"   required>
  </div>
</div>


  <div class="col-md-6">
<div class="form-group">
     <label for="exampleInputEmail1">Especialidade</label>
    <input type="text" name="espe" class="form-control" value="<?php echo set_value('espe'); ?>" required>
  </div>
  </div>



  <div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Valor</label>
    <input type="text" name="valor" class="form-control" id="moeda" value="<?php echo set_value('valor'); ?>" required>
  </div>
</div>

<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Status</label>
   <select class="form-control" required name="status">
  <option value="">Selecione</option>
  <option value="ativo">Ativo</option>
  <option value="inativo">Inativo</option>
 </select>
  </div>
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
</script>
        
        
        
    </body>
</html>

   
         
         
        