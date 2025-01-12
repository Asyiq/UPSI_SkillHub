<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var RequestInterface
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Initialization method for the controller.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Load session service
        $this->session = \Config\Services::session();
    }

    /**
     * Check if the student's profile is complete.
     *
     * @return \CodeIgniter\HTTP\RedirectResponse|void
     */
    protected function checkProfileCompletion()
    {
        $student_id = session()->get('student_id');
        $profileModel = new \App\Models\StudentProfileModel();
        $profile = $profileModel->where('student_id', $student_id)->first();

        if (empty($profile['name']) || empty($profile['email']) || empty($profile['address'])) {
            // Redirect to edit profile page if incomplete
            return redirect()->to('/student-profile/edit/' . $student_id)
                ->with('info', 'Please complete your profile before proceeding.')->send();
        }
    }
}
