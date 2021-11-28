<?php


namespace app\Validations\Product;


class StoreProduct
{


    public function validate($data)
    {
        $errors = [];

        if (!$data['name']) {
            $errors['name'] = "Name is required";
        }

        if (!$data['unit_price']) {
            $errors['unit_price'] = "Unit price is required";
        } elseif (!intval($data['unit_price'])) {
            $errors['unit_price'] = "Unit price is not valid";
        }

        if (!$data['quantity']) {
            $errors['quantity'] = "Quantity Price is required";
        } elseif (!intval($data['quantity'])) {
            $errors['quantity'] = "quantity is not valid";
        }


        return $errors;
    }

}