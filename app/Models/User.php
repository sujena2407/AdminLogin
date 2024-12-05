<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Import Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Extend Authenticatable
{
    use HasFactory, Notifiable;
     // Add Notifiable for notifications
     protected $primaryKey = 'U_id';

    public $timestamps = false;

    // The attributes that are mass assignable.
    protected $fillable = [
        'U_Title',
        'U_FName',
        'U_LName',
        'U_Email',
        'U_Contact',
        'U_Designation',
        'U_Type',
        'U_Password',
        'U_Status',
        'U_Cratedby',
        'U_CratedDate',
        'u_Image',
        'pw_status',
    ];

    // Optional: If you want to hide certain fields from arrays and JSON outputs
    protected $hidden = [
        'U_Password',
        'remember_token',
    ];



}