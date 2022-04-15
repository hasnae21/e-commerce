<?php
include ('Aheader.inc'); 
$con = mysqli_connect('localhost' , 'root' , '' , 'online' ); 
?>

<h2>Add a new product:</h2>
<form action="insertProduct.php" method="post" enctype="multipart/form-data">
        <input type="file" class="form-control" id="fle" name="pimg" required style="display: none;" >
        <label for="fle"> <strong>Select product image </strong> </label>

        <input type="text " class="form-control" name="pname" placeholder="PRODUCT NAME" required>
        <input type="text " class="form-control" name="pdescrption" placeholder="PRODUCT DESCRPTON" required>
        <input type="text" class="form-control" name="pcategory" placeholder="PRODUCT CATEGORY"  required>
        <input type="number" class="form-control" name="pprice" placeholder="PRODUCT PRICE" min="0" required>
        <input type="number" class="form-control" name="pinstock" placeholder="PRODUCT QUANTTY" min="0" required>
        <button type="submit" name="upload"> Upload </button>
        <br>
        <a href="productStore.php"> All my products </a>
</form>

<?php include('Afooter.inc'); ?>