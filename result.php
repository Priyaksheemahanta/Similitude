<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>result</title>
  </head>
  <body>


<?php
$con = mysqli_connect("localhost","root","");
$query=$con->query("SELECT * FROM `content`.`word` where w_id=(select MAX(w_id) from `content`.`word`)");
$query1=$con->query("SELECT * FROM `content`.`word` where w_id<(select MAX(w_id) from `content`.`word`)");
$query2=$con->query("SELECT words FROM `content`.`word` where w_id=(select MAX(w_id) from `content`.`word`) UNION SELECT words FROM `content`.`word` where w_id<(select MAX(w_id) from `content`.`word`)");

echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>words</font></th>

</tr>";


while($row=mysqli_fetch_array($query2))
{
echo "<tr>";
echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';
}


echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>w_id</font></th>
<th><font color='Blue'>words</font></th>

</tr>";
echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>w_id</font></th>
<th><font color='Blue'>words</font></th>

</tr>";


while($row=mysqli_fetch_array($query))
{
echo "<tr>";

echo '<td><b><font color="#663300">' . $row['w_id'] . '</font></b></td>';
echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';

}

echo "</table>";



echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>w_id</font></th>
<th><font color='Blue'>words</font></th>

</tr>";


while($row=mysqli_fetch_array($query1))
{
echo "<tr>";

echo '<td><b><font color="#663300">' . $row['w_id'] . '</font></b></td>';
echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';

}

echo "</table>";



?>

</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>result</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet">
    <!- css -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="result_styles.css"> -->
    <!-- fontawesome -->
    <!-- <script src="https://kit.fontawesome.com/a4ec4505ee.js" crossorigin="anonymous"></script> -->
    <!-- java Script -->
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  <!-- </head>
  <body>
    <section id="result">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-dark">
          <a class="navbar-brand" href="index.php">similiTUDE</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#footer">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#last">FAQs</a>
              </li>
            </ul>
          </div>
        </nav>
        </div>
        <div class="container-fluid">
          <h1>similarities:</h1>
          <p>The jaccard result:</p>
          <p>The cosine result:</p>
          <p>The pearson result:</p>
        </div>
    </section>


      <footer class="white-section" id="footer">
        <div class="container-fluid">


          <i class="footer-logo fab fa-twitter"></i>
          <i class="footer-logo fab fa-facebook-f"></i>
          <i class="footer-logo fab fa-instagram"></i>
          <i class="footer-logo far fa-envelope"></i>

          <p>© Copyright 2020 similiTUDE</p>
        </div>
      </footer>

  </body>
</html>  -->
