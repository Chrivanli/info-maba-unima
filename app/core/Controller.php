<?php

class Controller{
	public function  view($view, $data= []){
		require_once '../app/views/' . $view . '.php';
	}
	public function  admin($view, $data= []){
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if(!isset($_SESSION['username'])){
			require_once '../app/views/login/index.php';
		}else{
			require_once '../app/views/' . $view . '.php';
		}
	}
	public function model($model){
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}
}
