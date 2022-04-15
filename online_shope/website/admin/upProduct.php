<?php 
$con = mysqli_connect('localhost' , 'root' , '' , 'online' ); 

if(isset($_POST['update'])){
        $ID = $_POST['productID'];
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

        $update= "UPDATE product SET productName='$NAME', description ='$DESCRPTON', unitPrice='$PRICE', quantityInStock='$STOCK',  image='$image_up', category ='$CAT' WHERE  productID = $ID" ;
        mysqli_query($con, $update);
        
        
        if(move_uploaded_file($image_location,'./images/'.$image_name)){
                echo "<script>alert('well done')</script>" ;
        }else{
                echo "<script>alert('error')</script>";
        }
        
        header('location: productStore.php');
}