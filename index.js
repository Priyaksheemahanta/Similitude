// <?php
//
// if(isset($_POST['submit'])){
//
//    $con = mysqli_connect("localhost","root","");
//    $lastid= mysqli_insert_id($con);
//    $result = "SELECT * FROM `content`.`word`";
//    $sql=mysqli_query($con, $result);
//    while($row = mysqli_fetch_array($sql1) )
//    {
//
//    $w_id=$row['w_id'];
//    $words=$row['words'];
//    // if($w_id==$last_id){
//    echo $words;
//    // }
//    // else{ echo 'error';}
//    // }
//    // echo 'ok';
//  }
//    echo mysqli_error($con);
//
//
//  }

// where w_id=(select MAX(w_id) from `content`.`word`)


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
// ?>
