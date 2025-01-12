<?php

namespace App\Controllers;

use App\Models\StudentSubjectsModel;
use App\Models\SubjectSkillsModel;
use App\Models\SubjectJobMappingModel;

class StudentSubjectsController extends BaseController
{
    public function index()
    {
        $student_id = session()->get('student_id');
        $studentSubjectsModel = new StudentSubjectsModel();
        $studentSubjects = $studentSubjectsModel->getStudentSubjects($student_id);

        return view('sections/student_subjects', [
            'studentSubjects' => $studentSubjects
        ]);
    }

    public function search()
    {
        $keyword = $this->request->getPost('keyword');
        $subjectSkillsModel = new SubjectSkillsModel();

        $subjects = $subjectSkillsModel
            ->like('subject_code', $keyword)
            ->orLike('subject_name', $keyword)
            ->findAll();

        return $this->response->setJSON($subjects);
    }

    public function add()
    {
        $student_id = session()->get('student_id'); 
        $subject_code = $this->request->getPost('subject_code'); 
        $grade = $this->request->getPost('grade'); // Fetch the submitted grade

        if (!$student_id || !$subject_code || !$grade) {
            return redirect()->back()->with('error', 'Invalid input provided. Please ensure all fields are filled.');
        }

        $studentSubjectsModel = new StudentSubjectsModel();
        $existing = $studentSubjectsModel->where('student_id', $student_id)
                                         ->where('subject_code', $subject_code)
                                         ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Subject already added.');
        }

        $subjectJobMappingModel = new SubjectJobMappingModel();
        $mapping = $subjectJobMappingModel->where('subject_code', $subject_code)->first();

        if (!$mapping) {
            return redirect()->back()->with('error', 'No job mapping found for this subject.');
        }

        $job_id = $mapping['job_id']; 

        $subjectSkillsModel = new SubjectSkillsModel(); 
        $subject = $subjectSkillsModel->where('subject_code', $subject_code)->first();

        if (!$subject) {
            return redirect()->back()->with('error', 'No skill data found for this subject.');
        }

        $recommendation_level = '';
        if (in_array($grade, ['A', 'A-'])) {
            $recommendation_level = 'Highly Recommended';
        } elseif (in_array($grade, ['B+', 'B', 'B-'])) {
            $recommendation_level = 'Recommended';
        } elseif (in_array($grade, ['C+', 'C'])) {
            $recommendation_level = 'Fairly Recommended';
        } else {
            $recommendation_level = 'Not Recommended';
        }

        $data = [
            'student_id' => $student_id,
            'subject_code' => $subject_code,
            'job_id' => $job_id,
            'technical_skills' => $subject['technical_skills'],
            'soft_skills' => $subject['soft_skills'],
            'knowledge' => $subject['knowledge'],
            'grade' => $grade,
            'recommendation_level' => $recommendation_level,
        ];

        if ($studentSubjectsModel->insert($data)) {
            return redirect()->back()->with('success', 'Subject added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add subject. Please try again.');
        }
    }

    public function updateGrade($id)
    {
        $grade = $this->request->getPost('grade');
        $studentSubjectsModel = new StudentSubjectsModel();

        $recommendation_level = '';
        if (in_array($grade, ['A', 'A-'])) {
            $recommendation_level = 'Highly Recommended';
        } elseif (in_array($grade, ['B+', 'B', 'B-'])) {
            $recommendation_level = 'Recommended';
        } elseif (in_array($grade, ['C+', 'C'])) {
            $recommendation_level = 'Fairly Recommended';
        } else {
            $recommendation_level = 'Not Recommended';
        }

        $studentSubjectsModel->update($id, [
            'grade' => $grade,
            'recommendation_level' => $recommendation_level
        ]);

        return redirect()->back()->with('success', 'Grade updated successfully.');
    }

    public function delete($id)
    {
        $studentSubjectsModel = new StudentSubjectsModel();

        if ($studentSubjectsModel->delete($id)) {
            return redirect()->to('/student-subjects')->with('success', 'Subject removed successfully.');
        } else {
            return redirect()->to('/student-subjects')->with('error', 'Failed to remove subject.');
        }
    }

    public function skill()
    {
        $student_id = session()->get('student_id'); 
        $studentSubjectsModel = new StudentSubjectsModel();

        $skills = $studentSubjectsModel->where('student_id', $student_id)->findAll();

        $technical_skills = [];
        $soft_skills = [];
        $knowledge = [];

        foreach ($skills as $skill) {
            $technical_skills = array_merge($technical_skills, explode(',', $skill['technical_skills']));
            $soft_skills = array_merge($soft_skills, explode(',', $skill['soft_skills']));
            $knowledge = array_merge($knowledge, explode(',', $skill['knowledge']));
        }

        $technical_skills = array_unique(array_map(function ($item) {
            return str_replace('_', ' ', trim($item));
        }, $technical_skills));

        $soft_skills = array_unique(array_map(function ($item) {
            return str_replace('_', ' ', trim($item));
        }, $soft_skills));

        $knowledge = array_unique(array_map(function ($item) {
            return str_replace('_', ' ', trim($item));
        }, $knowledge));

        return view('sections/skills', [
            'technical_skills' => $technical_skills,
            'soft_skills' => $soft_skills,
            'knowledge' => $knowledge,
        ]);
    }
}
