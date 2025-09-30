<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->library('email'); // ✅ load email library
    }


public function register()
{
    if ($this->io->method() === 'post') {
        $username = $this->io->post('username');
        $email = $this->io->post('email');
        $password = $this->io->post('password');
        $role = isset($_POST['role']) ? $_POST['role'] : 'fairy'; // ✅ fixed safely
        $created_at = date('Y-m-d H:i:s', time() + 8*3600); // ✅ added created_at timestamp

        $this->call->library('auth');
        $this->auth->register($username, $email, $password, $role, $created_at);

        redirect('auth/login');
    } else {
        $this->call->view('auth/register');
    }
}


    public function login()
    {
    $this->call->library('session');
    $this->call->library('auth');

    if ($this->io->method() === 'post') {
        $username = $this->io->post('username');
        $password = $this->io->post('password');

        if ($this->auth->login($username, $password)) {

            // ✅ Get the user's role after successful login
            $role = $this->session->userdata('role');

            // ✅ Redirect based on role
            if ($role === 'admin') {
                redirect('users/view'); // admin → table page
            } else {
                redirect('user/dashboard'); // user → dashboard
            }
            
        } else {
            echo 'Login failed!';
        }
    }

    $this->call->view('auth/login');
    }

    public function dashboard()
    {
        $this->call->library('auth');

        if (!$this->auth->is_logged_in()) {
            redirect('auth/login');
        }

        if (!$this->auth->has_role('admin') && !$this->auth->has_role('fairy')) {
            echo 'Access denied!';
            exit;
        }


        $this->call->view('User_view');
    }




    public function logout()
    {
        $this->call->library('auth');
        $this->auth->logout();
        redirect('auth/login');
    }



}
?>