<?php


namespace App\Controllers;
use App\Models\Product;
use Core\Helper;

class ProductsController
{
    protected $helper ;
    public function __construct()
    {
        $this -> helper = new Helper();
    }


    
    public function index()
    {
        $products = (new Product()) -> selectAll() ;
    
        return $this -> helper -> view('index',
         [
            'products' => $products,
            'helper' => $this->helper
         ]);        
    }

    public function delete()
    {

        $products = new Product();
        $products -> massDelete($_POST);
        return $this -> helper ->redirect('/');
    }

    public function add($data = [])
    {

        $data['helper'] = $this -> helper;

        return $this -> helper -> view('/add-product', $data); 
    }
    

    public function store()
    {
        
        $popData = Product::add($_POST);
        if (isset($popData['errors']))
        {

            return $this -> add($popData);
        }
        return $this -> helper -> redirect('/');
        
    }

    
}