<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculamVitaeWorkExperience extends Model
{
    use HasFactory;

    protected $table = 'curriculum_vitae_work_experience';

    protected $fillable = ['curriculum_vitae_id','work_id','work','work_status'];

    protected $hidden = ['created_at','updated_at'];

    
    public function curriculamvitae()
    {
        return $this->belongsTo(CurriculumVitae::class);
    }
}
