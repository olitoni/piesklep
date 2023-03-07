function pokaz(nazwa) {
  document.querySelector('#s1').style.display = nazwa=='s1'?'block':'none';
  document.querySelector('#s2').style.display = nazwa=='s2'?'block':'none';
}