<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Examples extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function index()
    {
        $this->authorisation();
        $this->_example_output((object)array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    public function authorisation()
    {

        $this->load->library('session');
        $this->load->helper('url');


        if (!isset($this->session->userdata['username'])) {
            redirect('welcome/login', 'location');
            $this->session->sess_destroy();
        }

        return true;
    }

    public function _example_output($output = null)
    {
        $this->load->view('example.php', (array)$output);
    }

    public function content_management()
    {
        $this->authorisation();
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');

        $crud->set_table('content');
        $crud->set_subject('Content', 'Content');
        $crud->columns('type_id', 'title_hy', 'text_hy');

        $crud->required_fields('type_id', 'title_hy', 'text_hy');

        $crud->set_relation('type_id', 'type', 'title');
        $crud->display_as('type_id', 'Type');
        $crud->set_field_upload('image', 'assets/uploads/files');

        $crud->unset_texteditor(array('meta_desc_hy', 'meta_desc_ru', 'meta_desc_en', 'meta_key_hy', 'meta_key_ru', 'meta_key_en'));


        $output = $crud->render();
        $this->_example_output($output);


    }


    public function homepage_management()
    {
        $this->authorisation();
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');

        $crud->set_table('homepage');
        $crud->columns('image1',
            'image2');

        $crud->required_fields('image1',
            'image2',
            'text_hy');

        $crud->set_field_upload('image1', 'assets/uploads/files');
        $crud->set_field_upload('image2', 'assets/uploads/files');

        $crud->unset_texteditor(array('meta_desc_hy', 'meta_desc_ru', 'meta_desc_en', 'meta_key_hy', 'meta_key_ru', 'meta_key_en'));

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function staff_management()
    {

        $this->authorisation();
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');

        $crud->set_table('staff');
        $crud->columns('position_hy',
            'full_name_hy',
            'image');

        $crud->display_as('name', 'Full Name');

        $crud->required_fields('position_hy',
            'full_name_hy',
            'image',
            'description_hy');

        $crud->set_field_upload('image', 'assets/uploads/files');


        $crud->unset_texteditor(array('meta_desc_hy', 'meta_desc_ru', 'meta_desc_en', 'meta_key_hy', 'meta_key_ru', 'meta_key_en'));


        $output = $crud->render();

        $this->_example_output($output);
    }

    public function customer_management()
    {

        $this->authorisation();
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');

        $crud->set_table('customer');
        $crud->columns('name_hy',
            'image');


        $crud->required_fields('name_hy',
            'image');

        $crud->set_field_upload('image', 'assets/uploads/files');

        $crud->unset_texteditor(array('meta_desc_hy', 'meta_desc_ru', 'meta_desc_en', 'meta_key_hy', 'meta_key_ru', 'meta_key_en'));


        $output = $crud->render();

        $this->_example_output($output);
    }


    public function company_management()
    {

        $this->authorisation();
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');

        $crud->set_table('company');
        $crud->columns('text_hy');


        $crud->required_fields('text_hy',
            'text_ru', 'text_en');

        $output = $crud->render();

        $this->_example_output($output);
    }

    public function library_management()
    {

        $this->authorisation();
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');

        $crud->set_table('library');
        $crud->columns('title_hy');


        $crud->required_fields('title_hy', 'title_en', 'title_ru', 'text_hy',
            'text_ru', 'text_en');

        $output = $crud->render();

        $this->_example_output($output);
    }


  public function services_management()
    {

        $this->authorisation();
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');

        $crud->set_table('services');
        $crud->columns('full_title_hy');


        $crud->required_fields('full_title_hy', 'full_title_en', 'full_title_ru', 'text_hy',
            'text_ru', 'text_en');

        $output = $crud->render();

        $this->_example_output($output);
    }


    function multigrids()
    {
        $this->config->load('grocery_crud');
        $this->config->set_item('grocery_crud_dialog_forms', true);
        $this->config->set_item('grocery_crud_default_per_page', 10);

        $output1 = $this->offices_management2();

        $output2 = $this->employees_management2();

        $output3 = $this->customers_management2();

        $js_files = $output1->js_files + $output2->js_files + $output3->js_files;
        $css_files = $output1->css_files + $output2->css_files + $output3->css_files;
        $output = "<h1>List 1</h1>" . $output1->output . "<h1>List 2</h1>" . $output2->output . "<h1>List 3</h1>" . $output3->output;

        $this->_example_output((object)array(
            'js_files' => $js_files,
            'css_files' => $css_files,
            'output' => $output
        ));
    }


}
