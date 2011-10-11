<?php
class Controller_Associations extends Controller_Template {
	
	public function before(){
		parent::before();
		if(!Auth::check()){
			Response::redirect('home/login');
		}
	}
	
	public function action_index()
	{
		$data['associations'] = Model_Association::find('all');
		$this->template->title = "Inscrições";
		$this->template->content = View::factory('associations/index', $data);

	}
	
	public function action_view($id = null)
	{
		$data['association'] = Model_Association::find($id);
		
		$this->template->title = "Inscrições";
		$this->template->content = View::factory('associations/view', $data);

	}
	
	public function action_create($id = null)
	{
		$data['errors'] = false;
		if (Input::method() == 'POST')
		{
			
			$val = Validation::factory();
			$val->add_field('code', 'Inscrição', 'required|max_length[20]');
			$val->add_field('name', 'Nome', 'required|max_length[80]');
			$val->add_field('address', 'Endereço', 'required|max_length[255]');
			$val->add_field('phone', 'Telefone', 'required|max_length[20]');
			$val->add_field('celular', 'Celular', 'max_length[20]');
			
			$val->set_message('required', ':label deve ser preenchido.');
			$val->set_message('max_length', ':label inválido.');
			
			
			if($val->run()){
				$association = Model_Association::factory(array(
					'code' => Input::post('code'),
					'name' => Input::post('name'),
					'address' => Input::post('address'),
					'phone' => Input::post('phone'),
					'mobile' => Input::post('mobile'),
				));

				if ($association and $association->save())
				{
					Session::set_flash('notice', 'Inscrição cadastrada #' . $association->id . '.');

					Response::redirect('associations');
				}

				else
				{
					Session::set_flash('notice', 'Não foi possível cadastrar.');
				}
			} else {
				$data['errors'] = $val->errors();
			}
			
		}

		$this->template->title = "Inscrições";
		$this->template->content = View::factory('associations/create', $data);

	}
	
	public function action_edit($id = null)
	{
		$association = Model_Association::find($id);

		if (Input::method() == 'POST')
		{
			$association->code = Input::post('code');
			$association->name = Input::post('name');
			$association->address = Input::post('address');
			$association->phone = Input::post('phone');
			$association->mobile = Input::post('mobile');

			if ($association->save())
			{
				Session::set_flash('notice', 'Inscrição alterada #' . $id . '.');

				Response::redirect('associations');
			}

			else
			{
				Session::set_flash('notice', 'Não foi possível alterar inscrição #' . $id . '.');
			}
		}
		
		else
		{
			$this->template->set_global('association', $association, false);
		}
		
		$this->template->title = "Inscrições";
		$this->template->content = View::factory('associations/edit');

	}
	
	public function action_delete($id = null)
	{
		if ($association = Model_Association::find($id))
		{
			$association->delete();
			
			Session::set_flash('notice', 'Inscrição deleteda #' . $id . '.');
		}

		else
		{
			Session::set_flash('notice', 'Não foi possível deletar a inscrição #' . $id . '.');
		}

		Response::redirect('associations');

	}
	
	
}

/* End of file associations.php */
