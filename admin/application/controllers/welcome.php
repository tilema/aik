<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Welcome extends CI_Controller {


    /**
     * User constructor.
     */
    public function __construct() {

        parent::__construct();

    }




    /**
     * @param $section
     * @return mixed
     */
    private function get_username_password($section) {

        $file = FCPATH.'application/login/login_pass.ini';
        //chmod( $file, '0755' );
        $up_array = parse_ini_file($file,$section);
        //	chmod( $file, '0666' );

        return $up_array[$section];

    }



    public function config() {
        $this->authorisation();
        $this->load->helper('form');
        $this->load->view('config');


    }

    /**
     * @return bool
     */
    public function access_denied() {
        $message = 'Access Denied';
        show_error($message, '403', $heading = '403 Access is prohibited');
        return false;
    }


    /**
     * @param $data
     * @return string
     */
    public function hash($data) {
        return md5($data);
    }


    /**
     * @param null $value
     * @return string
     */
    public function db_value($value = NULL) {

        $this->load->helper('form');

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
     * @return bool
     */
    public function authorisation() {

        $this->load->library('session');
        $this->load->helper('url');


        if(!isset($this->session->userdata['username'])) {
            redirect('index.php/welcome/login', 'location');
            $this->session->sess_destroy();
        }

        return true;
    }


    public function index() {

        redirect(site_url('examples/homepage_management/edit/1'), 'location');

    }

    /**
     * @return bool
     */
    public function login()
    {


        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $data[] = array();

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //$password = $this->hash($this->input->post('password'));


        $account = $this->get_username_password('account');


        $data['username'] = $username;
        $data['password'] = $password;


        if ($username != '') {

            if ($username != $account['username'] or $password != $account['password']) {

                $data['error'] = 'You were not logged in because you entered an invalid username/password combination';
                $this->load->view('login/login', $data);
                return false;
            }


            $remember = $this->input->post('remember_me');
            if ($remember) {
                $this->session->set_userdata('remember_me', TRUE);
            }


            $sess = array(
                'username' => $account['username'],
                'password' => $account['password']
            );


            $session = $sess;


            $this->session->set_userdata($session);
            redirect(site_url('examples/homepage_management/edit/1'), 'location');
        } else {
            $data['error'] = '';
            $this->load->view('login/login', $data);
        }

        return true;


    }

    /**
     * @return bool
     */
    public function logout() {

        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('welcome/login', 'location');

        return true;
    }

}
//end of class
