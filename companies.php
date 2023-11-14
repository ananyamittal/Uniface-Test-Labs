<?php
include 'db_connection.php';
          $category_id=$_REQUEST['category_id'];
          $print_arr=[];
                    $fetch_query = "SELECT * FROM company where category=$category_id";
                    $fetch_result = mysqli_query($conn, $fetch_query);
                   
                    while($row=mysqli_fetch_array($fetch_result)){
                        $print_arr[]=$row;
                    };
                    echo json_encode($print_arr);
                    exit;
            ?> 