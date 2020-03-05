<!DOCTYPE HTML>
<html>
<head>
    <title>Add Customer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>


    <div class="container">

        <div class="page-header">
            <h1>Add Customer</h1>
        </div>

        <?php
        if($_POST){

            // include database connection
            include 'config/database.php';

            try{

                $query = "INSERT INTO contacts SET firstname=:firstname, lastname=:lastname, mobile=:mobile, email=:email, postcode=:postcode";
                $stmt = $con->prepare($query);

                $firstname=htmlspecialchars(strip_tags($_POST['firstname']));
                $lastname=htmlspecialchars(strip_tags($_POST['lastname']));
                $mobile=htmlspecialchars(strip_tags($_POST['mobile']));
                $email=htmlspecialchars(strip_tags($_POST['email']));
                $postcode=htmlspecialchars(strip_tags($_POST['postcode']));

                // bind the parameters
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':mobile', $mobile);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':postcode', $postcode);


                // Execute the query
                if($stmt->execute()){
                    echo "<div class='alert alert-success'>Record was saved.</div>";
                }else{
                    echo "<div class='alert alert-danger'>Unable to save record.</div>";
                }

            }

                // show error
            catch(PDOException $exception){
                die('ERROR: ' . $exception->getMessage());
            }
        }
        ?>

        <!-- html form here where the Customer information will be entered -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <table class='table table-hover table-responsive table-bordered'>
                <tr>
                    <td>FirstName</td>
                    <td><input type='text' name='firstname' class='form-control' required/></td>
                </tr>
                <tr>
                    <td>LastName</td>
                    <td><input type='text' name='lastname' class='form-control' required/></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><input type='text' name='mobile' class='form-control' required/></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" placeholder="Enter valid email" name='email' class='form-control' required /></td>

                    <!--<td><textarea name='email' class='form-control' ></textarea></td>  -->
                </tr>
                <tr>
                    <td>Postcode</td>
                    <td><input type='text' name='postcode' class='form-control' /></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' value='Save' class='btn btn-primary' />
                        <a href='index.php' class='btn btn-danger'>Back to Customer List</a>
                    </td>
                </tr>
            </table>
        </form>

    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</body>
</html>