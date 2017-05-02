<div class="container-fluid">
            <div class="row">
             
                <style type="text/css">
                    
                    .checkbox{
                        
                            font-weight: bold;
                    }
                    
                    </style>

                <div class="col-md-12 well">
                    <h3 class="page-header">
       <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>  Ficha de  Anamnese</h3>

<p><?php  echo validation_errors(); ?></p>
 <?php 
      if($this->session->flashdata('mensagem')){
       echo "<h3 class='alert alert-success'>".$this->session->flashdata('mensagem')."</h3>";
      }
        ;?>
     <?php echo form_open('Gerencia/cadastro_anamnese'); ?>    
      <div class="row">

  <div class="col-md-6">
     
<p class="lead">Possui alguma doença?</p>
<div class="checkbox">
   <input type="radio" name="doenca" value="sim" class="opcao" required>Sim
  <input type="radio" name="doenca" id="opcaon" value="nao" >Não
</div>
   
 <div class="escode" id="mostra">
   <input type="text" name="nome"  placeholder=" Nome da doença" value="<?php echo set_value('nome'); ?>" >
  </div>
  <hr>

   <p class="lead">Possui alguma alergia?</p>
   <div class="checkbox">
    <input type="radio" name="alergia" class="alergia" value="sim" required>Sim
    <input type="radio" name="alergia" id="alern" value="não">Não
   </div>
                         
  
  <div class="escode" id="aler">
   <input type="text" name="alergia_nome" placeholder=" Nome da alergia "value="<?php echo set_value('alergia_nome'); ?>" >
  </div>
                          
  <hr>
  <p class="lead">Usa algum medicamento?</p>
  <div class="checkbox">
   <input type="radio" name="medicam" class="medica"  value="sim" required>Sim
   <input type="radio" name="medicam" id="medin" value="nao">Não
   </div>
  
  <div class="escode" id="medicamento">
   <input type="text" name="nome_medica" placeholder=" Nome do medicamento" value="<?php echo set_value('nome_medica'); ?>" >
  </div>
                           
</div>


  <div class="col-md-6">
  <p class="lead">É fumante?</p>
  <div class="checkbox">
      <input type="radio" name="fumante" value="sim" required>Sim
      <input type="radio" name="fumante"  value="nao">Não
  </div>
                           
   <hr>
  <p class="lead">É gestante?</p>
  <div class="checkbox">
<input type="radio" name="g" value="sim" required>Sim
 <input type="radio" name="g" value="não">Não
  </div>
                         
<hr>                   
  <p class="lead">É hipertenso?</p>
  <div class="checkbox">
     <input type="radio" name="p" value="sim" required>Sim
     <input type="radio" name="p" value="não">Não
  </div>

     </div>


<div class="col-md-6">
   <div class="form-group"><br>
    <button class="btn btn-primary"><span class="glyphicon glyphicon-ok"></span> Salvar</button>
  </div>
</div>


  </div>



 






     </form>
   
  

  

 
           
           
         </div> 
        </div>
        
        </div>
        
        
        
        
        
        
<script type="text/javascript">
        
  var hiddenBox = $( "#mostra" );
  //aparece
$( ".opcao" ).on( "click", function( event ) {
  hiddenBox.show();
});
//escode 
$( "#opcaon" ).on( "click", function( event ) {
  hiddenBox.fadeOut();
});

//aparece
var op = $( "#aler" );
$( ".alergia" ).on( "click", function( event ) {
  op.show();
});
//escode
$( "#alern" ).on( "click", function( event ) {
  op.fadeOut();
});
//aparece
var med = $( "#medicamento" );
$( ".medica" ).on( "click", function( event ) {
  med.show();
});
//escode
$( "#medin" ).on( "click", function( event ) {
  med.fadeOut();
});


    
    </script>


        
        
    </body>
</html>
