<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumVitae extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','email','phone','home_address','religion','place_birth','national_country_id','occupation_id','martial_stauts_id','dob','age','height','weight','height_in','weight_in','complexion','children','educational_background','other_info','monthly_salary','contract_period','passport_number','cv','pic','full_pic','status','cv_lock','is_deleted','deleted_at'];

    protected $hidden = ['created_at','updated_at'];

    protected $appends = ['previouswork','languagegrip','workexperience','nationalty','connect'];

    protected $casts = [
        'monthly_salary' => 'integer',
        'weight' => 'integer',
    ];

    public function getconnectAttribute() {

        return CurriculumVitaeConnect::where('cv_id',$this->id)->orderby('id','desc')->first();

    }

    public function getworkexperienceAttribute() {

        return CurriculamVitaeWorkExperience::where('curriculum_vitae_id',$this->id)->get();

    }

    public function getpreviousworkAttribute() {

        return CurriculamVitaePerviousWork::where('curriculum_vitae_id',$this->id)->get();

    }

    public function getlanguagegripAttribute() {

        return LanguageGrip::where('curriculum_vitae_id',$this->id)->get();

    }
    public function getnationaltyAttribute() {

        return Country::where('id',$this->national_country_id)->first()->name;

    }

    public function occupation()
    {
        return $this->belongsTo(Occupations::class);
    }

    public function nationalty()
    {
        return $this->hasOne(Country::class,'id','=',$this->national_country_id);
    }

    public function workexperience()
    {
        return $this->hasMany(CurriculamVitaeWorkExperience::class,'curriculum_vitae_id','=','id');
    }
    public function languageexperience()
    {
        return $this->hasMany(LanguageGrip::class,'curriculum_vitae_id','=','id');
    }

    public function newCV($from,$to)
    {
        $from = date('Y-m-d 00:00:00',strtotime($from));
        $to = date('Y-m-d 23:59:59',strtotime($to));
        return self::wherebetween('created_at',[$from,$to])->count();
    }
    
}
