function kalkuluj(obj) {
  let action = obj.innerText;
  switch (action) {
    case 'Wyczyść': {
      czysc();
      break;
    }

    case 'Przelicz': {
      let liczba = document.querySelector('#liczba').value;
      let podstawa = document.querySelector('#podstawa').value.replace(',','.');
      document.querySelector('#wynik').value = liczba * podstawa;
      alert('Dzien dobry Panie Tadeuszu');
      break;
    }
    case '+': {
      let liczba = +document.querySelector('#liczba').value;
      document.querySelector('#liczba').value = liczba + 1;
      break;
    }
    case '-': {
      let liczba = +document.querySelector('#liczba').value;
      document.querySelector('#liczba').value = liczba - 1;
      break;
    }

    default: {
      let liczba = document.querySelector('#liczba').value + '';
      document.querySelector('#liczba').value = liczba + action;
    }
  }
}

function czysc() {
  document.querySelector('#liczba').value = '';
  document.querySelector('#podstawa').value = '';
  document.querySelector('#wynik').value = '';
}
