<!DOCTYPE HTML>
<html>
<head>
    <title>Customer Details</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>
<body>


<!-- container -->
<div class="container">

    <div class="page-header">
        <h1>Customer Details</h1>
    </div>

    <?php

    // isset() is a PHP function used to verify if a value is there or not
    $id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');

    // database connection
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

    <!-- html table here where the record will be displayed-->
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>FirstName</td>
            <td><?php echo htmlspecialchars($firstname, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
            <td>LastName</td>
            <td><?php echo htmlspecialchars($lastname, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td><?php echo htmlspecialchars($mobile, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo htmlspecialchars($email, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
            <td>Postcode</td>
            <td><?php echo htmlspecialchars($postcode, ENT_QUOTES);  ?></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <a href='index.php' class='btn btn-danger'>Back to Customer List</a>
            </td>
        </tr>
    </table>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>