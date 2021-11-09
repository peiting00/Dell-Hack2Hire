<html>
    <head>
    <title>Product Adding</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    </head>
<body>
<div class = "main">
    <div class="container-fluid">
        <div class="form-block">
        <div class = "divLoginHeader"><h1 class = "loginHeader">Product Adding</h1></div><br>
        <form action="ProductAdd.php" method="POST">
            <div class="divInputContainer">
                <label for="username">Product Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name"  required>
            </div>   
            <div class="divInputContainer">
                <label for="username">Price<span style="color:red">*</span></label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Price"  required>
            </div>   
            <div class="divInputContainer">
                <label for="username">Quantity <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
            </div>          
            <div class = "divLoginBtn">
			<button class = "btnAdd" type="submit" name = "add">Add</button>  <br/><br/>
		    </div>
            <div class = "divRemember">
			<div class = "divlbl" id = "divErrorMsg">
				<label id = "errorMsg">Invalid username or password </label>
			</div>
			
		</div>
        </form>
        </div>
    </div>
</div>
</body>
</html>

<!-- POP Out message -->
<script type="text/javascript">
    function show_alert(status) {
        var alertDiv = document.getElementById("alert");
        if (status == "fail_username") {
            alertDiv.classList.add("alert-warning");
            $(alertDiv).append("Username exist. Please enter a new valid username."); 
        }else if (status == "fail-to-add") {
            alertDiv.classList.add("alert-danger");
            $(alertDiv).append("Something went wrong!"); 
        }else if (status == "success") {
            alertDiv.classList.add("alert-success");
            $(alertDiv).append("New Product Added!"); 
        }
    }

function displayError(){
	var errorMessage = document.getElementById("divErrorMsg");
	errorMessage.style.display = "block";
}
</script>

<?php
include "../dbConnection.php";

if(isset($_POST['add'])){
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $addQuery="INSERT INTO product (productName,price,quantity) VALUES ('$productName','$price','$quantity')";
    if(mysqli_query($conn,$addQuery)){
        echo "<script>show_alert('success')</script>";
        // echo "<script>window.setTimeout(
        //     function(){
        //         window.location.href='composition.html';
        //     },500);</script>";
        header("location:composition.html");
    }else{
        echo 
			"<script type='text/javascript'>
				displayError();
			</script>
			";
    }




}




?>