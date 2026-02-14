<?php
$con = mysqli_connect("localhost", "root", "", "informationdb");

if (!$con) {
    die('Connection Failed' . mysqli_connect_error());
}
if (isset($_POST['delete_data'])) {
    $data_id = mysqli_real_escape_string($con, $_POST['data_id']);
    $query = "DELETE FROM userinfo WHERE id='$data_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}
if (isset($_POST['save_data'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $name = mysqli_real_escape_string($con, $_POST['fullname']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $query = "INSERT INTO userinfo (email, name, phone, address) VALUES ('$email', '$name', '$phone', '$address')";
    $result = mysqli_query($con, $query);

    if ($result) {
        $res = [
            'status' => 200,
            'message' => 'Sumakses.'
        ];
        echo json_encode($res);
        return;
    }
    $res = [
        'status' => 500,
        'message' => 'Error.'
    ];
    echo json_encode($res);
    return;
}
?>