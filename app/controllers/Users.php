<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('M_Users');
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //form is submitting
            //validate the data
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

            //Input data
            $data =
                [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];

            //validate entered data
            //validate name
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter your name';
            }
            //validate email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter your email';
            } else {
                //check emil is already being registered
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already registered';
                }
            }

            //validate password
            if (empty($data['password'])) {
                $data['confirm_password_err'] = 'Please enter a password';
            }
            else if(empty($data['confirm_password'])){
                $data['confirm_password_err']='Please confirm the password';
            }
            
            else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Password is missed matching';
                }
            }

            //If there is know error then register the user
            if (empty($data['name_err']) && empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                //For hashing password, using inbuilt function in Php call "password_hash"
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user
                if ($this->userModel->register($data)) {
                    
                    //create a flash message
                    flash('reg_flash', 'You are successfully registered!');

                    redirect('users/login');
                } 
                else {
                    die('Something went wrong');
                }

            }
            else{
                //Load view
                $this->view('users/v_register',$data);
            }
        }
         else
        // Initial form
        {
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];
            //Load view
            $this->view('users/v_register', $data);

        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Form is submitting
            $_POST= filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data=[
                'email'=> trim($_POST['email']),
                'password'=>trim($_POST['password']),

                'email_err'=>'',
                'password_err'=>''
            ];
            //validate the email
            if(empty($data['email'])){
                $data['email_err']='Please enter the email';
            }
            else{
                if($this->userModel->findUserByEmail($data['email'])){
                    //User is find
                }
                else{
                    //user is not find
                    $data['email_err']='user not found';
                }
            }
           
           
            //validate the password
            if(empty($data['password'])){
                $data['password_err']='please enter the password';
            }   
            // If no error found the login the user
            if(empty($data['email_err']) && empty($data['password_err'])){
                //log the user
                $loggedUser=$this->userModel->login($data['email'],$data['password']);
                if($loggedUser){
                    //User the authenticated
                    //Create user session
                    $this->createUserSession($loggedUser);
                }
                else{
                    $data['password_err']='password incorrect';

                    //Load view with errors
                    $this->view('users/v_login',$data);
                }
            }
            else{
                //Load view with errors
                $this->view('users/v_login', $data);
            }
        }


        else{
            //Initial form

            $data=[
                'email'=>'',
                'password'=>'',

                'email_err'=>'',
                'password_err'=>''
            ];
            //load view
            $this->view('users/v_login',$data);


        }
    }


    public function createUserSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email']=$user->email;
        $_SESSION['user_name']=$user->name;

        redirect('pages/index');

    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();

        redirect('users/login');
    }

    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }
        else{
            return false;
        }
    }
}


