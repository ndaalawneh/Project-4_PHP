<?php 
session_start();

?>

<?php 
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
        if(empty($_POST['pimg'])){
        $op = false ;
        }

        
        if($op){
        $pro = array ("pname" => $_POST['pname'] , "pdesc" => $_POST['pdesc'] , "pprice" => $_POST['pprice'] , "pimg" => $_POST['pimg']) ;
        if(!isset($_SESSION['products'])){
            $_SESSION['products'] = array();
        }
        array_push($_SESSION['products'] , $pro) ;
        
       

        }
        else{
        echo "<h1>Some Of the Field Are Missing , Please Check And Fill them</h1> " ;
        }

    }
   
    ?></div>
    



<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>
  <body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">ZORO COLLECTION</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="add2" href="pages/addproduct.php">Add product <span class="sr-only">(current)</span></a>
      </li>


    </ul>
  </div>


  </div>
</nav>
      
<main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Welcome To ZORO COLLECTION</h1>
          <p class="lead">Our Store Welcomes you , Here You Can Add What You like </p>
         
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
           <?php
           if(isset($_SESSION['products'])){
            for ($i=0; $i < count($_SESSION['products']) ; $i++) { 
              $p = $_SESSION['products'][$i];
           echo '
           <div class="col-md-4">
           <div class="card mb-4 box-shadow">
             <img class="card-img-top" src="pages/image/'. $p['pimg'] .' " alt="Card image cap" width="500px" height="300px">
             <div class="card-body">
               <h2 class="card-text ndoosh ">'.$p['pname'].'</h2>
               <p class="card-text">'.$p['pdesc'].'</p>

               <div class="d-flex justify-content-between align-items-center">
                 <div class="btn-group">
                 <p class="card-text">'.$p['pprice'].' JD</p>
                 </div>
                
               </div>
             </div>
           </div>
         </div>
           ' ;}
            }
            else{
              echo '<h1> No Product is added <br></h1> 
              <a class="nav-link btn btn-primary" href="pages/addproduct.php">Add product <span class="sr-only">(current)</span></a>';
            }
           ?> 




          </div>
        </div>
      </div>

    </main>


     
   



<footer class="text-muted">
      <div class="containerfoot" >
        <p class="float-right">
          <a class= "top" style=  "color" = "red" href="#">Back to top </a>
        </p>
       
        <p class= "pa2">copyright&copy;2022</p>
        
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>