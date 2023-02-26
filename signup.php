<?php
if(Input::exists()){
    if(Token::check('token')){
        $rules =[];
        $data = [];
        $validate = new Validator($data);
        $result = $validate->validate($rules);
        if($validate->passes()){

        } else {

        }
    }
}