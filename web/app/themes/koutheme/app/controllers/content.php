<?php

namespace App;

use Sober\Controller\Controller;

class Content extends Controller
{
    public function conciertos()
    {
            return  array (
                get_field('fecha'),
                get_field('info')
            );
    }
    public function discos()
    {
            return (object) array(
                'embed' => get_field('embed'),
                'descripcion' => get_field('descripcion')
            );

    }
}
