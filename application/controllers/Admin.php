<?php

class Admin extends CI_Controller{

    function  __construct(){
        parent::__construct();
        
        // Load cart library
        $this->load->library('cart');
        
        // Load product model
        $this->load->model('Admin_model');
        $this->load->library('table');
    }

    public function index(){
        //display Dashboard
        $this->load->view('admin/templates/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/templates/footer');
    }

    public function displayProducts(){

      
        //display products
        $products = $this->Admin_model->displayProducts();
        $data = array();
        $data['products'] = $products;

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/productsList',$data);
        $this->load->view('admin/templates/footer',$data);
        
        
    }
    public function displayCustomers(){

        //display products
        $customers = $this->Admin_model->displayCustomers();
        $data = array();
        $data['customers'] = $customers;

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/customersList',$data);
        $this->load->view('admin/templates/footer',$data);
    }

    public function displayOrders(){

        //display orders and order_items
        $orders = $this->Admin_model->display_orders();
        $orderItems = $this->Admin_model->display_orderItems();
        $data = array();
        $data['orders'] = $orders;
        $data['orderItems'] = $orderItems;

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/ordersList',$data);
        $this->load->view('admin/templates/footer',$data);
    }


    // ADD PRODUCT
    public function AddProductForm(){
        //load product inserting form view
        $this->load->view('admin/templates/header');
        $this->load->view('admin/addProductForm');
        $this->load->view('admin/templates/footer');
    }

    public function addProduct(){
    
        $data = array(
             'name' => $this->input->post('name'),
             'category' => $this->input->post('category'),
             'price' => $this->input->post('price'),
             'quantity' => $this->input->post('quantity'),
             'description' => $this->input->post('description'),
             'image' => $this->input->post('image'),
         );
     
         $this->Admin_model->addProduct($data);
         redirect(base_url()."admin/displayProducts");
     }



    // EDIT PRODUCT
    public function EditProductForm(){
        $this->load->view('admin/templates/header');
        $this->load->view('admin/editProductForm');
        $this->load->view('admin/templates/footer');
    }

    public function editProduct($id){
        
            $product = $this->Admin_model->getProduct($id);
            $data = array();
            $data['product'] = $product;
            $this->load->view('admin/templates/header');
            $this->load->view('admin/editProductForm',$data);
            $this->load->view('admin/templates/footer');
    }

    public function updateProduct($id){

            $product = $this->Admin_model->getProduct($id);
            $data = array();
            $data['product'] = $product;
            
            //update user record
            $updateData = array();
            $updateData['name'] = $this->input->post('name');
            $updateData['category'] = $this->input->post('category');
            $updateData['price'] = $this->input->post('price');
            $updateData['description'] = $this->input->post('description');
            $updateData['quantity'] = $this->input->post('quantity');
            /*After added*/ $updateData['productImage'] = $this->input->post('productImage');
            $this->Admin_model->updateProduct($id,$updateData);
            redirect(base_url().'Admin/index/');
    }

    public function deleteProduct($id){

        $product = $this->Admin_model->getProduct($id);
        if(empty($product)){
            redirect(base_url().'Admin/index');
        }

        $this->Admin_model->deleteProduct($id);
        redirect(base_url().'Admin/index');
    }







    /********************************************************  PDF GENERATION for PRODUCTS LIST  ************************************************************************/
    public function productList_pdf() {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Products List');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'Name', 'Price', 'Quantity');
        
        $products = $this->Admin_model->displayProducts();
            
        foreach ($products as $product):
            $this->table->add_row($product['id'], $product['name'], $product['price'], $product['quantity']);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'D');
    }


    /********************************************************  PDF GENERATION for CUSTOMERS LIST  ************************************************************************/
    public function customerList_pdf() {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Users Information');
        $pdf->SetSubject('Users Information Report');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'Name', 'Email', 'Phone','Address','Username');
        
        $customers = $this->Admin_model->displayCustomers();
            
        foreach ($customers as $customer):
            $this->table->add_row($customer['id'], $customer['name'], $customer['email'], $customer['phone'],$customer['address'],$customer['username']);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'D');
    }


    /********************************************************  PDF GENERATION for ORDERS LIST  ************************************************************************/
    public function ordersList_pdf() {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Orders List');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Order ID','Customer ID', 'Product ID', 'Quantity', 'Price','Sub-Total','Grand-Total');
        
        $orders = $this->Admin_model->display_orders();
        $orderItems =  $this->Admin_model->display_orderItems();
        foreach ($orders as $order):
            foreach ($orderItems as $orderItem):
                $this->table->add_row($order['id'], $order['name'], $orderItem['product_id'], $orderItem['quantity'],$orderItem['price'],$orderItem['sub_total'],$order['grand_total']);
            endforeach;
        endforeach;
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'D');
    }

    /********************************************************  PDF GENERATION for TSHIRTS LIST  ************************************************************************/
    public function tshirtList_pdf() {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('T-Shirts List');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'Name','Category', 'Price', 'Quantity');
        //category = tshirt
        $cat = 'tshirt';
        $products = $this->Admin_model->display_category($cat);
            
        foreach ($products as $product):
            $this->table->add_row($product['id'], $product['name'],$product['name'],$product['category'], $product['price'], $product['quantity']);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'D');
    }

    /********************************************************  PDF GENERATION for TOPS LIST  ************************************************************************/
    public function topsList_pdf() {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Tops list');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'Name','Category', 'Price', 'Quantity');
        //category = tshirt
        $cat = 'tops';
        $products = $this->Admin_model->display_category($cat);
            
        foreach ($products as $product):
            $this->table->add_row($product['id'], $product['name'],$product['name'],$product['category'], $product['price'], $product['quantity']);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'D');
    }

    /********************************************************  PDF GENERATION for DRESS LIST  ************************************************************************/
    public function dressList_pdf() {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Dress List');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'Name','Category', 'Price', 'Quantity');
        //category = tshirt
        $cat = 'dress';
        $products = $this->Admin_model->display_category($cat);
            
        foreach ($products as $product):
            $this->table->add_row($product['id'], $product['name'],$product['name'],$product['category'], $product['price'], $product['quantity']);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'D');
    }

    /********************************************************  PDF GENERATION for TROUSERS LIST  ************************************************************************/
    public function trousersList_pdf() {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Trousers List');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'Name','Category', 'Price', 'Quantity');
        //category = tshirt
        $cat = 'trousers';
        $products = $this->Admin_model->display_category($cat);
            
        foreach ($products as $product):
            $this->table->add_row($product['id'], $product['name'],$product['name'],$product['category'], $product['price'], $product['quantity']);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'D');
    }

    /********************************************************  PDF GENERATION for JEANS LIST  ************************************************************************/
    public function jeansList_pdf() {
        //load pdf library
        $this->load->library('Pdf');
        
        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Admin');
        $pdf->SetTitle('Jeans List');
        $pdf->SetSubject('Report generated using Codeigniter and TCPDF');
        $pdf->SetKeywords('TCPDF, PDF, MySQL, Codeigniter');
    
        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
    
        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    
        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    
        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    
        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    
        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    
        // set font
        $pdf->SetFont('times', 'BI', 12);
        
        // ---------------------------------------------------------
        
        
        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );
    
        $this->table->set_template($template);
    
        $this->table->set_heading('Id', 'Name','Category', 'Price', 'Quantity');
        //category = tshirt
        $cat = 'jeans';
        $products = $this->Admin_model->display_category($cat);
            
        foreach ($products as $product):
            $this->table->add_row($product['id'], $product['name'],$product['name'],$product['category'], $product['price'], $product['quantity']);
        endforeach;
        
        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end
        
        // add a page
        $pdf->AddPage();
        
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // reset pointer to the last page
        $pdf->lastPage();
    
        //Close and output PDF document
        $pdf->Output(md5(time()).'.pdf', 'D');
    }


    

    
}

?>