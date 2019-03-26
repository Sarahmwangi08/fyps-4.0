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
$password = 'S******a04';


$conn = mysqli_connect($host,$username,$password,$db);

/*$comment = $_POST['comment'];*/
$sql = "select * from pms_users where pms_user_type = 'Student'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0){
    while($row = $result->fetch_array()){
        echo "<tbody>
                                            
                                          
                                            <tr>
                                                <td>".$row['pms_user_id']."</td>
                                                <td>".$row['pms_user_fname']."</td>
                                                <td>".$row['pms_user_lname']."</td>
                                                <td>".$row['pms_user_email']."</td>
                                                <td>".$row['pms_adm_no']."</td>
                                                <td><button data-toggle=\"tooltip\" title=\"Edit\" class=\"pd-setting-ed\"><i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i></button>
                                                        <button data-toggle=\"tooltip\" title=\"Trash\" class=\"pd-setting-ed\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></button></td>
                                            </tr>
                                            </tbody>";
    }

}
?>
