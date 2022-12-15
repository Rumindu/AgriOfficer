<?php
class Controller
{
    //to load the model (MVC)
    public function model($model)
    {
        //Assuming model is always existing.
        require_once '../app/models/'.$model.'.php';

        //instantiate the model and to the controller member variable
        return new $model();

    }
//to load the view
    public function view($view, $data = [])
    {
        if (file_exists('../app/views/'.$view.'.php')) {
            require_once '../app/views/'.$view.'.php';
        } else {
            exit("File doesn't exist");
        }
    }
}
