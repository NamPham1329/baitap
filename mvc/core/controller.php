<?php 
	
	class controller {

		public function model($model){
			require_once "./mvc/model/$model.php";
			return new $model;
		}
		public function view($view,$data=[], $data1=[]){
			require_once "./mvc/view/$view.php"; 
		}
	}
?>