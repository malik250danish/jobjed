<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'workhold',
        'enable',
    ];

    protected $casts = [
        'workhold' => 'array',
    ];
    
    protected $hidden = ['created_at','updated_at'];

    public function curriculamvitae()
    {
        return $this->hasMany(CurriculumVitae::class,'occupation_id','=','id');
    }

    public static function selectbox() {
        $list = self::select('name', 'id')->where('enable', 1)->get();
        $options = [];
        foreach($list as $item) {
            $options[$item->id] = $item->name;
        }
        return $options;
    }
}
