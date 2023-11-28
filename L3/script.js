let dataArray = [];
function addElement() {
  const addInput = $("#addElement").val();
  const intValue = parseInt(addInput);

  if (!isNaN(intValue)) {
    dataArray.push(intValue);
    renderDropdown();
    $("#addElement").val("");
  } else {
    alert("Please enter a valid number.");
  }
}

function renderDropdown() {
  const arrayDropdown = $("#arrayDropdown");
  arrayDropdown.empty();

  dataArray.forEach((element) => {
    arrayDropdown.append(`<option value="${element}">${element}</option>`);
  });
}
function search() {
  const searchInput = $("#searchInput").val();
  const index = dataArray.indexOf(parseInt(searchInput));

  if (index !== -1) {
    alert(`Element ${searchInput} found at index ${index}`);
  } else {
    alert(`Element ${searchInput} not found in the array`);
  }
}
function sort() {
  dataArray.sort((a, b) => a - b);
  renderArray();
}
function renderArray() {
  const resultList = $("#resultList");
  resultList.empty();

  dataArray.forEach((element) => {
    resultList.append(`<li>${element}</li>`);
  });
}
