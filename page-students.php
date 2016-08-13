<?php
/*
    Template Name: Result
*/

get_header();
echo '<div class="container"> ';
if($_SERVER['REQUEST_METHOD']=="GET"){
?>    

<form action="" method="POST" role="form">
    <h2 class="status">Result</h2>
    <label>Name</label>
		<input type="text" name="std_name">
   </br>
   </br>

    <label>Class</label>
   <input type="text" name="std_class">
   </br>
   </br>

    <label>Roll</label>
   <input type="text" name="std_roll">

   </br>
   </br>

    <div class="submit-btn">
        <button type="submit" class="btn btn-primary btn-sm pull-right" name="">Result</button>
    </div>
    
</form>
<?php } else { ?>


<?php
global $wpdb;
 //get posted value from the form
  $name = $_POST["std_name"];
  $class = $_POST["std_class"];
  $roll = $_POST["std_roll"];


  //deal with database in WordPress way
  global $wpdb;
  $contactus_table = $wpdb->prefix."students";
  $wpdb->insert( 
    $contactus_table, 
    array( 
        'std_name' => $name, 
        'std_class'  => $class,
        'std_roll'     => $roll

    ), 
	    array( 
	      '%s', //data type is string
	      '%d',
	      '%d'
	    ) 
	  );


if($wpdb){
?>

        <div class="alert alert-success">
        <strong> Data Added Succesfully !!</strong>

   	 </div>




  
   
 

    <?php
    }

    else{
    ?>    
        <div class="alert alert-danger">
        <strong> Result is not found!!</strong>

   	 </div>

    <?php
    }

    ?>
    <?php } ?>
    </div>  
   </div>     
    <?php get_footer(); ?>