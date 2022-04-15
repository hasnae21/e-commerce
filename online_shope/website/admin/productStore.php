<?php
include('Aheader.inc');
$con = mysqli_connect('localhost', 'root', '', 'online');
?>

<h2> Check your website products here:</h2>
<div class="add">
                <button><a href="newProduct.php"> Add new product </a> </button>
</div>
<br>
<?php
$result = mysqli_query($con, "SELECT * FROM product");

while ($row = mysqli_fetch_array($result)) {
    echo "
    <center>
        <main>
            <div class='card' style='width: 18rem;'>
                <img src='$row[image]' class=card-img-top>
                <div class='card-body'>
                
                            <p class='card-title'> Product name : $row[productName] </p>
                            <p class='card-text'> Product category : $row[category] </p>
                            <p class='card-text' >Product descrption :$row[description] </p>
                            <p class='card-text'> The unit price : $row[unitPrice] DH</p>
                            <p class='card-text' > The quantity in stock : $row[quantityInStock] </p>

                            <a href='deleteProduct.php?productID=$row[productID]' class='btn btn-danger' > delete</a>
                            <a href='updateProduct.php?productID=$row[productID]' class='btn btn-info' > modify</a>
                </div>
            </div>
        </main>
        </center>
    ";
}
?>

</center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>