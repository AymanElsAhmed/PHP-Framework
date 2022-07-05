<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\ProductModel;

class SiteController extends Controller
{
    public function home()
    {
        $param = [
            'name' => 'Ayman'
        ];
        return $this->render('home', $param);
    }

    /* public function show(){
        return $this->render('addproduct');
    }*/

    public function addProduct(Request $request)
    {

        // $product = new ProductModel();
        // return $this->render('addproduct', [
        //     'model' => $product
        // ]);
        return $this->render('test');
    }

    public function store(Request $request)
    {
        $product = new ProductModel();
        $product->loadData($request->getBody());



        if ($product->validate() && $product->add()) {
            return "Added";
        }
        // echo "<pre>";
        // var_dump($product->errors);
        // echo "</pre>";
        return $this->render('test', [
            'model' => $product
        ]);
    }
}
