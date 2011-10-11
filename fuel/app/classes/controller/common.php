<?php
class Controller_Common extends Controller_Template {
	public function before(){
		if(!Auth::check()){
			Response::redirect('home/login');
		}
	}
}