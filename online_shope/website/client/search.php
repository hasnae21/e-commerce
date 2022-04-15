<?php
include('Cheader.inc');

if (!empty($_POST)) {
    //echo $_POST['search'];
    $query = "SELECT * FROM product WHERE productName  LIKE  '%" . $_POST['search'] . "%' ";
    $search_result = searchProducts($query);
    //var_dump($search_result) ;
}
else{
    echo "Pas de resultat" ;
}
function searchProducts($query)
{
    $connect = mysqli_connect("localhost", "root", "", "online");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<center>

    <div class="mt-2 row col-12">

        <?php
        while ($row = mysqli_fetch_array($search_result)) {
        ?>

            <div class="col-3  ms-5 mt-3">
                <div class="card" style="width: 18rem;">
                    <img src="../admin/<?php echo $row["image"]; ?>" alt="image" width="100px" class="card-img-top"><br>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row["productName"]; ?>
                        </h5>
                        <p class="card-text">

                        <form method="POST" action="">
                            <?php echo $row["description"]; ?> <br>
                            <hr>
                            <?php echo $row["unitPrice"]; ?> DH<br>
                        </form>

                        </p>
                        <input type="submit" name="" value="Add To Cart" class="btn btn-dark">
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>

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