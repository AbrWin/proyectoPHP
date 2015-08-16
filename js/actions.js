/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function()
{
    $("#sendInfo").click(function() {
        var email = $("#email").val();
        var password = $("#password").val();
        var user = $("#user").val();
        var genero = $("#genero").val();
        if (email === '' && password === '' && user === '' && genero === '') {
            $('#msjError').text('Por favor llena todos los campos');
            $('#myModal').modal({
                show: 'true'
            });
        } else if (email === '') {
            $('#msjError').text('Por favor ingresa un email valido!');
            $('#myModal').modal({
                show: 'true'
            });
        } else if (password === '') {
            $('#msjError').text('Por favor ingresa un password!');
            $('#myModal').modal({
                show: 'true'
            });
        } else if (user === '') {
            $('#msjError').text('Por favor ingresa un usuario!');
            $('#myModal').modal({
                show: 'true'
            });
        } else if (genero === '') {
            $('#msjError').text('Por favor ingresa tu genero!');
            $('#myModal').modal({
                show: 'true'
            });
        } else {
            $('#msjError').text('Excelente se enviaron todos los datos');
            $('#myModalLabel').text('Registro exitoso');
            $('#myModal').modal({
                show: 'true'
            });
        }
    });
});

