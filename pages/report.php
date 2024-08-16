<?php 

    require '../vendor/autoload.php';
    use Carbon\Carbon;

    $buyer = new Controller\BuyerController();

    if(isset($_GET['viewBuyer'])){
        $id = base64_decode($_GET['viewBuyer']);
        $buyer->singleBuyer($id);
    }

    //SEARCH SETTINGS
    if(isset($_GET['submitData'])) {
        if (isset($_GET['submitData'])) {
            $from = $_GET['from']; 
            $to = $_GET['to'];
            $allBuyer = $buyer->searchBuyerBetweenDate($from, $to);
    
        } else {
            $allBuyer = $buyer->getAllBuyer();
        }
    }
    else {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        if (!empty($search)) {
            $allBuyer = $buyer->searchBuyerById($search);
        } else {
            $allBuyer = $buyer->getAllBuyer();
        }
    
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
     

    <div class="report-section mt-5">
        <div class="container">
            <div class="report-section__area">
                <div class="report-section__filter-bar  d-flex justify-content-between">
                    <div class="report-section__menu">
                        <a class="report-section__menu--item" href="index.php">Home</a>
                        <a class="report-section__menu--item active-menu" href="report.php">Report</a>
                    </div>
                    <div class="report-section__filter--userId mb-4 d-flex align-items-end"> 
                        <div class="report-section__filter--startdate d-flex me-5">
                            <form method="GET">
                               <div class="report-section__datetime--inner d-flex align-items-end">
                                    <div class="form-group me-2">
                                        <label class="mb-2" >Start Date</label>
                                        <input type="date" name="from" class="form-control">
                                    </div>
                                    <div class="form-group me-2">
                                        <label class="mb-2" >End Date</label>
                                        <input type="date" name="to" class="form-control">
                                    </div>
                                    <div class="search_report"> 
                                        <button type="submit" name="submitData" class="btn btn-success">Check Report</button>
                                    </div>
                               </div>
                            </form>
                        </div> 
                        <form method="GET" class="me-3 flex">
                            <div class="form-item d-flex">
                                <input type="text" name="search" class="form-control me-3" placeholder="Search User Id">
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>
                        </form>  
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
  </body>
</html>