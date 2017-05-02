<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ficha de anamnese</h4>
      </div>
      <div class="modal-body">
      
<?php echo form_open('Gerencia/atualiza_anamnesse');?>   
  <div class="form-group">
    <input type="hidden" name="codigo" id="codigo">
    <label for="paciente">Paciente</label>
    <input type="text" class="form-control" name="paciente" required id="paciente">
  </div>

  <div class="form-group">
    <label for="doenca">Doença</label>
    <input type="text" class="form-control" name="doenca" required id="doenca">
  </div>
 

  <div class="form-group">
    <label for="alergia">Alergia</label>
    <input type="text" class="form-control" name="alergia" required id="alergia">
  </div>

   <div class="form-group">
    <label for="medicamento">Medicamento</label>
    <input type="text" class="form-control" name="medicamento" required id="medicamento">
  </div>


 <div class="form-group">
    <label for="medicamento">Gestante</label>
    <input type="text"  name="gestande" class="form-control" required id="gestande">
  </div>


<label class="checkbox-inline">
  <input type="checkbox" name="fumante" value="sim" id="fumante"> Fumante
</label>
 
<label class="checkbox-inline">
  <input type="checkbox" name="pressao" value="sim" id="Hiper"> Hipertenso
</label>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
      </form>
      </div>
    </div>
  </div>
</div>












<div class="container-fluid">
  <div class="row">
             
<div class="col-md-12">
 <h3 class="page-header" style="color: white;">
   <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Paciente 
 </h3>
 <p><?php echo validation_errors(); ?></p>
</div> 
<div class="col-md-6">
  <?php 
      if($this->session->flashdata('mensagem')){
       echo "<p class='lead' style='color: white;'>".$this->session->flashdata('mensagem')."</p>";
      }
        ;?>
</div>

</div>

<div class="row">
<div class="col-md-4 col-md-offset-8 busca">
<?php echo form_open('Gerencia/busca_paciente', 'class="form-inline"'); ?>
<div class="form-group has-success">
<input type="text" placeholder="Nome do paciente" class="form-control" name="paciente" required autofocus>
 <input type="submit" value="Pesquisar" class="btn btn-success">
  </div>
  </form>
</div>
   </div>
       


<div class="row">
<div class="col-md-12 wella">
  <div class="table-responsive">
<table class="table table-hover table-striped">
  <thead>
    <tr>
    
      <th>Nome</th>
      <th>CPF</th>
      <th>Celular</th>
      <th>Sexo</th>
      <th>Data de nascimento</th>
      <th>Cep:</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($pa as $p){;?>
    <tr>
      
      <td><?php echo $p->nome;?></td>
      <td><?php echo $p->cpf;?></td>
      <td><?php echo $p->celular;?></td>
      <td><?php echo $p->sexo;?></td>
<td><?php echo date("d/m/Y",strtotime($p->dt_nascimento));?></td>
     <td><?php echo $p->cep;?></td>
      <td><a href="<?php echo base_url('Gerencia/editar_paciente/'.$p->codigo);?>" class="btn btn-warning" >Editar <span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><a href="<?php echo base_url('Gerencia/excluir_paciente/'.$p->codigo);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</a></td>
      <td><a href="#myModal" class="btn btn-info" data-toggle="modal"  onclick="busca('<?php echo $p->codigo ;?>')"><span class="" aria-hidden="true"></span>  Anamnese</a></td>
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
function busca (a) {
 $.ajax({
  method:'POST',
  url: "<?php echo base_url('Gerencia/busca_anamnese');?>",
  data: {
    codigo: a
  },
  success: function(result) {
    $('#codigo').val(a);
    // converte formado json para javascript
   var obj = JSON.parse(result);
   $('#paciente').val(obj.nome);
   $('#doenca').val(obj.doenca);
   $('#alergia').val(obj.alergia);
   $('#medicamento').val(obj.medicamento);
   $('#gestande').val(obj.gestante);
//verifica se e fumate 
 if(obj.fumante === "sim"){$("#fumante").attr("checked",true);}else{$("#fumante").attr("checked",false);}
// verifica se e hipertenso
 if(obj.pressao === "sim"){$("#Hiper").attr("checked",true);}else{$("#Hiper").attr("checked",false);}
}
});
}

</script>










   

    </body>
</html>

   
         
         
        