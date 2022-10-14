<?php
require_once('./sql.php');
// $sql = "SELECT *  FROM parameters";
// $response = sql($sql);

// function getName($data){
//     foreach ($data as $key => $value){
//         foreach ($value as $subkey => $subvalue){
//             if($subkey == "name"){
//                 echo $subvalue . " ";
//             }
            
//         }
        
//     }
// }
//  getName($response);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">

    <title>Weather App</title>
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <h1>What's The Weather Like In Year?</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" class="form-control" placeholder="Search weather">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Weater type</th>
                                <th>Temperature</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(isset($_GET['search'])){
                                $filtervalue = $_GET['search'];
                                // $sql = "SELECT *  FROM parameters";
                                $sql = "SELECT p.name, p.description,p.param_id, d.timestamp, d.value, d.param_id FROM parameters AS p LEFT JOIN data AS d ON p.param_id = d.param_id Where timestamp LIKE '%$filtervalue%' LIMIT 10";
                                $response = sql($sql);
                                if($response != null){
                                    foreach ($response as $key => $value){
                                        foreach ($value as $subkey => $subvalue){
                                            
                                                ?>
                                                <tr>
                                                    <?
                                                    if($subkey == "timestamp"){
                                                        ?><td><?= $subvalue . " "; ?></td><?php
                                                    }
                                                    if($subkey == "name"){
                                                        ?><td><?= $subvalue . " "; ?></td><?php
                                                    }
                                                    
                                                    ?>
                                                </tr>
                                                <?php 
                                        }
                                       
                                    }
                                }else
                                {
                                    ?>
                                        <tr>
                                                
                                            <td colspan="4">No Records Found</td>
                                        </tr>
                                    <?php

                                } 
                                
                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" ></script>
    
  </body>
</html>