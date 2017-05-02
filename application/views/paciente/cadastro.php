 <div class="container-fluid">
            <div class="row">
             


                <div class="col-md-12 well">
                    <h3 class="page-header">
                      <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Paciente</h3>

<p><?php echo validation_errors(); ?></p>

<?php 
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
        ;?>

        <?php if(!empty($pa)){
          echo form_open('Gerencia/atualiza_paciente');
        }else{
          echo form_open('Gerencia/cadastro_paciente');
        } ?>
 
       
      <div class="row">
<input type="hidden" name="codigo" value="<?php if(!empty($pa)){echo $pa->codigo;}?>">
  <div class="col-md-10">
<div class="form-group">
     <label for="exampleInputEmail1">Nome</label>
    <input type="text" name="nome" class="form-control" required value="<?php echo set_value('nome'); if(!empty($pa)){echo $pa->nome;}?>">
  </div>
</div>


  <div class="col-md-2">
<div class="form-group">
     <label for="exampleInputEmail1">Telefone fixo</label>
    <input type="text" name="tele" class="form-control" id="tel" value="<?php echo set_value('telefone'); if(!empty($pa)){echo $pa->te_resindencial;}?>">
  </div>
  </div>



  <div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Celular</label>
    <input type="text" name="celula" class="form-control" required id="celu" value="<?php echo set_value('celula'); if(!empty($pa)){echo $pa->celular;}?>" >
  </div>
</div>

<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">CPF</label>
    <input type="text" name="cpf" class="form-control cpf" required  value="<?php echo set_value('cpf'); if(!empty($pa)){echo $pa->cpf;}?>" >
  </div>
</div>


<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Data de Nascimento</label>
    <input type="text" name="nascimento" class="form-control datepicker" required id="dta" value="<?php echo set_value('nascimento');if(!empty($pa)){echo date('d/m/Y',strtotime($pa->dt_nascimento));} ?>" onBlur="verifica(this.value)">
  </div>
</div>


<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Sexo</label>
   <select class="form-control" name="sexo" required id="se">
    <option value="">Selecione</option>
  <option value="masculino">Masculino</option>
  <option value="Feminino">Feminino</option>
</select>
  </div>
</div>

<div class="col-md-3">
   <div class="form-group">
     <label for="exampleInputEmail1">Cep:</label>
    <input type="text" name="cep" class="form-control cep" required id="cep"value="<?php echo set_value('cep'); if(!empty($pa)){echo $pa->cep;} ?>" >
  </div>
</div>

<div class="col-md-7 escode">
   <div class="form-group">
     <label for="exampleInputEmail1">Nome do responsável</label>
    <input type="text" name="responsavel" class="form-control res"  value="<?php echo set_value('responsavel'); if(!empty($pa)){echo $pa->nome_responsavel;}?>" >
  </div>
</div>

<div class="col-md-3 escode">
   <div class="form-group">
     <label for="exampleInputEmail1">CPF do responsável</label>
    <input type="text" name="cpf_responsavel" class="form-control res cpf" value="<?php echo set_value('cpf_responsavel');if(!empty($pa)){echo $pa->cpf_responsavel;} ?>" >
  </div>
</div>






<div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">E-mail</label>
    <input type="text" name="email" class="form-control" required value="<?php echo set_value('email'); if(!empty($pa)){echo $pa->email;}?>" >
  </div>
</div>


<div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Observação</label>
    <input type="text" name="obser" class="form-control" value="<?php echo set_value('obser'); if(!empty($pa)){echo $pa->obs;}?>" >
  </div>
</div>

<div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Estado</label>
    <input type="text" name="estado" class="form-control" required data-cep="uf" value="<?php echo set_value('estado'); if(!empty($pa)){echo $pa->estado;}?>" >
  </div>
</div>


<div class="col-md-6">
   <div class="form-group">
     <label for="exampleInputEmail1">Cidade</label>
    <input type="text" name="cidade" class="form-control" required data-cep="cidade" value="<?php echo set_value('cidade'); if(!empty($pa)){echo $pa->cidade;}?>" >
  </div>
</div>



<div class="col-md-5">
   <div class="form-group">
     <label for="exampleInputEmail1">Bairro</label>
    <input type="text" name="bairro" class="form-control" required data-cep="bairro" value="<?php echo set_value('bairro');if(!empty($pa)){echo $pa->bairro;} ?>" >
  </div>
</div>

<div class="col-md-7">
   <div class="form-group">
     <label for="exampleInputEmail1">Endereço</label>
    <input type="text" name="end" class="form-control" required  data-cep="logradouro" value="<?php echo set_value('end');if(!empty($pa)){echo $pa->endereco;} ?>" >
  </div>
</div>

<div class="col-md-10">
   <div class="form-group">
     <label for="exampleInputEmail1">Complemento</label>
    <input type="text" name="comple" class="form-control" required value="<?php echo set_value('comple');if(!empty($pa)){echo $pa->complemento;} ?>" >
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
     $('.cpf').mask("999.999.999-99");
     $('#celu').mask("(99)99999-9999");
     $('#tel').mask("9999-9999");
     sexo();
     });


 
    function verifica(a){
       // data e um array que recebe tres indice a função split diviti a minha  variavel que em partes que -
       var data=a.split("/");
        ano=parseInt(data[2]);
       da= new Date();
       idade=da.getFullYear()-ano;
     if(idade < "18"){
        $(".escode").show();
        document.getElementsByClassName("res").required=true;
      } 
   else{
     $('.escode').fadeOut();
document.getElementsByClassName("res").required=false;
   } 
   };

function sexo(){
  var s="<?php if(!empty($pa)){echo $pa->sexo;} ?>";
  if(s!=""){
$('#se').val(s);
  }
}


 


        </script>
        
        
        
        
    </body>
</html>
