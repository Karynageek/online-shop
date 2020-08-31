<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Deposit
 *
 * @author Karina
 * 
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent {

    protected $fillable = ['quantity'];
    protected $table = 'products';

    public function categories() {
        return $this->belongsToMany('App\Category');
    }

}
