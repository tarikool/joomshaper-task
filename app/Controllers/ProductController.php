<?php

namespace app\Controllers;



use app\Validations\Product\StoreProduct;

class ProductController extends BaseController
{

    public function index()
    {

        return $this->render('products.product-list');
    }


    public function getProducts()
    {
        $products = $this->db->query("SELECT * FROM PRODUCTS WHERE user_id = ?", $this->userId);

        return $this->jsonResponse($products);
    }


    public function addProduct()
    {
        return $this->render('products.create');
    }


    public function storeProduct()
    {
        $store = new StoreProduct();
        $errors = $store->validate($this->data);

        if (count($errors)) {
            return $this->jsonResponse($errors, 403);
        }


        $query = "INSERT INTO own_products (user_id, name, description, unit_price, quantity, created_at) values (?, ?, ?, ?, ?, ?)";

        $productId = $this->db->insert($query, [
            $this->userId,
            $this->data['name'],
            $this->data['description'],
            $this->data['unit_price'],
            $this->data['quantity'],
            date('Y-m-d H:i:s')
        ]);


        return $this->jsonResponse($productId);
    }


}
