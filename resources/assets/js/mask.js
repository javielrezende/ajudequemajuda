$(document).ready(function () {
    $('#cpf').mask('000.000.000-00', {reverse: true});
    $('#cep').mask('00000-000');
    $('#cnpj').mask('00.000.000/0000-00', {reverse: true});
});