<?php
$con = mysqli_connect("localhost","root","");
$query=$con->query("SELECT * FROM `college_project`.`word` where c_pkid=(select MAX(c_pkid) from `college_project`.`word`)");
$query1=$con->query("SELECT * FROM `college_project`.`word` where c_pkid<(select MAX(c_pkid) from `college_project`.`word`)");
$query2=$con->query("SELECT words FROM `college_project`.`word` where c_pkid=(select MAX(c_pkid) from`college_project`.`word`) INTERSECT SELECT words FROM `college_project`.`word` where  c_pkid<(select MAX(c_pkid) from `college_project`.`word`)");
$query3=$con->query("SELECT words FROM `college_project`.`word` where c_pkid=(select MAX(c_pkid) from `college_project`.`word`) EXCEPT SELECT words FROM `college_project`.`word` where  c_pkid<(select MAX(c_pkid) from `college_project`.`word`)");
                                                                                                                                //minus
$json_array_4=array();
while($row=mysqli_fetch_assoc($query3))
{
  $json_array_4[]=$row['words'];
}
//echo json_encode($json_array_4);

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
    <link rel="stylesheet" href="css/result_styles.css">
    <!-- fontawesome -->
   <script src="https://kit.fontawesome.com/a4ec4505ee.js" crossorigin="anonymous"></script>
    <!-- java Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <section id="result">
      <div class="container-fluid" style="padding-bottom: 31px;">
        <!-- navbar -->
        <?php include "navbar.php" ?>
        </div>
        <div class="container-fluid">
          <div class="row">
                  <div class="col s12 m12">
                    <h1><span class="simi">Click Here</span> to check the similarities : </h1>
                          <div class="card-panel center">
                              <img src="https://media1.giphy.com/media/452Zx50ny9RDGBCI07/giphy.gif?cid=ecf05e47b116fc7da66238a54d1f0e7b48d6c02c69193042&rid=giphy.gif" height="100px" width="120px"alt="">
                              <button class="btn waves-effect waves-light" onclick="checkSimilarity() ">Check the similarities!</button>
                              <div class="container">
                                <h5 ><span>The Jaccard Similarity:   </span><span class="simi_1" id="jaccard_similarity"></span></h5>
                                    <h5 ><span>The Cosine Similarity:   </span><span class="simi_1" id="cosine_similarity"></span></h5>
                                        <h5 ><span>The proposed Similarity:   </span><span class="simi_1" id="proposed_similarity"></span></h5>
                              </div>
                              </div>
                      </div>
          </div>
          <div  class="previous">
            <a  class="previous"  href="index.php">Back to the previous page </a>
          </div>
        </div>
    </section>


    <!-- navbar -->
    <?php include "footer.php" ?>
      </footer>
      <script src="js/jquery-3.3.1.js"></script>
      <script src="try-final.js"></script>
      <script src="js/materialize.min.js"></script>
      <script type="text/javascript">
      function checkSimilarity(){

        //jaccard_similarity
          var text1 = <?php echo(json_encode($json_array_1)); ?>;
          var text2 = <?php echo(json_encode($json_array_2)); ?>;
          var intersect = <?php echo(json_encode($json_array_3)); ?>;

          var jaccard_similarity = getSimilarityScoreJaccard(textJaccardSimilarity(text1,text2,intersect));
          $("#jaccard_similarity").text(jaccard_similarity+"%");
          console.log(jaccard_similarity);

        //cosineSimilarity
          var textA = <?php echo(json_encode($json_array_1)); ?>;
          var textB = <?php echo(json_encode($json_array_2)); ?>;

          var cosine_similarity = getSimilarityScoreCosine(textCosineSimilarity(textA,textB));
          $("#cosine_similarity").text(cosine_similarity+"%");
          console.log(cosine_similarity);

        //proposed_similarity
          var text_first = <?php echo(json_encode($json_array_1)); ?>;
          var except = <?php echo(json_encode($json_array_4)); ?>;

          var proposed_similarity = getSimilarityScoreProposed(textProposedSimilarity(text_first,except));
          $("#proposed_similarity").text(proposed_similarity+"%");
          console.log(proposed_similarity);
      }

      // function checkSimilarityJaccard(){

      //     var jaccard_similarity = getSimilarityScoreJaccard(textJaccardSimilarity(text1,text2,intersect));
      //     $("#jaccard_similarity").text(jaccard_similarity);
      //     console.log(cosine_similarity);
      // }
      </script>
  </body>
</html>
