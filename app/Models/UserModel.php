<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'student_id'; // Ensure this matches your table
    protected $allowedFields = ['student_id', 'password'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
}
