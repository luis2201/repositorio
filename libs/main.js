if (document.getElementById("FechaPublicacion") !== null) {    
    document.getElementById("FechaPublicacion").value = moment().format("YYYY-MM-DD");
}

let table = new DataTable('#tbLista', {
    destroy:true,       
    pageLength: 10,
    buttons: ['copy', 'excel', 'pdf'],
});

table.buttons().container()
    .appendTo('#tbLista_wrapper .col-md-6:eq(0)');