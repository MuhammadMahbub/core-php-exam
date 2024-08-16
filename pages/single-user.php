<?php 

    require_once('../vendor/autoload.php');

    $buyer = new Controller\BuyerController();

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $buyer->singleBuyer($id);
        $row = $result->fetch_assoc();
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
                        <a class="report-section__menu--item" href="report.php">Report</a>
                    </div> 
                </div>
               <div class="single">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="card p-5">
                                <ul class="list-group">
                                    <li class="list-group-item"><strong>Id:</strong> <?= $row['id'] ?></li>
                                    <li class="list-group-item"><strong>Buyer Name: </strong><?= $row['buyer'] ?></li> 
                                    <li class="list-group-item"><strong>Buyer Email: </strong><?= $row['buyer_email'] ?></li> 
                                    <li class="list-group-item"><strong>Phone Number: </strong><?= $row['phone'] ?></li> 
                                    <li class="list-group-item"><strong>City: </strong><?= $row['city'] ?></li> 
                                    <li class="list-group-item"><strong>Items: </strong><?= $row['items'] ?></li> 
                                    <li class="list-group-item"><strong>Receipt Id: </strong><?= $row['receipt_id'] ?></li> 
                                    <li class="list-group-item"><strong>Buyer IP: </strong><?= $row['buyer_ip'] ?></li> 
                                    <li class="list-group-item"><strong>Amount: </strong><?= $row['amount'] ?></li> 
                                    <li class="list-group-item"><strong>Entry By: </strong><?= $row['entry_by'] ?></li> 
                                    <li class="list-group-item"><strong>Note: </strong><?= $row['note'] ?></li>  
                                </ul>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
        </div>
    </div>



    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>