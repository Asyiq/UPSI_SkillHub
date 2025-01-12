<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // Fetch the student_id from the session
        $student_id = session()->get('student_id');

        // Check if the student ID exists in the session
        if (!$student_id) {
            return redirect()->to('/login')->with('error', 'Please log in first.');
        }

        // Pass the student ID to the view
        return view('dashboard', ['student_id' => $student_id]);
    }
}
