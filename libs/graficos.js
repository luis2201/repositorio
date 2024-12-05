const ctx = document.getElementById('chart12meses');
// const labels = obtenerUltimos12Meses();


// new Chart(ctx, {
//     type: 'line',
//     data: {
//         labels: labels,
//         datasets: [{
//             label: 'Número de Visitas',
//             data: [12, 19, 3, 5, 2, 3],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     }
// });

// function obtenerUltimos12Meses() {
//     const meses = [];
//     const fechaActual = new Date();

//     for (let i = 0; i < 12; i++) {
//         // Restar meses a la fecha actual
//         const fecha = new Date(fechaActual);
//         fecha.setMonth(fechaActual.getMonth() - i);

//         // Formatear el mes y año
//         const mes = String(fecha.getMonth() + 1).padStart(2, '0'); // Obtener el mes con dos dígitos
//         const año = fecha.getFullYear(); // Obtener el año
//         meses.push(`${mes}/${año}`);
//     }

//     return meses.reverse(); // Invertir el orden para tener los meses de más reciente a más antiguo
// }

if(chart12meses)
{
    $.ajax({
        url: 'estadisticas/all12', // Cambia esto por la URL de tu archivo PHP
        type: 'GET',
        success: function(response) {
            // Parsear la respuesta JSON
            const data = JSON.parse(response);
            console.log(data)
            // // Crear el gráfico
            // new Chart(document.getElementById('visitasChart'), {
            //     type: 'line',
            //     data: {
            //         labels: data.labels, // Los meses recibidos
            //         datasets: [{
            //             label: 'Número de Visitas',
            //             data: data.data, // Los datos de visitas
            //             borderWidth: 1,
            //             borderColor: 'rgba(75, 192, 192, 1)', // Color de la línea
            //             backgroundColor: 'rgba(75, 192, 192, 0.2)', // Color de fondo
            //         }]
            //     },
            //     options: {
            //         scales: {
            //             y: {
            //                 beginAtZero: true
            //             }
            //         }
            //     }
            // });
        },
        error: function(error) {
            console.log('Error al obtener los datos:', error);
        }
    });
}