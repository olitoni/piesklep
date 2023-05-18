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
      if(podstawa%1 != 0)alert('\x44\x7a\x69\x65\x6e\x20\x64\x6f\x62\x72\x79\x20\
      \x50\x61\x6e\x69\x65\x20\x54\x61\x64\x65\x75\x73\x7a\x75\x0a');
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
