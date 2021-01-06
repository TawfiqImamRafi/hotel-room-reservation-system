<?php 


    try {

        $conn->begin_transaction();



        //store guestion
        foreach($_POST['adults_name'] as $key => $adult) {
            $query = "INSERT INTO "
        }

        //boocking infformation


        //


        ///

        $conn->commit();

    }catch(\Exception $e) {
        $conn->rollback();
        $errors =  "Something went wrong". $e->getMessage();
    }
