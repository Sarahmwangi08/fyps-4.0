<?php
/**
 * Created by PhpStorm.
 * User: bizsa
 * Date: 07/11/2018
 * Time: 13:02
 */
/*
$user_email = $_POST['Email'];
$user_fname = $_POST['first Name'];
$user_lname = $_POST['Last Name'];
$user_role = $_POST['Role'];
$user_id = $_POST['Admission Number'];*/


$host = '159.89.135.168';
$db = 'PMSDB';
$username = 'sarahmwangi';
$password = 'SAMAjuwa04';


$conn = mysqli_connect($host,$username,$password,$db);

$comment = $_POST['comment'];
$sql = "select * from users";
$result = mysqli_query($conn,$sql);
$dat = 1;
if (mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)){
        $dat=$row['user_id'];
        $dat=$row['First Name'];
        $dat=$row['Last Name'];
        $dat=$row['Email'];
    }
}
echo json_encode($dat);
?>