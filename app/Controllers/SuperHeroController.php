<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SuperHero;
require_once APPPATH . 'Libraries/dompdf/dompdf/autoload.inc.php';

use Dompdf\Dompdf;


class SuperHeroController extends BaseController
{

    public function index()
    {
        $model = new SuperHero();
        $termino = $this->request->getGet('q');

        if ($termino) {
            $heroes = $this->buscar($termino, $model);
        } else {
            $heroes = $model->findAll();
        }

        $data = [
            'heroes' => $heroes,
            'header' => view('Layouts/header'), 
        ];

        return view('Buscador/buscador1', $data);
    }


    public function exportPdf()
    {
        $model = new SuperHero();
        $termino = $this->request->getGet('q');

        if ($termino) {
            $heroes = $this->buscar($termino, $model);
        } else {
            $heroes = $model->findAll();
        }

        $html = view('Buscador/pdf_template', ['heroes' => $heroes]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream("superheroes.pdf", ["Attachment" => false]); 
        // Attachment false → abre en navegador
    }

    //  Método privado para reutilizar la búsqueda
    private function buscar($termino, $model)
    {
        // si es número exacto → buscar por ID
        if (is_numeric($termino)) {
            return $model->asArray()
                ->where('id', (int)$termino)
                ->findAll();
        }

        // si es texto → buscar por nombre o full_name
        return $model->asArray()
            ->groupStart() //esto agrupa la informacion
                ->like('superhero_name', $termino) //trae el nombre 
                ->orLike('full_name', $termino) //trae el subnombre
            ->groupEnd()
            ->findAll();
    }
}
