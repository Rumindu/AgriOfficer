<?php
    class Posts extends Controller{
        public function __construct(){
            $this->postsModel = $this->model('M_Posts');
        }
        
        public function index(){
            $posts=$this->postsModel->getPosts();
            $data=[
                'posts'=> $posts
            ];

            $this->view('posts/v_index',$data);
            
        }

        public function create(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data=[
                    'title'=>trim($_POST['title']),
                    'body'=>trim($_POST['body']),
                    'title_err'=>'',
                    'body_err'=>'',

                ];
                

                //validate
                if(empty($data['title'])){
                    $data['title_err']='Please enter a title';
                }

                if(empty($data['body'])){
                    $data['body_err']='Please enter a content';     
                }

                if(empty($data['title_err']) && empty($data['body_err'])){
                    if($this->postsModel->create($data)){
                        flash('post_msg', 'post is published');
                        redirect(('Posts/index'));
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //Loading the view with errors
                    $this->view('posts/v_create',$data);
                }
                
            }
            else{
                $data=[
                    'title'=>'',
                    'body'=>'',
                    'title_err'=>'',
                    'body_err'=>'',

                ];

                $this->view('posts/v_create',$data);
            }
            
        }

        public function show(){

        }

    } 