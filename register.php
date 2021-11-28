<?php
session_start();
define('MESSAGE_VALIDATE', [
   'required' => 'This field is required',
]);
function validate(){
    $_SESSION['validate'] = [];
    $rules = [
        'name' => 'required',
        'password' => 'required|minLength:6',
        'email' => 'required',
        'birth_day' => 'required'
    ];

    foreach ($rules as $key => $rule){
        $data = $_POST[$key] ?? null;
        foreach (explode('|', $rule) as $callback){
            $agr = explode(':', $callback);
            if(count($agr) > 1){
                $invalid = call_user_func($agr[0],$data,$agr[1]);
            }else{
                $invalid = call_user_func($callback,$data, $key);
            }
            if($invalid){
                $_SESSION['validate'][$key][] = $invalid;
            }
        }
    }
    return count($_SESSION['validate']) > 0;
}

function required($value, $agr){
    $msg = null;
    if(!$value){
        $msg =  MESSAGE_VALIDATE['required'];
    }
    return $msg;
}

function minLength($value, $agr){
    $msg = null;
    if(!$value || strlen($value) < $agr){
        $msg =  'This field must be at least '.$agr.' characters.';
    }
    return $msg;
}

function register(){
    $invalid = validate();
    if($invalid){
        $_SESSION['old'] = $_POST;
        header('Location: index.php');
    }else{
        $_SESSION['data'] = $_POST;
        header('Location: success.php');
    }
}

register();
