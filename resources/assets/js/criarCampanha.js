const inItem = document.getElementById('inItem')
const inUrgente = document.getElementById('inUrgente')
const inQuantidade = document.getElementById('inQuantidade')
const btAdicionar = document.getElementById('btAdicionar')
const alinhamentoItens = document.querySelector('#alinhamentoItens tbody')
const btAtualizar = document.getElementById("btAtualizar")

if (btAdicionar) {
    btAdicionar.addEventListener('click', function () {

        adicionarItens({
            elemento: alinhamentoItens,
            deletar: true,
            editar: btAdicionar.dataset.editar,
        })
        inItem.value = ''
        inQuantidade.value = ''
        inUrgente.checked = false
    })
}

function adicionarItens({
    elemento,
    editar,
    deletar
}) {
    if (!elemento) return
    elemento.insertAdjacentHTML('beforeend', `
        <tr>
            <td id="name">${inItem.value}</td>
            <td id="checked" class="ch">${inUrgente.checked ? '<i class="fas fa-check"></i>' : ''}</td>
            <td id="qtd" class="ch">${inQuantidade.value}</td>
            <td><i class="fas fa-p en"></i></td>
            ${editar ? `
               <td>
                 <i class="fas fa-pen" onclick="editarItem(this)">
               </td> 
            ` : ''}
            ${deletar ? 
            `<td>
                <input type="hidden" name="descricaoItem[]" value="${inItem.value}" required/>
                <input type="hidden" name="quantidade[]" value="${inQuantidade.value}"/>
                <input type="hidden" name="urgencia[]" value="${inUrgente.checked}"/>
                <i class="fas fa-trash-alt" onclick="this.parentElement.parentElement.remove()"></i>     
            </td>` : ''}   
        </tr>
    `)
}

function editarItem(elemento) {
    const tr = elemento.parentElement.parentElement
    const nome = tr.querySelector('#name')
    const checked = tr.querySelector('#checked')
    const qtd = tr.querySelector('#qtd')

    inItem.value = nome.textContent
    inQuantidade.value = qtd.textContent
    inUrgente.checked = !!tr.querySelector('.fa-check')


    btAtualizar.hidden = false
    btAtualizar.onclick = function () {
        //console.log('clicou')
        nome.innerText = inItem.value
        qtd.innerHTML = inQuantidade.value
        checked.innerHTML = inUrgente.checked ? '<i class="fas fa-check"></i>' : ''

        inItem.value = ''
        inQuantidade.value = ''
        inUrgente.checked = false

        btAtualizar.hidden = true


    }
}

window.editarItem = editarItem