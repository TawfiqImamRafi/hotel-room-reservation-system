<?php 
    include 'conn.php';
    $category_id = $_POST['category_id'];
    $type_id = $_POST['type_id'];

    if ($category_id && $type_id) {
        $query = "SELECT tb_rooms.*,
        tb_categories.cat_name,
        tb_room_types.room_type_name 
        FROM tb_rooms 
        LEFT JOIN tb_categories ON tb_categories.cat_id=tb_rooms.cat_id 
        LEFT JOIN tb_room_types ON tb_room_types.room_type_id=tb_rooms.room_type_id
        WHERE tb_rooms.cat_id='$category_id' AND tb_rooms.room_type_id='$type_id'";
    } else if ($category_id) {
        $query = "SELECT tb_rooms.*,
        tb_categories.cat_name,
        tb_room_types.room_type_name 
        FROM tb_rooms 
        LEFT JOIN tb_categories ON tb_categories.cat_id=tb_rooms.cat_id 
        LEFT JOIN tb_room_types ON tb_room_types.room_type_id=tb_rooms.room_type_id
        WHERE tb_rooms.cat_id='$category_id'";
    }else if ($type_id) {
        $query = "SELECT tb_rooms.*,
        tb_categories.cat_name,
        tb_room_types.room_type_name 
        FROM tb_rooms 
        LEFT JOIN tb_categories ON tb_categories.cat_id=tb_rooms.cat_id 
        LEFT JOIN tb_room_types ON tb_room_types.room_type_id=tb_rooms.room_type_id
        WHERE tb_rooms.room_type_id='$type_id'";
    } else {
        $query = "SELECT tb_rooms.*,
        tb_categories.cat_name,
        tb_room_types.room_type_name 
        FROM tb_rooms 
        LEFT JOIN tb_categories ON tb_categories.cat_id=tb_rooms.cat_id 
        LEFT JOIN tb_room_types ON tb_room_types.room_type_id=tb_rooms.room_type_id";
    }

    
    $run = $conn->query($query);

    
    $output = '';
    
    if ($run->num_rows > 0) {
        // $i = 1;
        while($room = $run->fetch_assoc()) {
            $output .= "<tr>";
            $output .= "<td><input type='checkbox' name='rooms[]' value='".$room['room_id']."' id='room_".$room['room_id']."'></td>";            
            $output .= "<td><label for='room_".$room['room_id']."'>".$room['room_name']."</label></td>";
            $output .= "<td>".$room['cat_name'].", ".$room['room_type_name']."</td>";
            $output .= "<td class='room_rent_".$room['room_id']."'>".$room['price']."</td>";
            $output .= "</tr>";

            // $i++;
        }
        echo $output;
    } else {
        echo '<tr><td colspan="4">No room found</td></tr>';
    }

    