<?php
//Database connection
include 'config/database.php';


if(isset($_POST["query"]))
{

    $q = $_POST["query"];

    $results = $con->prepare("SELECT * FROM contacts WHERE id LIKE '%" . $q . "%'
OR firstname LIKE '%".$q."%'
OR lastname LIKE '%".$q."%'
OR mobile LIKE '%".$q."%'
OR email LIKE '%".$q."%'
OR postcode LIKE '%".$q."%'
");


}
else
{

    $results = $con->prepare("SELECT * FROM contacts ");

}

$results->execute();
while($row = $results->fetch(PDO::FETCH_ASSOC))
{
    echo '<tr onclick="javascript:showRow(this);">' .
        '<td>' . $row['id'] . '</td>' .
        '<td>' . $row['firstname'] . '</td>' .
        '<td>' . $row['lastname'] . '</td>' .
        '<td>' . $row['mobile'] . '</td>' .
        '<td>' . $row['email'] . '</td>' .
        '<td>' . $row['postcode'] . '</td>' .
        '</tr>';
}


?>