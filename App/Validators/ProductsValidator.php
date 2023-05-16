<?php

namespace App\Validators;

 class ProductsValidator
 {
  
   public function validString($input) :bool
    {

    return preg_match('/^[a-zA-Z0-9 ]+$/', $input) && strlen($input) > 0; //allow input has a char ,number or space
    }

    public function validNumber($input) :bool 
    {

        return is_numeric($input) && $input > 0;//just for number
    }

    public function validType($type) :bool
     {

        return $type == 'Dvd' or 'Furniture' or 'Book';

    }


    public function sanitize($input)
    {
        $input = htmlspecialchars(stripslashes(trim($input)));
        return $input;
    }


}