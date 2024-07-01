let sessionData, profileData, listingsData, tenantsData, messagesData, dashboardData, inboxData, sentData;
let currentPage = 1;
const itemsPerPage = 6;

// Function to show the loading indicator
const showLoadingIndicator = () => {
  document.getElementById('loading-indicator').style.display = 'flex';
};

// Function to hide the loading indicator
const hideLoadingIndicator = () => {
  document.getElementById('loading-indicator').style.display = 'none';
};

// Main function to control the flow
const main = async () => {
  showLoadingIndicator(); // Show loading indicator
  try {
    // 1. Check Login Status (independent of session)
    const loginResponse = await fetch('../engine/check_login.php');
    const loginData = await loginResponse.json();

    if (!loginData.logged_in) {
      const url = new URL('findhousequick/pages/login.php', window.location.origin);
      window.location.href = url;
      return;
    }

    // 2. Fetch Session Data (after successful login check)
    const sessionResponse = await fetch('../engine/session.php');
    sessionData = await sessionResponse.json();

    // 3. Fetch Profile Data (uses user ID from session)
    const profileResponse = await fetch(`../engine/profile.php?user=${sessionData.user}&action=get`);
    profileData = await profileResponse.json();

  } catch (error) {
    console.error('Error during fetching:', error);
  }finally {
    hideLoadingIndicator(); // Hide loading indicator
  }
};

// Fetch data for a given pageType
const fetchData = async (pageType, type = null, action = null, page = currentPage) => {
  let response;
  showLoadingIndicator(); // Show loading indicator
  try{
  switch (pageType) {
    case 'dashboard':
      //response = await fetch(`../engine/dashboard.php?user=${sessionData.user}`);
      break;
    case 'listings':
      response = await fetch(`../engine/property.php?user=${sessionData.user}&action=get&page=${page}&itemsPerPage=${itemsPerPage}`);
      break;
    case 'inbox':
      response = await fetch(`../engine/message.php?user_id=${sessionData.user}&action=${action}&type=${type}&page=${page}&itemsPerPage=${itemsPerPage}`);
      break;
    case 'sent':
      response = await fetch(`../engine/message.php?user_id=${sessionData.user}&action=${action}&type=${type}&page=${page}&itemsPerPage=${itemsPerPage}`);
      break;
    case 'tenants':
      response = await fetch(`../engine/tenants.php?user=${sessionData.user}&action=get&page=${page}&itemsPerPage=12`);
      break;
    case 'payments':
      response = await fetch(`../engine/payments.php?user=${sessionData.user}&action=get&page=${page}&itemsPerPage=${itemsPerPage}`);
      break;
    default:
      return null; // Handle invalid pageType
  }
  return await response.json();
} catch (error) {
  console.error('Error during fetching:', error);
} finally {
  hideLoadingIndicator(); // Hide loading indicator
}};

// Update the UI of a table based on fetched data
const updateTableUI = (data, tableId) => {
  const table = document.getElementById(tableId);
  table.innerHTML = '';

  const fragment = document.createDocumentFragment();
  //get the index for the item numbering, or we can do this from the database.
  let index = 1;

  data.items.forEach(item => {
    // Generate table row based on item data
    const row = generateTableRow(item, tableId, index);
    const newRow = document.createElement('tr');
    newRow.innerHTML = row;
    fragment.appendChild(newRow);
    
    // Increment the index for the next item
    index++;
  });
  table.appendChild(fragment);

  // Update pagination info (start, end, total)
  updatePaginationInfo(data);

  // Update pagination controls
  updatePaginationControls(data);
};

// Helper function to generate table row HTML
const generateTableRow = (item, tableId, index) => {
  if (tableId === 'listings-table') {
    // Logic for listings table row
    const urls = JSON.parse(item.images);
    const imageSrc = urls['profile-pic'];
    // Define the document root of your web server
    const documentRoot = 'C:\\wamp64\\www\\findhousequick';
    // Remove the document root from the beginning of the file path
    let filePath = imageSrc.replace(documentRoot, '');

    // Replace backslashes with forward slashes
    filePath = filePath.replace(/\\/g, '/');

    // Prepend '../' to the file path
    const relativePath = '../' + filePath;

    return `
      <tr class="text-sm text-gray-800 font-medium border-b border-gray-200 hover:bg-gray-100">
        <td class="py-4">${index}</td>
        <td class="py-4"><img src="${relativePath}" class="w-20 h-20 bg-slate-500" alt="Image"></td>
        <td class="py-4">${item.description}</td>
        <td class="py-4">${item.address}</td>
        <td class="py-4"><span class="inline-block ${item.status.toLowerCase() === 'available' ? 'bg-success' : 'bg-error'} text-white py-1.5 px-3 rounded-md">${item.status.toUpperCase()}</span></td>
        <td class="py-4"><a href="#" class="inline-block bg-primary text-white py-1.5 px-2 rounded-md"><i class="fas fa-edit h-4 w-4"></i></a><a href="#" class="ml-2 inline-block bg-error text-white py-1.5 px-2 rounded-md"><i class="fas fa-trash-alt h-4 w-4"></i></a></td>
      </tr>
    `;
  } else if (tableId === 'tenants-table') {
    // Logic for tenants table row
    return `
      <tr class="text-sm text-gray-800 font-medium border-b border-gray-200 hover:bg-gray-100">
        <td class="py-4">${index}</td>
        <td class="py-4">${item.first_name} ${item.last_name}</td>
        <td class="py-4">${item.phone}</td>
        <td class="py-4">${item.tenant_email}</td>
        <td class="py-4">${item.property_address}</td>
        <td class="py-4">${item.tenancy_start_date}</td>
        <td class="py-4">${item.tenancy_end_date}</td>

        <td class="py-4"><a href="#" class="inline-block bg-primary text-white py-1.5 px-2 rounded-md"><i class="fas fa-edit h-4 w-4"></i></a><a href="#" class="ml-2 inline-block bg-error text-white py-1.5 px-2 rounded-md"><i class="fas fa-trash-alt h-4 w-4"></i></a></td>
      </tr>
    `;
  } else if (tableId === 'messages-table') {
    // Logic for messages table row
    return `
      <tr class="text-sm text-gray-800 font-medium border-b border-gray-200 hover:bg-gray-100">
        <td class="py-4">${index}</td>
        <td class="py-4">${item.message_subject}</td>
        <td class="py-4"></td>
        <td class="py-4">${item.sent_at}</td>
        <td class="py-4"><span class="inline-block ${item.is_read === 0 ? 'bg-success' : 'bg-gray-200'} text-white py-1.5 px-3 rounded-md">${item.is_read === 0 ? 'unread': 'read'}</span></td>
        <td class="py-4">
        <a href="read_message.php?id=${item.id}" class="inline-block bg-primary text-white py-1.5 px-2 rounded-md">  <i class="fas fa-edit h-4 w-4"></i> read</a> 
        <a href="#" class="ml-2 inline-block bg-error text-white py-1.5 px-2 rounded-md"><i class="fas fa-trash-alt h-4 w-4"></i>delete</a></td>
      </tr>
    `;
  } else {
    // Handle other table types or return an empty row
    return '';
  }
};

// Update pagination info (start, end, total)
const updatePaginationInfo = (data) => {
  document.getElementById('start-index').textContent = (data.currentPage - 1) * data.itemsPerPage + 1;
  document.getElementById('end-index').textContent = Math.min(data.currentPage * data.itemsPerPage, data.totalItems);
  document.getElementById('total-items').textContent = data.totalItems;
};

// Update pagination controls for a given data object
const updatePaginationControls = (data) => {
  const paginationControls = document.getElementById('pagination-controls');
  paginationControls.innerHTML = '';

  const currentPage = data.currentPage;
  const totalPages = data.totalPages;
  const maxPageNumbersToShow = 5;

  const createPageButton = (page, isCurrent = false) => {
    const button = document.createElement('button');
    button.textContent = page;
    button.classList.add('px-4', 'py-2', 'mx-4', 'rounded-md');
    button.classList.add(isCurrent ? 'bg-primary' : 'bg-gray-200');
    button.addEventListener('click', () => loadPage(page, data.pageType, data.type, data.action, data.table));
    return button;
  };

  // Create "Previous" button
  const prevButton = document.createElement('button');
  prevButton.textContent = '« Previous';
  prevButton.classList.add('px-4', 'py-2', 'mx-1', 'rounded-md', 'bg-gray-200');
  prevButton.disabled = currentPage === 1;
  prevButton.addEventListener('click', () => {
    if (currentPage > 1) {
      loadPage(currentPage - 1, data.pageType, data.type, data.action, data.table);
    }
  });
  paginationControls.appendChild(prevButton);

  if (totalPages <= maxPageNumbersToShow) {
    for (let i = 1; i <= totalPages; i++) {
      paginationControls.appendChild(createPageButton(i, i === currentPage));
    }
  } else {
    paginationControls.appendChild(createPageButton(1, currentPage === 1));

    if (currentPage > Math.ceil(maxPageNumbersToShow / 2)) {
      const ellipsis = document.createElement('span');
      ellipsis.textContent = '...';
      ellipsis.classList.add('px-4', 'py-2', 'mx-1');
      paginationControls.appendChild(ellipsis);
    }

    const startPage = Math.max(2, currentPage - 2);
    const endPage = Math.min(totalPages - 1, currentPage + 2);

    for (let i = startPage; i <= endPage; i++) {
      paginationControls.appendChild(createPageButton(i, i === currentPage));
    }

    if (currentPage < totalPages - Math.floor(maxPageNumbersToShow / 2)) {
      const ellipsis = document.createElement('span');
      ellipsis.textContent = '...';
      ellipsis.classList.add('px-4', 'py-2', 'mx-1');
      paginationControls.appendChild(ellipsis);
    }

    paginationControls.appendChild(createPageButton(totalPages, currentPage === totalPages));
  }

  // Create "Next" button
  const nextButton = document.createElement('button');
  nextButton.textContent = 'Next »';
  nextButton.classList.add('px-4', 'py-2', 'rounded-md', 'bg-gray-200');
  nextButton.disabled = currentPage === totalPages;
  nextButton.addEventListener('click', () => {
    if (currentPage < totalPages) {
      loadPage(currentPage + 1, data.pageType, data.type, data.action, data.table);
    }
  });
  paginationControls.appendChild(nextButton);
};

const updateUIForPage = async (pageName) => {
  showLoadingIndicator(); // Show loading indicator
  try {
    await main(); // Fetch session and profile data

    switch (pageName) {
      case 'dashboard':
        document.getElementById('total_listings').innerHTML = listingsData.totalItems
        document.getElementById('total_tenants').innerHTML = tenantsData.totalItems
        break;
      case 'profile':
        // Update profile UI using profileData (no pagination here)
        document.getElementById('profile-name').innerHTML = profileData.first_name + ' ' + profileData.last_name;
        document.getElementById('email').innerHTML = profileData.email;
        document.getElementById('employment-status').innerHTML = profileData.employment_status;
        document.getElementById('lga').innerHTML = profileData.lgas;
        document.getElementById('religion').innerHTML = profileData.religion;
        document.getElementById('state').innerHTML = profileData.state;
        document.getElementById('first-name').innerHTML = profileData.first_name;
        document.getElementById('last-name').innerHTML = profileData.last_name;
        document.getElementById('phone').innerHTML = profileData.phone;
        document.getElementById('gender').innerHTML = profileData.sex;
        document.getElementById('marital-status').innerHTML = profileData.marital_status;
        break;
      case 'inbox':
        const inboxData = await fetchData('inbox', 'received', 'get_all');
        inboxData.pageType = 'inbox';
        inboxData.type = 'received';
        inboxData.action = 'get_all';
        updateTableUI(inboxData, 'messages-table'); 
        break;
      case 'sent':
        const sentData = await fetchData('sent', 'sent', 'get_all');
        sentData.pageType = 'sent';
        sentData.type = 'sent';
        sentData.action = 'get_all';
        updateTableUI(sentData, 'messages-table');
        break;
      case 'view_tenants':
        const tenantsData = await fetchData('tenants',null, 'get');
        tenantsData.pageType = 'tenants';
        tenantsData.table = 'tenants-table'
        updateTableUI(tenantsData, 'tenants-table'); 
        break;
      case 'view_listings':
        const listingsData = await fetchData('listings');
        listingsData.pageType = 'listings';
        updateTableUI(listingsData, 'listings-table'); 
        break;
      case 'edit_profile':
        populateStates();
        document.getElementById('state-dropdown').addEventListener('change', function() {
    const stateValue = this.value;
    if (stateValue) {
        populateLGAs(stateValue);
    } else {
        document.getElementById('lga-dropdown').innerHTML = '<option value="">Select an LGA</option>';
    }
}); 
        document.getElementById('profile-name').innerHTML = profileData.first_name + ' ' + profileData.last_name;
        const first_name = document.getElementById('first-name');
        const last_name = document.getElementById('last-name');
        const email = document.getElementById('email');
        const phone = document.getElementById('phone');
        const address = document.getElementById('address');
        const dob = document.getElementById('dob')
        first_name.value = profileData.first_name;
        first_name.readOnly = true;
        last_name.placeholder = profileData.last_name;
        last_name.disabled = true;
        email.value = profileData.email;
        email.disabled = true;
        address.value = profileData.address;
        phone.value = profileData.phone;
        phone.disabled = true;

        break;
      // ... (Other page cases) ... 
    }
  } catch (error) {
    console.error('Error during updating UI:', error);
  } finally {
    hideLoadingIndicator(); // Hide loading indicator
  }
};
// Handle page loading
const loadPage = async (page, pageType, type = null, action = null, table) => {
  currentPage = page;
  const data = await fetchData(pageType, type, action, page);
  data.pageType = pageType;
  data.type = type;
  data.action = action;
  updateTableUI(data, table); // Assuming 'listings-table' is the default for listings, tenants, and messages.
};
//const DROPDOWN_SERVER_URL = 'dropdown_server.php';

async function fetchOptions(action, stateId = null) {
    const data = { action };
    if (stateId) data.state_id = stateId;

    try {
        const response = await fetch('../engine/dropdown_server.php', {
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
    //console.log(states);
    populateDropdown('state-dropdown', states, 'state_name');
}

async function populateLGAs(stateId) {
    const lgas = await fetchOptions('get_lgas', stateId);
    populateDropdown('lga-dropdown', lgas, 'lga_name');
}



//window.onload = populateStates;

// Ensure the main function runs after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', async () => {
  await main();
  document.getElementById('profile-n').innerHTML=profileData.first_name + ' ' + profileData.last_name;
  // Update UI based on initial hash value
  const initialPageName = window.location.hash.slice(1);
  updateUIForPage(initialPageName);

  // Listen for hashchange event
  window.addEventListener('hashchange', () => {
    const newPageName = window.location.hash.slice(1);
    updateUIForPage(newPageName);
  });
});