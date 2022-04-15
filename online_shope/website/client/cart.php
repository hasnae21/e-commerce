<?php
include('Cheader.inc');
$connect = mysqli_connect('localhost', 'root', '', 'online');
session_start();
if (isset($_POST["Add_To_Cart"])) {
  if (isset($_SESSION["shopping_cart"])) {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if (!in_array($_POST["hidden_id"], $item_array_id)) {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id' => $_POST["hidden_id"],
        'item_image' => $_POST["hidden_img"],
        'item_name' => $_POST["hidden_name"],
        'item_price' => $_POST["hidden_price"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    } else {
      echo '<script>alert("item alredy added")</script>';
      //echo '<script>window.location = "cart.php" </script>';
    }
  } else {
    $item_array = array(
      'item_id' => $_POST["hidden_id"],
      'item_image' => $_POST["hidden_img"],
      'item_name' => $_POST["hidden_name"],
      'item_price' => $_POST["hidden_price"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
    //echo '<script>alert("item added to cart successfully")</script>';
  }
  echo '<script>alert("item added to cart successfully")</script>';
}
?>


<?php
$orderDate = date("Y-m-d h:i:sa");
$deliveryAddress = $_POST['deliveryAddress'];
$qty = $_POST["quantity"];

if (isset($_POST["confirmer"])) {
  if (isset($_SESSION['lastName'])) {
    $Lname = $_SESSION["lastName"];

    $quer =  "SELECT * FROM customers  WHERE lastName = '$Lname'  ORDER BY customerCode ASC";
    $result = mysqli_query($connect, $quer);
    $row = mysqli_fetch_array($result);
    $customerCode = $row["customerCode"];
    
    if (!empty($_SESSION["shopping_cart"])) {
      $total = 0;
      foreach ($_SESSION["shopping_cart"] as $key => $value) {
        $prdct = $value["item_id"];

        $CreateSql = "INSERT INTO orders (customerCode, orderDate, deliveryAddress)  
        VALUES  ( '$customerCode', '$orderDate', '$deliveryAddress')";
        $res1 = mysqli_query($connect, $CreateSql);
        $row1 = mysqli_fetch_array($res1);
        $ordr = $row1["orderID"];

        $CreateSql1 = "INSERT INTO  orderdetails (orderID, productID, orderedQuantity)  
        VALUES ('$ordr', '$prdct' , '$qty' )";
        $res2 = mysqli_query($connect, $CreateSql1);
        $row2 = mysqli_fetch_array($res2);
      }
    }
  }
  echo "<script>alert('Please login to continue shopping.')</script>";
}
?>
<center>
  <h2>
  MY BAG <br>
    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
  </h2>
  <br>

  <table class="table table-dark table-hover table-sm ">
    <thead>
      <tr>
        <th>image</th>
        <th>Products</th>
        <th>Unit Price</th>
        <th>Quantity</th>
        <!--<th>Action</th>-->
      </tr>
    </thead>

    <?php
    if (!empty($_SESSION["shopping_cart"])) {
      $total = 0;
      foreach ($_SESSION["shopping_cart"] as $key => $value) {
    ?>
        <tbody>
          <tr>

            <td><img src="../admin/<?php echo $value["item_image"]; ?>" width="120px"></td>
            <td><?php echo $value["item_name"]; ?></td>
            <td><?php echo $value["item_price"]; ?>&nbsp&nbsp&nbspDH</td>
            <td><input type="number" name="quantity" min=1 required value="1"></td>
          </tr>
        </tbody>
    <?php }
    } ?>
  </table>
  <br>





  <!-----------------------------------------------------------------------------checkout---------------------------------------------------------------------->

  <button data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" class="button"> checkout </button>
  <br><br>

</center>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        Confirmer votre adresse de livraison:
        <input type="text" name="deliveryAddress" class="form-control" required>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
        <button type="button" value="Confirmer" name="confirmer" class="btn btn-secondary" data-bs-dismiss="modal">Buy</button>
      </div>
    </div>
  </div>
</div>
<?php include('Cfooter.inc'); ?>