<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    protected $table = 'supplies';
    public $timestamps = false;
    protected $primaryKey = 'supply_id';

    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id', 'item_id');
    }
}