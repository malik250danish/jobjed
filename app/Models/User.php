<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'email',
        'first_name',
        'last_name',
        'pic',
        'gender',
        'nid',
        'phone',
        'city',
        'passport',
        'permissions', 
        'last_login', 
        'password',
    ];

    public static $agelimit = [
        '0' => 'All',
        '20-30' => '20 to 30',
        '30-40' => '30 to 40',
        '40-50' => '40 to 50',
    ];

    public static $heightin = [
        'ft' => 'Foot',
        'cm' => 'Centinmeter',
        'inc' => 'Inch',
    ];

    public static $weightin = [
        'kg' => 'Kilo Gram',
        'lb' => 'Pound',
    ];

    public static $martialStatus = [
        '1' => 'Single',
        '2' => 'Married',
    ];

    public static $work_experience = [
        '1' => 'Washining',
        '2' => 'Cleaning',
        '3' => 'Ironing',
        '4' => 'Sewing',
        '5' => 'Cooking',
        '6' => 'Baby Care',
    ];

    public static $languages = [
        '1' => 'English',
        '2' => 'Arabic',
    ];

    public static $religion = [
        '1' => 'Muslim',
        '2' => 'Non Muslim',
    ];
    public function totalusers($from,$to)
    {
        $from = date('Y-m-d 00:00:00',strtotime($from));
        $to = date('Y-m-d 23:59:59',strtotime($to));
        return self::where('role_id',2)->wherebetween('created_at',[$from,$to])->count();
    }

}
