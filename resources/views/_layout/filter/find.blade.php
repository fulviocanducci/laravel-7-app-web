<form method="GET">
    <div class="input-group mb-3">
        <input type="text" name="filter" value="{{isset($filter)?$filter:''}}" class="form-control" placeholder="Pesquisa" aria-label="Pesquisa" aria-describedby="button-addon2" autofocus>
        <button class="btn btn-success" type="submit" id="button-addon2" data-bs-toggle="tooltip" data-bs-placement="top" title="Buscar">
            <i class="bi bi-search"></i>
        </button>
    </div>
</form>