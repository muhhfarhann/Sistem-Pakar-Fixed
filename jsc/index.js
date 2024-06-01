function updateKodeKerusakan() {
  var select = document.getElementById("kerusakanSelect");
  var selectedKerusakan = document.getElementById("selectedKerusakan");
  selectedKerusakan.value = select.value;
}

function updateGejala() {
  var select = document.getElementById("gejalaSelect");
  var gejalaSelected = document.getElementById("gejalaSelected");
  gejalaSelected.value = select.value;
}