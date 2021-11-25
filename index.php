<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>insert operation</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            .k_box{
                width: 550px;
                height: 688px;
                background-color: lightcoral;
                margin:20px auto;
            }
        </style>
    </head>
    <body>
        <?php
            /* //1. connection open
            $servername = 'localhost';
            $username = "root";
            $password = "";
            $database = 'kiran_db';  
            $con = mysqli_connect($servername,$username,$password,$database);*/

            $con = mysqli_connect('localhost','root','','kiran_db');

            if(isset($_GET['submit'])){
                //echo "ok";
                //true
                 //always filter the incoming data store to a local variable
                $name = mysqli_real_escape_string($con,$_GET['name']);$_GET['name'];
                $email = mysqli_real_escape_string($con,$_GET['email']);$_GET['email'];
                $pass = MD5(mysqli_real_escape_string($con,$_GET['pass']));
                $confi_pass = MD5(mysqli_real_escape_string($con,$_GET['confi_pass']));
                $dob = mysqli_real_escape_string($con,$_GET['dob']);
                $number = mysqli_real_escape_string($con,$_GET['number']);

                //check the password and comfirm password
                if($pass == $confi_pass){

                    //2. build the query
                    //echo $query = "INSERT INTO register_tbl(`name`,`email`,`pass`,`confi_pass`,`dob`,`mob`) VALUE('$name','$email','$pass','$confi_pass','$dob','$number')";
                    $query = "INSERT INTO register_tbl(`name`,`email`,`pass`,`confi_pass`,`dob`,`mob`) VALUE('$name','$email','$pass','$confi_pass','$dob','$number')";

                    //3.Execute the query
                    mysqli_query($con,$query);

                    //4.display the result
                    //echo"Data Inserted Successfully";
                echo '<div class="alert alert-success" role="alert">
                             User Registered Successfully!
                    </div>';

                }
                else{
                    //False
                    echo '<div class="alert alert-danger " role="alert">
                            Password and confirm password does not match!
                          </div>';
                }

                

                //5.connection close
                mysqli_close($con);
            };
        ?>
        <form class="k_box container p-5">
            <h1 class="text-center">Registration Form</h1>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input name="pass" type="password" class="form-control" id="pass" required>
            </div>
            <div class="mb-3">
                <label for="confi_pass" class="form-label">Confirm Password</label>
                <input name="confi_pass" type="password" class="form-control" id="confi_pass" required>
            </div>    
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input name="dob" type="date" class="form-control" id="dob" required>
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Mobile Number</label>
                <input name="number" type="number" class="form-control" id="number" required>
            </div>
            <input type="submit" class="btn btn-success" name="submit" value="Submit">
        </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>