<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'password', 'image', 'firstname', 'secondname', 'phone_no', 'city', 'code', 'state', 'longitude', 'latitude',
        'role', 'fcm_token', 'school_id', 'image', 'city_id', 'Certificate_good_conduct', 'Driving_License', 'no_bus', 'watsapp',
        'text_adress', 'beginning_of_time', 'End_of_time'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'city_id' => 'int',
        'state' => 'int',
        'role' => 'int',
        'school_id' => 'int',
        'beginning _of_time' => 'time',
        'End_of_time' => 'time',
        'no_bus' => 'int',
        'schoobus_id' => 'int',
        'transport_id' => 'int',
        'students_count' => 'int',


    ];

    protected function serializeDate($date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    public function school()
    {
        return $this->belongsTo('App\Models\School', 'phone_no');
    }


    public function sons()
    {
        return $this->hasMany('App\Models\Son', 'parent_id');

    }




    public function transportor()
    {
        return $this->hasOne('App\Models\transportor', 'driver_id')->withCount('students');
    }

    // public function unreadNotifications(){
    //     $locale = \App::getLocale();
    //     return DB::table('notifications')->select('type','data->title as  title','data->message_'.$locale .' as content','data->type as type','data->sender_id as  sender_id')->get();
    // }
}
