<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    // Optionally, define any relationships or fillable fields
    protected $fillable = ['name', 'description'];  // Add any fields as needed

    // If you want to define relationships, you can add methods here
}
