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
<div align="right"><h2>Welcome, <?php print_r( $this->session->userdata('user')); ?>! <?php echo anchor('Logout/commentPostLogOut', 'Logout'); ?></h2></div>
<?php
    $template = array('table_open' => '<table border="1" class="mytable" width="100%">');
                $this->table->set_template($template);
                $data = array(
                array('Title', 'Content', 'Images'));
                
                foreach ($result as $row)
                { 

                    $img=  img('http://localhost/CodeIgniter-3.1.7/assets/images/'.$row->images);
                    $this->table->add_row( $row->title, $row->content,$img);
                }
                echo $this->table->generate($data);  
                foreach ($PostComment as  $value){          
        ?>
          </br></br>
         <span><b><?php echo $value->user ;?>:</b></span>&nbsp &nbsp<span><?php echo $value->post_comment ;?></span> 
     </br>  
        <?php
        }
        ?>
         </br></br>
        <?php
            echo form_open('Comment/loginForComment', array('id'=>'comment_form')); 
            $comment=$this->session->userdata('comment');             
        ?>
        <textarea cols="160" rows="6" name="comment" placeholder="Comment Here" ><?php echo $comment;?></textarea> 

        <?php
            $data = array(
            'type' => 'submit',
            'value'=> 'Comment',
            'name'=> 'button',
            'id'=>'button'
            );
            echo form_submit($data); 
            echo form_close();

        ?>
</div>
</body>
