<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    // Разрешённые для массового заполнения поля
    protected $fillable = [
        'text',
        'status',
        // другие поля, если есть
    ];

    // Для поля status, если оно enum, можно добавить scope, mutator и т.д.
}
