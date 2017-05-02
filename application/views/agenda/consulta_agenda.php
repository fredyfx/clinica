
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-tasks"></span> Agenda</h4>
      </div>
      
      <div class="modal-body">
      <?php echo form_open('Gerencia/atualiza_agenda');?>    
          <input type="hidden" name="codigo" id="codigo">
          <input type="hidden" name="cod_paciente" id="paciente_cod">
          <div class="row">
          <div class='col-md-12'>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Paciente</label>
            <input type="text" name="paciente" class="form-control" id="paciente" required>
          </div>
          </div>
          </div>
          
      <div class="row">
        <div class="col-md-6">
        <div class="form-group">
     <label for="exampleInputEmail1">Serviço</label>
    <select class="form-control" required name="servico" id="ser">
       <?php foreach ($ser as $value){;?>
         <option value="<?php echo $value->codigo;?>"><?php echo $value->descricao;}?></option>
        </select>
  </div>

</div>

   <div class="col-md-6">
<div class="form-group">
     <label for="exampleInputEmail1">Dentista</label>
   <select class="form-control" required name="dentista" id="dent">
<?php foreach ($dent as $value){;?>
  <option value="<?php echo $value->codigo;?>"><?php echo $value->nome ;}?></option>
  </select>
  </div>
</div>
</div>

<div class="row">
  <div class="col-md-4">
 <div class="form-group">
     <label for="exampleInputEmail1">Horário</label>
    <input type="text" name="horario" class="form-control hora" required  value="<?php echo set_value('horario'); ?>" id="hora">
  </div>
  </div>

 <div class="col-md-4">
  <div class="form-group">
     <label for="exampleInputEmail1">Até</label>
    <input type="text" name="ate" class="form-control hora" required id="ate" value="<?php echo set_value('ate'); ?>" >
  </div>
 </div>


<div class="col-md-4">
<div class="form-group">
     <label for="exampleInputEmail1">Data</label>
    <input type="text" name="data"  class="form-control datepicker" required value="<?php echo set_value('data'); ?>" id="data">
  </div>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
  <div class="form-group">
     <label for="exampleInputEmail1">Status</label>
   <select class="form-control" name="status" id="perfil" required>
 <option value="agendado">Agendado</option>
 <option value="atendindo">Atendido</option>
 
  </select>
  </div>


</div>
 </div>

<div class="row">
<div class="col-md-12">

 <div class="form-group">
     <label for="exampleInputEmail1">Observação</label>
    <input type="text" name="obs" class="form-control"  value="<?php echo set_value('obs');?>" id="obser">
  </div>
  </div>




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
 <span class="glyphicon glyphicon-tasks"></span> Agenda
 </h3>
 <p><?php echo validation_errors(); ?></p>
</div> 

</div>

   <div class="row">
<div class="col-md-4 busca col-md-offset-8">
<?php echo form_open('Gerencia/busca_agenda', 'class="form-inline"'); ?>
<div class="form-group has-success">
<input type="text" placeholder="Nome do paciente" class="form-control" name="paciente">
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
      <th>Funcionários</th>
      <th>Serviços</th>
      <th>Data</th>
      <th>Horário</th>
      <th>Até</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody id="tabela">
    <?php foreach($age as $a){;?>
    <tr>
      <td class="codigo  escode"><?php echo $a->codigo;?></td>
      <td class="pacie_cod escode"> <?php echo $a->paciente_codigo?></td>
      <td class="paciente"> <?php echo $a->nome?></td>
      <td class="cod_fun escode"><?php echo $a->funcionario_codigo; ?></td>
      <td class="funcionario"><?php echo $a->funcionario;?></td>
      <td class="cod_ser escode"><?php echo $a->servicos_codigo; ?></td>
      <td class="servico"><?php echo $a->descricao;?></td>
      <td class="data"><?php echo date('d/m/Y',strtotime($a->data));?></td>
      <td class="horario"><?php echo $a->horario;?></td>
      <td class="ate"><?php echo $a->ate; ?></td>
      <td class="obser escode"><?php echo $a->observacao;?> </td>
      <td class="status"><?php echo $a->status; ?></td>
      <td><a href="#exampleModal" class="btn btn-warning" data-toggle="modal">Editar <span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><a href="<?php echo base_url('Gerencia/excluir_agenda/'.$a->codigo);?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</a></td>
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
</div>
</div>     
        
        
        
        


     <script type="text/javascript">


$('.hora').timepicker({
  'timeFormat': 'H:i',
  'minTime': '8:00 am',
  'maxTime': '11:30pm',
  'step':'15',
  //'disableTimeRanges':[['1:pm','2:pm']]
   });

$('.datepicker').datepicker({
format: 'dd/mm/yyyy',                
language: 'pt-BR',
orientation: "bottom left",
 });


 jQuery('tr').click(function () {
                // captura o matriz td clicado
                var valor = $(this);
                // captura o posicao da  linha da matriz
                var cod = valor[0];
                // captira o indice que e uma classe das td
                var paci_c=$(cod).find('.pacie_cod').text();
                var c=  $(cod).find('.codigo').text();
                var p = $(cod).find('.paciente').text();
                var f = $(cod).find('.cod_fun').text();
                var s = $(cod).find('.cod_ser').text();
                var d=  $(cod).find('.data').text();
                var h=  $(cod).find('.horario').text();
                var ate=$(cod).find('.ate').text();
                var o= $(cod).find('.obser').text();
                var st= $(cod).find('.status').text();
             
             $('#paciente_cod').val(paci_c);
             $('#codigo').val(c);
             $('#paciente').val(p);
             $('#ser').val(s);
             $('#dent').val(f);
             $('#data').val(d);
             $('#hora').val(h);
             $('#ate').val(ate);
             $('#obser').val(o);
             $('#perfil').val(st);

});          

</script>   
        
      
  



    </body>
</html>

   
         
         
        