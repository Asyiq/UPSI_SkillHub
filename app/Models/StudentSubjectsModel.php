<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentSubjectsModel extends Model
{
    protected $table = 'student_subjects';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'subject_code', 'job_id', 'technical_skills', 'soft_skills', 'knowledge', 'grade', 'recommendation_level'];

    public function getStudentSubjects($student_id)
    {
        // Ensure correct column names in the database schema
        return $this->select('
                    student_subjects.subject_code AS code, 
                    subject_skills.subject_name AS name, 
                    subject_skills.credit_hours, 
                    student_subjects.technical_skills,
                    student_subjects.soft_skills, 
                    student_subjects.knowledge, 
                    student_subjects.grade,
                    student_subjects.recommendation_level,
                    student_subjects.id
                ')
                ->join('subject_skills', 'subject_skills.subject_code = student_subjects.subject_code', 'inner')
                ->where('student_subjects.student_id', $student_id)
                ->findAll();
    }
}
