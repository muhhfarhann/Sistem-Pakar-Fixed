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

// input kerusakan user
function updateInputValue() {
  var select = document.getElementById("selectKerusakan");
  var selectedOption = select.options[select.selectedIndex].value;
  var values = selectedOption.split("|");

  document.getElementById("inputKodeKerusakan").value = values[0];
  document.getElementById("inputKerusakan").value = values[1];
}

// Navbar scroll
window.addEventListener('scroll', function() {
  const navbar = document.getElementById('mainNav');
  if (window.scrollY > 0) {
      navbar.classList.add('navbar-active');
  }else if(window.scrollY == 0) {
      navbar.classList.remove('navbar-active');
  }
});

document.querySelectorAll('.gejala-select').forEach(select => {
  select.addEventListener('change', function() {
      const gejalaName = this.getAttribute('data-gejala');
      const hiddenInput = this.nextElementSibling;
      if (this.value === 'YES') {
          hiddenInput.value = gejalaName;
      }else{
          hiddenInput.value = '';
      }
  });
});