

<!DOCTYPE html>

<html lang="pt-BR">
    <head>
      <title>Sistema Odontológico</title>
       <meta charset="UTF-8">
       <link rel="shortcut icon" href="<?php echo base_url();?>bootstrap-3.3.6-dist/img/icon.jpg">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo base_url();?>bootstrap-3.3.6-dist/css/bootstrap.min.css">
		<script src=" <?php echo base_url();?>bootstrap-3.3.6-dist/js/jquery.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>bootstrap-3.3.6-dist/js/bootstrap.min.js" type="text/javascript"></script>
       
                <style type="text/css">
                    
                    body{
                        padding-top: 110px;
                        background: #333333;
                      
                      
                    } 
                    h1{
                        color: white;
                        padding-bottom: 10px;
                        text-align: center;
                    }

                </style>
	
       
	

    


 </head>
 <body>
   
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h4 class="modal-title" id="myModalLabel">Recuperar sua senha</h4>
      </div>
      <div class="modal-body">
       <?php echo form_open('Login/redefinir_senha');?>
  <div class="form-group">
    <label for="exampleInputEmail1">Endereço de e-mail</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail" value="<?php echo set_value('email'); ?>" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Digite a sua nova senha</label>
    <input type="password"  name="senha1" class="form-control" id="exampleInputPassword1" placeholder="Senha" value="<?php echo set_value('senha1'); ?>">
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1">Repita sua Senha</label>
    <input type="password" name="repita" class="form-control" id="exampleInputPassword1" placeholder="Senha" value="<?php echo set_value('repita'); ?>">
  </div>
 
  

</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
        </form>
      </div>
    </div>
  </div>
</div>


     <div class="container">
     <h1> Sistema de Gerenciamento Odontológico</h1>
     <div style="color:white">
  <center> 
  <h4><?php echo validation_errors(); ?></h4></center>
       <br>
     </div>
     

   <?php 
      if($this->session->flashdata('mensagem')){
       echo "<div class='col-md-6 col-md-offset-3 alert alert-info'>
 <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
       <p class='text-center'>".$this->session->flashdata('mensagem')."</p>
      </div>";

      }
        ;?>


        
         
         
         
       
            <div class="col-md-5 well col-md-offset-3 ">
               <?php echo form_open('Login/verifica'); ?>    
  <div class="form-group">
    <label for="exampleInputEmail1">Endereço de e-mail</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail" name="usuario" value="<?php echo set_value('usuario'); ?>"   required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha" value="<?php echo set_value('senha'); ?>"   required>
  </div>
                    
                     <div class="form-group">
                    
    <a href="#myModal" class="btn btn-default" data-toggle="modal">Esqueci minha senha</a>
     </div>
       
 <button type="submit" class="btn btn-primary btn-lg btn-block"><span class='glyphicon glyphicon-ok'></span> Entrar</button>
</form>
 
</div>
            
          
     

 </div>


    </body>
</html>
