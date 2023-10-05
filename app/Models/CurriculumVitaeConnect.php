<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumVitaeConnect extends Model
{
    use HasFactory;

    protected $fillable = ['employer_id','cv_id','charge_id','status','reason','is_deleted','deleted_at'];

    public function requests($from,$to,$st)
    {
        $from = date('Y-m-d 00:00:00',strtotime($from));
        $to = date('Y-m-d 23:59:59',strtotime($to));
        return self::wherebetween('created_at',[$from,$to])->where('status',$st)->count();
    }
}
