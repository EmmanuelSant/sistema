/*
SIDEBAR MENU
*/
$('.sidebar-menu').tree();
/*
datatable
*/
$(".tabla").DataTable(
{
	"language":
	{
		"sProcessing": "Procesando...",
		"sLengthMenu": "Mostrar _MENU_ registros",
		"sZeroRecords": "No se encontraron resultados",
		"sEmptyTable": "Ningún dato disponible en la tabla",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrado de un total de _MAX_ registros",
		"sInfoPostFix": "",
		"sSearch": "Buscar",
		"sUrl": "",
		"sInfoThousands": ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate":
		{
			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"
		},
		"oAria":
		{
			"sSortAscending": "Ordenar de manera Ascendente",
			"sSortDescending": "Ordenar de manera Descendente"
		}
	}
});