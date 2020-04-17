<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class reg extends Model
{
    //
    protected $table='user';
    public $primaryKey="u_id";
    public $timestamps=false;
    protected $fillable=['u_name','u_email','u_mobile','u_pass','u_question','u_answer','u_role','created_at','updated_at'];
}
