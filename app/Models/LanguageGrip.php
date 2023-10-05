<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageGrip extends Model
{
    use HasFactory;

    protected $table = 'language_grip';

    protected $fillable = ['curriculum_vitae_id','language_id','fluent','fair','poor'];

    protected $hidden = ['created_at','updated_at'];

    protected $appends = ['language'];

    public function getlanguageAttribute() {

        return User::$languages[$this->language_id];

    }

    public function curriculamvitae()
    {
        return $this->belongsTo(CurriculumVitae::class);
    }
}
