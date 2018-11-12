const modalDoacaoCenter = document.getElementById('modalDoacaoCenter')
if (modalDoacaoCenter) {
    const trs = modalDoacaoCenter.querySelectorAll('tbody tr')
    trs.forEach(tr => {
        const qtd = tr.querySelector('.qtd')

        tr.querySelector('.fa-minus').parentElement.addEventListener('click', e => {
            e.stopPropagation()
            e.preventDefault()
            console.log(e)

            let number = +e.target.nextElementSibling.querySelector('span').innerText

            if (number === 0) return
            e.target.nextElementSibling.querySelector('span').innerText = number - 1
            qtd.value = number - 1
        })

        tr.querySelector('.fa-plus').parentElement.addEventListener('click', e => {
            e.stopPropagation()
            e.preventDefault()
            console.log(e)
            let number = +e.target.previousElementSibling.querySelector('span').innerText

            e.target.previousElementSibling.querySelector('span').innerText = number + 1
            qtd.value = number + 1
        })

    })
}