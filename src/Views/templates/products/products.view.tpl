<h1>Trabajar con Productos</h1>
<section class="grid">
  <div class="row">
    <form class="col-12 col-m-8" action="index.php" method="get">
      <div class="flex align-center">
        <div class="col-8 row">
          <input type="hidden" name="page" value="Products_Products">
          <label class="col-3" for="partialName">Nombre</label>
          <input class="col-9" type="text" name="partialName" id="partialName" value="{{partialName}}" />
          <label class="col-3" for="status">Estado</label>
          <select class="col-9" name="status" id="status">
              <option value="EMP" {{status_EMP}}>Todos</option>
              <option value="ACT" {{status_ACT}}>Activo</option>
              <option value="INA" {{status_INA}}>Inactivo</option>
          </select>
        </div>
        <div class="col-4 align-end">
          <button type="submit">Filtrar</button>
        </div>
      </div>
    </form>
  </div>
</section>
<section class="WWList">
  <table>
    <thead>
      <tr>
        <th>
          {{ifnot OrderByProductId}}
          <a href="index.php?page=Products_Products&orderBy=productId&orderDescending=0">Id <i class="fas fa-sort"></i></a>
          {{endifnot OrderByProductId}}
          {{if OrderProductIdDesc}}
          <a href="index.php?page=Products_Products&orderBy=clear&orderDescending=0">Id <i class="fas fa-sort-down"></i></a>
          {{endif OrderProductIdDesc}}
          {{if OrderProductId}}
          <a href="index.php?page=Products_Products&orderBy=productId&orderDescending=1">Id <i class="fas fa-sort-up"></i></a>
          {{endif OrderProductId}}
        </th>
        <th class="left">
          {{ifnot OrderByProductName}}
          <a href="index.php?page=Products_Products&orderBy=productName&orderDescending=0">Nombre <i class="fas fa-sort"></i></a>
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
          <a href="index.php?page=Products_Products&orderBy=productPrice&orderDescending=0">Precio <i class="fas fa-sort"></i></a>
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
        <td> <a class="link" href="index.php?page=Products-Product&mode=DSP&id={{productId}}">{{productDescription}}</a>
        </td>
        <td class="right">
          {{productPrice}}
        </td>
        <td class="center">{{productStatusDsc}}</td>
        <td class="center">
          <a href="index.php?page=Products-Product&mode=UPD&id={{productId}}">Editar</a>
          &nbsp;
          <a href="index.php?page=Products-Product&mode=DEL&id={{productId}}">Eliminar</a>
        </td>
      </tr>
      {{endfor products}}
    </tbody>
  </table>
  {{pagination}}
</section>