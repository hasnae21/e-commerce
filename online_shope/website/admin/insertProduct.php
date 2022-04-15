<?php 
$con = mysqli_connect('localhost' , 'root' , '' , 'online' ); 

if(isset($_POST['upload'])){
        $NAME=$_POST['pname'];
        $DESCRPTON=$_POST['pdescrption'];
        $CAT=$_POST['pcategory'];
        $PRICE=$_POST['pprice'];
        $STOCK=$_POST['pinstock'];

        $IMAGE=$_FILES['pimg'];
        //$IMAGE=$_POST['pimg'];

        $image_location=$_FILES['pimg']['tmp_name'];
        $image_name=$_FILES['pimg']['name'];
        $image_up="./images/".$image_name;
        echo $image_up ;

        $insert= "INSERT INTO product (productName, description,  unitPrice,  quantityInStock,  image , category) VALUES ('$NAME','$DESCRPTON','$PRICE','$STOCK','$image_up', '$CAT' )"; 
        mysqli_query($con, $insert);

        if(move_uploaded_file($image_location,'./images/'.$image_name)){
                echo "<script>alert('well done')</script>" ;
        }else{
                echo "<script>alert('error')</script>";
        }
        
        header('location: newProduct.php');
}