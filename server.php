<?php

// $todosList = [
//     [
//     "name" => "pasta",
//     "done" => false,
//     ], 
//     [
//     "name" => "pane",
//     "done" => false,
//     ], 
//     [
//     "name" => "acqua",
//     "done" => false,
//     ], 
//     [
//     "name" => "frutta",
//     "done" => false,
//     ], 
//     [
//     "name" => "biscotti",
//     "done" => false,
//     ]
// ];


if(isset($_POST['newTodo'])) {
    //prende il contenuto del file json
    $jsonTodos = file_get_contents('todos.json');
    //modifica il file json in array php
    $todos = json_decode($jsonTodos);
    //pusha il nuovo input nell'array php
    $todos[] = $_POST['newTodo'];
    //converte l'array php in file json
    $newJsonTodos = json_encode($todos);
    // var_dump($todos);
    //salva il nuovo file con la modifica
    file_put_contents('todos.json', $newJsonTodos);

    // echo json_encode($newJsonTodos);

} else {

    $jsonTodos = file_get_contents('todos.json');
    
    $todos = json_decode($jsonTodos);
    
    // array_splice($todos, 2, 2);
    
    // header('Content-type: application/json');
    
    // l'echo dell'encode SERVE SEMPRE
    echo json_encode($todos);
}

