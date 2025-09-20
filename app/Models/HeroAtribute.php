<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroAtribute extends Model
{
    protected $table      = 'superhero.hero_attribute'; 
    protected $primaryKey = null; 
    protected $useAutoIncrement = false;

    protected $allowedFields = [
        'hero_id',
        'attribute_id',
        'attribute_value'
    ];

  
}
