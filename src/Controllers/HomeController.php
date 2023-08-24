<?php

namespace Controllers;

use \Dao\Products\Products as ProductsDao;
use \Views\Renderer as Renderer;
use \Utilities\Site as Site;

class HomeController extends PublicController
{
  public function run(): void
  {
    Site::addLink("public/css/products.css");
    $viewData = [];
    $viewData["productsOnSale"] = ProductsDao::getDailyDeals();
    $viewData["productsHighlighted"] = ProductsDao::getFeaturedProducts();
    $viewData["productsNew"] = ProductsDao::getNewProducts();
    Renderer::render("home", $viewData);
  }
}
