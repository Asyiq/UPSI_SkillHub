<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    // Show login form
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    // Handle login logic
    public function login()
    {
        $student_id = $this->request->getPost('student_id');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->find($student_id);

        if ($user && password_verify($password, $user['password'])) {
            // Set session
            session()->set([
                'student_id' => $user['student_id'],
                'logged_in' => true,
            ]);

            // Redirect to dashboard
            return redirect()->to('/dashboard')->with('success', 'Login successful. Welcome!');
        } else {
            return redirect()->back()->with('error', 'Invalid Student ID or Password.');
        }
    }

    // Show the registration form
    public function register()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/register');
    }

    // Handle registration logic
public function store()
{
    $student_id = $this->request->getPost('student_id');
    $password = $this->request->getPost('password');
    $confirmPassword = $this->request->getPost('confirm_password');

    // Validate input
    if (empty($student_id) || empty($password) || empty($confirmPassword)) {
        return redirect()->back()->with('error', 'All fields are required.');
    }

    if ($password !== $confirmPassword) {
        return redirect()->back()->with('error', 'Passwords do not match.');
    }

    // Check if the student_id already exists
    $userModel = new \App\Models\UserModel();
    $existingUser = $userModel->find($student_id);

    if ($existingUser) {
        return redirect()->back()->with('error', 'Student ID already exists.');
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    try {
        $userModel->insert([
            'student_id' => $student_id,
            'password' => $hashedPassword,
        ]);

        // Redirect to login with success message
        return redirect()->to('/login')->with('success', 'Registration successful. Please log in.');
    } catch (\Exception $e) {
        log_message('error', 'Error registering user: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to register user. Please try again.');
    }
}


    // Handle logout logic
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'You have been logged out.');
    }
}
