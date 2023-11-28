function createChessboard() {
  const size = document.getElementById("size").value;
  const chessboard = document.getElementById("chessboard");
  while (chessboard.firstChild) {
    chessboard.removeChild(chessboard.firstChild);
  }

  for (let i = 0; i < size; i++) {
    const row = chessboard.insertRow();

    for (let j = 0; j < size; j++) {
      const cell = row.insertCell();
      cell.className = (i + j) % 2 === 0 ? "white" : "black";
    }
  }
}
createChessboard();
