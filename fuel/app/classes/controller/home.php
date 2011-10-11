<?php
class Controller_Home extends Controller_Template {
	
	public function action_admin(){
		$user = Model_Simpleuser::factory(array(
			'username' => 'administrator',
			'password' => \Auth::instance()->hash_password('1234'),
			'group' => '',
			'last_login' => '',
			'login_hash' => '',
			'profile_fields' => '',
			'email' => '-',
			));

		if ($user and $user->save())
		{
			Session::set_flash('notice', 'Added user #' . $user->id . '.');

			Response::redirect('users');
		}
		else
		{
			Session::set_flash('notice', 'Could not save user.');
		}
	}
	
	
	public function action_login()
	{
	    $data = array();
	    if($_POST)
	    {

	        // Ok, you pressed the submit button. let's go over

	        // first of all, let's get a auth object
	        $auth = Auth::instance();

	        // check the credentials. This assumes that you have the previous table created
	        if($auth->login($_POST['username'],$_POST['password']))
	        {
	            // credentials ok, go right in
	            Response::redirect('/');
	        }
	        else
	        {
	            // Oops, no soup for you. try to login again.
	            // Set some values to repopulate the username field and give some error text back to the view

	            $data['username']    = $_POST['username'];
	            $data['login_error'] = 'Wrong username/password combo. Try again';
	        }
	    }

	    // Show the login form
	    $this->template->title = "Acessar";
		$this->template->content = View::factory('users/login', $data);
	}
	
	public function action_logout(){
		Auth::instance()->logout();
		Response::redirect('home/login');
	}
	
}