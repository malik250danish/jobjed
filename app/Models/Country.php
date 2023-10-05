<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function curriculamvitae()
    {
        return $this->hasMany(CurriculumVitae::class,'national_country_id','=','id');
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
