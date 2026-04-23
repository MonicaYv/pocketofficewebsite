async function loadCountries() {
  const select = document.getElementById("country");
  try {
    const response = await fetch("/assets/data/countries.json");
    const countries = await response.json();

    countries.sort((a, b) => a.name.localeCompare(b.name));

    select.innerHTML = '<option value="">Select a Country </option>';

    countries.forEach((country) => {
      const option = document.createElement("option");
      option.value = country.code;
      option.textContent = country.name;
      select.appendChild(option);
    });
  } catch (err) {
    console.error("Error loading countries:", err);
    select.innerHTML = '<option value="">Failed to load</option>';
  }
}
loadCountries();
