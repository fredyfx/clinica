 <div class="container-fluid">
            <div class="row">
 

 <div class="col-md-12 well">
                    <h3 class="page-header">
                      <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Funcionário</h3>
<p><?php  echo validation_errors(); ?></p>
<?php 
if(empty($fun)){
echo form_open('Gerencia/cadastro_funcionario');
}else{
  echo form_open('Gerencia/atualiza_funcionario');
}
if($this->session->flashdata('mensagem')){
  echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
}
;?>
 
     
      <div class="row">
<input type="hidden" name="codigo" value="<?php if(!empty($fun)){echo $fun->codigo;} ?>">
  <div class="col-md-10">
<div class="form-group">
     <label for="exampleInputEmail1">Nome</label>
    <input type="text"  name="nome" class="form-control" required value="<?php echo set_value('nome'); if(!empty($fun)){echo $fun->nome;}?>" >
  </div>
</div>


  <div class="col-md-2">
<div class="form-group">
     <label for="exampleInputEmail1">Telefone fixo</label>
    <input type="text" name="tele" class="form-control"  value="<?php echo set_value('tele');if(!empty($fun)){echo $fun->te_resindencial;} ?>" id="tele">
  </div>
  </div>



  <div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Celular</label>
    <input type="text" name="celula" class="form-control"  value="<?php echo set_value('celula'); if(!empty($fun)){echo $fun->celular;} ?>" required id="celu">
  </div>
</div>

<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">CPF</label>
    <input type="text" name="cpf" class="form-control"  value="<?php echo set_value('cpf'); if(!empty($fun)){echo $fun->cpf;}?>" required id="cpf">
  </div>
</div>


<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Data de Nascimento</label>
    <input type="text" name="nascimento" class="form-control datepicker" value="<?php echo set_value('nascimento');if(!empty($fun)){echo date('d/m/Y',strtotime($fun->dt_nascimento));}?>" id="dta" required>
  </div>
</div>


<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Sexo</label>
   <select class="form-control" name="sexo" required id="sexo">
   <option value="">Selecione</option>
  <option value="masculino">Masculino</option>
  <option value="Feminino">Feminino</option>
</select>
  </div>
</div>


<div class="col-md-4">
   <div class="form-group">
     <label for="exampleInputEmail1">CRO</label>
    <input type="text"  name="cro" class="form-control" value="<?php echo set_value('cro');if(!empty($fun)){echo $fun->cro;}?>">
  </div>
</div>



<div class="col-md-4">
   <div class="form-group">
     <label for="exampleInputEmail1">E-mail</label>
    <input type="text" name="email" class="form-control" required value="<?php echo set_value('email');if(!empty($fun)){echo $fun->email;}?>">
  </div>
</div>

<div class="col-md-3">
   <div class="form-group">
<label for="exampleInputEmail1">Perfil</label>
<select class="form-control" name="perfil" required onchange="mostra()" id="per">
  <option value="">Selecione</option>
  <option value="Secretária">Secretária</option>
  <option value="Dentista">Dentista</option>
  <option value="THD">THD</option>
  <option value="ACD">ACD</option>
  <option value="serviçosgerais">Serviço gerais</option>
</select>
  </div>
</div>


<div class="col-md-5 escode" id="especi">
   <div class="form-group">
     <label for="exampleInputEmail1">Especialização</label>
    <input type="text" name="espe" class="form-control" value="<?php echo set_value('espe');if(!empty($fun)){echo $fun->especializacao;}?>" id="es">
  </div>
</div>




<div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Cep:</label>
    <input type="text" name="cep" class="form-control cep" required value="<?php echo set_value('cep');if(!empty($fun)){echo $fun->cep;}?>">
  </div>
</div>


<div class="col-md-2">
   <div class="form-group">
    <label for="exampleInputEmail1">Status</label>
 <select  class="form-control" id="status" name="status" required>
 <option value="">Selecione</option>
  <option value="ativo">Ativo</option>
  <option value="inativo">Inativo</option>
  </select>
  </div>
</div>


 
 <div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Estado</label>
    <input type="text" name="estado" class="form-control" required data-cep="uf" value="<?php echo set_value('estado'); if(!empty($fun)){echo $fun->estado;}?>">
  </div>
</div>


<div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Cidade</label>
    <input type="text" name="cidade" class="form-control" required  data-cep="cidade" value="<?php echo set_value('cidade'); if(!empty($fun)){echo $fun->cidade;}?>">
  </div>
</div>



<div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Bairro</label>
    <input type="text" name="bairro" class="form-control" required data-cep="bairro" value="<?php echo set_value('bairro');if(!empty($fun)){echo $fun->bairro;}?>">
  </div>
</div>

<div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Endereço</label>
    <input type="text" name="end" class="form-control" required data-cep="logradouro" value="<?php echo set_value('end'); if(!empty($fun)){echo $fun->endereco;}?>">
  </div>
</div>

<div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Complemento</label>
    <input type="text" name="comple" class="form-control" required value="<?php echo set_value('comple'); if(!empty($fun)){echo $fun->complemento;}?>">
  </div>
</div>


<div class="col-md-6 escode" id="senh">
   <div class="form-group">
     <label for="exampleInputEmail1">Senha</label>
    <input type="password" name="senha" class="form-control" value="<?php echo set_value('senha');?>" id="senha">
  </div>
</div>

    <div class="col-md-12">
   <div class="form-group">
    <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
  </div>
</div>
 






     </form>
   
  

  

 
           
           
         </div> 
        </div>
        
        </div>
          </div>
        
        
        
        
        
<script type="text/javascript">


$('.datepicker').datepicker({
format: 'dd/mm/yyyy',                
language: 'pt-BR',
orientation: "bottom left",
 });

$(document).ready(function() {
     $('.cep').cep();

     $('.cep').mask("99999-999");
     $('#dta').mask("99/99/9999");
     $('#cpf').mask("999.999.999-99");
     $('#celu').mask("(99)99999-9999");
     $('#tele').mask("9999-9999");
     verifica_edit();
    });


function mostra(){
var x=$('#per').val();
if( x==="Dentista" ){
  document.getElementById("es").required = true;
  document.getElementById("senha").required = true;
$('#especi').show();
$('#senh').show();
 }else if(x==="Secretária"){
  document.getElementById("senha").required = true;
  document.getElementById("es").required = false;
 $('#senh').show();
 $('#especi').hide();
  }else{
  document.getElementById("senha").required = false;
  document.getElementById("es").required = false;
  $('#es').val("");
  $('.escode').hide();
  }
}


function verifica_edit(){
 var per="<?php  if(!empty($fun->perfil)){echo $fun->perfil;}?>";
 var sexo="<?php if(!empty($fun->sexo)) {echo $fun->sexo;}?>" ;
 var espe="<?php if(!empty($fun->especializacao)){echo $fun->especializacao;}?>";
 var status="<?php if(!empty($fun->status)){echo $fun->status;}?>";
if(per!=""){
$('#per').val(per);
$('#sexo').val(sexo);
$('#status').val(status);
}
if(espe!=""){
mostra();
}
}

 

</script>
        
        
    </body>
</html>
