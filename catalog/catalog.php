<?php
session_start();
ob_start();
include($_SERVER['DOCUMENT_ROOT'].'/Hack2Hire/dbConnection.php');
?>

<html lang="en">

  <header>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="https://unpkg.com/vue/dist/vue.min.js"></script>
  </header>

  <body>
    <div class="grid-container">
      <?php
      $queryCheck = mysqli_query($conn, "SELECT * FROM product");
      
      while($productGrid = mysqli_fetch_row($queryCheck)){
      ?>
        <div class="card text-center grid-item" style="width: auto;">
          <div class="card-body">
            <h6 class="card-title">
              ID : <?php echo $productGrid [0]; ?>
            </h6>

            <h4 class="card-title">
              <?php echo $productGrid [1]; ?>  
            </h4>

            <p class="card-text">$ <?php echo $productGrid [2]; ?> each</p>
            <p class="card-text"><?php echo $productGrid [3]; ?> available</p>

            <div>
              <a href="#" class="btn btn-primary btnOperation btnEdit">Edit</a>
              <a href="#" class="btn btn-primary btnOperation btnDelete">Delete</a>
            </div>
          </div>
        </div>
      <?php
      }
      ?> 
    </div>

    
    
  </body>

</html>




