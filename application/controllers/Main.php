<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Main extends CI_Controller {


    public $publishment = 6;
    public $news = 5;
    public $iravakan_verlucutyunner = 4;
    public $orensdrakan_popoxutyunner = 3;
    public $orensdrakan_popoxutyunner_naxagcer = 2;
    public $datakan_akter = 1;


    public function __construct() {

        parent::__construct();

        // load the library
        $this->load->library('layout');

        // load the helper
        $this->load->helper('language');

        $lng = $this->lng();
        $this->load_lang('translate', $lng);
    }


    /**
     * @return bool
     */
    public function access_denied() {
        $message = 'access denied';
        show_error($message, '403', $heading = '403');
        return false;
    }


    /**
     * @return string
     * @todo loader
     */
    private function lng() {
        if($this->uri->segment(1) != '') {
            return $this->uri->segment(1);
        } else {
            return 'hy';
        }
    }



    /**
     * @param $data
     * @return string
     * @todo loader
     */
    public function hash($data) {
        return md5($data);
    }


    /**
     * @param null $value
     * @return string
     * @todo loader
     */
    public function db_value($value = NULL) {

        $this->load->helper('form');

        $value = str_replace("'", "\'", $value);

        if(is_null($value)){
            return "NULL";
        }

        if($value != ''){
            return "'".$value."'";
        } else {
            return "NULL";
        }
    }


    /**
     * @param $file
     * @param $lang
     * @return mixed
     */
    public function load_lang($file, $lang) {

        if ($lang == 'hy') {
            return $this->lang->load($file, 'armenian');
        } elseif ($lang == 'ru') {
            return $this->lang->load($file, 'russian');
        } elseif ($lang == 'en') {
            return $this->lang->load($file, 'english');
        } else {
            return $this->lang->load($file, 'armenian');
        }

    }

    /**
     * @param $description
     * @param $keywords
     * @param $title
     * @param string $image
     * @return string
     */
    public function meta_tags($description, $keywords, $title, $image='default') {


        $site_name = lang('aik');
        // language
        $lng = $this->lng();

        if($image == 'default') {
            $image =  base_url('assets/img/homepage/Logo.png');
        }


        if($description == '' && $keywords == '') {
            $sql = "
                SELECT
                    `meta_key_".$lng."` AS keyword,
                    `meta_desc_".$lng."` AS description
                FROM
                    `homepage`
                LIMIT 1
            ";

            $result = $this->db->query($sql);

            $row = $result->row_array();

            $description = $row['description'];
            $keywords = $row['keyword'];
        }





        /*meta tags*/
        $data = array();
        $data['meta_tags'] = meta('description', $description);
        $data['meta_tags'] .= meta('keywords', $keywords);
        $data['meta_tags'] .= meta('og:site_name', $site_name); //constant
        $data['meta_tags'] .= meta('og:title', $title);
        $data['meta_tags'] .= meta('og:url', current_url());
        $data['meta_tags'] .= meta('og:image', $image);


        return $data['meta_tags'];

    }


    public function index() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        // data
        $data = array();
        // language
        $lng = $this->lng();
        $data['lng'] = $lng;


        $sql = "
            SELECT
                `id`,
                `image1`,
                `image2`,
                `text_".$lng."` AS text,
                `meta_key_".$lng."` AS keyword,
                `meta_desc_".$lng."` AS description
             FROM
                `homepage`
            WHERE 1
            LIMIT 1
        ";

        $result = $this->db->query($sql);

        $row = $result->row_array();

        $this->layout->set_title(lang('aik'));

        $data['image1'] = $row['image1'];
        $data['image2'] = $row['image2'];
        $data['text'] = $row['text'];

        // meta tags
        $data['meta_tags'] = $this->meta_tags($row['description'], $row['keyword'], lang('aik'));

        //view
        $this->layout->view('index', $data, 'deff');
    }


    public function company() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $sql = "
            SELECT
                `text_".$lng."` AS `text`
            FROM
               `company`
            LIMIT 1
         ";

        $result = $this->db->query($sql);

        $row = $result->row_array();

        $data['text'] = $row['text'];

        $this->layout->set_title(lang('company'));

        // meta tags
        $data['meta_tags'] = $this->meta_tags('','', lang('company'));

        //view
        $this->layout->view('company', $data, 'deff');

    }

    public function our_team() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $sql = "
            SELECT
                `id`,
                `position_".$lng."` AS `position`,
                `full_name_".$lng."` AS `full_name`,
                `image`
            FROM
               `staff`
            order by position
         ";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        $data['result'] = $result;

        $this->layout->set_title(lang('our_team'));

        // meta tags
        $data['meta_tags'] = $this->meta_tags('', '', lang('our_team'));


        //view
        $this->layout->view('our_team', $data, 'deff');

    }


    public function staff() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $id = $this->uri->segment(3);

        if($id == '') {
            $message = 'Page not found';
            show_error($message, '404', $heading = '404');
            return false;
        }

        $sql = "
            SELECT
                `id`,
                `position_".$lng."` AS `position`,
                `full_name_".$lng."` AS `full_name`,
                `description_".$lng."` AS `description`,
                `meta_desc_".$lng."` AS `meta_desc`,
                `meta_key_".$lng."` AS `meta_key`,
                `image`
            FROM
               `staff`
            WHERE `id` = '".$id."'
             LIMIT 1
         ";

        $query = $this->db->query($sql);

        $num_rows = $query->num_rows();

        if($num_rows != 1) {
            $message = 'Page not found';
            show_error($message, '404', $heading = '404');
            return false;
        }


        $result = $query->row_array();

        $data['row'] = $result;



        $this->layout->set_title($result['full_name']);

        // meta tags
         $data['meta_tags'] = $this->meta_tags(strip_tags($result['meta_desc']), strip_tags($result['meta_key']), $result['full_name'], base_url('admin/assets/uploads/files/').$result['image']);


        //view
        $this->layout->view('staff', $data, 'deff');

    }


    public function publishment() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $sql = "
            SELECT
                `id`,
                `title_".$lng."` AS `title`,
                `date`,
                `text_".$lng."` AS `text`
            FROM
               `content`
            WHERE `type_id` = '".$this->publishment."'
            ORDER BY `date` desc
         ";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        $data['result'] = $result;



        $this->layout->set_title(lang('publications'));

        // meta tags
       // $data['meta_tags'] = $this->meta_tags($row['description'], $row['keyword'], lang('AboutUs'), base_url($lng.'/img/background.jpg'));


        //view
        $this->layout->view('publishment', $data, 'deff');

    }


    public function news() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $sql = "
            SELECT
                `id`,
                `title_".$lng."` AS `title`,
                `date`,
                `text_".$lng."` AS `text`
            FROM
               `content`
            WHERE `type_id` = '".$this->news."'
            ORDER BY `date` desc
         ";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        $data['result'] = $result;



        $this->layout->set_title(lang('news'));

        // meta tags
       // $data['meta_tags'] = $this->meta_tags($row['description'], $row['keyword'], lang('AboutUs'), base_url($lng.'/img/background.jpg'));


        //view
        $this->layout->view('news', $data, 'deff');

    }

    public function single_news() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $id = $this->uri->segment(3);

        if($id == '') {
            $message = 'Page not found';
            show_error($message, '404', $heading = '404');
            return false;
        }

        $sql = "
            SELECT
                `image`,
                `title_".$lng."` AS `title`,
                `date`,
                `text_".$lng."` AS `text`
            FROM
               `content`
            WHERE `type_id` = '".$this->news."'
             AND `id` = '".$id."'
             LIMIT 1
         ";

        $query = $this->db->query($sql);

        $num_rows = $query->num_rows();

        if($num_rows != 1) {
            $message = 'Page not found';
            show_error($message, '404', $heading = '404');
            return false;
        }


        $result = $query->row_array();

        $data['row'] = $result;



        $this->layout->set_title($result['title']);

        // meta tags
        // $data['meta_tags'] = $this->meta_tags($row['description'], $row['keyword'], lang('AboutUs'), base_url($lng.'/img/background.jpg'));


        //view
        $this->layout->view('single_news', $data, 'deff');

    }


    public function single_publications() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $id = $this->uri->segment(3);

        if($id == '') {
            $message = 'Page not found';
            show_error($message, '404', $heading = '404');
            return false;
        }

        $sql = "
            SELECT
                `title_".$lng."` AS `title`,
                `date`,
                `text_".$lng."` AS `text`
            FROM
               `content`
            WHERE `type_id` = '".$this->publishment."'
             AND `id` = '".$id."'
             LIMIT 1
         ";

        $query = $this->db->query($sql);

        $num_rows = $query->num_rows();

        if($num_rows != 1) {
            $message = 'Page not found';
            show_error($message, '404', $heading = '404');
            return false;
        }


        $result = $query->row_array();

        $data['row'] = $result;



        $this->layout->set_title($result['title']);

        // meta tags
        // $data['meta_tags'] = $this->meta_tags($row['description'], $row['keyword'], lang('AboutUs'), base_url($lng.'/img/background.jpg'));


        //view
        $this->layout->view('single_hratarakum', $data, 'deff');

    }


    public function page() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $type_id = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        if($id == '') {
            $message = 'Page not found';
            show_error($message, '404', $heading = '404');
            return false;
        }

        $sql = "
            SELECT
                `title_".$lng."` AS `title`,
                `date`,
                `text_".$lng."` AS `text`
            FROM
               `content`
            WHERE `type_id` = '".$type_id."'
             AND `id` = '".$id."'
             LIMIT 1
         ";

        $query = $this->db->query($sql);

        $num_rows = $query->num_rows();

        if($num_rows != 1) {
            $message = 'Page not found';
            show_error($message, '404', $heading = '404');
            return false;
        }


        $result = $query->row_array();

        $data['row'] = $result;



        $this->layout->set_title($result['title']);

        // meta tags
        // $data['meta_tags'] = $this->meta_tags($row['description'], $row['keyword'], lang('AboutUs'), base_url($lng.'/img/background.jpg'));


        //view
        $this->layout->view('page', $data, 'deff');

    }


    public function customers() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $sql = "
            SELECT
                `id`,
                `name_".$lng."` AS `name`,
                `image`
            FROM
               `customer`
            Order by `name_".$lng."`
         ";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        $data['result'] = $result;


        $this->layout->set_title(lang('customers'));

        // meta tags
       // $data['meta_tags'] = $this->meta_tags($row['description'], $row['keyword'], lang('AboutUs'), base_url($lng.'/img/background.jpg'));


        //view
        $this->layout->view('customers', $data, 'deff');

    }

    public function library() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // data
        $data = array();
        // language
        $lng = $this->lng();
        $data['lng'] = $lng;



        $sql = "
            SELECT 
                `title_".$lng."` AS `title`, 
                `text_".$lng."` AS `text`  
              FROM 
                `library` 
            limit 1
        ";

        $query = $this->db->query($sql);
        $data['row'] = $query->row_array();

        $this->layout->set_title(lang('library'));

        // meta tags
        $data['meta_tags'] = $this->meta_tags('', '', lang('library'));


        //view
        $this->layout->view('library', $data, 'deff');
    }


    public function datakan_akter() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();

        // data
        $data = array();


        $sql = "
            SELECT
                `id`,
                `title_".$lng."` AS `title`,
                `date`,
                `text_".$lng."` AS `text`,
                `type_id`
            FROM
               `content`
            WHERE `type_id` = '".$this->datakan_akter."'
            ORDER BY `id` desc
         ";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        $data['result'] = $result;

        $this->layout->set_title(lang('judicial_acts'));
        $data['lng'] = $this->lng();

        // meta tags
       // $data['meta_tags'] = $this->meta_tags('', '', lang('Courses'), base_url($lng.'/img/background.jpg'));


        //view
        $this->layout->view('datakan_akter', $data, 'deff');

    }

    public function orensdrakan_popoxutyunner_naxagcer() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $sql = "
            SELECT
                `id`,
                `title_".$lng."` AS `title`,
                `date`,
                `text_".$lng."` AS `text`,
                `type_id`
            FROM
               `content`
            WHERE `type_id` = '".$this->orensdrakan_popoxutyunner_naxagcer."'
            ORDER BY `id` desc
         ";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        $data['result'] = $result;



        $this->layout->set_title(lang('ordinary_changes_projects'));

        // meta tags
        //$data['meta_tags'] = $this->meta_tags('', '', lang('Testimonials'), base_url($lng.'/img/background.jpg'));


        //view
        $this->layout->view('orensdrakan_popoxutyunner_naxagcer', $data, 'deff');

    }

    public function orensdrakan_popoxutyunner() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $sql = "
            SELECT
               `id`,
                `title_".$lng."` AS `title`,
                `date`,
                `text_".$lng."` AS `text`,
                `type_id`
            FROM
               `content`
            WHERE `type_id` = '".$this->orensdrakan_popoxutyunner."'
            ORDER BY `id` desc
         ";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        $data['result'] = $result;

        $this->layout->set_title(lang('ordinary_changes'));

        // meta tags
        //$data['meta_tags'] = $this->meta_tags('', '', lang('Events'), base_url($lng.'/img/background.jpg'));




        //view
        $this->layout->view('orensdrakan_popoxutyunner', $data, 'deff');

    }

    public function iravakan_verlucutyunner() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();

        $sql = "
            SELECT
                `id`,
                `title_".$lng."` AS `title`,
                `date`,
                `text_".$lng."` AS `text`,
                `type_id`
            FROM
               `content`
            WHERE `type_id` = '".$this->iravakan_verlucutyunner."'
            ORDER BY `id` desc
         ";

        $query = $this->db->query($sql);

        $result = $query->result_array();

        $data['result'] = $result;

        // meta tags
       // $data['meta_tags'] = $this->meta_tags('', '', lang('Events'), base_url($lng.'/img/background.jpg'));



        $this->layout->set_title(lang('legal_analysis'));
        //view
        $this->layout->view('iravakan_verlucutyunner', $data, 'deff');

    }

    public function services() {

        // helpers
        $this->load->helper('url');
        $this->load->helper('form');
        // language
        $lng = $this->lng();
        // data
        $data = array();


        $sql = "
            SELECT 
                `id`,
                `full_title_".$lng."` AS `title`,
                `text_".$lng."` AS `text`
            FROM
                `services`
            limit 1      
        ";

        $query = $this->db->query($sql);
        $data['row'] = $query->row_array();


        // meta tags
        $data['meta_tags'] = $this->meta_tags('', '', lang('services'));


        $this->layout->set_title(lang('services'));
        //view
        $this->layout->view('services', $data, 'deff');

    }

    public function register_ax() {

        if ($this->input->server('REQUEST_METHOD') != 'POST') {
            // Return error
            $this->access_denied();
            return false;
        }

        $messages = array('success' => '0', 'message' => '', 'error' => '', 'fields' => '');
        $n = 0;
        //todo



        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $middle_name = $this->input->post('middle_name');
        $date_birth = $this->input->post('date_birth');
        $city = $this->input->post('city');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $current_previous = $this->input->post('current_school_university');
        $course = $this->input->post('course');
        $about_us = $this->input->post('about_us');
        $country = $this->input->post('country');


        $lng = $this->lng();
        $this->load_lang('translate', $lng);


        $sql = "INSERT INTO `register`
					SET 
					 `first_name` = ".$this->db_value($first_name).",
					 `last_name` = ".$this->db_value($last_name).",
					 `middle_name` = ".$this->db_value($middle_name).",
					 `date_of_birth` = ".$this->db_value($date_birth).",
					 `city` = ".$this->db_value($city).",
					 `mobile` = ".$this->db_value($mobile).",
					 `email` = ".$this->db_value($email).",
					 `current_previous` = ".$this->db_value($current_previous).",
					 `course` = ".$this->db_value($course).",
					 `about_us` = ".$this->db_value($about_us).",
					 `country_id` = ".$this->db_value($country).",
					 `status` = '1'";


        $result = $this->db->query($sql);


        if($result) {
            header("Location: ".base_url(($this->uri->segment(1) != '' ? $this->uri->segment(1) : 'en') . '/register'));
        }

    }



    /**
     * @return bool
     */
    public function change_lang() {

        if ($this->input->server('REQUEST_METHOD') != 'POST') {
            $this->access_denied();
            return false;
        }


        $new_lang = $this->input->post('lang');
        $current_url = $this->input->post('current_url');
        $page = $this->input->post('page');
        $start = 0;

        $new_url = '';
        $url_array = explode(base_url(), $current_url);
        $url = array();
        $all_lang_arr = array('hy', 'ru', 'en');

        if (isset($url_array[1])) {
            $url = explode('/', $url_array[1]);
        }

        if (in_array($url[0], $all_lang_arr)) {
            $start = 1;
        }


        for ($i = $start; $i < count($url); $i++) {
            $new_url .= '/' . $url[$i];
        }
        echo base_url($new_lang . $new_url);
        return true;
    }

}
//end of class