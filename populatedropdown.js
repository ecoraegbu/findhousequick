// Function to make an AJAX request
function makeRequest(url, method, data, callback) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        callback(xhr.responseText);
      }
    };
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(data);
  }
  
  // Function to populate the state dropdown
  function populateStateDropdown() {
    makeRequest('Classes/dropdown.php', 'POST', 'action=get_state_options', function(response) {
      var stateDropdown = document.getElementById('state-dropdown');
      stateDropdown.innerHTML = response;
    });
  }
  
  // Function to populate the LGA dropdown based on the selected state
  function populateLGADropdown(stateValue) {
    makeRequest('Classes/dropdown.php', 'POST', 'action=get_lga_options&state_id=' + stateValue, function(response) {
      var lgaDropdown = document.getElementById('lga-dropdown');
      lgaDropdown.innerHTML = response;
    });
  }
  
  // Event listener for when the state dropdown is changed
  document.getElementById('state-dropdown').addEventListener('change', function() {
    var stateValue = this.value;
    if (stateValue) {
      populateLGADropdown(stateValue);
    } else {
      var lgaDropdown = document.getElementById('lga-dropdown');
      lgaDropdown.innerHTML = '<option value="">Select an LGA</option>';
    }
  });
  
  // Call the populateStateDropdown function when the page loads
  window.onload = function() {
    populateStateDropdown();
  };
  