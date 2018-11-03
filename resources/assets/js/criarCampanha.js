const inItem = document.getElementById('inItem')
const inUrgente = document.getElementById('inUrgente')
const inQuantidade = document.getElementById('inQuantidade')
const btAdicionar = document.getElementById('btAdicionar')
const alinhamentoItens = document.querySelector('#alinhamentoItens tbody')

/*
if (inItem.value == "" || inItem.value == null) {
    document.getElementById('btAdicionar').disabled = true;
}
*/

btAdicionar.addEventListener('click', function () {

    alinhamentoItens.insertAdjacentHTML('beforeend', `
        <tr>
            <td>${inItem.value}</td>
            <td class="ch">${inUrgente.checked ? '<i class="fas fa-check"></i>' : ''}</td>
            <td>${inQuantidade.value}</td>
            <td><i class="fas fa-p en"></i></td>
            <td>
            
                <input type="hidden" name="descricao[]" value="${inItem.value}" required/>
                <input type="hidden" name="quantidade[]" value="${inQuantidade.value}"/>
                <input type="hidden" name="urgencia[]" value="${inUrgente.checked}"/>
                <i class="fas fa-trash-alt" onclick="this.parentElement.parentElement.remove()"></i>
                
            </td>
            
        </tr>
    `)
})