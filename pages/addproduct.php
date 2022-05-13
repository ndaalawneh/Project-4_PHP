<?php 
session_start() ;



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v5 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="../css/roboto-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home.css">
      <link rel="stylesheet" href="../css/style.css">

      
</head>

<body class="form-v5">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="../index.php">ZORO COLLECTION</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="add2" href="addproduct.php">Add product <span class="sr-only">(current)</span></a>
      </li>


    </ul>
  </div>


  </div>
</nav>

	<div class="page-content">
		<div class="form-v5-content">
			<form class="form-detail" action="../pages/addproduct.php" method="post"  enctype = "multipart/form-data">
				<h2>Add Product Form</h2>
				<div class="form-row">
					<label for="pname">Product Name</label>
					<input type="text" name="pname" id="full-name" class="input-text" placeholder="The Name Of Product" required>
					<i class="fas fa-user"></i>
				</div>
				<div class="form-row">
					<label for="pdesc">Product Description</label>
					<input type="text" name="pdesc" id="your-email" class="input-text" placeholder="The description Of Product" >
					<i class="fas fa-envelope"></i>
				</div>
				<div class="form-row">
					<label for="password">Product Price</label>
					<input type="number" name="pprice" id="password" class="input-text" placeholder="The Price Of The Product" required>
					<i class="fas fa-lock"></i>
				</div>
                <div class="form-row">
					<label for="pimg">Product Image</label>
					<input type="file" name="pimg"  class="input-text" placeholder="The Image Of The Product" required>
					<i class="fas fa-lock"></i>
				</div>
				<div class="form-row-last">
					<input type="submit" name="" class="register" value="Add Product">
				</div>
			</form>
		</div>
	</div>










 


    
    <div> <?php 
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $op = true ;
        if(empty($_POST['pname'])){
        $op = false ;
        }
        if(empty($_POST['pdesc'])){
        $op = false ;
        }
        if(empty($_POST['pprice'])){
        $op = false ;
        }
        if(empty($_FILES['pimg']['name'])){
        $op = false ;
        }

        
        if($op){
          move_uploaded_file($_FILES['pimg']['tmp_name'] , 'image/'.$_FILES['pimg']['name']) ;
        $pro = array ("pname" => $_POST['pname'] , "pdesc" => $_POST['pdesc'] , "pprice" => $_POST['pprice'] , "pimg" => $_FILES['pimg']['name']) ;
        if(!isset($_SESSION['products'])){
            $_SESSION['products'] = array();
        }
        array_push($_SESSION['products'] , $pro) ;
        
       

        }
        else{
        echo "Some Of the Field Are Missing , Please Check And Fill them " ;
        }

    }
   
    ?></div>
    
    
   

<section>
<div class="container" >
     <table class="table table-striped">
  
       <thead>
         <tr>
           <th scope="col">Name</th>
           <th scope="col">Description</th>
           <th scope="col">Price</th>
           <th scope="col">product image</th>
         
         </tr>
       </thead>
       <tbody>
         <?php
           if(!isset( $_SESSION['products'])){
            $_SESSION['products'] = array() ;
            }

        for ($i=0; $i < count($_SESSION['products']); $i++) { 
         $p =$_SESSION['products'][$i]; 
         echo "<tr>";
          echo '<td>' . $p['pname'] . '</td>';
          echo '<td>' . $p['pdesc'] . '</td>';
          echo '<td>' . $p['pprice'] . '</td>';
          echo '<td>' . $p['pimg'] . '</td>';
          
          echo "<tr>";
        }
      ?>
       </tbody>
       
     </table>
     </div>
   
 </section>




<footer class="text-muted">
      <div class="containerfoot" >
        <p class="float-right">
          <a class= "top" style=  "color" = "red" href="#">Back to top </a>
        </p>
        
        <p class= "pa2">copyright&copy;2022</p>
        
      </div>

</body>
</html> 