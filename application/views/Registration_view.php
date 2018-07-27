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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

function validate()
    {


       var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
       var phoneno = /^\d{10}$/;
       var user = document.getElementById("user").value;
       var email = document.getElementById("email").value;
       var mobile = document.getElementById("mobile").value;
       var pass = document.getElementById("pass").value;
       var check = 0;
       var x = document.getElementById("test");
       console.log(x);


     
    if (user==null || user=="",email==null || email=="",mobile==null || mobile=="",pass==null || pass=="")
        {
            document.getElementById('spanmesg').innerHTML="Please Fill All Required Field";
            return false;
        }


       else if (!(email).match(emailReg)) {
        document.getElementById('spanmesg').innerHTML="Invalid Email...!!!!!!";
        return false;
        }

        else if(!(mobile).match(phoneno)){
            document.getElementById('spanmesg').innerHTML="Invalid number...!!!!!!!!!";
            return false;
        }

        else {

        var user = $("#user").val();    
        $.ajax(
        {
        type:"POST",
        data:{ user:user},
        url: "<?php echo base_url(); ?>index.php/Registration/checkDuplicateUser",
        success:function(response)
        {  
            if (response == true) 
            {
                 document.getElementById("test").submit();
            }
            else 
            {
                document.getElementById('spanmesg').innerHTML="This username is already exists";
                return false;
            }           
        }

    });
        
  }

}

</script>

  <body>  

  
	<?php 
		echo validation_errors(); 				
		if(isset($errorMsg)){
			echo '<div class="error-msg">';
			echo $errorMsg;
			echo '</div>';
			unset($errorMsg);
		}
	?>

   <div id="body">
   	<?php echo anchor('Login/index', 'Login'); ?>
        
        <center><h2>Registration Form</h2></center>  
            <?php echo form_open('Registration/RegisterUser', array('id'=>'test')); ?>
              <legend>  
                  <fieldset>  
                      <table width="800" border="0" align="center">
                        <span id="spanmesg" ></span>
	                          <tr><th scope="row"> <?php
                                echo form_label('User Name :', 'user');
								$data= array(
								'name' => 'user',
                                'id'=>'user',
								'placeholder' => 'Please Enter User Name',
								'class' => 'input_box'
								);
								echo form_input($data); ?></th>
                            </tr>
                            <tr><th scope="row"> <?php
                                echo form_label('Email :', 'email');
								$data= array(
								'name' => 'email',
                                'id'=>'email',
								'placeholder' => 'Please Enter Email',
								'class' => 'input_box'
								);
								echo form_input($data); ?></th>
                           </tr>
                            <tr><th scope="row"> <?php
                                echo form_label('Mobile Number :', 'mobile');
                                $data= array(
                                'name' => 'mobile',
                                'id'=>'mobile',
                                'placeholder' => 'Please 10 digits number',
                                'class' => 'input_box'
                                );
                                echo form_input($data); ?></th>
                            </tr>
                            <tr><th scope="row"> <?php
                                echo form_label('Password :', 'pass');
								$data= array(
								'name' => 'pass',
                                'id'=>'pass',
								'placeholder' => 'Please Enter Password',
								'type' => 'password'
								);
								echo form_input($data); ?></th>
                            </tr>
		         			<tr><th scope="row"> <div id="form_button">
							<?php
							$data = array(
								'type' => 'button',
								'value'=> 'Register',
								'name'=> 'button',
                                'onclick'=>'validate()'
								);
							    echo form_submit($data); ?></div></th></tr>
                           
                        </table>     
                    </fieldset>  
                </legend>            
            <?php  echo form_close(); ?>

        </div> 
    </body>      
</html>   





