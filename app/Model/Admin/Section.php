<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function blogs(){
        return $this->hasmany('App\Model\FrontEnd\Blog');
    }
}
