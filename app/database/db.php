<?php

require('connect.php');


function executeQuery($sql,$data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('i',count($values));
    $stmt -> bind_param($types,...$values);
    $stmt->execute();
    return $stmt;   
    
}
function selectAll($table,$conditions=[]) 
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if(empty($conditions))
    {
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 
        return $result;

    }
    else
    {
        $i = 0;
        foreach($conditions as $key => $value)
        {
            if($i === 0)
            {
                $sql .= " WHERE $key = ?";
            }
            else
            {
                $sql .= " AND $key = ?";
            }
            $i++;
        }
        $stmt = executeQuery($sql,$conditions);
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); 
        return $result;
    }
    
}
function selectOne($table,$conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    $i = 0;
    foreach($conditions as $key => $value)
    {
        if($i === 0)
        {
            $sql .= " WHERE $key = ?";
        }
        else
        {
            $sql .= " AND $key = ?";
        }
        $i++;
    }
    $sql .= " LIMIT 1";
    $stmt = executeQuery($sql,$conditions);
    $result = $stmt->get_result()->fetch_assoc(); 
    return $result;
}


function printValue($p)
{
    echo "<pre>",print_r($p,true),"</pre>";
    die();
}




