<!DOCTYPE HTML>
<html>
<head>
    <title>Customer List</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link href="css/1-horizontal.css" rel="stylesheet">

    <!-- custom css -->
    <style>
        .m-r-1em{ margin-right:1em; }
        .m-b-1em{ margin-bottom:1em; }
        .m-l-1em{ margin-left:1em; }
        .mt0{ margin-top:0; }
    </style>

</head>
<body>

<!-- container -->
<div class="container">
<div class="well well-lg">
    <div class="page-header">
        <h1 align="center">CUSTOMER LIST</h1>
        <div id="slider">
            <div class="container">
                <div class="slide">
                    <p>
                    <h4>The Customer List displays a list of details for each customers including names, mobile, emails and postcode. There are few actions that can be taken from this page</h4>
                    </p>
                </div>
                <div class="slide">
                    <p>
                    <h4>ACTION BUTTONS:
                        Add Customer allows us to add new customer details into the system. Read provides details of each customer in a new page. Edit allows us to changes details to the existing customers and delete enables us to remove customer from the system.</h4>
                    </p>
                </div>
                <div class="slide">
                    <p>
                    <h4>Search buttons takes us to a search page that allows us to search a customer by any search criteria, such as First name, last name, email, mobile, postcode in full or in parts.</h4>
                    </p>
                </div>
                <div class="slide">
                    <p>
                    <h4>Thank you for using this System</h4>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
    // include database connection
    include 'config/database.php';

    $action = isset($_GET['action']) ? $_GET['action'] : "";

    // if it was redirected from delete.php
    if($action=='deleted'){
        echo "<div class='alert alert-success'>Record was deleted.</div>";
    }

    // select all data
    $query = "SELECT id, firstname,lastname, mobile, email, postcode FROM contacts ORDER BY id ASC";
    $stmt = $con->prepare($query);
    $stmt->execute();


    $num = $stmt->rowCount();

    // link to create other form
    echo "<a href='create.php' class='btn btn-primary m-b-1em'>Add New Customer</a>";
    echo "<a href='search.php' class='btn btn-primary m-b-1em'>Search Customer info</a>";


    //check if more than 0 record found
    if($num>0){

        echo "<table class='table table-hover table-responsive table-bordered'>";//start table

        //creating our table heading
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>FirstName</th>";
        echo "<th>LastName</th>";
        echo "<th>Mobile</th>";
        echo "<th>Email</th>";
        echo "<th>Postcode</th>";
        echo "<th>Action</th>";
        echo "</tr>";


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);

            // creating new table row per record
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$firstname}</td>";
            echo "<td>{$lastname}</td>";
            echo "<td>{$mobile}</td>";
            echo "<td>{$email}</td>";
            echo "<td>{$postcode}</td>";
            echo "<td>";

            echo "<a href='read_one.php?id={$id}' class='btn btn-info m-r-1em'>Read</a>";


            echo "<a href='update.php?id={$id}' class='btn btn-primary m-r-1em'>Edit</a>";


            echo "<a href='#' onclick='delete_user({$id});'  class='btn btn-danger'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }

// end table
        echo "</table>";

    }

// if no records found
    else{
        echo "<div class='alert alert-danger'>No records found.</div>";
    }
    ?>

</div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type='text/javascript'>
    // confirm record deletion
    function delete_user( id ){

        var answer = confirm('Are you sure?');
        if (answer){
            // if user clicked ok,
            // pass the id to delete.php and execute the delete query
            window.location = 'delete.php?id=' + id;
        }
    }
</script>


</body>
</html>