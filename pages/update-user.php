<?php 

    require_once '../controllers/BuyerController.php';

    $buyer = new BuyerController();
    $create = ['errors' => [], 'values' => []];

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $buyer->singleBuyer($id);
        $row = $result->fetch_assoc();
    }
 
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $create = $buyer->updateBuyer($_POST, $id);
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
                <div class="report-section__inner">
                    <div class="row">   
                        <form method="POST">
                            <div class="col-md-8 m-auto">
                                <div class="form-group mb-2">
                                    <label class="mb-1">Buyer Name</label> 
                                    <input type="text" class="form-control" name="buyer" value="<?= $row['buyer'] ?>">
                                    <?php if (isset($create['errors']['buyer'])): ?>
                                        <p class="text-danger mt-2"><?= $create['errors']['buyer'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1">Buyer Email</label>
                                    <input type="text" class="form-control" name="buyer_email" value="<?= $row['buyer_email'] ?>">
                                    <?php if (isset($create['errors']['buyer_email'])): ?>
                                        <p class="text-danger mt-2"><?= $create['errors']['buyer_email'] ?></p>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1">Buyer Phone</label>
                                    <input type="text" class="form-control" name="phone" value="<?= $row['phone'] ?>">
                                    <?php if (isset($create['errors']['phone'])): ?>
                                        <p class="text-danger mt-2"><?= $create['errors']['phone'] ?></p>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1">Buyer City</label>
                                    <input type="text" class="form-control" name="city" value="<?= $row['city'] ?>">
                                    <?php if (isset($create['errors']['city'])): ?>
                                        <p class="text-danger mt-2"><?= $create['errors']['city'] ?></p>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1">Item</label>
                                    <input type="text" class="form-control" name="items" value="<?= $row['items'] ?>">
                                    <?php if (isset($create['errors']['items'])): ?>
                                        <p class="text-danger mt-2"><?= $create['errors']['items'] ?></p>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1">Amount</label>
                                    <input type="text" class="form-control" name="amount" value="<?= $row['amount'] ?>">
                                    <?php if (isset($create['errors']['amount'])): ?>
                                        <p class="text-danger mt-2"><?= $create['errors']['amount'] ?></p>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1">Receipt Id</label>
                                    <input type="text" class="form-control" name="receipt_id" value="<?= $row['receipt_id'] ?>">
                                    <?php if (isset($create['errors']['receipt_id'])): ?>
                                        <p class="text-danger mt-2"><?= $create['errors']['receipt_id'] ?></p>
                                    <?php endif; ?>
                                     
                                </div> 
                                <div class="form-group mb-2">
                                    <label class="mb-1">Entry By</label>
                                    <input type="text" class="form-control" name="entry_by" value="<?= $row['entry_by'] ?>">
                                    <?php if (isset($create['errors']['entry_by'])): ?>
                                        <p class="text-danger mt-2"><?= $create['errors']['entry_by'] ?></p>
                                    <?php endif; ?>
                                     
                                </div>
                                <div class="form-group mb-2">
                                    <label class="mb-1">Note</label>
                                    <textarea name="note" rows="5" class="form-control"><?= $row['note'] ?></textarea>
                                    <?php if (isset($create['errors']['note'])): ?>
                                        <p class="text-danger mt-2"><?= $create['errors']['note'] ?></p>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-success">Update Buyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>