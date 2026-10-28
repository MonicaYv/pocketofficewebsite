async function loadCountries() {
  const selects = document.querySelectorAll('select[name="country"]');
  if (!selects.length) {
    return;
  }

  try {
    const response = await fetch("/assets/data/countries.json");
    if (!response.ok) {
      throw new Error("Failed to fetch countries");
    }

    const countries = await response.json();

    countries.sort((a, b) => a.name.localeCompare(b.name));

    selects.forEach((select) => {
      select.innerHTML = '<option value="">Select a Country </option>';

      countries.forEach((country) => {
        const option = document.createElement("option");
        option.value = country.code;
        option.textContent = country.name;
        select.appendChild(option);
      });
    });
  } catch (err) {
    console.error("Error loading countries:", err);
    selects.forEach((select) => {
      select.innerHTML = '<option value="">Failed to load</option>';
    });
  }
}
loadCountries();
