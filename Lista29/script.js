function appendToField(value) {
  var input = document.getElementById("typeNumber");
  input.value += value;
}
function increase() {
  var numberToIncrease = document.getElementById("typeNumber").value;
  parseInt(numberToIncrease);
  numberToIncrease++;
  document.getElementById("typeNumber").value = numberToIncrease;
}
function decrease() {
  var numberToIncrease = document.getElementById("typeNumber").value;
  parseInt(numberToIncrease);
  numberToIncrease--;
  document.getElementById("typeNumber").value = numberToIncrease;
}
function multiply() {
  var userInput = document.getElementById("typeNumber").value;
  parseInt(userInput);
  var resultField = document.getElementById("wynik");
  var result = 0;
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      result += parseFloat(checkboxes[i].value);
    }
  }
  resultField.value = (result * userInput).toFixed(2);
}
function clearInput() {
  document.getElementById("typeNumber").value = null;
}
