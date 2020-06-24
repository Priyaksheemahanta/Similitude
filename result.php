<?php
$con = mysqli_connect("localhost","root","");
$query=$con->query("SELECT * FROM `try`.`word_try` where w_id=(select MAX(w_id) from `try`.`word_try`)");
$query1=$con->query("SELECT * FROM `try`.`word_try` where w_id<(select MAX(w_id) from `try`.`word_try`)");
$query2=$con->query("SELECT words FROM `try`.`word_try` where w_id=(select MAX(w_id) from `try`.`word_try`) INTERSECT SELECT words FROM `try`.`word_try` where  w_id<(select MAX(w_id) from `try`.`word_try`)");

$json_array_3=array();
while($row=mysqli_fetch_assoc($query2))
{
  $json_array_3[]=$row['words'];
}
//echo json_encode($json_array_3);

$json_array_1=array();
while($row=mysqli_fetch_assoc($query))
{
  $json_array_1[]=$row['words'];
}
// echo json_encode($json_array_1);
// echo '<br />';
//converting to Json from the php variable for the text that already submitted
$json_array_2=array();
while($row=mysqli_fetch_assoc($query1))
{
  $json_array_2[]=$row['words'];
}
// echo(json_encode($json_array_2));

//echo '<script>var arrayFromPhp = ' . json_encode($json_array_1) . ';</script>';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>result</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,900|Ubuntu&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="result_styles.css">
    <!-- fontawesome -->
   <script src="https://kit.fontawesome.com/a4ec4505ee.js" crossorigin="anonymous"></script>
    <!-- java Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
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
          <div class="row">
                  <div class="col s12 m12">
                          <div class="card-panel center">
                              <button class="btn waves-effect waves-light" onclick="checkSimilarity()">Check the similarities!</button>
                              <h5 ><span>The Cosine Similarity: </span><span id="cosine_similarity"></span></h5>
                              <!-- <button class="btn waves-effect waves-light" onclick="checkSimilarityJaccard()">Check the similarities!</button> -->
                                      <h5 ><span>The Jaccard Similarity: </span><span id="jaccard_similarity"></span></h5>
                                              <h5 ><span>The Euclid Similarity: </span><span id="similarity2"></span></h5>
                          </div>
                      </div>
          </div>
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
      <script src="js/jquery-3.3.1.js"></script>
      <script src="try-final.js"></script>
      <script src="js/materialize.min.js"></script>
      <script type="text/javascript">
      function checkSimilarity(){
          var textA = <?php echo(json_encode($json_array_1)); ?>;
          var textB = <?php echo(json_encode($json_array_2)); ?>;

          var cosine_similarity = getSimilarityScore(textCosineSimilarity(textA,textB));
          $("#cosine_similarity").text(cosine_similarity);
          console.log(cosine_similarity);
          var text1 = <?php echo(json_encode($json_array_1)); ?>;
          var text2 = <?php echo(json_encode($json_array_2)); ?>;
          var sect = <?php echo(json_encode($json_array_3)); ?>;

          var jaccard_similarity = getSimilarityScoreJaccard(textJaccardSimilarity(text1,text2,sect));
          $("#jaccard_similarity").text(jaccard_similarity);
          console.log(cosine_similarity);
      }
      // function checkSimilarityJaccard(){

      //     var jaccard_similarity = getSimilarityScoreJaccard(textJaccardSimilarity(text1,text2,intersect));
      //     $("#jaccard_similarity").text(jaccard_similarity);
      //     console.log(cosine_similarity);
      // }
      </script>
  </body>
</html>
