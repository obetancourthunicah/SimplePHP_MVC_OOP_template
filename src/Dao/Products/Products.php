<?php

namespace Dao\Products;

use Dao\Table;

class  Products extends Table
{
  public static function getFeaturedProducts()
  {
    $sqlstr = "SELECT p.productId, p.productName, p.productDescription, p.productPrice, p.productImgUrl, p.productStatus FROM products p INNER JOIN highlights h ON p.productId = h.productId WHERE h.highlightStart <= NOW() AND h.highlightEnd >= NOW()";
    $params = [];
    $registros = self::obtenerRegistros($sqlstr, $params);
    return $registros;
  }

  public static function getNewProducts()
  {
    $sqlstr = "SELECT p.productId, p.productName, p.productDescription, p.productPrice, p.productImgUrl, p.productStatus FROM products p WHERE p.productStatus = 'ACT' ORDER BY p.productId DESC LIMIT 3";
    $params = [];
    $registros = self::obtenerRegistros($sqlstr, $params);
    return $registros;
  }

  public static function getDailyDeals()
  {
    $sqlstr = "SELECT p.productId, p.productName, p.productDescription, s.salePrice as productPrice, p.productImgUrl, p.productStatus FROM products p INNER JOIN sales s ON p.productId = s.productId WHERE s.saleStart <= NOW() AND s.saleEnd >= NOW()";
    $params = [];
    $registros = self::obtenerRegistros($sqlstr, $params);
    return $registros;
  }
}
