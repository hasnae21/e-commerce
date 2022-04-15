<?php
include('Aheader.inc');
$con = mysqli_connect('localhost', 'root', '', 'online');
?>
<center>
<h2> Welcome to admin dashboard:</h2>
<div class="main">
        <div class="choose">
                <button><a href="newProduct.php"> Add new product </a> </button>
        </div>
        <div class="choose">
                <button><a href="productStore.php"> Edit products </a> </button>
        </div>
        <div class="choose">
                <button><a href="../index.php"> Home page </a> </button>
        </div>
</div>
</center>
<?php include('Afooter.inc'); ?>