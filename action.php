<?php
$con = mysqli_connect("localhost","root", "", "informationdb");
if(!$con)
    {
        die('connection failed' . mysqli_connect_error());
    }

    if(isset($_POST['delete_data']))
        {
            $data_id = mysqli_real_escape_string($con, $_POST['data_id']);
            $query = "DELETE FROM userinfo WHERE id = '$data_id'";
            $query_run = mysqli_query($con, $query);

            if($query_run)
                {
                    $res = [
                        'status' => 200,
                        'message' => 'Deleted Successfully'
                    ];
                    echo json_encode($res);
                    return;
                }
                else
                {
                $res = [
                    'status' => 500,
                    'message' => 'Not Deleted'
                ];
                echo json_encode($res);
                return;
                }
        }

    if(isset($_POST['save_data']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $name = mysqli_real_escape_string($con, $_POST['fullname']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp, "uploads/".$image);

    $query = "INSERT INTO userinfo (image, email, name, phone, address)
    VALUES ('$image','$email','$name','$phone','$address')";

    $result = mysqli_query($con, $query);

    if($result)
    {
        $res = [
            'status' => 200,
            'message' => 'Inserted Successfully.'
        ];
        echo json_encode($res);
        return;
    } 
}
        // FETCH DATA FOR EDIT
if(isset($_POST['get_data']))
{
    $data_id = mysqli_real_escape_string($con, $_POST['data_id']);
    $query = "SELECT * FROM userinfo WHERE id='$data_id'";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $data = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'data' => $data
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'Data Not Found'
        ];
        echo json_encode($res);
        return;
    }
}

if(isset($_POST['update_data']))
{
    $id = mysqli_real_escape_string($con, $_POST['date']);
    $name = mysqli_real_escape_string($con, $_POST['editfullname']);
    $email = mysqli_real_escape_string($con, $_POST['editemail']);
    $phone = mysqli_real_escape_string($con, $_POST['editphone']);
    $address = mysqli_real_escape_string($con, $_POST['editaddress']);

    if($_FILES['editimage']['name'] != "")
    {
        $image = $_FILES['editimage']['name'];
        $image_tmp = $_FILES['editimage']['tmp_name'];
        move_uploaded_file($image_tmp, "uploads/".$image);

        $query = "UPDATE userinfo SET 
                    image='$image',
                    name='$name',
                    email='$email',
                    phone='$phone',
                    address='$address'
                  WHERE id='$id'";
    }
    else
    {
        $query = "UPDATE userinfo SET 
                    name='$name',
                    email='$email',
                    phone='$phone',
                    address='$address'
                  WHERE id='$id'";
    }

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
}
?>