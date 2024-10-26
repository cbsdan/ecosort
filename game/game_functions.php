<?php
    function random_trash_item($number = 6, $difficulty = "easy") {
        $jsonData = file_get_contents('data.json');
        $data = json_decode($jsonData, true);

        if ($data) {
            $trashItems = $data['trashItems'];

            $easyItems = array_values(array_filter($trashItems, function($item) use ($difficulty) {
                return $item['difficulty'] === $difficulty;
            }));

            $randomEasyItems = [];
            if (count($easyItems) > $number) {
                $randomKeys = array_rand($easyItems, $number);
                foreach ((array) $randomKeys as $key) {
                    $randomEasyItems[] = $easyItems[$key];
                }
            } else {
                $randomEasyItems = $easyItems;
            }
            
            return $randomEasyItems;

        } else {
            echo "Error: Unable to read or decode the JSON file.";
            return [];
        }
    }

    function random_recyclable_items($number = 6) {
        return get_trash_items_by_type("recyclable", $number);
    }
    
    function random_biodegradable_items($number = 6) {
        return get_trash_items_by_type("biodegradable", $number);
    }
    
    function random_non_recyclable_items($number = 6) {
        return get_trash_items_by_type("non-recyclable", $number);
    }
    
    function get_trash_items_by_type($type, $number) {
        $jsonData = file_get_contents('data.json');
        $data = json_decode($jsonData, true);
    
        if ($data) {
            $trashItems = $data['trashItems'];
    
            $filteredItems = array_values(array_filter($trashItems, function($item) use ($type) {
                return $item['type'] === $type;
            }));
    
            $randomItems = [];
            if (count($filteredItems) > $number) {
                $randomKeys = array_rand($filteredItems, $number);
                foreach ((array) $randomKeys as $key) {
                    $randomItems[] = $filteredItems[$key];
                }
            } else {
                $randomItems = $filteredItems;
            }
    
            return $randomItems;
    
        } else {
            echo "Error: Unable to read or decode the JSON file.";
            return [];
        }
    }
    
    function generate_item_divs($items) {
        echo "<div class='item-container row'>";
        foreach ($items as $item) {
            echo "<div class='item col-4 d-flex align-items-center justify-content-center' style='flex-direction: column'>";
            echo "<img src='{$item['imgPath']}' alt='{$item['name']}' width='30'>";
            echo "<p class='text-center mb-0'>{$item['name']}</p>";
            echo "</div>";
        }
        echo "</div>";
    }

    function get_trash_cans (){
        $jsonData = file_get_contents('data.json');
        $data = json_decode($jsonData, true); 

        if ($data) {
            $trashCans = $data['trashCans'];         
            return $trashCans;
        } else {
            echo "Error: Unable to read or decode the JSON file.";
        }
    }

    function generate_trash_cans ($trashCans) {
        foreach ($trashCans as $trashCan) {
            echo '<div class="droppable ' . htmlspecialchars($trashCan["class"]) . ' col-' . count($trashCans) .'" draggable="true">' . 
                '<img src="' . htmlspecialchars($trashCan["imgPath"]) . '" class="img-fluid" alt="' . htmlspecialchars($trashCan["name"]) . '">' . 
                '</div>';
            }
        }
        
        function generate_trash_items ($trashItems) {
            foreach ($trashItems as $item) {
                echo '<div class="draggable ' . htmlspecialchars($item["type"]) . '" draggable="true">' . 
                '<img src="' . htmlspecialchars($item["imgPath"]) . '" class="item" alt=" ' . htmlspecialchars($item["name"]) . '" />' .
                '<img src="images/x-logo.png" class="hidden incorrect-logo" alt="Incorrect">' . 
                '<img src="images/check-logo.png" class="hidden check-logo" alt="Check">' . 
                '<span class="text-center w-100">' . htmlspecialchars($item["name"]) . '</span>' .
                '</div>';
        }
    }

    ?>