<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'items';
    protected $primaryKey = 'item_id';


}
