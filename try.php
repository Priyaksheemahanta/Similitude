<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>try</title>
  </head>
  <body>


<?php

$input="abc   d        u";
$words=preg_split("/ +/ ",$input);
print_r($words);


$con = mysqli_connect("localhost","root","");
$query=$con->query("SELECT * FROM `college_project`.`word` where w_id=(select MAX(w_id) from `try`.`word_try`)");
$query1=$con->query("SELECT * FROM `try`.`word_try` where w_id<(select MAX(w_id) from `try`.`word_try`)");
$query2=$con->query("SELECT words FROM `try`.`word_try` where w_id=(select MAX(w_id) from `try`.`word_try`) UNION SELECT words FROM `try`.`word_try`where  w_id<(select MAX(w_id) from `try`.`word_try`)");

// echo "<table border='1' cellpadding='10'>";
// echo "<tr>
//
// <th><font color='Blue'>words</font></th>
//
// </tr>";
//
//
// while($row=mysqli_fetch_array($query))
// {
//   $dataA=array($row);
//   print_r($dataA);
//
// }
// echo "________________________";
// while($row=mysqli_fetch_array($que ry1))
// {
//   $dataB=array($row);
//   print_r($dataB);
//
// }

echo '<script>';
echo 'dataA = ' .json_encode($query, JSON_PRETTY_PRINT) . ';';
echo '</script>';




// echo "<table border='1' cellpadding='10'>";
// echo "<tr>
//
// <th><font color='Blue'>w_id</font></th>
// <th><font color='Blue'>words</font></th>
//
// </tr>";
//
//
// while($row=mysqli_fetch_array($query))
// {
// echo "<tr>";
//
// echo '<td><b><font color="#663300">' . $row['w_id'] . '</font></b></td>';
// echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';
//
// }
//
// echo "</table>";



echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>w_id</font></th>
<th><font color='Blue'>words</font></th>

</tr>";


// while($row=mysqli_fetch_array($query1))
// {
// echo "<tr>";
//
// echo '<td><b><font color="#663300">' . $row['w_id'] . '</font></b></td>';
// echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';
//
// }

echo "</table>";

echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>words</font></th>
</tr>";


while($row=mysqli_fetch_assoc($query2))
{
echo '<tr>';
  echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';
echo '</tr>';


}

echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>w_id</font></th>
<th><font color='Blue'>words</font></th>
<th><font color='Blue'>counts</font></th>

</tr>";
while($row=mysqli_fetch_assoc($query) or $row1=mysqli_fetch_assoc($query1))
{  $new=array($row['words']);
   $new1=array($row1['words']);

  $count=0;
  foreach($new as $key){
    foreach ($new1 as $key1) {
      if ($key==$key1){
        $count+=1;
      }
    }

  echo "<tr>";
  echo '<td><b><font color="#663300">' . $row['w_id'] . '</font></b></td>';
  echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';
  echo '<td><b><font color="#663300">' . $count . '</font></b></td>';
}
}


// echo "<table border='1' cellpadding='10'>";
// echo "<tr>
//
// <th><font color='Blue'>w_id</font></th>
// <th><font color='Blue'>words</font></th>
// <th><font color='Blue'>counts</font></th>
//
// </tr>";


// while($row=mysqli_fetch_assoc($query1))
// {
//   $new=array($row['words']);
//   $count=0;
//   foreach($new as $key){
//     if ($key=='jec') {
//       $count+=1;}
//   }
// echo "<tr>";
//
// echo '<td><b><font color="#663300">' . $row['w_id'] . '</font></b></td>';
// echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';
// echo '<td><b><font color="#663300">' . $count . '</font></b></td>';
//
// }
//
// echo "</table>";


?>
 <script type="text/javascript" src="file.js"></script>
</body>
</html>
