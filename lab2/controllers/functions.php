<?php

function return_response($data,$status_code){
    header("Content-Type: application/json");
    http_response_code($status_code);
    echo json_encode($data);

}

function get_items($id=""){
    $DB_handler = new MySQLHandler("products");
    try{
        $DB_handler->connect();
        $result;
        if(!empty($id)){
            $result=$DB_handler->get_record_by_id($id);
        }else{
            $result=$DB_handler->get_data();
        }
        return return_response($result,200);
    }catch(err){
        $err = ["error"=>err];
        return return_response($err,500);
    }

}

function save_item(){
    $fields=["name","price","units_in_stock"];
    $data = json_decode(file_get_contents('php://input'), true);

    foreach($fields as $field){
        if(!isset($data[$field]) || empty($data[$field])){
            $err=["error"=> "data insuffient"];
            return return_response($err,404);
        }
    }

    $db_handler=new MySQLHandler("products");
    $db_handler->save($data);
    return return_response($data,200);

}

function delete_item_by_id($id=""){
    $sql_handler;
    try{
        $sql_handler=new MySQLHandler("products");
        $result=$sql_handler->delete($id);
        return return_response($result,200);
    }catch(Exception  $err){
        $err=["error"=>_MYSQL_SERVER_ERROR_];
        return return_response($err,500);
    } 
}

function update_item($id){
    
    $data = json_decode(file_get_contents('php://input'), true);
    $sql_handler;
    try{
        $sql_handler=new MySQLHandler("products");
    if($sql_handler->update($data,$id)){
        return return_response($data,200);
    }else{
        $err=["error"=> _NO_RESOURSES_];
        return return_response($err,404);
    }
    }catch(Exception  $err){
        $err=["error"=> _MYSQL_SERVER_ERROR_];
        return return_response($err,500);
    }
}
