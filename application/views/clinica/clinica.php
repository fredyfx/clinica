<div class="container-fluid">
            <div class="row">
             


                <div class="col-md-12 well">
                    <h3 class="page-header">
                      <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Clínica</h3>

<p><?php echo validation_errors(); ?> </p>
<p> <?php 
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
        ;?></p>

<?php if (!empty($cont)) {
    echo form_open('Clinica/atualiza');}
  else
  {
 echo form_open('Clinica/cadastra');  
}

  ;?>


    
      <div class="row">

  <div class="col-md-10">
<div class="form-group">
  <input type="hidden" name="codigo" value="<?php if(!empty($cont)){echo $cont->codigo;}?>">
     <label for="exampleInputEmail1">Nome da clínica</label>
    <input type="text"  name="nome" class="form-control" value="<?php echo set_value('nome'); if(!empty($cont)) {echo $cont->nome;}?>" required>
  </div>
</div>


  <div class="col-md-2">
<div class="form-group">
     <label for="exampleInputEmail1">Telefone</label>
    <input type="text"  name="tele" class="form-control" id="tele" value="<?php echo set_value('tele'); if(!empty($cont)) {echo $cont->telefone;} ?>" required>
  </div>
  </div>



  <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">CNPJ</label>
    <input type="text" name="cnpj" class="form-control" id="cnpj" value="<?php echo set_value('cnpj'); if(!empty($cont)) {echo $cont->cnpj;}?>" required>
  </div>
</div>


 <div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Cep:</label>
    <input type="text" name="cep" class="form-control cep" value="<?php echo set_value('cep'); if(!empty($cont)) {echo $cont->cep;}?>" required>
  </div>
</div>




 <div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Estado</label>
    <input type="text" name="estado" class="form-control" value="<?php echo set_value('estado'); if(!empty($cont)) {echo $cont->estado;}?>" data-cep="uf" required>
  </div>
</div>


<div class="col-md-4">
   <div class="form-group">
     <label for="exampleInputEmail1">Cidade</label>
    <input type="text" name="cidade" class="form-control" value="<?php echo set_value('cidade'); if(!empty($cont)) {echo $cont->cidade;}?>" data-cep="cidade" required>
  </div>
</div>



<div class="col-md-4">
   <div class="form-group">
     <label for="exampleInputEmail1">Bairro</label>
    <input type="text" name="bairro" class="form-control" value="<?php echo set_value('bairro'); if(!empty($cont)) {echo $cont->bairro;}?>" data-cep="bairro" required>
  </div>
</div>

<div class="col-md-4">
   <div class="form-group">
     <label for="exampleInputEmail1">Endereço</label>
    <input type="text" name="end" class="form-control" value="<?php echo set_value('end'); if(!empty($cont)) {echo $cont->endereco;}?>" data-cep="logradouro" required>
  </div>
</div>

<div class="col-md-12">
   <div class="form-group">
     <label for="exampleInputEmail1">Complemento</label>
    <input type="text" name="complemento" class="form-control" value="<?php echo set_value('complemento');  if(!empty($cont)) {echo $cont->complemento;} ?>" required>
  </div>
<!--
 <div class="form-group">
  <label for="exampleInputFile">Entrada de arquivo</label>
  <input type="file" id="exampleInputFile">
  </div> -->

<div class="form-group">
<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
</div>
   </div>  


     </form>
   
   </div> 
        </div>
        
        </div>
        
</div>
        
        <script type="text/javascript">
$(document).ready(function() {
     $('.cep').cep();
     $('.cep').mask("99999-999");;
     $('#tele').mask("9999-9999");
     $("#cnpj").mask("99.999.999/9999-99");
    });
        </script>
        
        
        
        
   