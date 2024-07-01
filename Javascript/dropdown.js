const DROPDOWN_SERVER_URL = 'dropdown_server.php';

async function fetchOptions(action, stateId = null) {
    const data = { action };
    if (stateId) data.state_id = stateId;

    try {
        const response = await fetch(DROPDOWN_SERVER_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: new URLSearchParams(data)
        });
        return await response.json();
    } catch (error) {
        console.error('Error fetching options:', error);
        return [];
    }
}

function populateDropdown(dropdownId, options, nameField) {
    const dropdown = document.getElementById(dropdownId);
    dropdown.innerHTML = '<option value="">Select an option</option>';
    options.forEach(option => {
        const optionElement = document.createElement('option');
        optionElement.value = option.id;
        optionElement.textContent = option[nameField];
        dropdown.appendChild(optionElement);
    });
}

async function populateStates() {
    const states = await fetchOptions('get_states');
    populateDropdown('state-dropdown', states, 'state_name');
}

async function populateLGAs(stateId) {
    const lgas = await fetchOptions('get_lgas', stateId);
    populateDropdown('lga-dropdown', lgas, 'lga_name');
}

document.getElementById('state-dropdown').addEventListener('change', function() {
    const stateValue = this.value;
    if (stateValue) {
        populateLGAs(stateValue);
    } else {
        document.getElementById('lga-dropdown').innerHTML = '<option value="">Select an LGA</option>';
    }
});

window.onload = populateStates;