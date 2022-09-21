<!DOCTYPE html>
<html>

<head>
  <title>Table with database</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
  <link href="bstyle.css" rel="stylesheet">
  <style>

    .card {
      /* Add shadows to create the "card" effect */
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      text-align: -webkit-center;
    }
    

    /* On mouse-over, add a deeper shadow */
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    /* Add some padding inside the card container */
    .container {
      padding: 20px 16px;
      margin: 10px;
      background: antiquewhite;
    }

    .Transfer button{
    border: 3px rgb(207, 195, 178) solid;
    border-radius: 10px;
    padding: 5px 70px;
  }

  .Transfer button:hover{
    font-size: 18px;
    padding: 5px 90px;
    transition: 0.5s;
    background-color:  rgb(183, 174, 162);

  }

  
.register_transfer{
    padding:0% 30%;
    text-align: center;
    height: 100px;
    display: inline-block;
    width: 500px;
    font-size: 25px;
    
}

.register_transfer h1{
    background-color: #f1ecf1;
    color: #a09831;
    padding: 8px 10px;
    border-radius: 100px;
    font-family:Georgia, 'Times New Roman', Times, serif;
}


  </style>
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

<section >
  <table>
    <tr>
      <th>Account Number</th>
      <th>Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Balance</th>

    </tr>
  </section>



    <?php
    session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $conn = mysqli_connect($server, $username, $password, "bank");
    if (!$conn) {
      die("Connection failed");
    }

    $_SESSION['user'] = $_GET['user'];
    $_SESSION['sender'] = $_SESSION['user'];


    ?>
    <?php
    if (isset($_SESSION['user'])) {
      $user = $_SESSION['user'];

      $sql = "SELECT * FROM user WHERE Name='$user'";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";

        echo "<td>" . $row["Acc_Number"] . "</td><td>" . $row["Name"] . "</td>
              <td>" . $row["Email_id"] . "</td><td>" . $row["Gender"] . "</td><td>" . $row["Balance"] . "</td>";

        echo "</tr>";
      }
    }
    ?>

    <section class="register_transfer">
      <h1>Tranfer Money</h1>
  </section>
    <div class="card container">
      <?php
      if ($_GET['message'] == 'success') {
        echo "<h3><p style='color:green;' class='messagehide'>Transaction was completed successfully</p></h3>";
      }
      if ($_GET['message'] == 'transactionDenied') {
        echo "<h3><p style='color:red;' class='messagehide'>Transaction Failed </p></h3>";
      }
      ?>
      <form action="transfer.php" method="POST">
        <!-- Make Transcation -->

        <b>To</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp
        <select name="reciever" id="dropdown" class="textbox" required>
          <option>Select Recipient</option>
          <?php
          $db = mysqli_connect("localhost", "root", "", "bank");
          $res = mysqli_query($db, "SELECT * FROM user WHERE Name!='$user'");
          while ($row = mysqli_fetch_array($res)) {
            echo ("<option> " . "  " . $row['Name'] . "</option>");
          }
          ?>
        </select>
        <br><br>
        <b> From</b>&nbsp&nbsp&nbsp&nbsp :&nbsp&nbsp <span style="font-size:1.2em;"><input id="myinput" name="sender" class="textbox" disabled type="text" value='<?php echo "$user"; ?>'></input></span>
        <br><br>


        <b>Amount :&#8377;</b>
        <input name="amount" type="number" min="100" class="textbox" required>
        <br><br>
        <a  class ='Transfer' href="transfer.php"><button  id="transfer" name="transfer" ;>Transfer</button></a>
      </form>
    </div>

    <div style="  font-size: 20px bolder;
    text-align: center;">
      <h1>Customer Details</h1>
    </div>

</body>
</html>

