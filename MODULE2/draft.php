<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','foody');

// get the post records
$txtName = $_POST['name'];
$txtDesc = $_POST['desc'];
$txtCompType = $_POST['type'];

// database insert SQL code
$sql = "INSERT INTO `complaint` ( `Name`, `Desc`, `CompType`, `datetime`,`complaint_status`) VALUES ( '$txtName', '$txtDesc', '$txtCompType', current_timestamp(), 'In Investigation')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Contact Records Inserted";
}

?>

<?php
error_reporting(E_ALL & ~E_NOTICE);

$no1=$_POST['peruntukan_diluluskan'];
$no2=$_POST['jumlah_perbelanjaan'];
$tolak6=$_POST['baki'];
$tolak6=($no1-$no2);

$con= mysql_connect("localhost","root","") or die( " Error"."Connection failed: ".mysql_error());
mysql_select_db("testdb") or die( " Error"."DB selection failed: ".mysql_error());
$query="INSERT INTO form (baki) VALUES ('$tolak6')";
$result=mysql_query($con,$query) or die(mysql_errno($con,$query));

?>