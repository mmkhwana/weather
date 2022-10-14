<?php
function sql($sql){
    if(!class_exists('weather_data')){
        class weather_data extends SQLite3{
            function __construct($path)
            {
                $this->open($path);
            }
        }
    }

    $db = new weather_data("./database/weather_data.db");
    if(!$db){
        echo 'ERROR: Database does not exist';
        exit();
    }
    $response = $db->query($sql);
    $data = [];
    while($row = $response->fetchArray(SQLITE3_ASSOC))
        array_push($data, $row);
    return $data;

}
?>