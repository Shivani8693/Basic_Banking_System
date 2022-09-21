<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <link href="bstyle.css" rel="stylesheet">

</head>
<body>
    <section class="banklogo" >
        <div class="logo">
            <img src="image/logo.png" alt="logo" id="logo">
            <p>TSF</p>
            
        </div>
        <div class="details">
            <P class="address">@dresss mumbai</P>
            <p class="contact">5555-897998</p>
        </div>
    </section>

    <section class="nav">
        <nav>
                <ul>
                    <li><a href="bank.html">Home</a></li>
                    <li><a href="users.php">our customer</a></li>
                    <li><a href="history.php">transaction history</a></li>
                    <li><a href="users.php">Transfer money</a></li>
                    <li><a href="bank.html">created by</a></li>
                    
                  </ul>
        </nav>
    </section>
    
    <section class="register">
        <h1>Bank Customer</h1>
    </section>

    <section class="table">
<table >
<tr>
<th>Sr.No.</th>
<th>Name</th>
<th>Email</th>
<th>Gender</th>
<th>Balance</th>
<th>Details</th>
</tr>
</section>


<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "bank";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}


$sql = "SELECT * FROM `user`";
$result = mysqli_query($conn, $sql);

// Find the number of records returned
$num = mysqli_num_rows($result);

// Display the rows returned by the sql query
if($num> 0){
    

    // We can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($result)){
        // echo var_dump($row);
       
        
        echo "<tr>";
    echo '<form method ="post" action = "Details.php">';
    echo "<td>" . $row["sno"]. "</td><td>" . $row["Name"] . "</td>
    <td>" . $row["Email_id"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Balance"] . "</td>";
    echo "<td ><a href='Details.php?user={$row["Name"]}&message=no' type='button' name='user'  id='users1' ><span>Expand</span></a></td>";
    echo "</tr>";
}
echo "</table>";
}
?>
 </section>
        

</table>
</body>
</html>