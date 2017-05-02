 <div class="container-fluid">
            <div class="row">
             
             <div class="col-md-12 well">
                    <h3 class="page-header">
                      <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Agendamento</h3>

                   <p><?php  echo validation_errors(); ?></p>  
<?php 
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
        ;?>
 
     <?php echo form_open('Gerencia/cadastro_agenda'); ?>    
      <div class="row">

  <div class="col-md-7">
<div class="form-group">
     <label for="exampleInputEmail1">Paciente</label>
    <input type="text" name="paciente" class="form-control" required value="<?php echo set_value('paciente'); ?>" id="paciente">
  </div>
</div>


  <div class="col-md-4">
<div class="form-group">
     <label for="exampleInputEmail1">Dentista</label>
   <select class="form-control" required name="dentista">
  <option value="">Selecione</option>
<?php foreach ($dent as $value){;?>
  <option value="<?php echo $value->codigo;?>"><?php echo $value->nome ;}?></option>
  </select>
  </div>
  </div>


<div class="col-md-4">
   <div class="form-group">
     <label for="exampleInputEmail1">Serviço</label>
    <select class="form-control" required name="servico">
       <option value="">Selecione</option>
       <?php foreach ($ser as $value){;?>
         <option value="<?php echo $value->codigo;?>"><?php echo $value->descricao;}?></option>
        </select>
  </div>
</div>


  <div class="col-md-1">
   <div class="form-group">
     <label for="exampleInputEmail1">Horário</label>
    <input type="text" name="horario" class="form-control hora" required id="datetimepicker3" value="<?php echo set_value('horario'); ?>" >
  </div>
</div>

<div class="col-md-1">
   <div class="form-group">
     <label for="exampleInputEmail1">Até</label>
    <input type="text" name="ate" class="form-control hora" required id="timepicker" value="<?php echo set_value('ate'); ?>" >
  </div>
</div>


<div class="col-md-2">
   <div class="form-group">
     <label for="exampleInputEmail1">Data</label>
    <input type="text" name="data"  class="form-control datepicker" required value="<?php echo set_value('data'); ?>" >
  </div>
</div>


 <div class="col-md-2">
<div class="form-group">
     <label for="exampleInputEmail1">Status</label>
   <select class="form-control" required name="status">
       <option value="">Selecione</option>
 <option value="agendado">Agendado</option>
 <option value="atendido">Atendido</option>
  </select>
  </div>
  </div>


<div class="col-md-10">
   <div class="form-group">
     <label for="exampleInputEmail1">Observação</label>
    <input type="text" name="obs" class="form-control"  value="<?php echo set_value('obs'); ?>" >
  </div>
   <div class="form-group">
    <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Salvar </button>
   
  </div>
</div>


 






     </form>
   
  

  

 
           
           
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

//ajax 


var availableTags = [
  "ActionScript",
  "AppleScript",
  "Asp",
  "BASIC",
  "C",
  "C++",
  "Clojure",
  "COBOL",
  "ColdFusion",
  "Erlang",
  "Fortran",
  "Groovy",
  "Haskell",
  "Java",
  "JavaScript",
  "Lisp",
  "Perl",
  "PHP",
  "Python",
  "Ruby",
  "Scala",
  "Scheme"
];

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







  </script>
        



    