<?php

    require '../vendor/autoload.php';
    use Carbon\Carbon;


    $buyer = new Controller\BuyerController();

    if(isset($_GET['deleteBuyer'])){
        $id = base64_decode($_GET['deleteBuyer']);
        $buyer->deleteBuyer($id);
    }
    if(isset($_GET['viewBuyer'])){
        $id = base64_decode($_GET['viewBuyer']);
        $buyer->singleBuyer($id);
    }

    // SEARCH SETTINGS
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    if (!empty($search)) {
        $allBuyer = $buyer->searchBuyer($search);
    } else {
        $allBuyer = $buyer->getAllBuyer();
    }

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Submission Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>


    <div class="report-section mt-5">
        <div class="container">
            <div class="report-section__area">
                <div class="report-section__filter-bar  d-flex justify-content-between">
                    <div class="report-section__menu">
                        <a class="report-section__menu--item active-menu" href="index.php">Home</a>
                        <a class="report-section__menu--item" href="report.php">Report</a>
                    </div>
                    <div class="report-section__filter--buyername mb-4 d-flex">
                        <form method="GET" class="me-3 d-flex">
                            <input type="text" name="search" class="form-control me-3" placeholder="Buyer Name/Buyer Email">
                            <button type="submit" class="btn btn-info">Search</button>
                        </form>
                        <div class="add_new">
                            <a href="add-user.php" class="btn btn-info">Add New</a>
                        </div>
                    </div>
                </div>
                <div class="report-section__inner">
                    <table class="table text-center table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SR.NO</th>
                                <th scope="col">Buyer Name</th>
                                <th scope="col">Items</th>
                                <th scope="col">Buyer Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
 
                                if ($allBuyer) { 
                                    while ($row = mysqli_fetch_assoc($allBuyer)) { 
                                        $entry_at = $row['entry_at'];
                                        $date = Carbon::parse($entry_at);
                                        ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['buyer'] ?></td>
                                            <td><?= $row['items'] ?></td>
                                            <td><?= $row['buyer_email'] ?></td>
                                            <td><?= $row['phone'] ?></td>
                                            <td><?= $date->diffForHumans(); ?></td>
                                            <td>
                                                <a class="btn btn-warning me-3" href="single-user.php?id=<?= $row['id'] ?>">View</a>
                                                <a class="btn btn-success me-3" href="update-user.php?id=<?= $row['id'] ?>">Edit</a>
                                                <a class="btn btn-danger" href="?deleteBuyer=<?=base64_encode($row['id'])?>" onclick="return confirm('Are you sure to delete ?')">Delete</a>
                                            </td>
                                        </tr>

                                <?php } } 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php 

            if(isset( $_SESSION['success'])) { ?>
                  
                    <script>
                        Swal.fire({
                            title: "<?= $_SESSION['success'] ?>",
                            text: "You clicked the button!",
                            icon: "success"
                        });
                    </script>
           <?php 
             unset($_SESSION['success']);
        }  ?>

   
</body>

</html>