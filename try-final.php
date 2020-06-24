<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>try</title>
  </head>
  <body>


<?php
$con = mysqli_connect("localhost","root","");
$query=$con->query("SELECT * FROM `try`.`word_try` where w_id=(select MAX(w_id) from `try`.`word_try`)");
$query1=$con->query("SELECT * FROM `try`.`word_try` where w_id<(select MAX(w_id) from `try`.`word_try`)");
//$query2=$con->query("SELECT words FROM `try`.`word_try` where w_id=(select MAX(w_id) from `try`.`word_try`) UNION SELECT words FROM `try`.`word_try`where  w_id<(select MAX(w_id) from `try`.`word_try`)");

$json_array_1=array();
while($row=mysqli_fetch_assoc($query))
{
  $json_array_1[]=$row['words'];
}
echo json_encode($json_array_1);
echo '<br />';
$json_array_2=array();
while($row=mysqli_fetch_assoc($query1))
{
  $json_array_2[]=$row['words'];
}
echo json_encode($json_array_2);
echo '<script>var arrayFromPhp = ' . json_encode($json_array_1) . ';</script>';
?>
<div class="row">
        <div class="col s12 m12">
                <div class="card-panel center">
                    <button class="btn waves-effect waves-light" onclick="checkSimilarity()"> compare</button>
                    <h5 ><span>Similarity score: </span><span id="similarity"></span></h5>
                </div>
            </div>
</div>
 <script src="js/jquery-3.3.1.js"></script>
 <script src="try-final.js"></script>
 <script src="js/materialize.min.js"></script>

 <script type="text/javascript">
 var text = <?php echo json_encode($json_array_1, JSON_PRETTY_PRINT) ?>;
 //alert(text[2]);

 </script>
</body>
</html>
