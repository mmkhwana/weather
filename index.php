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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    

    <title>Weather App</title>
  </head>
  <nav class="navbar bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="./assests/cloud-sun.svg" alt="cloud-sun" width="90" height="74">Weather App
    </a>
  </div>
</nav>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <h1>What's The Weather Like In Year?</h1>
                    <i class="bi bi-sun"></i>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="" method="GET">
                                <div class="input-group mb-3"><h5>Select Year</h5></div>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                    <select class="form-select" id="inputGroupSelect01" name="SYear">
                                        <option selected>Choose...</option>
                                        <option  <?php if(isset($SYear) && $SYear == "2011"){echo $_GET['SYear'];}?> value="2011">2011</option>
                                        <option  <?php if(isset($SYear) && $SYear == "2012"){echo $_GET['SYear'];}?> value="2012">2012</option>
                                        <option  <?php if(isset($SYear) && $SYear == "2013"){echo $_GET['SYear'];}?> value="2013">2013</option>
                                        <option  <?php if(isset($SYear) && $SYear == "2014"){echo $_GET['SYear'];}?> value="2014">2014</option>
                                        <option  <?php if(isset($SYear) && $SYear == "2015"){echo $_GET['SYear'];}?> value="2015">2015</option>
                                        <option  <?php if(isset($SYear) && $SYear == "2016"){echo $_GET['SYear'];}?> value="2016">2016</option>
                                        <option  <?php if(isset($SYear) && $SYear == "2017"){echo $_GET['SYear'];}?> value="2017">2017</option>
                                        <option  <?php if(isset($SYear) && $SYear == "2018"){echo $_GET['SYear'];}?> value="2018">2018</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <h5>Search : </h5>
                                    <span>Temparature, Wind Speed, Wind direction, precipitation, humidity, visibility, pressure, cloud cover, dew point, wind gust</span>
                                </div>
                                
                                <div class="input-group mb-3">
                                    <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" class="form-control" placeholder="Search weather">
                                    <button type="submit" class="btn btn-success">Search</button></br>
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
                            <tr class="table-warning">
                                <th>Date</th>
                                <th>Weater type</th>
                                <th>Temperature</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(isset($_GET['search']) && isset($_GET['SYear'])){

                                $filtervalue = $_GET['search'];
                                $SelecteYear = $_GET['SYear'];
                                // $sql = "SELECT *  FROM parameters";
                                $sql = "SELECT p.name, p.description,p.param_id, d.timestamp, d.value, d.param_id FROM parameters AS p LEFT JOIN data AS d ON p.param_id = d.param_id Where name LIKE '%$filtervalue%' AND timestamp LIKE '%$SelecteYear%' LIMIT 10";
                                $response = sql($sql);
                                if($response != null){
                                    foreach ($response as $key => $value){
                                        foreach ($value as $subkey => $subvalue){
                                            
                                                ?>
                                                <tr class="table-info">
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
        <!-- 
            images loas 
        <img src="..." class="rounded float-start" alt="...">
        <img src="..." class="rounded float-end" alt="...">

        -- Color columns
        <div class="col">
            One of three columns

        
            --- Radio button --
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
        <label class="form-check-label" for="gridRadios2">
          Second radio
        </label>
      </div>
    </div>

    ---icons
    <i class="bi bi-cloud-fog2"></i>
    <i class="bi bi-cloud-rain-heavy"></i>
    <i class="bi bi-cloud-sun"></i>
    <i class="bi bi-cloud-snow"></i>
    <i class="bi bi-sun"></i>


-->

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  </body>
</html>