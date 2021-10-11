<?php 
	
	class Home extends controller{
		protected $controller;
		function __construct()
		{
			$this->controller = new controller();
		}
		public function home()
		{
			$this->controller->require("product", "homepage/home");
        }
		public function product()
		{
			$this->controller->require("product", "product/listprd");
        }
		public function add_product()
		{
			$this->controller->require("product", "product/addProduct");
        }
		public function update_product()
		{
			$this->controller->require("product", "product/update");
        }
		public function category()
		{
            $this->controller->require("categories", "category/list");
        }
		public function add_category()
		{
            $this->controller->require("categories", "category/add");
        }
		public function update_category()
		{
            $this->controller->require("categories", "category/update");
        }
		public function register()
		{
            $this->controller->require("users", "user/register");
        }
		public function login()
		{
            $this->controller->require("users", "user/login");
        }
		public function logout()
		{
            $this->controller->require("users", "homepage/home");
        }
		public function user()
		{
            $this->controller->require("users", "user/list");
        }
		public function update_user()
		{
            $this->controller->require("users", "user/update");
        }
		public function role()
		{
            $this->controller->require("role", "role/list");
        }
		public function add_role()
		{
            $this->controller->require("role", "role/add");
        }
		public function update_role()
		{
            $this->controller->require("role", "role/update");
        }
		public function cart()
		{
            $this->controller->require("cart", "cart/list");
        }
		public function list_order()
		{
			$this->controller->require("order","cart/index");
		}
		public function order()
		{
            $this->controller->require("order", "order/list");
        }
		public function product_detail()
		{
            $this->controller->require("product", "product/product_detail");
        }	
		public function addToCart()
		{
            $this->controller->require("order", "product/product_detail");
        }
		public function NotFound()
		{
            $this->controller->require("product", "404_error_page");
        }
		public function checkout()
		{
            $this->controller->require("checkout", "checkout");
        }
	}

?>