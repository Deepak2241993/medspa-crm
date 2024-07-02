<?php



class Mymail

{

    

    function __construct()

    {

        $this->CI =& get_instance();

        $this->CI->load->library('email');



        $config = array(

            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => '587',
            'smtp_user' => 'rrwebtestmail@gmail.com',
            'smtp_pass' => 'dxfzkwjcjswqjkvv',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        
       



        $this->CI->email->initialize($config);

        $this->CI->email->set_crlf("\r\n");

        $this->CI->email->from('rrwebtestmail@gmail.com', 'Forever MedSpa'); // Replace with a valid email address and name

    }





    public function send_mail($subject, $send_email, $body, $cc=false)

    {

        $this->CI->email->to($send_email);

        if($cc) {

            $this->CI->email->cc($cc);

        }        

        $this->CI->email->subject($subject);

        $this->CI->email->message($body);

        $this->CI->email->print_debugger();

        // echo $this->CI->email->send(); // email send successfully

        return $this->CI->email->send(); // email send successfully

    }



}

?>