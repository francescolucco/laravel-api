<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('posts', 'Api\PostController@index');



// // 'prova' è il nome della rotta
// // la function(){
// //  ---
// // }
// // deve contenere dentro il return con il metodo response()->json(array)
// // l'array verrà trasformato in un JSON vero e proprio da consegnare all'utente (chi ha chiamato la nostra API)

// Route::get('prova', function(){

//     return response()->json(
//         [
//             "name"=>"Ugo",
//             "lastname"=>"De Ughi",
//         ]
//     );
// });

// // Se inizializzo una variable posso passrla direttamente

// Route::get('prova', function(){

//     $data =         [
//         "name"=>"Ugo",
//         "lastname"=>"De Ughi",
//     ];

//     return response()->json($data);
// });

// // Se mi serve più strutturato, con più dati, posso utilizzare compact

// Route::get('prova', function(){

//     $status =  'OK'   ;
         
//     $data =  [
//         "name"=>"Ugo",
//         "lastname"=>"De Ughi",
//         "hobbies"=>[
//             'golf',
//             'curling',
//             'bocce',
//         ],
//     ];

//     return response()->json(compact('status', 'data'));
// });