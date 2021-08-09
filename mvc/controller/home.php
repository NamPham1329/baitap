<?php 
	class home extends controller{
        public function register(){
            $this->user = $this->model("user");

			$this->view("register",[

			"type"=>$this->user->register(),
			]);
        }
		public function list_prd(){
            $this->product = $this->model("product");

			$this->view("listprd",[

			"type"=>$this->product->get_product(),
			]);
        }


		public function login(){
            $this->user = $this->model("user");

			$this->view("login",[

			"type"=>$this->user->login(),
			]);
        }
		public function create_category(){
            $this->categories = $this->model("categories");

			$this->view("insert_cate",[

			"type"=>$this->categories->insert_cate(),
			]);
        }
		public function create_product(){
            $this->product = $this->model("product");

			$this->view("insert_prd",[

			"type"=>$this->product->get_category(),
			], ["type1"=>$this->product->insert_product()]);
        }
		
		public function delete(){
            $this->product = $this->model("product");

			$this->view("delete",[

			"type"=>$this->product->delete(),
			]);
        }

		public function update_product(){
            $this->product = $this->model("product");

			$this->view("update_prd",[

			"type"=>$this->product->get_category(),
			], ["type1"=>$this->product->update()]);
        }

		public function list_categories(){
            $this->product = $this->model("categories");

			$this->view("list_category",[

			"type"=>$this->product->get_category(),
			]);
        }

		public function update_category(){
            $this->categories = $this->model("categories");

			$this->view("update_category",[

			"type"=>$this->categories->update_cate(),
			]);
        }
		public function delete_category(){
            $this->categories = $this->model("categories");

			$this->view("delete_category",[

			"type"=>$this->categories->delete_cate(),
			]);
        }

		public function view_product(){
            $this->product = $this->model("product");

			$this->view("view_prd_in_cate",[

			"type"=>$this->product->get_prd_in_cate(),
			]);
        }
	}

?>