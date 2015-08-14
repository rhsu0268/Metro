<!-- index.html -->
<!-- This is the file that outputs the stations in JSON format -->

<?php 

    // require config file 
    require(__DIR__ . "/includes/config.php");
    
    class Station
    {
        public $station;
        public $latitude;
        public $longitude;
    }
    
    //header("Content-type: application/json");
    
    // select all the rows with the color RED
    $query = query("SELECT route FROM routes WHERE route = ?", $_GET["route"]); 
    
    $color = $query[0]['route'];
    
    $colorLower = strtolower($color);
    
    //print $colorLower;
    
    // select all the rows with the color RED
    $stations = query("SELECT * FROM $colorLower"); 
    
    // store the row
    //print_r($stations);
    
    //$row = $stations[0];
   
    //print($row['station']);
    
    
    //$results = count($rows);
    
    header("Content-type: application/json");
    print(json_encode($stations, JSON_PRETTY_PRINT));
        

    /*
    foreach ($stations as $station)
    {
        //print json_encode($station['station'] . ", " . $station['latitude'] . ", " . $station['longitude'] . "<br>");
        
        $data = new Station();
        
        $data->station = $station['station'];
        $data->latitude = $station['latitude'];
        $data->longitude = $station['longitude'];
        
        print json_encode($data);
    }
    */
  
    /*
    $singledata = $stations[0];
    $data = new Station();
  
    $data->station = $singledata['station'];
    $data->latitude = $singledata['latitude'];
    $data->longitude = $singledata['longitude'];
    
    print(json_encode($data));
    */
    
?>
