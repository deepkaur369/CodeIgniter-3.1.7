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
		echo validation_errors(); 				
		if(isset($errorMsg))
		{
			echo '<div class="error-msg">';
			echo $errorMsg;
			echo '</div>';
			unset($errorMsg);
		}
	?>		
   <div id="body">
   	    <div align="right"><h2>Welcome, <?php print_r( $this->session->userdata('user')); ?>! <?php echo anchor('Logout/index', 'Logout'); ?></h2></div>

   	    <?php echo anchor('ViewPost/checkPost', 'View Post'); ?>    
        <center><h2>Edit Post</h2></center>  

        <?php 
            $hidden = array('name' => 'id', 'value' => '<?php $result[0]->code ?>');
            echo form_open_multipart('EditPost/edit/'.$result[0]->code ,$hidden);
        ?>

        <legend>  
            <fieldset>  
                <table width="800" border="0" align="center">
	                    <tr><th scope="row"><?php
                                echo form_label('Title :', 'title');
								$data= array(
								'name' => 'title',
								'class' => 'input_box',
                                'value'=>  $result[0]->title
								);
								echo form_input($data); ?>                        
                            </th>
                        </tr>
                           
                        <tr><th scope="row"> <?php
                                echo form_label('Content :', 'content');
								$data= array(
								'name' => 'content',
								'class' => 'input_box',
                                'value'=>  $result[0]->content
								);
								echo form_input($data); ?>                        
                            </th>
                        </tr>

		         		<tr><th scope="row"> <div id="form_button"><?php
								 $data= array(
								'type' => 'file',
								'name' => 'userfile',
								'class' => 'input_box', 
								);
								 echo form_input($data);
                               ?>
                           <img src="<?php echo base_url('assets/images/'. $result[0]->images);?>"  style="width: 200px"/>
                              <?php 
							     $data = array(
								'type' => 'submit',
								'value'=> 'Update',
								'name'=>'submit',
								'class'=> 'submit'
								);
							echo form_submit($data); ?></div>
                        </th>
                    </tr>
                            
                 </table>     
            </fieldset>  
        </legend>            
    <?php echo form_close(); ?>
</div> 
</body>      
</html>   