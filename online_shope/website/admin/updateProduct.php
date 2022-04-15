<?php
include ('Aheader.inc'); 
$con = mysqli_connect('localhost' , 'root' , '' , 'online' ); 
//productID=$row['productID'];
$ID = $_GET['productID'];

$up = mysqli_query($con, "SELECT * FROM product WHERE productID = $ID");
$data = mysqli_fetch_array($up);
//header('location: productStore.php');
?>

<h2>update your product:</h2>

<form action="upProduct.php" method="post" enctype="multipart/form-data">

        <input type="file" class="form-control" id="fle" name="pimg" style="display: none;"  required>
        <label for="fle"> <strong>update product image </strong> </label>

        
        <input type="text " class="form-control" name="pname" placeholder="PRODUCT NAME" required  value="<?php echo $data['productName']?>">
        <input type="text " class="form-control" name="pdescription" placeholder="PRODUCT DESCRPTON" required  value="<?php echo $data['description']?>">
        <input type="text" class="form-control" name="pcategory" placeholder="PRODUCT CATEGORY"  required  value="<?php echo $data['category']?>">
        <input type="number" class="form-control" name="pprice" placeholder="PRODUCT PRICE" min="0" required  value="<?php echo $data['unitPrice']?>">
        <input type="number" class="form-control" name="pinstock" placeholder="PRODUCT QUANTTY" min="0" required   value="<?php echo $data['quantityInStock']?>">
        <button type="submit" name="update"> Update </button>
        <br>
        <a href="productStore.php"> All my products </a>
</form>


<?php include('Afooter.inc'); ?>