<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroPower extends Model
{
    protected $table      = 'superhero.hero_power'; 
    protected $primaryKey = null; 
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'hero_id',
        'power_id'
    ];

  
}
