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

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model {

    protected $table = 'order_product';

    protected $fillable = ['order_id', 'product_id'];
    
}
