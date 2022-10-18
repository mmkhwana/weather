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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Weather App</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <nav class="navbar bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="./assests/sun-weather-svgrepo-com.svg" alt="cloud-sun" width="90" height="74">Weather App
    </a>
  </div>
</nav>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <h4 style="text-align:center;color:red;">
                    <img src="./assests/sun-weather-svgrepo-com.svg" alt="cloud-sun" width="90" height="74">
                    What's The Weather Like In Year?<img src="./assests/hot.svg" alt="cloud-sun" width="90" height="74"></h4>
                    
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
                                    <span> Temperature values</span>
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
                                <th>ID</th>
                                <th>Date</th>
                                <th>Night</th>
                                <th>Morning</th>
                                <th>Afternoon</th>
                                <th>Evening</th>                                
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
                                $sql = "SELECT DISTINCT p.param_id, d.timestamp, p.name, d.value, p.description, d.param_id FROM parameters AS p LEFT JOIN data AS d ON p.param_id = d.param_id Where value LIKE '%$filtervalue%' AND timestamp LIKE '%$SelecteYear%' LIMIT 25";
                                $response = sql($sql);
                                if($response != null){
                                    foreach ($response as $key => $value){
                                        echo "<tr class='table-info'>";
                                        foreach ($value as $subkey => $subvalue){
                                            if($subkey == 'param_id'){
                                                echo "<td> $subvalue </td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // date day
                                                echo "<td> $date </td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // time night
                                                
                                                // $a = new DateTime('00:00');
                                                // $b = new DateTime($time);
                                                // $interval1 = $a->diff($b);
                                        
                                                // var_dump("interval 1: ", $interval1->format("%H:%I")); 
                                                echo "<td> <img src='./assests/hazy-weather-svgrepo-com.svg' alt='cloud-sun' width='50' height='44'></td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // time morning
                                                echo "<td> <img src='./assests/sun-weather-svgrepo-com.svg' alt='cloud-sun' width='50' height='44'></td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // time afternoon
                                                echo "<td> <img src='./assests/sunny.svg' alt='cloud-sun' width='70' height='64'></td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // time evening
                                                echo "<td> <img src='./assests/Coperto.svg' alt='cloud-sun' width='50' height='44'></td>";
                                            }
                                            if($subkey == 'name'){
                                                echo "<td> $subvalue </td>";
                                            }
                                            if($subkey == 'description'){
                                                echo "<td> $subvalue </td>";
                                            }
                                            // temparature values 
                                            if($subkey == 'value'){
                                                if($subvalue < 10){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/cloud-storm-weather-rain-svgrepo-com.svg' alt='cloud-sun' width='60' height='54'></td>";
                                                }
                                                else if($subvalue < 30){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/rain-weather-svgrepo-com.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }
                                                else if($subvalue < 130){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/wind.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }
                                                else if($subvalue < 330){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/snowflake-weather-svgrepo-com.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }else if($subvalue < 630){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/thermometer-weather-svgrepo-com.svg.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }
                                                else if($subvalue < 830){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/warm.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }else if($subvalue < 1038.0){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/hot.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }
                                                
                                            }         
                                        }
                                        echo "</tr>";
                                       
                                    }
                                }else
                                {
                
                                    echo "<tr>";
                                       echo "<td colspan='4'>No Records Found</td>" ;
                                    echo "</tr>";
    
                                }
                            }
                            else
                            {
                                $timestamp = "2012-10-19 18:19:56";
                                $splitTimeStamp = explode(" ",$timestamp);
                                $date = $splitTimeStamp[0];
                                $time = $splitTimeStamp[1];
                                $sql = "SELECT DISTINCT p.param_id, d.timestamp, p.name, d.value, p.description, d.param_id FROM parameters AS p LEFT JOIN data AS d ON p.param_id = d.param_id LIMIT 100";
                                $response = sql($sql);
                                if($response != null){
                                    foreach ($response as $key => $value){
                                        echo "<tr class='table-info'>";
                                        foreach ($value as $subkey => $subvalue){
                                            if($subkey == 'param_id'){
                                                echo "<td> $subvalue </td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // date day
                                                echo "<td> $date </td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // time night
                                                
                                                // $a = new DateTime('00:00');
                                                // $b = new DateTime($time);
                                                // $interval1 = $a->diff($b);
                                        
                                                // var_dump("interval 1: ", $interval1->format("%H:%I")); 
                                                echo "<td> <img src='./assests/hazy-weather-svgrepo-com.svg' alt='cloud-sun' width='50' height='44'></td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // time morning
                                                echo "<td> <img src='./assests/sun-weather-svgrepo-com.svg' alt='cloud-sun' width='50' height='44'></td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // time afternoon
                                                echo "<td> <img src='./assests/sunny.svg' alt='cloud-sun' width='70' height='64'></td>";
                                            }
                                            if($subkey == 'timestamp'){
                                                $timestamp = $subvalue;
                                                $splitTimeStamp = explode(" ",$timestamp);
                                                $date = $splitTimeStamp[0];
                                                $time = $splitTimeStamp[1];
                                                // time evening
                                                echo "<td> <img src='./assests/Coperto.svg' alt='cloud-sun' width='50' height='44'></td>";
                                            }
                                            if($subkey == 'name'){
                                                echo "<td> $subvalue </td>";
                                            }
                                            if($subkey == 'description'){
                                                echo "<td> $subvalue </td>";
                                            }
                                            // temparature values 
                                            if($subkey == 'value'){
                                                if($subvalue < 10){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/cloud-storm-weather-rain-svgrepo-com.svg' alt='cloud-sun' width='60' height='54'></td>";
                                                }
                                                else if($subvalue < 30){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/rain-weather-svgrepo-com.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }
                                                else if($subvalue < 130){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/wind.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }
                                                else if($subvalue < 330){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/snowflake-weather-svgrepo-com.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }else if($subvalue < 630){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/thermometer-weather-svgrepo-com.svg.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }
                                                else if($subvalue < 830){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/warm.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }else if($subvalue < 1038.0){
                                                    echo "<td> <h5 style='color:red'>$subvalue</h5>  <img src='./assests/hot.svg' alt='cloud-sun' width='40' height='34'></td>";
                                                }
                                                
                                            }        
                                        }
                                        echo "</tr>";
                                       
                                    }
                                }
                           }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  </body>
</html>