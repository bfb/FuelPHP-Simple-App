<?php
class Controller_Passwords extends Controller_Template {
	
	public function before(){
		parent::before();
		if(!Auth::check()){
			Response::redirect('home/login');
		}
	}
	
	public function action_create() {
		
		$data['errors'] = false;
		
		if (Input::method() == 'POST')
		{	
			$val = Validation::factory();
			$val->add_field('password', 'Senha', "required|min_length[5]|match_value[Input::post('cpassword')]");

			$val->set_message('required', ':label deve ser preenchido.');
			$val->set_message('min_length', ':label inválida.');
			$val->set_message('max_length', ':label inválida.');
			$val->set_message('match_value', 'Senhas não conferem.');
			
			$user = Model_Simpleuser::find()->where('username', Auth::instance()->get_screen_name())->get_one();
			
			if($val->run()){
			
				$user->password = \Auth::instance()->hash_password(Input::post('password'));

				if ($user->save())
				{
					Session::set_flash('notice', 'Updated user #' . $id);

					Response::redirect('/');
				}
				else
				{
					Session::set_flash('notice', 'Could not update user #' . $id);
				}
				
			} else {
				$data['errors'] = $val->errors();
			}
		}
		
		else
		{
			//$this->template->set_global('user', $user, false);
		}
		
		$this->template->title = "Trocar senha";
		$this->template->content = View::factory('passwords/create', $data);
		
		
		
		
	}
	
}