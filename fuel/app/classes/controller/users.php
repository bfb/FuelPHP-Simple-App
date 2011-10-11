<?php
class Controller_Users extends Controller_Template {
	public function before(){
		parent::before();
		if(!Auth::check()){
			Response::redirect('home/login');
		}
	}
	
	public function action_index()
	{
		$data['users'] = Model_Simpleuser::find('all');
		$this->template->title = "Usuários";
		$this->template->content = View::factory('users/index', $data);

	}
	
	public function action_create($id = null)
	{
		$data['errors'] = false;
		if (Input::method() == 'POST')
		{
			
			$val = Validation::factory();
			$val->add_field('username', 'Usuário', 'required|min_length[5]|max_length[50]|unique[simpleusers.username]');
			$val->add_field('email', 'E-mail', 'required|max_length[55]|valid_email');
			$val->add_field('password', 'Senha', "required|min_length[5]|max_length[50]|match_value[Input::post('cpassword')]");
			
			$val->set_message('required', ':label deve ser preenchido.');
			$val->set_message('max_length', ':label inválido.');
			$val->set_message('min_length', ':label inválido.');
			$val->set_message('unique', 'Usuário já está em uso.');
			$val->set_message('valid_email', 'E-mail inválido.');

			if($val->run()){
			
				$user = Model_Simpleuser::factory(array(
					'username' => Input::post('username'),
					'password' => \Auth::instance()->hash_password(Input::post('password')),
					'group' => '',
					'last_login' => '',
					'login_hash' => '',
					'profile_fields' => '',
					'email' => Input::post('email'),
					));

				if ($user and $user->save())
				{
					Session::set_flash('notice', 'Usuário adicionado #' . $user->id . '.');

					Response::redirect('users');
				}
				else
				{
					Session::set_flash('notice', 'Não foi possível salvar o usuário.');
				}
			} else {
				
				$data['errors'] = $val->errors();
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::factory('users/create', $data);

	}
	
	public function action_edit($id = null)
	{
		$user = Model_Simpleuser::find($id);
		$data['errors'] = '';

		if (Input::method() == 'POST')
		{
			
			$val = Validation::factory();
			$val->add_field('username', 'Usuário', 'required|min_length[5]|max_length[50]|unique[simpleusers.username]');
			$val->add_field('email', 'E-mail', 'required|max_length[55]|valid_email');
			$val->add_field('password', 'Senha', "required|min_length[5]|max_length[50]|match_value[Input::post('cpassword')]");
			
			$val->set_message('required', ':label deve ser preenchido.');
			$val->set_message('max_length', ':label inválido.');
			$val->set_message('min_length', ':label inválido.');
			$val->set_message('unique', 'Usuário já está em uso.');
			$val->set_message('valid_email', 'E-mail inválido.');

			if($val->run()){
			
				$user->username = Input::post('username');
				$user->password = Input::post('password');
				$user->group = Input::post('group');
				$user->email = Input::post('email');

				if ($user->save())
				{
					Session::set_flash('notice', 'Usuário alterado #' . $id . '.');

					Response::redirect('users');
				}

				else
				{
					Session::set_flash('notice', 'Não foi possível alterar o usuário #' . $id . '.');
				}
			} else {
				$data['errors'] = $val->errors();
			}
		} else {
			$this->template->set_global('user', $user, false);
		}
		
		$this->template->title = "Usuários";
		$this->template->content = View::factory('users/edit', $data);

	}
	
	public function action_delete($id = null)
	{
		if ($user = Model_Simpleuser::find($id))
		{
			$user->delete();
			
			Session::set_flash('notice', 'Deleted user #' . $id);
		}

		else
		{
			Session::set_flash('notice', 'Could not delete user #' . $id);
		}

		Response::redirect('users');

	}
	
}

/* End of file users.php */
