
    
    
    
   
        
   <div class="container-fluid">
            <div class="row-fluid">
               <div class="span10">
               <h2 class="muted"><i class="icon-th-list icon-white"></i> Cargo</h2>
                </div>
				
				
				<div class="span10 well">
				Campo obrigadorio <i class="icon-pencil"></i>
				
				<?php  echo validation_errors(); 
				 if($this->session->flashdata('mensagem')){ ?> 
				 <div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<?php
       echo "<h3>".$this->session->flashdata('mensagem')."</h3>";
      }
				?>
					</div>
				</div>
             
               <div class="span10">
			    <?php echo form_open('Clinica/cadastro_cargo',"class='form-horizontal'"); ?>    
			   
			    <div class="control-group">
              <label class="control-label">Nome<span> <i class="icon-pencil"></i></span></label>
              <div class="controls">   
                  <input type="text"  name="nome" class="span8 search-query" value="<?php echo set_value('nome'); ?>" required>
               </div>
              </div>
			   
			     <div class="control-group">
              <label class="control-label">Salario <span> <i class="icon-pencil"></i></span></label>
              <div class="controls">   
                  <input type="text"  name="salario" class="span4 search-query" value="<?php echo set_value('valor'); ?>"  required>
               </div>
              </div>
			   
			   <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-inverse">Cadastra</button>
    </div>
  </div>
			   
			   
			   
			   
			   
			   
			    </form>
			   </div>
                   
               </div>
 </div>


  
  
       
    
       




        
      
        
        
      
         
         
         
         
         
         
         
         

       
        
    
    </body>
</html>