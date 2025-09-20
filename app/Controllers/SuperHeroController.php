<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuperHero;
use Dompdf\Dompdf;

class SuperHeroController extends BaseController
{
    public function index()
    {
        $model = new SuperHero();

        $termino = $this->request->getGet('q');

        if ($termino) {
            $data['heroes'] = $model->buscar($termino);
        } else {
            $data['heroes'] = $model->findAll();
        }

        $data['termino'] = $termino;
        $data['header'] = view('Layouts/header'); 

        return view('Buscador/buscador1', $data);
    }

     public function exportPdf()
    {
        $model = new SuperHero();
        $heroes = $model->findAll();

        // Vista que tendrá el contenido del PDF
        $html = view('Buscador/pdf_template', ['heroes' => $heroes]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Descargar PDF
        return $dompdf->stream("superheroes.pdf", ["Attachment" => true]);
    }
}
