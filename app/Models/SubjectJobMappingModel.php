<?php

namespace App\Models;

use CodeIgniter\Model;

class SubjectJobMappingModel extends Model
{
    protected $table = 'subject_job_mapping';
    protected $primaryKey = 'id';
    protected $allowedFields = ['subject_id', 'job_id'];
}
