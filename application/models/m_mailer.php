<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_mailer extends CI_Model {
  function config(){
            $config['protocol']= "smtp";
            $config['smtp_host']    = 'ssl://smtp.googlemail.com';
            $config['smtp_port']	= '465';
            $config['smtp_user']    = '';
            $config['smtp_pass']    = '';
            $config['mailtype'] = 'html';
            $config['charset']    = 'utf-8';
            $this->email->initialize($config);
  }
    
}