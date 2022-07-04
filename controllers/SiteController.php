<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\ProductModel;

class SiteController extends Controller
{
    public function home(){
        $param = [
            'name'=>'Ayman'
        ];
        return $this->render('home',$param);

    }

   /* public function show(){
        return $this->render('addproduct');
    }*/

    public function addProduct(Request $request ){

            $productModel = new ProductModel();
            if($request->isPost()) {
            $productModel->loadData($request->getBody());

            echo "<pre>";
            var_dump($productModel);
            echo "</pre>";

            if ($productModel->validate() && $productModel->add()){
            return "Added";
            }
            return $this->render('addproduct',[
                'model'=> $productModel
            ]);
        }
        return $this->render('addproduct',[
            'model'=> $productModel
        ]);
    }
}