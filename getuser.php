<html>
<head>
<script language="javascript" src="scriptaculous/lib/prototype.js"></script>
<script language="javascript" src="scriptaculous/src/scriptaculous.js"></script>
</head>
<body>
<?php
session_start();

if(isset($_SESSION['admin_id']))
{
$name=$_SESSION['name'];
include('config.php');

if($_GET["q"]){
// table name 
$tbl_name="users";
$tbl_name1="registered_students";

$q=$_GET["q"];

$sql = "SELECT a.student_id, a.name,a.gender,a.email_id, b.password
        FROM $tbl_name a, $tbl_name1 b
        WHERE a.student_id = b.student_id AND a.class_id = '$q'";
$result = mysql_query($sql);

echo "<table border='1' cellspacing='3' cellpadding='10'>
<tr>
<th>Id</th>
<th>Name</th>
<th>Gender</th>
<th>Email_Id</th>
<th>Password</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['student_id'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['gender'] . "</td>";
  echo "<td>" . $row['email_id'] . "</td>";
?>
<td><? echo $row['password'] ?>
<td><form id="form2" name="form2" method="post" action="adminupdatepwd.php">
<input type="hidden" name="student_id" value="<? echo $row['student_id']; ?>" />
<input type="submit" name="Submit" value="Change Password" />
</form></td>
<td><form id="form1" name="form1" method="post" action="deleteuser.php">
<input type="hidden" name="student_id" value="<? echo $row['student_id']; ?>" />
<input type="submit" name="Submit" value="Delete User" />
</form></td>
<?php
  echo "</tr>";
  }
echo "</table>";
}
else if($_GET["t"]){
$t=$_GET["t"];
$tbl_name1="teachers";

$sql2="SELECT * FROM $tbl_name1 where branch_id='$t'";
$result2=mysql_query($sql2);
echo "<table border='1' cellspacing='3' cellpadding='10'>
<tr>
<th>Id</th>
<th>Name</th>
<th>Gender</th>
<th>Email_Id</th>
<th>Password</th>
</tr>";
while($rows2 = mysql_fetch_array($result2))
  {
  echo "<tr>";
  echo "<td>" . $rows2['teacher_id'] . "</td>";
  echo "<td>" . $rows2['name'] . "</td>";
  echo "<td>" . $rows2['gender'] . "</td>";
  echo "<td>" . $rows2['email_id'] . "</td>";
  echo "<td>" . $rows2['password'] . "</td>";
  ?>
<td><form id="form2" name="form2" method="post" action="adminupdatepwd.php">
<input type="hidden" name="teacher_id" value="<? echo $rows2['teacher_id']; ?>" />
<input type="hidden" name="student_id" value="" />
<input type="submit" name="Submit" value="Change Password" />
</form></td>
 <td><form id="form1" name="form1" method="post" action="deleteuser.php">
<input type="hidden" name="teacher_id" value="<? echo $rows2['teacher_id']; ?>" />
<input type="hidden" name="student_id" value="" />
<input type="submit" name="Submit" value="Delete" />
</form></td>
<?php
  echo "</tr>";
  }
echo "</table>";
}
mysql_close();
?>
</body>
</html>
<?php
}
else
{
header("location:index.php");
}
?>