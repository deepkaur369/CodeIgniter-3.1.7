<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>  
    <html>  
    <head>  
    <title>Register</title>  
        <style>   
            body{  
        margin-top: 100px;  
        margin-bottom: 100px;  
        margin-right: 150px;  
        margin-left: 80px;  
        background-color: azure ;  
        color: palevioletred;  
        font-family: verdana;  
        font-size: 100%  
          
            }  
                h1 {  
        color: indigo;  
        font-family: verdana;  
        font-size: 100%;  
    }  
             h2 {  
        color: indigo;  
        font-family: verdana;  
        font-size: 100%;  
    }</style>  
    </head>  
  <body>  
			 <?php 
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');
              if($success_msg){?>
                    <div class="alert alert-success">
                          <?php echo $success_msg; ?>
                    </div>
              <?php
              }
              if($error_msg){
              ?>
                    <div class="alert alert-danger">
                        <?php echo $error_msg; ?>
                    </div>
              <?php
              }
        			?>

   <div id="body">
   	<?php echo anchor('Registration/index', 'Registration'); ?>      
        <center><h2>Login Form</h2></center>  
            <?php 
            if (isset($_POST['button'])){
            echo form_open('Comment/loginForComment'); }
            else{
echo form_open('Login/loginUser');
            }?>
              <legend>  
                  <fieldset>  
                      <table width="800" border="0" align="center">
	                          <tr><th scope="row"> <?php
                                echo form_label('User Name :', 'user');
								                $data= array(
								                'name' => 'user',
								                'placeholder' => 'Please Enter User Name',
								                'class' => 'input_box'
								                );
								                echo form_input($data); ?></th>
                            </tr>
                           
                            <tr><th scope="row"> <?php
                                echo form_label('Password :', 'pass');
								                $data= array(
								                'name' => 'pass',
								                'placeholder' => 'Please Enter Password',
								                'type' => 'password'
								                );
								                echo form_input($data); ?></th>
                            </tr>

		         			          <tr><th scope="row"> <div id="form_button"><?php
							                   $data = array(
								                'type' => 'submit',
								                'value'=> 'Login',
								                'class'=> 'submit'
								                );
							                 echo form_submit($data); ?></div></th></tr>
                            
                        </table>     
                    </fieldset>  
                </legend>            
            <?php echo form_close(); ?>
        </div> 
    </body>      
</html>   