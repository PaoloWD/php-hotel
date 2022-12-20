<?php
    $filteredHotels = [];

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];
    $hasFilters = isset($_GET["parking"]) || isset($_GET["vote"]);

    if ($hasFilters){
        foreach($hotels as $hotel){
               $mustPush = true;
               if (isset($_GET["parking"]) && !str_contains(strtolower($hotel["parking"]), strtolower($_GET["parking"]))) {
                $mustPush = false;
              }
              if (isset($_GET["vote"]) && $hotel["vote"] < $_GET["vote"]) {
                $mustPush = false;
              }
              if ($mustPush) {
                $filteredHotels[] = $hotel;
              }
         }
       } else{

                $filteredHotels = $hotels;
            
       }

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP HOTEL</title>
 </head>
 <body>
    <div class="d-flex my-5">
        <div>
            <form action="" method="GET">
                <input type="number" name="parking" placeholder="Parcheggio si o no"><br>
                <input type="number" name="vote">
                <button class="btn btn-primary">Filtra</button>
            </form>

        </div>
    </div>
    <table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Parking</th>
            <th scope="col">Vote</th>
            <th scope="col">Distance to center</th>
        </tr>
    </thead>
    <tbody>
       <?php
        foreach ($filteredHotels as $hotel) {
            echo "<tr>";
            echo "<td>" . $hotel["name"] . "</td>";
            echo "<td>" . $hotel["description"] . "</td>";
            echo "<td>" . $hotel["parking"] . "</td>";
            echo "<td>" . $hotel["vote"] . "</td>";
            echo "<td>" . $hotel["distance_to_center"] . "</td>";
            echo "</tr>";
            }
        
        ?>
    </tbody>
    </table>  
 </body>
 </html>

