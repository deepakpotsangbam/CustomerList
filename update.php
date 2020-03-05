<!DOCTYPE HTML>
<html>
<head>
    <title>Customer Records update</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>

<!-- container -->
<div class="container">

    <div class="page-header">
        <h1>Update Customer Records</h1>
    </div>

    <?php

    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

    //include database connection
    include 'config/database.php';

    // read current record's data
    try {
        // prepare select query
        $query = "SELECT id, firstname, lastname, mobile, email, postcode FROM contacts WHERE id = ? LIMIT 0,1";
        $stmt = $con->prepare( $query );


        $stmt->bindParam(1, $id);


        $stmt->execute();

        // store retrieved row to a variable
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // values to fill up our form
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $mobile = $row['mobile'];
        $email = $row['email'];
        $postcode = $row['postcode'];
    }

// show error
    catch(PDOException $exception){
        die('ERROR: ' . $exception->getMessage());
    }
    ?>

    <?php

    // check if form was submitted
    if($_POST){

        try{


            // it is better to label them
            $query = "UPDATE contacts 
                    SET firstname=:firstname, lastname=:lastname, mobile=:mobile, email=:email, postcode=:postcode
                    WHERE id = :id";

            // prepare query for excecution
            $stmt = $con->prepare($query);

            // posted values
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
            $stmt->bindParam(':id', $id);

            // Execute the query
            if($stmt->execute()){
                echo "<div class='alert alert-success'>Record was updated.</div>";
            }else{
                echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
            }

        }

            // show errors
        catch(PDOException $exception){
            die('ERROR: ' . $exception->getMessage());
        }
    }
    ?>

    <!-- html form here where new record information can be updated-->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
        <table class='table table-hover table-responsive table-bordered'>
            <tr>
                <td>FirstName</td>
                <td><input type='text' name='firstname' value="<?php echo htmlspecialchars($firstname, ENT_QUOTES);  ?>" class='form-control' /></td>
            </tr>
            <tr>
                <td>LastName</td>
                <td><input type='text' name='lastname' value="<?php echo htmlspecialchars($lastname, ENT_QUOTES);  ?>" class='form-control' /></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td><input type='text' name='mobile' value="<?php echo htmlspecialchars($mobile, ENT_QUOTES);  ?>" class='form-control' /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><textarea name='email' class='form-control'><?php echo htmlspecialchars($email, ENT_QUOTES);  ?></textarea></td>
            </tr>
            <tr>
                <td>Postcode</td>
                <td><input type='text' name='postcode' value="<?php echo htmlspecialchars($postcode, ENT_QUOTES);  ?>" class='form-control' /></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type='submit' value='Save Changes' class='btn btn-primary' />
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