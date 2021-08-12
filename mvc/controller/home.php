<?php 
	class home extends controller{
        public function register(){
            $this->user = $this->model("user");

			$this->view("user/register",[

			"type"=>$this->user->register(),
			]);
        }
		public function list_prd(){
            $this->product = $this->model("product");

			$this->view("product/listprd",[

			"type"=>$this->product->get_product(),
			]);
        }


		public function login(){

            $this->user = $this->model("user");

			$this->view("user/login",[

			"type"=>$this->user->login(),
			]);
        }

		public function logout(){
            $this->user = $this->model("user");

			$this->view("user/logout",[

			"type"=>$this->user->logout(),
			]);
        }

		public function create_category(){
            $this->categories = $this->model("categories");

			$this->view("categories/insert_cate",[

			"type"=>$this->categories->insert_cate(),
			]);
        }
		public function create_product(){
            $this->product = $this->model("product");

			$this->view("product/insert_prd",[

			"type"=>$this->product->get_category(),
			], ["type1"=>$this->product->insert_product()]);
        }
		
		public function delete(){
            $this->product = $this->model("product");

			$this->view("product/delete",[

			"type"=>$this->product->delete(),
			]);
        }
		public function get_product_by_id(){
			$this->product = $this->model("product");

			$this->view("product/update_prd",[

			"type1"=>$this->product->get_prd_by_id(),
			],[

				"type"=>$this->product->get_category(),
				]);
		}

		public function update_product(){
            $this->product = $this->model("product");

			$this->view("product/update_prd",[

			"type"=>$this->product->update()]);
        }

		public function list_categories(){
            $this->product = $this->model("categories");

			$this->view("categories/list_category",[

			"type"=>$this->product->get_category(),
			]);
        }
		public function get_category_by_id(){
			$this->categories = $this->model("categories");

			$this->view("categories/update_category",[

			"type"=>$this->categories->get_cate_by_id(),
			]);
		}
		public function update_category(){
            $this->categories = $this->model("categories");

			$this->view("categories/update_category",[

			"type"=>$this->categories->update_cate(),
			]);
        }
		public function delete_category(){
            $this->categories = $this->model("categories");

			$this->view("categories/delete_category",[

			"type"=>$this->categories->delete_cate(),
			]);
        }

		public function view_product(){
            $this->product = $this->model("product");

			$this->view("categories/view_prd_in_cate",[

			"type"=>$this->product->get_prd_in_cate(),
			]);
        }
	}

?>