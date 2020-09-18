<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get("/catalogo_autores", function () {

    $autores = [
        "1" => [
            "nombre" => "Saúl Axel Palacios Acosta",
            "matricula" => "A01208320",
            "experiencia" => "HTML, CSS, PHP, Bootstrap, Angular Js"
        ],
        "2" => [
            "nombre" => "Alberto Alonso Vázquez Plata",
            "matricula" => "A01207490",
            "experiencia" => "HTML, CSS, PHP, Bootstrap, Angular Js"
        ]
    ];
    return $autores;
});
