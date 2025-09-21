<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\HeroPower;
require_once APPPATH . 'Libraries/dompdf/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class PowerController extends BaseController
{
    public function index()
    {
        $model = new HeroPower();
        $termino = $this->request->getGet('q');

        if ($termino) {
            $heroes = $this->buscar($termino, $model);
        } else {
            $heroes = $model->select('hero_power.*, heroes.superhero_name as hero_name, powers.power_name as power_name')
                ->join('superhero.superhero as heroes', 'heroes.id = hero_power.hero_id')
                ->join('superhero.superpower as powers', 'powers.id = hero_power.power_id')
                ->findAll();
        }

        $data = [
            'heroes' => $heroes,
            'header' => view('Layouts/header'),
        ];

        return view('Buscador3/buscador3', $data);
    }

    public function exportPdf()
    {
        $model = new HeroPower();
        $termino = $this->request->getGet('q');

        if ($termino) {
            $heroes = $this->buscar($termino, $model);
        } else {
            $heroes = $model->select('hero_power.*, heroes.superhero_name as hero_name, powers.power_name as power_name')
                ->join('superhero.superhero as heroes', 'heroes.id = hero_power.hero_id')
                ->join('superhero.superpower as powers', 'powers.id = hero_power.power_id')
                ->findAll();
        }

        $html = view('Buscador3/pdf_template', ['heroes' => $heroes]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream("HeroPower.pdf", ["Attachment" => false]);
    }

    private function buscar($termino, $model)
    {
        if (is_numeric($termino)) {
            return $model->select('hero_power.*, heroes.superhero_name as hero_name, powers.power_name as power_name')
                ->join('superhero.superhero as heroes', 'heroes.id = hero_power.hero_id')
                ->join('superhero.superpower as powers', 'powers.id = hero_power.power_id')
                ->groupStart()
                    ->where('hero_power.hero_id', (int)$termino)
                    ->orWhere('hero_power.power_id', (int)$termino)
                ->groupEnd()
                ->findAll();
        }

        return $model->select('hero_power.*, heroes.superhero_name as hero_name, powers.power_name as power_name')
            ->join('superhero.superhero as heroes', 'heroes.id = hero_power.hero_id')
            ->join('superhero.superpower as powers', 'powers.id = hero_power.power_id')
            ->groupStart()
                ->like('heroes.superhero_name', $termino)
                ->orLike('powers.power_name', $termino)
            ->groupEnd()
            ->findAll();
    }
}
