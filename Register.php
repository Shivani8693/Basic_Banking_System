
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Create user!</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Gabriela&display=swap" rel="stylesheet">
    <link href="bstyle.css" rel="Stylesheet">
    
    <style>
      

 
        .row{
            margin: 40px;
            background: rgb(143, 217, 238);
            border-radius: 30px;
            box-shadow: 12px 12px 12px;
        }
        .login img{
            margin-left: 50px;
            border-top-left-radius: 30px;
            border-bottom-left-radius: 30px;
        }
        .login h1{
            font-size: 3rem;
            font-weight: 400;
            font-family: 'Anton', sans-serif;
            font-family: 'Gabriela', serif;
        }
        .inp{
            height:50px;
            width: 70%;
            border: none;
            outline: none;
            border-radius:60px;
            -webkit-box-shadow: -1px 1px 30px -11px rgb(248, 248, 248);
            -moz-box-shadow: -1px 1px 30px -11px rgb(255, 255, 255);
            box-shadow: -1px 1px 30px -11px rgb(192, 109, 157);
        }

        .submit button{
            background-color: #ff99ff;
            border: 3px rgb(220, 20, 20) solid;
    border-radius: 10px;
    padding: 5px 70px;
            
        }

        .submit button:hover{
    font-size: 18px;
    padding: 5px 90px;
    transition: 0.5s;
    background-color: rgb(210, 17, 36);
        }
        
        
 </style>
  </head>
  <body >
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
    

        <section class="login py-5 bg-light">

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $gender = $_POST['gender'];
                    $balance=$_POST['balance'];
                
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
                else{ 
                    // Submit these to a database
                    // Sql query to be executed 
                    $sql = "INSERT INTO `user` (`Name`, `Email_id`, `Gender`, `Balance`) VALUES ('$name', '$email', '$gender', $balance)";
                    $result = mysqli_query($conn, $sql);
            
                    if($result){
                    echo "<div class='alert alert-success alert-dismissible fade show hide' role='alert'>
                    <strong>Success!</strong> Your entry has been submitted successfully!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }
                    else{
                        // echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
                        echo "<div class='alert alert-danger alert-dismissible fade show hide' role='alert'>
                    <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span class='errorClose' aria-hidden='true'>×</span>
                    </button>
                    </div>";
                    }

                }

            }

                
        ?>

        
            <div class="container pt-3">
                <div class="row g-0 pt-5">
                    <div class=" ps-5 pt-5 mt-5 col-lg-5 ">
                        <img src="image\register_here.jpg" class="img-fluid">
                    </div>
                    <div class="col-lg-7 text-center py5">
                        <h1>Create New User</h1>
                        <form action="Register.php" method="post">
                            <div class="form-row py-3 pt-5">
                                <div class="offset-1 col-lg-10">
                                    <input type="text" name="name" class="inp px-3" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-row pt-4">
                                <div class="offset-1 col-lg-10">
                                    <input name="email" type="email" class="inp px-3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-row pt-5 ">
                                <div  class="  offset-1 col-lg-10">
                                    <select  name="gender" class="inp px-3 form-selec " aria-label="Default select example">
                                        <option selected>Select Gender</option>
                                        <option value="F">Female</option>
                                        <option value="M">Male</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row pt-5 ">
                                <div class="offset-1 col-lg-10">
                                    <input id="balance" name="balance" type="text" class="inp px-3" placeholder="Balance">
                                </div>
                            </div>
                            <div class="form-row pt-5 pb-5">
                                <div class="offset-1 col-lg-10">
                                    <a  class="submit"><button  name="Register Yourself" ;>Register Yourself</button></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                        


        </section>
  </body>
</html>




<!-- 
INSERT INTO `user` (`sno`, `Name`,`Acc_Number`,`Email_id`,`Gender`, `Balance`) VALUES
(1, 'Salman',1001,'khan@gmail.com','M', 50000),
(2, 'Kiara',1002 ,'advani@gmail.com','F', 30000),
(3, 'Shahrukh', 1003,'shah@gmail.com','M', 40000),
(4, 'Priyanka',1004,'chopra@gmail.com','F', 50000),
(5, 'Shahid',1005,'kapoor@gmail.com','M', 40000),
(6, 'Ranbir', 1006,'singh@gmail.com','M', 30000),
(7, 'Deepika',1007,'padukone@gmail.com','F', 50000),
(8, 'Juhi', 1008,'chawla@gmail.com','F', 40000),
(9, 'Nick', 1009,'jonas@gmail.com','M', 30000),
(10, 'Taapsee', 1010,'pannu@gmail.com','F', 50000); -->

<!-- 
INSERT INTO `user` (`sno`, `Name`,`Acc_Number`,`Gender`, `Balance`) VALUES
(1, 'Salman',1001,'M', 50000),
(2, 'Kiara',1002 ,'F', 30000),
(3, 'Shahrukh', 1003,'M', 40000),
(4, 'Priyanka',1004,'F', 50000),
(5, 'Shahid',1005,'M', 40000),
(6, 'Ranbir', 1006,'M', 30000),
(7, 'Deepika',1007,'F', 50000),
(8, 'Juhi', 1008,'F', 40000),
(9, 'Nick', 1009,'M', 30000),
(10, 'Taapsee', 1010,'F', 50000);


Insert into `user`(`Email_id`)values('khan@gmail.com'),('advani@gmail.com'),('shah@gmail.com')
,('chopra@gmail.com'),('kapoor@gmail.com'),('singh@gmail.com'),('padukone@gmail.com'),('chawla@gmail.com'),
('jonas@gmail.com'),('pannu@gmail.com'); -->