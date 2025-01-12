<?php

namespace App\Controllers;

use App\Models\StudentProfileModel;

class StudentProfileController extends BaseController
{
    // Display the logged-in student's profile
    public function index()
    {
        $student_id = session()->get('student_id'); // Get the logged-in student's ID
        $profileModel = new StudentProfileModel();

        $profile = $profileModel->where('student_id', $student_id)->first(); // Fetch profile

        if (!$profile) {
            // Redirect to edit profile if it does not exist
            return redirect()->to('/student-profile/edit/' . $student_id)
                            ->with('error', 'Please complete your profile.');
        }

        return view('sections/student_profile', ['profile' => $profile]);
    }

    // Edit the profile of the logged-in student
    public function edit($student_id)
    {
        $loggedInStudentId = session()->get('student_id'); // Ensure the student can only edit their own profile
    
        if ($student_id !== $loggedInStudentId) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('You can only edit your own profile.');
        }
    
        $profileModel = new StudentProfileModel();
    
        $profile = $profileModel->where('student_id', $student_id)->first(); // Fetch profile
    
        // Create a default profile if none exists
        if (!$profile) {
            $profileModel->insert(['student_id' => $student_id]);
            $profile = $profileModel->where('student_id', $student_id)->first();
        }
    
        return view('sections/student_profile_edit', ['profile' => $profile]);
    }

    // Update the profile of the logged-in student
    public function update()
    {
        $student_id = session()->get('student_id'); // Get the logged-in student's ID
        $studentModel = new StudentProfileModel();

        // Collect all input data from the form
        $inputData = $this->request->getPost();

        // Fetch the existing profile data from the database
        $profile = $studentModel->where('student_id', $student_id)->first();

        if (!$profile) {
            // If the profile doesn't exist, redirect with an error
            return redirect()->back()->with('error', 'Profile not found.');
        }

        // Prepare data for updating: Only include fields with new values (non-empty)
        $updateData = [];
        foreach ($inputData as $field => $value) {
            if (!empty($value)) {
                // Only include fields that are not empty
                $updateData[$field] = $value;
            }
        }

        // If no new data is provided, redirect with a message
        if (empty($updateData)) {
            return redirect()->back()->with('info', 'No changes detected.');
        }

        // Perform the update in the database
        $updated = $studentModel->update($student_id, $updateData);

        if ($updated) {
            // Redirect to the dashboard with a success message
            return redirect()->to('/dashboard')->with('success', 'Profile updated successfully.');
        } else {
            // Redirect back to the form with an error message
            return redirect()->back()->with('error', 'Failed to update profile. Please try again.');
        }
    }
}
