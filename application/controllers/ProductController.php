<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {
	public function __construct()
	{
		parent::__construct();      
		$this->load->model('LoginModel');
		$this->load->model('ProductModel');
		$this->load->model('BrandModel');
		$this->load->model('CategoryModel');
	}

    public function checkLogin()
    {
        if (!$this->session->userdata('LoggedIn')) {
            redirect(base_url('/login'));
        }
      
    }

	public function index()
	{
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $data['product'] =  $this->ProductModel->selectProduct();

        $this->load->view('product/list', $data);
        $this->load->view('admin_template/footer');
        
	}
	public function create()
	{
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $data['brand'] =  $this->BrandModel->selectBrand();
        $data['categories'] =  $this->CategoryModel->selectCategory();

        $this->load->view('product/create', $data);
        $this->load->view('admin_template/footer');
        
	}
	public function store()
	{
        $this->form_validation->set_rules('title', 'Title', 'trim|required', ['required'=>'Bạn nên điền %s']);
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('price', 'Price', 'trim|required', ['required'=>'Bạn nên điền %s']);
		// $this->form_validation->set_rules('image', 'Password', 'required', ['required'=>'Bạn nên điền %s']);
		// $this->form_validation->set_rules('status', 'Password', 'trim|required', ['required'=>'Bạn nên điền %s']);
        
		if ($this->form_validation->run() == TRUE)
        {
            //upload iamge
            $ori_filename = $_FILES['image']['name'];
            $new_name = time()."".str_replace(' ','-', $ori_filename);
            $config = [
                'upload_path' => './uploads/product',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('image'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin_template/header');
                $this->load->view('admin_template/navbar');
                $this->load->view('product/create', $error);
                $this->load->view('admin_template/footer');
                   
            }
            else{
                $brand_filename = $this->upload->data('file_name');
                $data = [
                'title' => $this->input->post('title'),    
                'description' => $this->input->post('description'),    
                'price' => $this->input->post('price'),    
                'status' => $this->input->post('status'),    
                'slug' => $this->input->post('slug'),    
                'category_id' => $this->input->post('category_id'),    
                'brand_id' => $this->input->post('brand_id'),    
                'quantity' => $this->input->post('quantity'),    
                'image' => $brand_filename,    
                ];
                $this->ProductModel->insertProduct($data);
                $this->session->set_flashdata('success', 'Thêm thành công');
                redirect(base_url('/product/create'));
            }

           

        }
        else{
            $this->create();
        }
        
	}
    public function  edit($id){
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $data['product'] =  $this->ProductModel->selectProductById($id);
        $data['brand'] =  $this->BrandModel->selectBrand();
        $data['categories'] =  $this->CategoryModel->selectCategory();

        $this->load->view('product/edit', $data);
        $this->load->view('admin_template/footer');
    }

    public function update($id){
        $this->form_validation->set_rules('title', 'Title', 'trim|required', ['required'=>'Bạn nên điền %s']);
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required', ['required'=>'Bạn nên điền %s']);
		$this->form_validation->set_rules('price', 'Price', 'trim|required', ['required'=>'Bạn nên điền %s']);
		// $this->form_validation->set_rules('status', 'Password', 'trim|required', ['required'=>'Bạn nên điền %s']);
        
		if ($this->form_validation->run() == TRUE)
        {
            if (!empty($_FILES['image']['name'])) {
                
                
                //upload iamge
                $ori_filename = $_FILES['image']['name'];
                $new_name = time()."".str_replace(' ','-', $ori_filename);
                $config = [
                    'upload_path' => './uploads/product',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'file_name' => $new_name,
                ];

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin_template/header');
                    $this->load->view('admin_template/navbar');
                    $this->load->view('product/create', $error);
                    $this->load->view('admin_template/footer');
                    
                }
                else{
                    $product_filename = $this->upload->data('file_name');
                    $data = [
                        'title' => $this->input->post('title'),    
                        'description' => $this->input->post('description'),    
                        'price' => $this->input->post('price'),    
                        'status' => $this->input->post('status'),    
                        'slug' => $this->input->post('slug'),    
                        'category_id' => $this->input->post('category_id'),    
                        'brand_id' => $this->input->post('brand_id'),    
                        'quantity' => $this->input->post('quantity'),    
                        'image' => $product_filename,    
                    ];
                    
                }

            }
            else{
                $data = [
                    'title' => $this->input->post('title'),    
                    'description' => $this->input->post('description'), 
                    'price' => $this->input->post('price'),   
                    'status' => $this->input->post('status'),    
                    'slug' => $this->input->post('slug'),    
                    'category_id' => $this->input->post('category_id'),    
                    'brand_id' => $this->input->post('brand_id'),    
                    'quantity' => $this->input->post('quantity'),    
                     
                    ];
            }
            $this->ProductModel->updateProduct($id, $data);
            $this->session->set_flashdata('success', 'Sửa thành công');
            redirect(base_url('/product/list'));

        }
        else{
            $this->edit($id);
        }
    }

    public function delete($id)
    {
        $this->ProductModel->deleteProduct($id);
        $this->session->set_flashdata('success', 'Xóa thành công');
        redirect(base_url('/product/list'));
    }
	
}
