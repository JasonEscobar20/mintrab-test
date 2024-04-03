<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['birth_date', 'first_name', 'second_name', 
                            'surname', 'second_surname', 'married_name',
                            'passport', 'cui', 'gender', 'civil_status',
                            'email', 'phone', 'address', 'department', 
                            'municipality', 'document_type'];
}
