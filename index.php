<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.bootstrap5.css">
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.bootstrap5.js"></script>
    <script src="script.js"></script>
    
    <title>CRUD Project</title>
</head>
<body data-bs-theme="dark">
    <?php
     include './insert-modal.php';
     include './edit-modal.php';
     ?>     
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertModal">
  Add Data
</button>
    <table id="table-information" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $connection = mysqli_connect("localhost", "root", "", "informationdb");
            $query = "SELECT * FROM userinfo";
            $result = mysqli_query($connection, $query);
           if(mysqli_num_rows($result) > 0){
            foreach($result as $data){
                ?>
                <tr>
                    <td><?php echo $data['id'] ?></td>
                    <td>
                     <img src="uploads/<?php echo $data['image']; ?>" width="50">
                    </td>
                    <td><?php echo $data['name'] ?></td>
                    <td><?php echo $data['email'] ?></td>
                    <td><?php echo $data['phone'] ?></td>
                    <td><?php echo $data['address'] ?></td>
                    <td>
                        <button id ="btnDelete" class="btn btn-danger" value="<?php echo $data['id'] ?> ">
                        <i class="fa-solid fa-trash"></i>
                        </button>

                        <button value="<?= $data['id']; ?>" class="btn btn-primary btn-sm" id="btnEdit">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                    </td>
                </tr>
                <?php
            }   
           }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
</body>
</html>