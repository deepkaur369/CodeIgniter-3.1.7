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
   			<?php echo anchor('CreatePost/index', 'Create Post'); 

				$template = array('table_open' => '<table border="1" class="mytable" width="100%">');
				$this->table->set_template($template);
   				$data = array(
        		array('Title', 'Content', 'Images','Author'));
 					
				foreach ($value as $row)  
        		{ 
                    $view= anchor('Comment/CommentPost/'.$row->code, 'View');
					$img=  img('http://localhost/CodeIgniter-3.1.7/assets/images/'.$row->images);
					$this->table->add_row( $row->title, $row->content , $img,$row->user ,$view );
				}
				echo $this->table->generate($data);
                 
			?>
         
	</div>
    
</body>