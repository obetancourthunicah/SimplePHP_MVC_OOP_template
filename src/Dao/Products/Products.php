<?php

namespace Dao\Products;

class Products
{
  public static function getFeaturedProducts()
  {
    return [
      [
        "productId" => 1,
        "productName" => "Producto 1",
        "productDescription" => "Descripción del producto 1",
        "productImgUrl" => "https://via.placeholder.com/150",
        "productPrice" => 100.00
      ],
      [
        "productId" => 2,
        "productName" => "Producto 2",
        "productDescription" => "Descripción del producto 2",
        "productImgUrl" => "https://via.placeholder.com/150",
        "productPrice" => 120.00
      ],
      [
        "productId" => 3,
        "productName" => "Producto 3",
        "productDescription" => "Descripción del producto 3",
        "productImgUrl" => "https://via.placeholder.com/150",
        "productPrice" => 70.00
      ]
    ];
  }

  public static function getNewProducts()
  {
    return [
      [
        "productId" => 99,
        "productName" => "Producto 99",
        "productDescription" => "Descripción del producto nuevo 99",
        "productImgUrl" => "https://via.placeholder.com/150",
        "productPrice" => 50.00
      ],
      [
        "productId" => 100,
        "productName" => "Producto 100",
        "productDescription" => "Descripción del producto nuevo 100",
        "productImgUrl" => "https://via.placeholder.com/150",
        "productPrice" => 130.00
      ]
    ];
  }

  public static function getDailyDeals()
  {
    return [
      [
        "productId" => 73,
        "productName" => "Producto 73",
        "productDescription" => "Descripción del producto 73",
        "productImgUrl" => "https://via.placeholder.com/150",
        "productPrice" => 10.00
      ],
      [
        "productId" => 15,
        "productName" => "Producto 15",
        "productDescription" => "Descripción del producto 15",
        "productImgUrl" => "https://via.placeholder.com/150",
        "productPrice" => 13.00
      ],
      [
        "productId" => 10,
        "productName" => "Producto 10",
        "productDescription" => "Descripción del producto 10",
        "productImgUrl" => "https://via.placeholder.com/150",
        "productPrice" => 20.00
      ]
    ];
  }
}
