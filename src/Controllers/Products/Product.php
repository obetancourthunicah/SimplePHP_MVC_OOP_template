<?php

namespace Controllers\Products;

use Controllers\PrivateController;
use Views\Renderer;
use Dao\Products\Products as ProductsDao;
use Utilities\Site;
use Utilities\Validators;

class Product extends PrivateController
{
  private $viewData = [];
  private $mode = "DSP";
  private $modeDescriptions = [
    "DSP" => "Detalle de %s %s",
    "INS" => "Nuevo Producto",
    "UPD" => "Editar %s %s",
    "DEL" => "Eliminar %s %s"
  ];
  private $readonly = "";
  private $showCommitBtn = true;
  private $product = [
    "productId" => 0,
    "productName" => "",
    "productDescription" => "",
    "productPrice" => 0,
    "productImgUrl" => "",
    "productStatus" => "ACT"
  ];
  private $product_xss_token = "";

  public function run(): void
  {
    try {
      $this->getData();
      if ($this->isPostBack()) {
        if ($this->validateData()) {
          $this->handlePostAction();
        }
      }
      $this->setViewData();
      Renderer::render("products/product", $this->viewData);
    } catch (\Exception $ex) {
      Site::redirectToWithMsg(
        "index.php?page=Products_Products",
        $ex->getMessage()
      );
    }
  }

  private function getData()
  {
    $this->mode = $_GET["mode"] ?? "NOF";
    if (isset($this->modeDescriptions[$this->mode])) {
      if (!$this->isFeatureAutorized("product_" . $this->mode)) {
        throw new \Exception("No tiene permisos para realizar esta acción.", 1);
      }
      $this->readonly = $this->mode === "DEL" ? "readonly" : "";
      $this->showCommitBtn = $this->mode !== "DSP";
      if ($this->mode !== "INS") {
        $this->product = ProductsDao::getProductById(intval($_GET["productId"]));
        if (!$this->product) {
          throw new \Exception("No se encontró el Producto", 1);
        }
      }
    } else {
      throw new \Exception("Formulario cargado en modalidad invalida", 1);
    }
  }

  private function validateData()
  {
    $errors = [];
    $this->product_xss_token = $_POST["product_xss_token"] ?? "";
    $this->product["productId"] = intval($_POST["productId"] ?? "");
    $this->product["productName"] = strval($_POST["productName"] ?? "");
    $this->product["productDescription"] = strval($_POST["productDescription"] ?? "");
    $this->product["productPrice"] = floatval($_POST["productPrice"] ?? "");
    $this->product["productImgUrl"] = strval($_POST["productImgUrl"] ?? "");
    $this->product["productStatus"] = strval($_POST["productStatus"] ?? "");

    if (Validators::IsEmpty($this->product["productName"])) {
      $errors["productName_error"] = "El nombre del producto es requerido";
    }

    if (Validators::IsEmpty($this->product["productDescription"])) {
      $errors["productDescription_error"] = "La descripción del producto es requerida";
    }

    if (Validators::IsEmpty($this->product["productPrice"]) && $this->product["productPrice"] <= 0) {
      $errors["productPrice_error"] = "El precio del producto es requerido y debe ser un valor mayor a cero";
    }

    if (Validators::IsEmpty($this->product["productImgUrl"])) {
      $errors["productImgUrl_error"] = "La imagen del producto es requerida";
    }

    if (!in_array($this->product["productStatus"], ["ACT", "INA"])) {
      $errors["productStatus_error"] = "El estado del producto es invalido";
    }

    if (count($errors) > 0) {
      foreach ($errors as $key => $value) {
        $this->product[$key] = $value;
      }
      return false;
    }
    return true;
  }

  private function handlePostAction()
  {
    switch ($this->mode) {
      case "INS":
        $this->handleInsert();
        break;
      case "UPD":
        $this->handleUpdate();
        break;
      case "DEL":
        $this->handleDelete();
        break;
      default:
        throw new \Exception("Modo invalido", 1);
        break;
    }
  }

  private function handleInsert()
  {
    $result = ProductsDao::insertProduct(
      $this->product["productName"],
      $this->product["productDescription"],
      $this->product["productPrice"],
      $this->product["productImgUrl"],
      $this->product["productStatus"]
    );
    if ($result > 0) {
      Site::redirectToWithMsg(
        "index.php?page=Products_Products",
        "Producto creado exitosamente"
      );
    }
  }

  private function handleUpdate()
  {
    $result = ProductsDao::updateProduct(
      $this->product["productId"],
      $this->product["productName"],
      $this->product["productDescription"],
      $this->product["productPrice"],
      $this->product["productImgUrl"],
      $this->product["productStatus"]
    );
    if ($result > 0) {
      Site::redirectToWithMsg(
        "index.php?page=Products_Products",
        "Producto actualizado exitosamente"
      );
    }
  }

  private function handleDelete()
  {
    $result = ProductsDao::deleteProduct($this->product["productId"]);
    if ($result > 0) {
      Site::redirectToWithMsg(
        "index.php?page=Products_Products",
        "Producto Eliminado exitosamente"
      );
    }
  }
  private function setViewData(): void
  {
    $this->viewData["mode"] = $this->mode;
    $this->viewData["product_xss_token"] = $this->product_xss_token;
    $this->viewData["FormTitle"] = sprintf(
      $this->modeDescriptions[$this->mode],
      $this->product["productId"],
      $this->product["productName"]
    );
    $this->viewData["showCommitBtn"] = $this->showCommitBtn;
    $this->viewData["readonly"] = $this->readonly;

    $productStatusKey = "productStatus_" . strtolower($this->product["productStatus"]);
    $this->product[$productStatusKey] = "selected";

    $this->viewData["product"] = $this->product;
  }
}
