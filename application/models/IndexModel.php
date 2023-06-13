<?php

    class IndexModel extends CI_Model{
        
        public function getCategoryHome()
        {
            $query = $this->db->get_where('categories', ['status' =>1]);
            return $query->result();
        }
        public function getBrandHome()
        {
            $query = $this->db->get_where('brands', ['status' =>1]);
            return $query->result();
        }
        public function countAllProduct()
        {
            return $this->db->count_all('products');
        }
        public function countAllProductByCate($id)
        {   $this->db->where('category_id', $id);
            $this->db->from('products');
            return $this->db->count_all_results(); ///////////có điều hiện là phải result còn k có đk thì k cần
        }
        public function getIndexPagination($limit, $start)
        {
            $this->db->limit($limit, $start);
            $query = $this->db->get_where('products', ['status' =>1]);
            // if ($query->num_rows() > 0) {
            //     foreach ($query->result() as $row) {
            //         $data[] = $row;
            //     }
            //     return $data;
            // }
            // return false;
            return $query->result();
        }

        public function getAllProduct()
        {
            $query = $this->db->get_where('products', ['status' =>1]);
            return $query->result();
        }
        public function getCategoryProduct($id)
        {
            $query = $this->db->select('categories.title as tendanhmuc,  products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.category_id', $id)
            ->get();
            return $query->result();
        }
        public function getCatePagination($id,$limit, $start)
        {
            $this->db->limit($limit, $start);
            $query = $this->db->select('categories.title as tendanhmuc,  products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.category_id', $id)
            ->get();
            return $query->result();
        }
        public function getBrandProduct($id)
        {
            $query = $this->db->select('categories.title as tendanhmuc,  products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.brand_id', $id)
            ->get();
            return $query->result();
        }
        public function getProductDetail($id)
        {
            $query = $this->db->select('categories.title as tendanhmuc,  products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->where('products.id', $id)
            ->get();
            return $query->result();
        }


        public function getCategoryTitle($id){
            $this->db->select('categories.*');
            $this->db->from('categories');
            $this->db->limit(1);
            $this->db->where('categories.id', $id);
            $query = $this->db->get();
            $result = $query->row();
            return $title = $result->title;

        }
        public function getCategoryTitleSlug($id){
            $this->db->select('categories.*');
            $this->db->from('categories');
            $this->db->limit(1);
            $this->db->where('categories.id', $id);
            $query = $this->db->get();
            $result = $query->row();
            return $title = $result->slug;

        }
        public function getBrandTitle($id){
            $this->db->select('brands.*');
            $this->db->from('brands');
            $this->db->limit(1);
            $this->db->where('brands.id', $id);
            $query = $this->db->get();
            $result = $query->row();
            return $title = $result->title;

        }

        public function getProductByKeyword($keyword) {
            $query = $this->db->select('categories.title as tendanhmuc,  products.*, brands.title as tenthuonghieu')
            ->from('categories')
            ->join('products', 'products.category_id = categories.id')
            ->join('brands', 'brands.id = products.brand_id')
            ->like('products.title', $keyword)
            ->get();
            return $query->result();
        }
    }
?>