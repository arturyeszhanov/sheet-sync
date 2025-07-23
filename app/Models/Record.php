<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{

    protected $fillable = [
        'text',
        'status',
    ];

    public function scopeAllowed($query)
    {
        return $query->where('status', 'allowed');
    }

    public function index()
    {
        $records = Record::paginate(50); // по 50 записей на страницу
        return view('records.index', compact('records'));
    }

}
