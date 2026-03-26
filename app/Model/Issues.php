<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'issues';
    protected $primaryKey = 'issue_id';

    public function staff()
    {
        return $this->belongsTo(Staffs::class, 'person_id', 'person_id');
    }



    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id', 'item_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}


