<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class controller_home extends Controller
{
    function index()
    {
        $autores = [
            "1" => [
                "isbn" => "1",
                "nombre" => "Saúl Axel Palacios Acosta",
                "matricula" => "A01208320",
                "experiencia" => "HTML, CSS, PHP, Bootstrap, Angular Js"
            ],
            "2" => [
                "isbn" => "2",
                "nombre" => "Alberto Alonso Vázquez Plata",
                "matricula" => "A01207490",
                "experiencia" => "HTML, CSS, PHP, Bootstrap, Angular Js"
            ]
        ];
        return view('home', ["autores" => $autores]);
    }
}
