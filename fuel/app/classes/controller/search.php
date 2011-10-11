<?php
	
	class Controller_Search extends Controller_Template {
		
		public function action_index(){
			
			if (Input::method() == 'GET')
			{
				$search = Input::get('search');
				if(Input::get('type_search') == 'name'){
					//$data['associations'] = Model_Association::find('all', array('where' => array('name', Input::post('search'))));
//					$data['associations'] = Model_Association::find()->where('name', Input::get('search'))->get_one();
					$data['associations'] = Model_Association::find()->where('name', 'LIKE', '%' . $search . '%')->get();
					//$data['associations'] = DB::select('*')->from('associations')->get_one();
				} else {
					//$data['associations'] = Model_Association::find('all', array('where' => array('code', Input::post('search'))));
					$data['associations'] = Model_Association::find()->where('code', '=', $search)->get();

				}
				//print_r($data['associations']);

			}

			$this->template->title = "Inscrições";
			$this->template->content = View::factory('associations/index', $data);
			
		}
		
		public function action_teste(){
			echo "teste";
		}
		
	}