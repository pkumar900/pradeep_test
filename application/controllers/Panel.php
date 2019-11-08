<?php
class Panel extends CI_Controller {
 public function Index($page = 'home'){

   if($this->session->userdata('logged_in')) { 
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
     }
     
     
     $data['title'] = ucfirst($page);
      redirect('Dashboard');  
  }
  else
  {
     redirect('login');
  }
}

}