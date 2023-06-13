<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();      
		$this->load->model('IndexModel');
		$this->load->model('LoginModel');
		$this->load->library('cart');
		$this->data['category'] = $this->IndexModel->getCategoryHome(); 
		$this->data['brand'] = $this->IndexModel->getBrandHome(); 
		$this->load->library('pagination');
	}

	public function index()
	 {	
		$config = array();
        $config["base_url"] = base_url() .'/phan-trang/index'; 
		$config['total_rows'] = ceil($this->IndexModel->countAllProduct()); //có 17 sản phẩm chia ra thì được 6
		$config["per_page"] = 3; //từng trang 3 sản phẩn
        $config["uri_segment"] = 3; //VD: đường dẫn là http://localhost:8000/phan-trang/index/2 thì phan-trang là segment , index là 2 và số 2 là 3. Nếu bỏ index đi thì số segment cần dùng là số 2. (http://localhost:8000/phan-trang/2 )
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
//
		//end custom config link
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0; //uri_segment ở trên
		// echo $this->page;
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproduct_pagination'] = $this->IndexModel->getIndexPagination($config["per_page"], $this->page);
		$this->page *= 3;
		//pagination
		// //
		// $this->pagination->initialize($config); //tự động tạo trang
		// $this->page = ($this->uri->segment(3)) ? $this->uri>segment(3) : 0; // tổng trang hiện tại là 6(hiện tại có 16/3)
		// $this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		// $this->data['allproduct_pagination'] = $this->IndexModel->getIndexPagination($config["per_page"], $this->page);


		$this->data['allproduct'] = $this->IndexModel->getAllProduct(); 
		$this->load->view('pages/template/header', $this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/home', $this->data);
		$this->load->view('pages/template/footer');
	}
	public function category($id)
	{	
		$this->data['slug'] = $this->IndexModel->getCategoryTitleSlug($id);
		$config = array();
        $config["base_url"] = base_url() .'/danh-muc'.'/'.$id.'/'.$this->data['slug']; 
		$config['total_rows'] = ceil($this->IndexModel->countAllProductByCate($id)); //có 17 sản phẩm chia ra thì được 6
		$config["per_page"] = 3; //từng trang 3 sản phẩn
        $config["uri_segment"] = 4 ; //VD: đường dẫn là http://localhost:8000/phan-trang/index/2 thì phan-trang là segment , index là 2 và số 2 là 3. Nếu bỏ index đi thì số segment cần dùng là số 2. (http://localhost:8000/phan-trang/2 )
		$config['use_page_numbers'] = TRUE; //trang có số
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		//
		$this->pagination->initialize($config); //tự động tạo trang
		$this->page = ($this->uri->segment(5)) ? $this->uri>segment(5) : 0; // tổng trang hiện tại là 6(hiện tại có 17/3)
		$this->data["links"] = $this->pagination->create_links(); //tự động tạo links phân trang dựa vào trang hiện tại
		$this->data['allproductbycate_pagination'] = $this->IndexModel->getCatePagination($id, $config["per_page"], $this->page);	

		$this->data['category_product'] = $this->IndexModel->getCategoryProduct($id); 
		$this->data['title'] = $this->IndexModel->getCategoryTitle($id); 
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/category', $this->data);
		$this->load->view('pages/template/footer');
	}
	public function brand($id)
	{	
		$this->data['brand_product'] = $this->IndexModel->getBrandProduct($id); 
		$this->data['title'] = $this->IndexModel->getBrandTitle($id); 
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/brand', $this->data);
		$this->load->view('pages/template/footer');
	}
	public function product($id)
	{	
		$this->data['product_detail'] = $this->IndexModel->getProductDetail($id); 
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/product_details', $this->data);
		$this->load->view('pages/template/footer');
	}
	public function cart()
	{	
		
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');
	}
	public function checkout()
	{	
		if ($this->session->userdata('LoggedInCustomer')) {
			$this->load->view('pages/template/header', $this->data);
			// $this->load->view('pages/template/slider');
			$this->load->view('pages/checkout');
			$this->load->view('pages/template/footer');
			
		}
		else{
			redirect(base_url() . 'dang-nhap');
		}
	}
	public function addToCart()	
	{	
		$product_id = $this->input->post('product_id');
		$quantity = $this->input->post('quantity');
		$this->data['product_detail'] = $this->IndexModel->getProductDetail($product_id); 

		//dat hang
		foreach ($this->data['product_detail'] as $key => $pro) {
			
			$cart = array(
				'id'      => $pro->id,
				'qty'     => $quantity,
				'price'   => $pro->price,
				'name'    => $pro->title,
				'options' => array('image' => $pro->image) //nếu thêm thì phải thêm vào options tương tự như image
			);
		}
		$this->cart->insert($cart);
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function update_cart_item()
	{
		$rowid = $this->input->post('rowid');
		$quantity = $this->input->post('quantity');
		foreach ($this->cart->contents() as $key => $item) {
			if ($rowid == $item['rowid']) {
				$cart = array(
					'rowid' => $rowid,
					'qty'     => $quantity,
					
				);
			}
		}
		$this->cart->update($cart);
		// redirect(base_url() . 'gio-hang', 'refresh');
		redirect($_SERVER['HTTP_REFRESH']);
	}

	public function delete_all_cart(){
		$this->cart->destroy();
		redirect(base_url() . 'gio-hang', 'refresh');
	}
	public function delete_item($rowId){
		$this->cart->remove($rowId);
		redirect(base_url() . 'gio-hang', 'refresh');
	}

	public function login()
	{	
		
		$this->load->view('pages/template/header');
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
	}

	public function login_customer()
	{	
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required'=>'Bạn nên điền %s']);

		if ($this->form_validation->run() == TRUE)
        {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
			$reult = $this->LoginModel->CheckLoginCustomer($email, $password);
			if ($reult) {
				$session_array = [
					'id' => $reult[0]->id,
					'name' => $reult[0]->name,
					'email' => $reult[0]->email,
				];
				$this->session->set_userdata('LoggedInCustomer',$session_array);
				$this->session->set_flashdata('success', 'Đăng nhập thành công');
				redirect(base_url('/checkout'));
			}
			else{
				$this->session->set_flashdata('fail', 'Đăng nhập thất bại');
				redirect(base_url('/dang-nhap'));
			}
       	}
    	else
        {
            $this->login();
        }
	}
	public function dang_ky()
	{	
		$this->form_validation->set_rules('email', 'Email', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('name', 'Name', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required', ['required'=>'Bạn nên điền %s']);

		if ($this->form_validation->run() == true)
        {
            $email = $this->input->post('email');
            $name = $this->input->post('name');
            $phone = $this->input->post('phone');
            $address = $this->input->post('address');
            $password = md5($this->input->post('password'));
			$data = array(
				'name' => $name,
				'email' => $email,
				'phone' => $phone,
				'address' => $address,
				'password' => $password, 
			);
			$reult = $this->LoginModel->NewCustomer($data);
			
			if ($reult) {
				$session_array = [
					
					'name' => $name,
					'email' => $email
				];
				$this->session->set_userdata('LoggedInCustomer',$session_array);
				$this->session->set_flashdata('success', 'Đăng đý thành công');
				redirect(base_url('/checkout'));
			}
			else{
				$this->session->set_flashdata('fail', 'Đăng ký thất bại');
				redirect(base_url('/dang-nhap'));
			}
       	}
    	else
        {
            $this->login();
        }
	}

	public function dang_xuat()
	{
		$this->session->unset_userdata('LoggedInCustomer');
		$this->session->set_flashdata('success', 'Đăng xuất thành công');
		redirect(base_url('/dang-nhap'));
	}

	public function tim_kiem() {
		if (isset($_GET['keyword']) && $_GET['keyword'] != '') {
			$keyword = $_GET['keyword'];
		}
		$this->data['product'] = $this->IndexModel->getProductByKeyword($keyword); 
		$this->data['title'] = $keyword; 
		$this->load->view('pages/template/header', $this->data);
		// $this->load->view('pages/template/slider');
		$this->load->view('pages/timkiem', $this->data);
		$this->load->view('pages/template/footer');
	}

}
