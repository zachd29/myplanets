<?
// DB Credentials
$servername = "localhost";
$username = "zachd29";
$password = "carmella1";
$dbname = "jaxcode54";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
}

// READING the Data


$sql = "SELECT * FROM planets";
$result = mysqli_query($conn, $sql);
?>
<div class="container" style="background-color:black;opacity: .85;">
<table class="table table-responsive">

<tr>
<th>Image</th>
<th>Name</th>
<th>Info</th>

  </tr>

<?
if (mysqli_num_rows($result) > 0) {
     // output data of each row

     while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><img src="images/<?=strtolower($row["planetname"])?>.jpg" style="width:100px;">
  
</td><td>
  <?=$row["planetname"]?>
</td>
<td>
  <table>
     <tr>


<th>Distance from the sun</th>
<th>Radius</th>
<th>Mass</th>
<th>Length of Day</th>
<th>Orbital period</th>
<th>Link</th>
  </tr>
    <tr>
      <td>
  <?=$row["distancefromsun"]?>
  </td><td>
  <?=$row["radius"]?>
  </td><td>
  <?=$row["mass"]?>
  </td><td>
  <?=$row["lengthofday"]?>
  </td><td>
  <?=$row["orbitalperiod"]?>
  </td><td>

<?
  if($row['linktogoogle'] == '') {
echo 'n/a';

  } else {
  ?>  
  <a href= "<?=$row['linktogoogle']?>" target="_blank" class="btn btn-warning btn-lg">google</a>
<? } ?>

</td>
    </tr>
    <tr><td colspan="5"><br><br>
  <?=$row["description"]?>
</td></tr>
  </table>

</td>


</tr>
<?
     }
} else {
     echo "0 results";
}

mysqli_close($conn);
?>

</table>

</div>