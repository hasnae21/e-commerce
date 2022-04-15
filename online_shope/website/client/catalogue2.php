<?php
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
include('Cheader.inc');
?>

<center>
  <div class="row col-12">
    <h2 class="mt-5"> Skin care products :</h2>

    <?php
    $query =  "SELECT * FROM product WHERE category = 'partums'  ORDER BY productID ASC";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_array($result)) {
    ?>

        <div class="col-3  ms-5 mt-2">
          <div class="card" style="width: 18rem;">
            <img src="../admin/<?php echo $row["image"]; ?>" alt="image" width="80px" height="350px" class="card-img-top"><br>
            <div class="card-body">
              <h5 class="card-title">
                <?php echo $row["productName"]; ?>
              </h5>
              <p class="card-text">

              <form method="POST" action="catalogue1.php">
                <?php echo $row["description"]; ?> <br>
                <hr>
                <?php echo $row["unitPrice"]; ?> DH<br>

                <input type="hidden" name="hidden_id" value="<?php echo $row["productID"]; ?>">
                <input type="hidden" name="hidden_img" value="<?php echo $row["image"]; ?>">
                <input type="hidden" name="hidden_name" value="<?php echo $row["productName"]; ?>">
                <input type="hidden" name="hidden_price" value="<?php echo $row["unitPrice"]; ?>">

                <input type="submit" name="Add_To_Cart" value="Add To Cart" class="btn btn-dark">


              </form>

              </p>

            </div>
          </div>
        </div>

    <?php }
    } ?>
  </div>


  </center>
  <center>
  <br>
  <footer>
    <div class="contact">
      <h2>Contact Us:</h2>
      <p>
        beautifulU@gmail.com<br />
        +212634905430 /+212534905430
      </p>
    </div>
    <div class="media">
      <h2>follow us on:</h2>
        <div >
        <i class="fa fa-facebook-official" aria-hidden="true"></i>
        <i class="fa fa-linkedin-square" aria-hidden="true"></i>
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </div>
    </div>
  </footer>
  <div class="logo">
    <img src="../admin/images/cone-removebg-preview.png" alt="logo" width="120px" />
  </div>
</center>

  <?php include('Cfooter.inc'); ?>