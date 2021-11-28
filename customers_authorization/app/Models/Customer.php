<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
   // protected $table = 'customers';

   use Sortable;


   protected $fillable = ['first_name', 'last_name', 'age', 'address', 'city'];


   public $sortable = ['first_name', 'last_name', 'age', 'address', 'city'];

   public function directSort($query, $direction) {
      return $query->orderBy('first_name', 'asc')
                  ->orderBy('last_name', 'asc')
                  ->orderBy('age', 'desc')
                  ->select('customers.*');
   }

 
}
