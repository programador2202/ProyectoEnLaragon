<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HeroAtribute; 
require_once APPPATH . 'Libraries/dompdf/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class HeroAtributeController extends BaseController
{
    public function index()
    {
        $model = new HeroAtribute();
        $termino = $this->request->getGet('q');

        $builder = $model->select('hero_attribute.hero_id, hero_attribute.attribute_id, hero_attribute.attribute_value, 
                                   s.superhero_name, s.full_name,
                                   a.attribute_name')
                         ->join('superhero.superhero s', 's.id = hero_attribute.hero_id')
                         ->join('attribute a', 'a.id = hero_attribute.attribute_id');

            if ($termino) {
            if (is_numeric($termino)) {
                $builder->groupStart()
                        ->where('hero_attribute.hero_id', $termino)
                        ->orWhere('hero_attribute.attribute_id', $termino)
                        ->orWhere('hero_attribute.attribute_value', $termino)
                        ->groupEnd();
            } else {
                $builder->groupStart()
                        ->like('s.superhero_name', $termino)
                        ->orLike('s.full_name', $termino)
                        ->orLike('a.attribute_name', $termino)
                        ->groupEnd();
            }
        }

        $atributos = $builder->findAll();

        $data = [
            'atributos' => $atributos,
            'header'    => view('Layouts/header'),
        ];

        return view('Buscador2/buscador2', $data);
    }

    public function exportPdf()
    {
        $model = new HeroAtribute();
        $termino = $this->request->getGet('q');

        $builder = $model->select('hero_attribute.hero_id, hero_attribute.attribute_id, hero_attribute.attribute_value, 
                                   s.superhero_name, s.full_name,
                                   a.attribute_name')
                         ->join('superhero.superhero s', 's.id = hero_attribute.hero_id')
                         ->join('attribute a', 'a.id = hero_attribute.attribute_id');

            if ($termino) {
            if (is_numeric($termino)) {
                $builder->groupStart()
                        ->where('hero_attribute.hero_id', $termino)
                        ->orWhere('hero_attribute.attribute_id', $termino)
                        ->orWhere('hero_attribute.attribute_value', $termino)
                        ->groupEnd();
            } else {
                $builder->groupStart()
                        ->like('s.superhero_name', $termino)
                        ->orLike('s.full_name', $termino)
                        ->orLike('a.attribute_name', $termino)
                        ->groupEnd();
            }
        }


        $atributos = $builder->findAll();

        $html = view('Buscador2/pdf_template', ['atributos' => $atributos]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream("hero_attributes.pdf", ["Attachment" => false]);
    }
}
