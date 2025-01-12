<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentProfileModel extends Model
{
    protected $table = 'student_profiles';
    protected $primaryKey = 'student_id';
    protected $allowedFields = [
        'student_id', 'name', 'gender', 'birth_date', 'email', 'phone', 'address',
        'faculty', 'program', 'semester', 'financial_status', 'status_of_study',
        'level_of_study', 'marital_status', 'ic_number', 'family_income',
        'siblings_count', 'city', 'state', 'country'
    ];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
