<section class="grid flex align-center">
<div class="col-3">
  <form action="{{url}}" method="get" id="pagination">
    <input type="hidden" name="page" value="{{page}}" />
    <select name="itemsPerPage" id="itemsPerPage">
      <option value="1" {{itemsPerPage_1}}>1</option>
      <option value="5" {{itemsPerPage_5}}>5</option>
      <option value="10" {{itemsPerPage_10}}>10</option>
      <option value="20" {{itemsPerPage_20}}>20</option>
      <option value="50" {{itemsPerPage_50}}>50</option>
      <option value="100" {{itemsPerPage_100}}>100</option>
    </select>
  </form>
</div>
<div class="col-3"> 
</div>
<div class="col-6 flex flex-end">
{{foreach pages}}
  <a {{if url}}href="{{url}}"{{endif url}} class="w32 btn mx-2 {{if active}}depth-1 mx-3{{endif active}}">{{page}}</a>
{{endfor pages}}
</div>
</section>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('itemsPerPage').addEventListener('change', function() {
      document.getElementById('pagination').submit();
    });
  });
</script>