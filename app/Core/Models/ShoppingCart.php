<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $connection = 'mysql';
    protected $table = 'shopping_carts';
}
