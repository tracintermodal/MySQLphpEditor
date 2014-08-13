<?php

$host="localhost"; // Host name 
$username="mysqluser"; // Mysql username 
$password="yourpasswordhere"; // Mysql password 
$db_name="yourDBnamehere"; // Database name 
$tbl_name="test_mysql"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$name=$_POST['name'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];

// Only post into the database if the forms were filled out
if (!$name or !$lastname or !$email)
{
    echo "No post due empty form or reload<br>";
    echo "<a href='insert.php'>Back to main page</a>";
}
else
{
    // Insert data into mysql 
    $sql="INSERT INTO $tbl_name(name, lastname, email)VALUES('$name', '$lastname', '$email')";
    $result=mysql_query($sql);

    // if successfully insert data into database, displays message "Successful". 
    if($result){
    echo "Successful";
    echo "<BR>";
    echo "<a href='insert.php'>Back to main page</a>";
    }

    else {
    echo "ERROR";
    }
}
?> 

<?php // This script will display what is in the DB
// Query the database
$query="SELECT * FROM $tbl_name";
$result=mysql_query($query);
$num=mysql_numrows($result);mysql_close(); // Number of rows
echo '<table border="1" cellspacing="2" cellpadding="2">';
echo "<tr>";
echo "<td>";
echo '<font face="Arial, Helvetica, sans-serif">Name</font>';
echo "</td>";
echo "<td>";
echo '<font face="Arial, Helvetica, sans-serif">Last Name</font>';
echo "</td>";
echo "<td>";
echo '<font face="Arial, Helvetica, sans-serif">Email</font>';
echo "</td>";
echo "</tr>";
$i=0;
while ($i < $num) {
    $f1=mysql_result($result,$i,"name");
    $f2=mysql_result($result,$i,"lastname");$f3=mysql_result($result,$i,"email");
    echo "<tr>";
    echo "<td>";
    echo "<font face='Arial, Helvetica, sans-serif'>$f1</font>";
    echo "</td>";
    echo "<td>";
    echo "<font face='Arial, Helvetica, sans-serif'>$f2</font>";
    echo "</td>";
    echo "<td>";
    echo "<font face='Arial, Helvetica, sans-serif'>$f3</font>";
    echo "</td>";
    echo "</tr>";

    $i++;
    }
?>

<?php 
// close connection 
mysql_close();
?>
