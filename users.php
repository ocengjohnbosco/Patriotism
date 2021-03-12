<?php
include 'header.php';
?>

<div class="kis">
<h2>Registered Users</h2>
<div class="mtn-pdd2">
<form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="log-form" class="log-formww">
<button type="submit" name="custom-btn" class="sale">VIEW ALL USERS</button>
</form><br><br>
<style>
table{
  width:800px;
  background: white;  
}
.destine{
  background: blue;  
  color:white;
}
tr td{
    border-left: 1px black solid;
    width:fit-content;
    padding-left:3px;
}
</style>
<?php
/*  get the registered customer from the database, table users in the lockhart database... */

if (isset($_POST['custom-btn'])) {
$server = "localhost";
$dbUsername ="root";
$dbpasswd = "";
$dataBase = "patriotism";
$conn = mysqli_connect($server, $dbUsername, $dbpasswd, $dataBase);
if (!$conn) {
die("connection to database failed!");
}
echo ' 
<table class="tabo">
<tr class="destine">
<td class="tab">User-ID</td>
<td class="tab">First Name</td>
<td class="tab">Last Name</td>
<td class="tab">Usernam</td>
<td class="tab">Email</td>
<td class="tab">Contact</td>
<td class="tab">Address</td>
</tr>
';
$sql = "SELECT id, fir_name,la_name, username, email, contact, address FROM users";
$results = $conn->query($sql);

if ($results->num_rows > 0) {
    while ($row = $results-> fetch_assoc()) {
       echo"
       <tr>
       <td>" .$row['id'] ."</td>
       <td>" .$row['fir_name'] ."</td>
       <td>" .$row['la_name'] ."</td>
       <td>" .$row['username'] ."</td>
       <td>" .$row['email'] ."</td>
       <td>" .$row['contact'] ."</td>
       <td>" .$row['address'] ."</td>
       </tr>";
      
    }
    echo"</table>";
}
else{
    echo"No Results form table!.";
}
}

?>
</table>


</body>
</html>