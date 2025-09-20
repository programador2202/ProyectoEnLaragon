<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        //Solicitar las secciones: HEADER+FOOTER
        $datos['header'] = view('Layouts/header');
        $datos['footer'] = view('Layouts/footer');

        //return view('welcome_message'); //welcome_message HTML predeterminado
        return view('welcome', $datos); //HTML personalizado
    }
}
