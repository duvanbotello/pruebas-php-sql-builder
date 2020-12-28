<div class="container" id="sql-builder">
    <div class="row">
        <div class="col-3 pt-4">
            <h3>TABLAS</h3>
            <div class="list-group mt-4" id="table-list" class="table-list" role="tablist">
                {foreach $getTables as $array}
                    {foreach from=$array item=table}
                        <a class="list-group-item list-group-item-action" id="{$table}" data-bs-toggle="list"
                           role="tab" onclick="getItemsTable('{$table}')" aria-controls="{$table}">{$table}</a>
                    {/foreach}
                {/foreach}
            </div>
        </div>
        <div class="col-3 pt-4">
            <h3>CAMPOS</h3>
            <div class="list-group mt-4 table-list" id="fields" role="tablist">

            </div>
        </div>
        <div class="col-6 pt-4">
            <h3>CAMPOS SELECCIONADOS</h3>
            <div id="selectField" class="border row row-cols-2 row-cols-lg-3 g-2 g-lg-3 mt-4 p-3">

            </div>
        </div>
    </div>
    <a type="button"  onclick="exportSQL()" class="btn btn-primary">Exportar SQL</a>
    <div class="row pt-2">
        <div id="result" class="border">

        </div>
    </div>
</div>


