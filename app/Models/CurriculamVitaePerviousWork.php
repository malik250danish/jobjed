<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculamVitaePerviousWork extends Model
{
    use HasFactory;

    protected $table = 'curriculum_vitae_previous_work';

    protected $fillable = ['curriculum_vitae_id','country_id','contract_period'];

    protected $hidden = ['created_at','updated_at'];

    protected $appends = ['country'];

    public function getcountryAttribute() {

        return Country::where('id',$this->country_id)->first()->name;

    }
}
