<?php
if(isset($_POST['submit'])){
   $con = mysqli_connect("localhost","root","");

   $name = isset($_POST['name']) ? $_POST['name'] : '';
   $content = isset($_POST['textarea']) ? $_POST['textarea'] : '';

	 $sql = "INSERT INTO `college_project`.`content` ( `name`, `content`) VALUES ( '$name', '$content');";

  if($con -> query($sql)==true){
    // echo "successfully inserted";
    $lastid= mysqli_insert_id($con);
    $result = "SELECT * FROM `college_project`.`content` where `c_id`= $lastid";
    $sql1=mysqli_query($con, $result);
    while($row = mysqli_fetch_array($sql1) )
    {
      $id=$row['c_id'];
      $cont=$row['content'];
    $array_of_words=preg_split("/ +/ ",$cont);
    foreach($array_of_words as $key)
    {
    	mysqli_query($con, "INSERT into `college_project`.`word`(`c_pkid`,`words`) VALUES('$id','$key');");
    //echo	mysqli_error($con);
    }

  }

  }
header('Location: result.php');
   $con->close();
 }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>form</title>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/a4ec4505ee.js" crossorigin="anonymous"></script>
    <!-- java Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body>
    <section class="colored-section" id="title">
      <!-- <img class="bg" src="colorbg.jpeg" alt=""> -->
      <div class="container-fluid">

        <!-- navbar -->
        <?php include "navbar.php" ?>
    <div class="row">
      <div class="col-lg-6 def">
        <h1>Best free <span class="simi">Similarity Checker</span> for your content</h1>
        <h4 class="def-color"> Now paste upto 200 words in the text area and click <span class="simi_two">Check for similarity</span> to get instant & accurate results.</h4>

      </div>
        <div class="container col-lg-6">
      <div class="flip-box">
    <div class="flip-box-inner">
     <div class="flip-box-front">
       <img src="bg.png" alt="">
       <h5>To submit your content</h5>
       <br>
       <h3>click here</h3>
    </div>
    <div class="flip-box-back">

        <div class="zoom">
          <h1>similarity check:</h1>
          <form method="post" action="index.php">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter your name">
            </div>

            <div class="form-group">
              <label for="textarea">Text Area</label>
              <textarea class="form-control" id="textarea" name="textarea" rows="6"></textarea>
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Submit!</button>
          </form>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
</section>
<section class="white-section" id="features">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4 para">
        <i class="fas fa-copyright icon fa-4x"></i>
        <h4>Cossine similarity</h4>
        <p>Values range between 0 and 1, where 0 is perfectly dissimilar and 1 is perfectly similar.</p>
      </div>
      <div class="col-lg-4 para">
        <i class="fas fa-bullseye icon fa-4x"></i>
        <h4>Jaccard similarity</h4>
        <p>Values range between 0 and 1, where 0 is perfectly dissimilar and 1 is perfectly similar.</p>
      </div>
      <div class="col-lg-4 para">
        <i class="fab fa-product-hunt icon fa-4x"></i>
        <h4>Proposed algorithm</h4>
        <p>Values range between 0 and 1, where 0 is perfectly dissimilar and 1 is perfectly similar.</p>
      </div>
    </div>
  </div>
</section>

<!-- Testimonials -->

<section class="colored-section" id="testimonials">
  <div id="testimonial-carousel" class="carousel slide " data-ride="false">
    <div class="carousel-inner">

      <div class="container-fluid carousel-item active">
       <img class="cossine-image" src="https://image.flaticon.com/icons/png/512/1055/1055645.png" alt="dog-profile">
        <h2 class="testimonial-text">Cosine Similarity</h2>
        <h4>Cosine similarity measures the similarity between two vectors by taking the
        cosine of the angle the two vectors make in their dot product space. If the angle is
        zero, their similarity is one, the larger the angle is, the smaller their similarity.</h4>
      </div>

      <div class="container-fluid carousel-item">
        <img class="jaccard-image" src="https://image.flaticon.com/icons/png/512/1355/1355248.png" alt="lady-profile">
        <h2 class="testimonial-text">Jaccard Similarity</h2>
        <h4>The Jaccard Index is a statistic used in understanding the similarities between sample sets. The measurement emphasizes similarity between finite sample sets, and is formally defined as the size of the intersection divided by the size of the union of the sample sets.</h4>
      </div>
      <div class="container-fluid carousel-item">
        <img class="proposed-image" src="https://image.flaticon.com/icons/svg/2920/2920349.svg" alt="lady-profile">
        <h2 class="testimonial-text">Proposed Similarity</h2>
        <h4>The Proposed approach is a statistic used in understanding the similarities between sample sets. This algorithm was proposed on the paper "A New Similarity Measure with Length Factor for Plagiarism Detection" by Dr. Dhruba J. Baruah and Anjana Kakoti Mahanta. </h4>
      </div>

    </div>
    <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon"></span>

    </a>
  </div>
</section>


<?php
include "footer.php";
 ?>

<!-- javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="index.js" charset="utf-8"></script> -->
  </body>
</html>
