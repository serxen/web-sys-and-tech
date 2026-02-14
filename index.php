<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Project</title>
    <link rel="stylesheet" href="./vendor/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <?php
        include './insert-modal.php';
    ?>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
    </button>
    <table id="table-information" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $connection = mysqli_connect("localhost","root","","informationdb");
            $query = "SELECT * FROM userinfo";
            $result = mysqli_query($connection, $query);
            if (mysqli_num_rows($result) > 0) {
                foreach($result as $data){
                    ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['name'] ?></td>
                        <td><?php echo $data['email'] ?></td>
                        <td><?php echo $data['phone'] ?></td>
                        <td><?php echo $data['address'] ?></td>
                        <td>
                            <button id="btnDelete" class="btn btn-danger" value="<?php echo $data ['id']?>">
                            <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>