// const ACTION = {
//     PLUS: 'plus',
//     MINUS: 'minus'
// }

// const init = () => {



//     let totalCost = 0;

//     [...document.querySelectorAll('card-Shop')].forEach((cardShop) => {
//         totalCost += Number(cardShop.querySelector('.priceCard').value) * Number(cardShop.querySelector('.priceCard').dataset.price);
//     })
//     document.getElementById('totalprice').textContent = totalCost;
// };

// const Buttonplusandminus = (cardShop, action) => {
//     const input = cardShop.querySelector('.input-count');

//     switch (action) {
//         case ACTION.PLUS:
//             input.value++;
//             break;

//         case ACTION.MINUS:
//             input.value--;
//             break;
//     }
// }



// document.getElementById('card-Shop').addEventListener('click', (event) => {
//     if (event.target.classList.contains('BTN-minus')) {
//         Buttonplusandminus(
//             event.target.closest('#card-Shop'),
//             ACTION.MINUS
//         )

//     }

//     if (event.target.classList.contains('BTN-plus')) {
//         Buttonplusandminus(
//             event.target.closest('#card-Shop'),
//             ACTION.PLUS
//         )

//     }
// })

// init();

const costs = [...document.getElementsByClassName('priceCard')]
const counts = [...document.getElementsByClassName('input-count')]

for (const input of counts) {
    input.addEventListener('input',() => {
        totalSum();
    });
}
totalSum();

function totalSum() {
    let summ =0;

   for (const key in costs) {
    const cost = costs[key].innerHTML;
    const count = counts[key].value;

   summ += (+cost) * (+count)
   }
   totalprice.innerHTML = summ

}