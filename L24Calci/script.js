let currentInput = "";

function appendToDisplay(value) {
  currentInput += value;
  document.getElementById("display").value = currentInput;
}

function clearDisplay() {
  currentInput = "";
  document.getElementById("display").value = "";
}

function operate(operator) {
  if (currentInput !== "") {
    if (["+", "-", "*", "/"].includes(currentInput[currentInput.length - 1])) {
      currentInput = currentInput.slice(0, -1);
    }
    appendToDisplay(operator);
  }
}

function calculate() {
  try {
    const result = eval(currentInput);
    document.getElementById("display").value = result;
    currentInput = result.toString();
  } catch (error) {
    document.getElementById("display").value = "Error";
    currentInput = "";
  }
}
