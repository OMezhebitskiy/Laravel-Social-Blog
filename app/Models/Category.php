<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // Модель для категории
    // имя таблицы (необязательно, т.к. наследуеться из названия класса)
    protected $table = 'categories';

    public $timestamps = false;
    protected $guarded = ['id'];
    
}
