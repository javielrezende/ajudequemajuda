function liberar() {
    var dataInicio = document.getElementById("dataInicio");
    var dataFim = document.getElementById("dataFim");

    if (dataInicio.value != "") {
        dataFim.disabled = false;
    }
}
