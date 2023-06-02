<?php

    //connect to the database
    $mysqli = new mysqli("127.0.0.1", "root", "", "projetweb");

    //get all unassigned orders
    $res = $mysqli->query("SELECT * FROM colis WHERE idLivreur = 0");

    //assign random X and Y coordinates to the orders and update the database
    $coords = array();

    while($row = $res->fetch_assoc()){
        $coords[$row["id"]] = array("x" => rand(0, 100), "y" => rand(0, 100));
        $mysqli->query("UPDATE colis SET x = ".$coords[$row["id"]]["x"].", y = ".$coords[$row["id"]]["y"]." WHERE id = '".$row["id"]."'");
    }

    //get the number of livreurs
    $res = $mysqli->query("SELECT * FROM livreur");
    $nblivreur = $res->num_rows;
    
    //cancel if there are no livreurs or no orders
    if($nblivreur != 0 & count($coords) != 0){
    
        //apply k'means to the orders
        $clusters = array();
        $centroids = array();

        //initialize the centroids
        for($i = 0; $i < $nblivreur; $i++){
            $centroids[$i] = array("x" => rand(0, 100), "y" => rand(0, 100));
        }

        //repeat until the centroids don't change
        while(true){

            //initialize the clusters
            for($i = 0; $i < $nblivreur; $i++){
                $clusters[$i] = array();   
            }

            //assign each order to the closest centroid
            $res = $mysqli->query("SELECT * FROM colis WHERE idLivreur = 0");
            while($row = $res->fetch_assoc()){
                $min = 100000 * 100000; //set the minimum distance to a very high value
                $cluster = 0;

                //find the closest centroid 
                for($i = 0; $i < $nblivreur; $i++){
                    $distance = ($coords[$row["id"]]["x"] - $centroids[$i]["x"]) * ($coords[$row["id"]]["x"] - $centroids[$i]["x"]) + ($coords[$row["id"]]["y"] - $centroids[$i]["y"]) * ($coords[$row["id"]]["y"] - $centroids[$i]["y"]);
                    if($distance < $min){
                        $min = $distance;
                        $cluster = $i;
                    }
                }

                //add the order to the cluster
                array_push($clusters[$cluster], $row);

            }

            $newCentroids = array();

            //initialize the new centroids
            for($i = 0; $i < $nblivreur; $i++){
                $newCentroids[$i] = array("x" => 0, "y" => 0);
            }

            //compute the new centroids as the average of the coordinates of the orders in the cluster 
            for($i = 0; $i < $nblivreur; $i++){
                for($j = 0; $j < count($clusters[$i]); $j++){
                    $newCentroids[$i]["x"] += $coords[$clusters[$i][$j]["id"]]["x"];
                    $newCentroids[$i]["y"] += $coords[$clusters[$i][$j]["id"]]["y"];
                }
                $newCentroids[$i]["x"] /= count($clusters[$i]);
                $newCentroids[$i]["y"] /= count($clusters[$i]);
            }

            //check if the centroids have changed
            $changed = false;
            for($i = 0; $i < $nblivreur; $i++){
                if($newCentroids[$i]["x"] != $centroids[$i]["x"] || $newCentroids[$i]["y"] != $centroids[$i]["y"]){
                    $changed = true;
                    break;
                }
            }

            //if they haven't changed, stop the loop
            if(!$changed){
                break;
            }

            //else, update the centroids
            $centroids = $newCentroids;

        }

        //print the order assigned to each livreur annd the coordinates of the centroids annd the total distance to travel for each livreur

        for($i = 0; $i < $nblivreur; $i++){
            $totalDistance = 0;
            echo "livreur ".$i.": ";
            for($j = 0; $j < count($clusters[$i]); $j++){
                echo $clusters[$i][$j]["id"]." ";
                $totalDistance += sqrt(($coords[$clusters[$i][$j]["id"]]["x"] - $centroids[$i]["x"]) * ($coords[$clusters[$i][$j]["id"]]["x"] - $centroids[$i]["x"]) + ($coords[$clusters[$i][$j]["id"]]["y"] - $centroids[$i]["y"]) * ($coords[$clusters[$i][$j]["id"]]["y"] - $centroids[$i]["y"]));
            }
            echo "total distance : ".$totalDistance;
            echo "<br>";
        }

        //assgine the orders to the livreurs in the database
        for($i = 0; $i < $nblivreur; $i++){
            for($j = 0; $j < count($clusters[$i]); $j++){
                echo $clusters[$i][$j]["id"];
                $mysqli->query("UPDATE colis SET idLivreur = ".($i+1)." WHERE id = '".$clusters[$i][$j]["id"]."'");
            }
        }

    }

    //apply djikstra to the orders assigned to each livreur and print the shortest path for each livreur

    //for reach livreur
    for($i = 0; $i < $nblivreur; $i++){

        //get the orders assigned to the livreur
        $res = $mysqli->query("SELECT * FROM colis WHERE idLivreur = ".($i+1)."");
        $orders = array();
        while($row = $res->fetch_assoc()){
            array_push($orders, $row);
        }

        //get the number of orders
        $n = count($orders);

        //initialize the distance matrix
        $dist = array();
        for($j = 0; $j < $n; $j++){
            $dist[$j] = array();
            for($k = 0; $k < $n; $k++){
                $dist[$j][$k] = 0;
            }
        }

        //compute the distance between each pair of orders
        //if the distance if greater than the average distance between the orders, they are considered to be too far apart and the distance is set to 0

        //compute average distance and compute the distacne between each pair of orders
        for($j = 0; $j < $n; $j++){
            for($k = 0; $k < $n; $k++){
                if($j == $k){
                    continue;
                }
                $dist[$j][$k] = sqrt(($orders[$j]["x"] - $orders[$k]["x"]) * ($orders[$j]["x"] - $orders[$k]["x"]) + ($orders[$j]["y"] - $orders[$k]["y"]) * ($orders[$j]["y"] - $orders[$k]["y"]));
            }
        }

        //initialize path and visited arrays
        $path = array();
        $visited = array();
        for($j = 0; $j < $n; $j++){
            $visited[$j] = false;
        }

        //start from the first order 
        $current = 0;

        //repeat until all the orders have been visited
        while(true){

            //mark the current order as visited
            $visited[$current] = true;

            //add the current order to the path
            array_push($path, $current);

            //if all the orders have been visited, stop the loop
            $allVisited = true;
            for($j = 0; $j < $n; $j++){
                if(!$visited[$j]){
                    $allVisited = false;
                    break;
                }
            }
            if($allVisited){
                break;
            }

            //find the next order to visit
            $min = 1000000000;
            $next = 0;
            for($j = 0; $j < $n; $j++){
                if($visited[$j]){
                    continue;
                }
                if($dist[$current][$j] < $min){
                    $min = $dist[$current][$j];
                    $next = $j;
                }
            }
            //set the next order to visit
            $current = $next;

        }

        echo "livreur ".($i+1)." : ";

        //print the path and update the database
        for($j = 0; $j < $n; $j++){
            echo $path[$j].">";
            $mysqli->query("UPDATE colis SET ordre = ".$j." WHERE id = '".$orders[$path[$j]]["id"]."'");
        }
        echo "<br>";
    }

?>