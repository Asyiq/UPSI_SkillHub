<?php

namespace App\Controllers;

use App\Models\StudentSubjectsModel;
use App\Models\SubjectJobMappingModel;
use App\Models\JobModel;

class JobRecommendationsController extends BaseController
{
    public function index()
    {
        $student_id = session()->get('student_id');

        if (!$student_id) {
            return redirect()->to('/login')->with('error', 'Please log in first.');
        }

        $studentSubjectsModel = new StudentSubjectsModel();
        $subjectJobMappingModel = new SubjectJobMappingModel();
        $jobModel = new JobModel();

        // Fetch all student subjects
        $studentSubjects = $studentSubjectsModel->where('student_id', $student_id)->findAll();

        if (empty($studentSubjects)) {
            return view('sections/job_recommendations', [
                'jobRecommendations' => [],
                'message' => 'No subjects added yet.'
            ]);
        }

        // Prepare job recommendations
        $jobRecommendations = [];
        foreach ($studentSubjects as $subject) {
            // Get all mappings for the current subject code
            $mappings = $subjectJobMappingModel->where('subject_code', $subject['subject_code'])->findAll();

            foreach ($mappings as $mapping) {
                // Fetch job details
                $job = $jobModel->find($mapping['job_id']);
                if ($job) {
                    $jobRecommendations[] = [
                        'subject_code' => $subject['subject_code'],
                        'grade' => $subject['grade'],
                        'recommendation_level' => $subject['recommendation_level'],
                        'job_name' => $job['job_name'],
                        'description' => $job['description'],
                        'required_skills' => $job['required_skills'],
                        'average_salary' => $job['average_salary']
                    ];
                }
            }
        }

        return view('sections/job_recommendations', [
            'jobRecommendations' => $jobRecommendations,
            'message' => empty($jobRecommendations) ? 'No job recommendations available at this time.' : null
        ]);
    }
}

