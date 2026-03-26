<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'staffs';

    protected $primaryKey = 'person_id';


    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id', 'role_id');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id', 'department_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }


}
