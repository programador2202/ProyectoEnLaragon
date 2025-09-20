<?php


namespace App\Models;
use CodeIgniter\Model;


class SuperHero extends Model{
    protected $table = 'superhero.superhero';
    protected $primaryKey ="id";
     protected $allowedFields = [
        'superhero_name',
        'full_name',
        'gender_id',
        'eye_colour_id',
        'hair_colour_id',
        'skin_colour_id',
        'race_id',
        'publisher_id',
        'alignment_id',
        'height_cm',
        'weight_kg'
    ];
}


//CREATE TABLE superhero.superhero (
//id INT NOT NULL AUTO_INCREMENT,
//superhero_name VARCHAR(200) DEFAULT NULL,
//full_name VARCHAR(200) DEFAULT NULL,
//gender_id INT DEFAULT NULL,
//eye_colour_id INT DEFAULT NULL,
//hair_colour_id INT DEFAULT NULL,
//skin_colour_id INT DEFAULT NULL,
//race_id INT DEFAULT NULL,
//publisher_id INT DEFAULT NULL,
//alignment_id INT DEFAULT NULL,
//height_cm INT DEFAULT NULL,
//weight_kg INT DEFAULT NULL,
//CONSTRAINT pk_superhero PRIMARY KEY (id),
//CONSTRAINT fk_sup_align FOREIGN KEY (alignment_id) REFERENCES superhero.alignment (id),
// CONSTRAINT fk_sup_eyecol FOREIGN KEY (eye_colour_id) REFERENCES superhero.colour (id),
// CONSTRAINT fk_sup_gen FOREIGN KEY (gender_id) REFERENCES superhero.gender (id),
// CONSTRAINT fk_sup_haircol FOREIGN KEY (hair_colour_id) REFERENCES superhero.colour (id),
// CONSTRAINT fk_sup_pub FOREIGN KEY (publisher_id) REFERENCES superhero.publisher (id),
// CONSTRAINT fk_sup_race FOREIGN KEY (race_id) REFERENCES superhero.race (id),
// CONSTRAINT fk_sup_skincol FOREIGN KEY (skin_colour_id) REFERENCES superhero.colour (id)
//)

