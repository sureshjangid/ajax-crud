<?php

$connect = mysqli_connect('localhost','root','','note');


// fetch Data

if(isset($_POST['readData'])){

    $data  = '<table>
        <tr>
        <td>No.</td>
        <td>Name</td>
        <td>Email</td>
        <td>Action</td>
        </tr>';
    $fetchData = "SELECT * from `email`";
    $result = mysqli_query($connect,$fetchData);

    if(mysqli_num_rows($result)){
        $num = 1;
        while($row = mysqli_fetch_assoc($result)){
            $data .= '<tr>
            <td>'.$num.'</td>
            <td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>
            <button onclick="dataDelete('.$row['id'].')">Delete</button>
            <button onclick="dataEdit('.$row['id'].')">Edit</button>
            </td>
            </tr>';
            $num++;
        }
    }
    $data .= '</table>';
    echo $data;
}

if($_SERVER['REQUEST_METHOD']=='POST'){

    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO `email` (`email`,`subject`) VALUES ('$name','$email')";
    $result = mysqli_query($connect,$sql);

    if($result){
        echo 1;

    }else{
        echo 0;
    }

}

// Delete user
// if(isset($_POST['deleteId)'])){
    
//     $userid = $_POST['deleteId'];
//     $sql1 = "DELETE from `email` where id='$userid'";
//     $result1  =mysqli_query($connect,$sql1);

//     // if($result){
//     //     echo 1;

//     // }else{
//     //     echo 0;
//     // }
// }
?>