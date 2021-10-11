<?php 	
	class controller {
		public function require($model, $view)
		{
			require_once("./mvc/model/$model.php");
			require_once("./mvc/view/$view.php");
		}
	}
	
?>