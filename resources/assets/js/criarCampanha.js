var btAdicionar = document.getElementById("btAdicionar");
var btEditar = document.getElementById("btEditar");
var btExcluir = document.getElementById("btExcluir");


var inItem = document.getElementById("inItem");
var inUrgente = document.getElementById("inUrgente");
var inQuantidade = document.getElementById("inQuantidade");


var fila = [];

function adicionarItem() {
    var item = inItem.value;

    if(item == ""){
        inNome.focus();
        return;
    }

    fila.push(nome);

    // mais seguro, nao renderiza uma tag, poderia ser usado o innerHtml, mas aceita tag html
    outFila.textContent = fila.join(", ");

    //cria um novo elemento html na página
    var novoBicho = document.createElement('img');
    novoBicho.src = "img/"+nome+".jpg";
    novoBicho.textAlt = nome;
    novoBicho.className = "especie";

    // indica que o elemento é filho da divFila
    // sem isso ele nao sabe quem eh o pai e nao eh criado
    divFila.appendChild(novoBicho);

    inNome.value = "";
    inNome.focus();
}
btAdicionar.addEventListener("click", adicionarEspecie);

// cria function (anonima) associada ao evento keypress (tecla enter)
inNome.addEventListener("keypress", function(tecla){
    // 13: codigo da tecla enter
    if(tecla.keyCode == 13){
        adicionarEspecie();
    }
});



function atenderEspecie() {
    // verifica o numero de elementos do vetor
    if(fila.length == 0){
        alert("Não há animais na fila");
        return;
    }

    // tira o primeiro elemento do vetor
    var atende = fila.shift();

    outFila.textContent = fila.join(", ");

    // obtem as imagens filhas da divFila
    var imagens = divFila.getElementsByTagName("img");
    divFila.removeChild(imagens[0]);

    alert(atende + " em atendimento. Vai sair da fila...");
}
btAtender.addEventListener("click", atenderEspecie);