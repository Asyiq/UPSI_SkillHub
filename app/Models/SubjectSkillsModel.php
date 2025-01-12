<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectSkillsModel extends Model
{
    protected $table = 'subject_skills';
    protected $primaryKey = 'id';
    protected $allowedFields = ['subject_code', 'subject_name', 'credit_hours', 'technical_skills', 'soft_skills', 'knowledge'];
}
