<?php
    function formValidate($request, $rules, $messages=null)
    {
        $errors = [];

        foreach($rules as $key => $rule) {
            if ($rule == 'required' && $request[$key] == null) {
                $errors[$key] = ucfirst(str_replace('_', ' ',$key))." field is required";
            }
        }
        
        return $errors;
    }
?>
