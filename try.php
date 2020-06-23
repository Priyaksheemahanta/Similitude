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
$query2=$con->query("SELECT words FROM `try`.`word_try` where w_id=(select MAX(w_id) from `try`.`word_try`) UNION SELECT words FROM `try`.`word_try`where  w_id<(select MAX(w_id) from `try`.`word_try`)");

echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>words</font></th>

</tr>";


while($row=mysqli_fetch_array($query2))
{
  $data=array($row);
  print_r($data);

}


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

echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>words</font></th>
<th><font color='Blue'>counts1</font></th>
<th><font color='Blue'>counts2</font></th>

</tr>";


while($row=mysqli_fetch_assoc($query2))
{

  echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';

}

echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>w_id</font></th>
<th><font color='Blue'>words</font></th>
<th><font color='Blue'>counts</font></th>

</tr>";
while($row=mysqli_fetch_assoc($query))
{
  $new=array($row['words']);
  $count=0;
  foreach($new as $key){
    if ($key==$keyw){
      $count+=1;
    }
  echo "<tr>";
  echo '<td><b><font color="#663300">' . $row['w_id'] . '</font></b></td>';
  echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';
  echo '<td><b><font color="#663300">' . $count . '</font></b></td>';
}
}

echo "<table border='1' cellpadding='10'>";
echo "<tr>

<th><font color='Blue'>w_id</font></th>
<th><font color='Blue'>words</font></th>
<th><font color='Blue'>counts</font></th>

</tr>";


while($row=mysqli_fetch_assoc($query1))
{
  $new=array($row['words']);
  $count=0;
  foreach($new as $key){
    if ($key=='jec') {
      $count+=1;}
  }
echo "<tr>";

echo '<td><b><font color="#663300">' . $row['w_id'] . '</font></b></td>';
echo '<td><b><font color="#663300">' . $row['words'] . '</font></b></td>';
echo '<td><b><font color="#663300">' . $count . '</font></b></td>';

}

echo "</table>";


?>
 <script type="text/javascript" src="file.js"></script>
</body>
</html>
