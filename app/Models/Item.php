<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'status',
        'contained_in',
        'acquired_on',
        'user_id'
    ];

    public function container() {
        return $this->belongsTo('App\Models\Item', 'contained_in', 'id');
    }
}
