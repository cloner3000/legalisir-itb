<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_mailer extends CI_Model {
  function config(){
            $config['protocol']= "smtp";
            $config['smtp_host']    = 'mx.itb.ac.id';
            $config['smtp_port']	= '465';
            $config['smtp_user']    = 'test@sith.itb.ac.id';
            $config['smtp_pass']    = 'test2016';
            $config['mailtype'] = 'html';
            $config['charset']    = 'utf-8';
            $this->email->initialize($config);
  }
    
}