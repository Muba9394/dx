<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('common_model');
    }

	public function index()
	{
		$this->load->view('login');
	}

    public function login_process(){
        if($this->input->is_ajax_request()){
            $session = $this->session->userdata('user');                                
            $data['user_name'] = $this->input->post('username');
            $user_check_array =array('user_name' => $data['user_name']);            
            $contents = $this->common_model->fetch_contents('user_table',$user_check_array);
            $dat['limit'] = "10";            
            if($contents !== false){                
                //var_dump($session);die();
                if(!empty($session)){
                    $dat['user_id'] = $contents[0]['user_id'];
                    $dat['user_name'] = $contents[0]['user_name'];                
                    $dat['session_id'] = rand(10,100);                                               
                    $dat['current'] = $session['current'];                   
                    //$dat['current'] = "1";
                }
                else{                    
                    $dat['user_id'] = $contents[0]['user_id'];
                    $dat['user_name'] = $contents[0]['user_name'];                
                    $dat['session_id'] = rand(10,100);                           
                    $dat['current'] = "1";
                }                
                $this->session->set_userdata('user',$dat);                
            }
            else{
                //insert here
                $user_check_array['session_id'] = rand(10,100);
                $insert = $this->common_model->insert_table('user_table',$user_check_array);         
                $dat['user_id'] = $this->db->insert_id();
                $dat['user_name'] = $this->input->post('username');
                $dat['session_id'] = rand(10,100);
                $dat['current'] = "1";                
                $this->session->set_userdata('user',$dat);
            }
            $data = array("status"=> 1);            
            //var_dump($this->session->userdata('user'));die();
            echo json_encode($data);
        }
        else{
            echo ("Method Not allowed");
        }
    }

    public function test()
    {
        $session = $this->session->userdata('user');         
        if(!empty($session)){                        
            $this->load->view('q&a',$session);
        }
        else{            
            redirect(base_url(),'index');
        }
    }

    public function get_qa(){
        $data['user_name'] = $this->input->get('user_name');        
        $data['session'] = $this->input->get('session');        
        $data['user_id'] = $this->input->get('user_id');        
        $data['current'] = $this->input->get('current');                            
        
        $fetch_qa = $this->common_model->fetch_qa($data);
        
        //var_dump($fetch_qa[0]);die();
        echo json_encode($fetch_qa[0]);
    }
    public function skip_qa(){
        $data['q_id'] = $this->input->post('qid');        
        $data['status'] = $this->input->post('type');        
        $data['user_id'] = $this->input->post('user_id');  
        $data['session_id'] = $this->input->post('session_id');  
        $dat['current'] = $this->input->post('current')+1;  
        
        //$session = $this->session->set_userdata('user',$dat);   

        //var_dump($this->session->userdata('user'));die();
        $skip = $this->common_model->skip($data);
        $session = $this->session->userdata('user');           
        $new_ses = array(
            "limit" => 10,
            "user_id" => $session['user_id'],
            "user_name" => $session['user_name'],
            "session_id" => $session['session_id'],
            "current" => $dat['current']
        );        
        $this->session->set_userdata('user',$new_ses);                
        echo $this->input->post('current')+1;
        
    }
    public function next_qa(){
        $data['q_id'] = $this->input->post('qid');        
        $data['status'] = $this->input->post('type');        
        $data['user_id'] = $this->input->post('user_id');  
        $dat['current'] = $this->input->post('current') + 1;  
        $data['session_id'] = $this->input->post('session_id');  
        //$session = $this->session->userdata('user');   

        //var_dump($this->session->userdata('user'));die();
        $skip = $this->common_model->skip($data);
        $session = $this->session->userdata('user');           
        $new_ses = array(
            "limit" => 10,
            "user_id" => $session['user_id'],
            "user_name" => $session['user_name'],
            "session_id" => $session['session_id'],
            "current" => $dat['current']
        );        
        $this->session->set_userdata('user',$new_ses);                
        echo $this->input->post('current')+1;
    }
    public function result(){
        $session = $this->session->userdata('user');  
        $user_check_array =array('user_id' => $session['user_id'],'session_id' => $session['session_id']);     
        $result['data'] = $this->common_model->fetch_contents('result_table',$user_check_array);        
        if(!empty($session)){                        
            $this->load->view('result',$result);
        }
        else{            
            redirect(base_url(),'index');
        }
    }
}
