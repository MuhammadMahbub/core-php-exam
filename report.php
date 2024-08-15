<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
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
                        <div class="report-section__filter--startdate d-flex">
                            <form action="">
                               <div class="report-section__datetime--inner d-flex">
                                    <div class="form-group me-2">
                                        <label class="mb-2" >Start Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="form-group me-2">
                                        <label class="mb-2" >End Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                               </div>
                            </form>
                        </div>
                        <form action="" class="me-3">
                            <label class="mb-2" >Search</label>
                            <input type="text" class="form-control" placeholder="Search User Id" >
                        </form>  
                        <div class="search_report"> 
                            <a href="" class="btn btn-success">Check Report</a>
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
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td>01</td>
                            <td>Hannan</td>
                            <td>LMS Project</td>
                            <td>hannna@gmail.com</td>
                            <td>012545568522</td>
                            <td>
                                <a class="btn btn-warning me-3" href="#">View</a> 
                            </td>
                        </tr>  
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>