<!DOCTYPE>
<html>
    <head>
    <title>Product Editing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    </head>
<body class="container-fluid">
    <div class="container">
        <div class="form-block">
        <h4><strong>Product Editing</strong></h4>
        <form action="catalog.php" method="POST">
            <div class="form-group">
                <label for="username">Product Name <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name"  required>
            </div>   
            <div class="form-group">
                <label for="username">Price<span style="color:red">*</span></label>
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Price"  required>
            </div>   
            <div class="form-group">
                <label for="username">Quantity <span style="color:red">*</span></label>
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Quantity" required>
            </div>          



        

        </form>
        </div>
    </div>
    


</body>

</html>