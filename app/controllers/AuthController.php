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

        $this->call->library('auth');
        $this->auth->register($username, $email, $password, $role);

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


    private function send_password_token_to_email($email, $token) {
		$template = file_get_contents(ROOT_DIR.PUBLIC_DIR.'/templates/reset_password_email.html');
		$search = array('{token}', '{base_url}');
		$replace = array($token, base_url());
		$template = str_replace($search, $replace, $template);
		$this->email->recipient($email);
		$this->email->subject('LavaLust Reset Password'); //change based on subject
		$this->email->sender('sample@email.com'); //change based on sender email
		$this->email->reply_to('sample@email.com'); // change based on sender email
		$this->email->email_content($template, 'html');
		$this->email->send();
	}


    public function password_reset() {
		if($this->form_validation->submitted()) {
			$email = $this->io->post('email');
			$this->form_validation
				->name('email')->required()->valid_email();
			if($this->form_validation->run()) {
				if($token = $this->auth->reset_password($email)) {
					$this->send_password_token_to_email($email, $token);
                    $this->session->set_flashdata(['alert' => 'is-valid']);
				} else {
					$this->session->set_flashdata(['alert' => 'is-invalid']);
				}
			} else {
				set_flash_alert('danger', $this->form_validation->errors());
			}
		}
		$this->call->view('auth/password-reset');
	}

    public function set_new_password() {
        if($this->form_validation->submitted()) {
            $token = $this->io->post('token');
			if(isset($token) && !empty($token)) {
				$password = $this->io->post('password');
				$this->form_validation
					->name('password')
						->required()
						->min_length(8, 'New password must be atleast 8 characters.')
					->name('re_password')
						->required()
						->min_length(8, 'Retype password must be atleast 8 characters.')
						->matches('password', 'Passwords did not matched.');
						if($this->form_validation->run()) {
							if($this->auth->reset_password_now($token, $password)) {
								set_flash_alert('success', 'Password was successfully updated.');
							} else {
								set_flash_alert('danger', config_item('SQLError'));
							}
						} else {
							set_flash_alert('danger', $this->form_validation->errors());
						}
			} else {
				set_flash_alert('danger', 'Reset token is missing.');
			}
    	redirect('auth/set-new-password/?token='.$token);
        } else {
             $token = $_GET['token'] ?? '';
            if(! $this->auth->get_reset_password_token($token) && (! empty($token) || ! isset($token))) {
                set_flash_alert('danger', 'Invalid password reset token.');
            }
            $this->call->view('auth/new_password');
        }
		
	}


}
?>