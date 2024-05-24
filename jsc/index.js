function selectKerusakan(kode, nama) {
  document.getElementById('dropdownKerusakan').textContent = nama;
  document.getElementById('selectedKerusakan').value = kode;
}

function selectGejala(kode, nama) {
  document.getElementById('dropdownGejala').textContent = nama;
  document.getElementById('selectedGejala').value = kode;
}