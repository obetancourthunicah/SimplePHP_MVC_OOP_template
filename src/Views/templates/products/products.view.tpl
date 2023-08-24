<h1>Trabajar con Productos</h1>
<section>

</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>
          {{ifnot OrderByProductId}}
          <a href="index.php?page=Products_Products&orderBy=productId&orderDescending=0">Id</a>
          {{endifnot OrderByProductId}}
          {{if OrderProductIdDesc}}
          <a href="index.php?page=Products_Products&orderBy=clear&orderDescending=0">Id <i class="fas fa-sort-down"></i></a>
          {{endif OrderProductIdDesc}}
          {{if OrderProductId}}
          <a href="index.php?page=Products_Products&orderBy=productId&orderDescending=1">Id <i class="fas fa-sort-up"></i></a>
          {{endif OrderProductId}}
        </th>
        <th>
          {{ifnot OrderByProductName}}
          <a href="index.php?page=Products_Products&orderBy=productName&orderDescending=0">Nombre</a>
          {{endifnot OrderByProductName}}
          {{if OrderProductNameDesc}}
          <a href="index.php?page=Products_Products&orderBy=clear&orderDescending=0">Nombre <i class="fas fa-sort-down"></i></a>
          {{endif OrderProductNameDesc}}
          {{if OrderProductName}}
          <a href="index.php?page=Products_Products&orderBy=productName&orderDescending=1">Nombre <i class="fas fa-sort-up"></i></a>
          {{endif OrderProductName}}
        </th>
        <th>
          {{ifnot OrderByProductPrice}}
          <a href="index.php?page=Products_Products&orderBy=productPrice&orderDescending=0">Precio</a>
          {{endifnot OrderByProductPrice}}
          {{if OrderProductPriceDesc}}
          <a href="index.php?page=Products_Products&orderBy=clear&orderDescending=0">Precio <i class="fas fa-sort-down"></i></a>
          {{endif OrderProductPriceDesc}}
          {{if OrderProductPrice}}
          <a href="index.php?page=Products_Products&orderBy=productPrice&orderDescending=1">Precio <i class="fas fa-sort-up"></i></a>
          {{endif OrderProductPrice}}
        </th>
        <th>Estado</th>
        <th><a href="index.php?page=Products-Product&mode=INS">Nuevo</a></th>
      </tr>
    </thead>
    <tbody>
      {{foreach products}}
      <tr>
        <td>{{productId}}</td>
        <td> <a href="index.php?page=Products-Product&mode=DSP&id={{productId}}">{{productDescription}}</a></td>
        <td>
          {{productPrice}}
        </td>
        <td>{{productStatus}}</td>
        <td>
          <a href="index.php?page=Products-Product&mode=UPD&id={{productId}}">Editar</a>
          &NonBreakingSpace;
          <a href="index.php?page=Products-Product&mode=DEL&id={{productId}}">Eliminar</a>
        </td>
      </tr>
      {{endfor products}}
    </tbody>
  </table>
</section>