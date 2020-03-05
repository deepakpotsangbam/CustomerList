<?php
//database connections
include 'config/database.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Customer details</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <script src="js/jquery-1.11.3-jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.bootpag.min.js"></script>
    <script type="text/javascript">

        $(document).ready(function(){

            load_data();

            function load_data(query)
            {
                $.ajax({
                    url:"fetch.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }

            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();
                }
            });
        });


        function showRow(row)
        {
            var x=row.cells;
            document.getElementById("id").value = x[0].innerHTML;
            document.getElementById("firstname").value = x[1].innerHTML;
            document.getElementById("lastname").value = x[2].innerHTML;
            document.getElementById("mobile").value = x[3].innerHTML;
            document.getElementById("email").value = x[4].innerHTML;
            document.getElementById("postcode").value = x[5].innerHTML;
        }




    </script>



</head>
<body>
</br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"><h2 align="center">SEARCH </h2></div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
                <li class="active"><a href=""><b>SEARCH RESULTS</b></a></li>

            </ul></br>
            <div class="col-sm-6">


                <div class=".col-md-6">
                    <div class="panel panel-default">
                        <div class="bs-example">


                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">Search</span>
                                    <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
                                </div>
                            </div>



                        </div>
                    </div>
                </div>



                  <!--Table for search results-->

                <table class="table table-striped table-bordered table-hover" id="main">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Postcode</th>
                    </tr>
                    </thead>



                    <tbody id="result">

                    </tbody>

                </table>

                <td>
                    <a href='index.php' class='btn btn-danger'>Back to Customer List</a>
                </td>

        <div class="panel-footer"></div>
    </div>
</div>

</body>
</html>