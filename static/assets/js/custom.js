var table_name = '';

function getItemsTable(table) {
    table_name = table;
    $.ajax({
        url: "index.php",
        method: "GET",
        data: {function: "getItemTables", table_name: table},
        dataType: "json",
        success: function (response) {
            let items_name = JSON.parse(JSON.stringify(response['success']));
            if (items_name) {
                $("#fields").empty();
                $("#selectField").empty();
                items_name.forEach(element =>
                    $("#fields").append(`<a class="list-group-item list-group-item-action" id="listField" data-bs-toggle="list" role="tab" onclick="selectFields('` + element['COLUMN_NAME'] + `')" aria-controls="{$table}">` + element['COLUMN_NAME'] + `</a>`)
                );
            } else {
                alert('Failed to query database.')
            }
        }
    });
}

function selectFields(name_field) {

    let listField = document.getElementsByName('listf[]');
    if (listField.length) {
        let existe = false;
        for (let i = 0; i < listField.length; i++) {
            if (listField[i].getAttribute('value') == name_field) {
                existe = true;
            }
        }
        if (existe) {
            alert('El campo ya fue seleccionado')
        } else {
            $("#selectField").append(`<div class="col"><div name="listf[]" value="` + name_field + `" class="p-2 border bg-light text-center">` + name_field + `</div></div>`)
        }
    } else {
        $("#selectField").append(`<div class="col"><div name="listf[]" value="` + name_field + `" class="p-2 border bg-light text-center">` + name_field + `</div></div>`)
    }
}


function exportSQL() {
    if (table_name) {
        let querySQL = 'SELECT '
        let listField = document.getElementsByName('listf[]');
        if (listField.length) {
            let existe = false;
            for (let i = 0; i < listField.length; i++) {
                querySQL = querySQL + listField[i].getAttribute('value') + ', '
            }
            querySQL = querySQL + ' FROM ' + table_name
            $("#result").append('<h2>' + querySQL + '</h2>')

        } else {
            alert('Por favor seleccione al menos un campo')
        }
    } else {
        alert('Por favor seleccione una tabla')
    }
}
