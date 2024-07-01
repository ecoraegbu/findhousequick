// Constants
const API_BASE_URL = '../engine';
const ITEMS_PER_PAGE = 6;
const DROPDOWN_SERVER_URL = '../engine/dropdown_server.php';

// State
let sessionData, profileData;
let currentPage = 1;

// DOM Elements
const loadingIndicator = document.getElementById('loading-indicator');

// Utility Functions
const showLoading = () => loadingIndicator.style.display = 'flex';
const hideLoading = () => loadingIndicator.style.display = 'none';

const fetchJSON = async (url, options = {}) => {
  const response = await fetch(url, options);
  if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
  return response.json();
};

// API Functions
const checkLogin = () => fetchJSON(`${API_BASE_URL}/check_login.php`);
const getSessionData = () => fetchJSON(`${API_BASE_URL}/session.php`);
const getProfileData = (userId) => fetchJSON(`${API_BASE_URL}/profile.php?user=${userId}&action=get`);

const fetchPageData = async (pageType, type = null, action = null, page = currentPage) => {
    const endpoints = {
      listings: 'property.php',
      inbox: 'message.php',
      sent: 'message.php',
      tenants: 'tenants.php',
      payments: 'payments.php',
      // Add any other endpoints here
    };
  
    if (!endpoints[pageType]) {
      console.error(`Invalid page type: ${pageType}`);
      throw new Error(`Invalid page type: ${pageType}`);
    }
  
    const params = new URLSearchParams({
      user: sessionData.user,
      action: action || 'get',
      page: page.toString(),
      itemsPerPage: ITEMS_PER_PAGE.toString()
    });
  
    if (type) {
      params.append('type', type);
    }
  
    const url = `${API_BASE_URL}/${endpoints[pageType]}?${params}`;
    console.log('Fetching data from:', url); // For debugging
  
    try {
      const data = await fetchJSON(url);
      console.log('Received data:', data); // For debugging
      return data;
    } catch (error) {
      console.error('Error fetching page data:', error);
      throw error;
    }
  };

// UI Update Functions
const updateTableUI = (data, tableId) => {
  const table = document.getElementById(tableId);
  table.innerHTML = '';

  const fragment = document.createDocumentFragment();
  data.items.forEach((item, index) => {
    const row = document.createElement('tr');
    row.innerHTML = generateTableRow(item, tableId, index + 1);
    fragment.appendChild(row);
  });
  table.appendChild(fragment);

  updatePaginationInfo(data);
  updatePaginationControls({
    ...data,
    tableId: tableId
  });
};

const generateTableRow = (item, tableId, index) => {
  if (tableId === 'listings-table') {
    const urls = JSON.parse(item.images);
    const imageSrc = urls['profile-pic'];
    const filePath = imageSrc.replace('C:\\wamp64\\www\\findhousequick', '').replace(/\\/g, '/');
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
  }
  return '';
};

const updatePaginationInfo = (data) => {
  document.getElementById('start-index').textContent = (data.currentPage - 1) * data.itemsPerPage + 1;
  document.getElementById('end-index').textContent = Math.min(data.currentPage * data.itemsPerPage, data.totalItems);
  document.getElementById('total-items').textContent = data.totalItems;
};

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
      button.addEventListener('click', () => loadPage(page, data.pageType, data.type, data.action, data.tableId));
      return button;
    };

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
  showLoading();
  try {
    await main();

    const pageUpdaters = {
      dashboard: updateDashboard,
      profile: updateProfile,
      inbox: () => updateMessages('inbox', 'received', 'get_all'),
      sent: () => updateMessages('sent', 'sent', 'get_all'),
      view_tenants: () => updateTable('tenants', 'tenants-table'),
      view_listings: () => updateTable('listings', 'listings-table'),
      edit_profile: updateEditProfile
    };

    if (pageUpdaters[pageName]) {
      await pageUpdaters[pageName]();
    }
  } catch (error) {
    console.error('Error updating UI:', error);
  } finally {
    hideLoading();
  }
};

const updateDashboard = async () => {
  const [listingsData, tenantsData] = await Promise.all([
    fetchPageData('listings'),
    fetchPageData('tenants')
  ]);
  document.getElementById('total_listings').textContent = listingsData.totalItems;
  document.getElementById('total_tenants').textContent = tenantsData.totalItems;
};

const updateProfile = () => {
  const profileFields = [
    { id: 'profile-name', value: `${profileData.first_name} ${profileData.last_name}` },
    { id: 'email', value: profileData.email },
    { id: 'employment-status', value: profileData.employment_status },
    { id: 'lga', value: profileData.lgas },
    { id: 'religion', value: profileData.religion },
    { id: 'state', value: profileData.state },
    { id: 'first-name', value: profileData.first_name },
    { id: 'last-name', value: profileData.last_name },
    { id: 'phone', value: profileData.phone },
    { id: 'gender', value: profileData.sex },
    { id: 'marital-status', value: profileData.marital_status }
  ];

  profileFields.forEach(field => {
    const element = document.getElementById(field.id);
    if (element) {
      element.textContent = field.value;
    }
  });
};

const updateMessages = async (pageType, type, action) => {
  const data = await fetchPageData(pageType, type, action);
  updateTableUI(data, 'messages-table');
};

const updateTable = async (pageType, tableId) => {
  const data = await fetchPageData(pageType);
  updateTableUI(data, tableId);
};

const updateEditProfile = () => {
  populateStates();

  const stateDropdown = document.getElementById('state-dropdown');
  if (stateDropdown) {
    stateDropdown.addEventListener('change', function() {
      const stateValue = this.value;
      if (stateValue) {
        populateLGAs(stateValue);
      } else {
        document.getElementById('lga-dropdown').innerHTML = '<option value="">Select an LGA</option>';
      }
    });
  }

  const formFields = [
    { id: 'profile-name', value: `${profileData.first_name} ${profileData.last_name}` },
    { id: 'first-name', value: profileData.first_name, readonly: true },
    { id: 'last-name', value: profileData.last_name, disabled: true },
    { id: 'email', value: profileData.email, disabled: true },
    { id: 'phone', value: profileData.phone, disabled: true },
    { id: 'address', value: profileData.address },
    { id: 'dob', value: profileData.dob }
  ];

  formFields.forEach(field => {
    const element = document.getElementById(field.id);
    if (element) {
      element.value = field.value;
      if (field.readonly) element.readOnly = true;
      if (field.disabled) element.disabled = true;
    }
  });

  const form = document.getElementById('edit-profile-form');
  if (form) {
    form.addEventListener('submit', async (event) => {
      event.preventDefault();
      
      const updatedProfile = {
        address: document.getElementById('address').value,
        dob: document.getElementById('dob').value,
        state: document.getElementById('state-dropdown').value,
        lga: document.getElementById('lga-dropdown').value,
      };

      try {
        const response = await fetch(`${API_BASE_URL}/profile.php?user=${sessionData.user}&action=update`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(updatedProfile),
        });

        if (!response.ok) {
          throw new Error('Failed to update profile');
        }

        Object.assign(profileData, updatedProfile);
        alert('Profile updated successfully');
      } catch (error) {
        console.error('Error updating profile:', error);
        alert('Error updating profile. Please try again.');
      }
    });
  }
};

// Dropdown Population Functions
const fetchOptions = async (action, stateId = null) => {
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
};

const populateDropdown = (dropdownId, options, nameField) => {
  const dropdown = document.getElementById(dropdownId);
  dropdown.innerHTML = '<option value="">Select an option</option>';
  options.forEach(option => {
    const optionElement = document.createElement('option');
    optionElement.value = option.id;
    optionElement.textContent = option[nameField];
    dropdown.appendChild(optionElement);
  });
};

const populateStates = async () => {
  const states = await fetchOptions('get_states');
  populateDropdown('state-dropdown', states, 'state_name');
};

const populateLGAs = async (stateId) => {
  const lgas = await fetchOptions('get_lgas', stateId);
  populateDropdown('lga-dropdown', lgas, 'lga_name');
};

// Main Function
const main = async () => {
  try {
    const loginData = await checkLogin();
    if (!loginData.logged_in) {
      window.location.href = new URL('findhousequick/pages/login.php', window.location.origin);
      return;
    }

    sessionData = await getSessionData();
    profileData = await getProfileData(sessionData.user);

    document.getElementById('profile-n').textContent = `${profileData.first_name} ${profileData.last_name}`;
  } catch (error) {
    console.error('Error during initialization:', error);
  }
};

// Page Loading Function
const loadPage = async (page, pageType, type = null, action = null, tableId) => {
    try {
      currentPage = page;
      console.log(`Loading page ${page} for ${pageType}`); // For debugging
      const data = await fetchPageData(pageType, type, action, page);
      
      // Ensure all necessary properties are added to the data object
      data.pageType = pageType;
      data.type = type;
      data.action = action;
      data.tableId = tableId;
      
      updateTableUI(data, tableId);
    } catch (error) {
      console.error('Error loading page:', error);
      // Handle error (e.g., show error message to user)
    }
  };

// Event Listeners
document.addEventListener('DOMContentLoaded', async () => {
  await main();
  const initialPageName = window.location.hash.slice(1);
  updateUIForPage(initialPageName);

  window.addEventListener('hashchange', () => {
    const newPageName = window.location.hash.slice(1);
    updateUIForPage(newPageName);
  });
});