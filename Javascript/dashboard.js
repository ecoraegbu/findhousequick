let sessionData, profileData, listingsData;
let currentPage = 1;
const itemsPerPage = 6;

// Main function to control the flow
const main = async () => {
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

    // 4. Fetch Message Data (uses user ID from session)
    const receivedMessageResponse = await fetch(`../engine/message.php?recipient_id=${sessionData.user}&action=get_all`);
    receivedMessages = await receivedMessageResponse.json();
    console.log(receivedMessages);

  } catch (error) {
    console.error('Error during fetching:', error);
  }
};

const fetchListings = async (page) => {
  const listingsResponse = await fetch(`../engine/property.php?user=${sessionData.user}&action=get&page=${page}&itemsPerPage=${itemsPerPage}`);
  return await listingsResponse.json();
};
// other fetches would be done here


const updateListingsUI = (listingsData) => {
  const listingsFragment = document.createDocumentFragment();
  const listingsTable = document.getElementById("listings-table");
  
  // Clear existing rows
  listingsTable.innerHTML = '';

  listingsData.items.forEach(data => {
    const urls = JSON.parse(data.images);
    const imageSrc = urls['profile-pic'];

    // Define the document root of your web server
    const documentRoot = 'C:\\wamp64\\www\\findhousequick';

    // Remove the document root from the beginning of the file path
    let filePath = imageSrc.replace(documentRoot, '');

    // Replace backslashes with forward slashes
    filePath = filePath.replace(/\\/g, '/');

    // Prepend '../' to the file path
    const relativePath = '../' + filePath;
    const row = `
      <tr class="text-sm text-gray-800 font-medium border-b border-gray-200 hover:bg-gray-100">
        <td class="py-4">${data.id}</td>
        <td class="py-4"><img src="${relativePath}" class="w-20 h-20 bg-slate-500" alt="Image"></td>
        <td class="py-4">${data.description}</td>
        <td class="py-4">${data.address}</td>
        <td class="py-4"><span class="inline-block ${data.status.toLowerCase() === 'available' ? 'bg-success' : 'bg-error'} text-white py-1.5 px-3 rounded-md">${data.status.toUpperCase()}</span></td>
        <td class="py-4"><a href="#" class="inline-block bg-primary text-white py-1.5 px-2 rounded-md"><i class="fas fa-edit h-4 w-4"></i></a><a href="#" class="ml-2 inline-block bg-error text-white py-1.5 px-2 rounded-md"><i class="fas fa-trash-alt h-4 w-4"></i></a></td>
      </tr>`;
  
    // Insert row directly into "listings-table"
    const newRow = document.createElement('tr');
    newRow.innerHTML = row;
    listingsFragment.appendChild(newRow);
  });

  listingsTable.appendChild(listingsFragment);

  // Update pagination info
  document.getElementById('start-index').textContent = (listingsData.currentPage - 1) * listingsData.itemsPerPage + 1;
  document.getElementById('end-index').textContent = Math.min(listingsData.currentPage * listingsData.itemsPerPage, listingsData.totalItems);
  document.getElementById('total-items').textContent = listingsData.totalItems;

  // Update pagination controls
  updatePaginationControls(listingsData);
};

//other ui updates would be done here

const updatePaginationControls = (listingsData) => {
  const paginationControls = document.getElementById('pagination-controls');
  paginationControls.innerHTML = '';

  const currentPage = listingsData.currentPage;
  const totalPages = listingsData.totalPages;
  const maxPageNumbersToShow = 5;

  const createPageButton = (page, isCurrent = false) => {
      const button = document.createElement('button');
      button.textContent = page;
      button.classList.add('px-4', 'py-2', 'mx-4', 'rounded-md');
      button.classList.add(isCurrent ? 'bg-primary' : 'bg-gray-200');
      button.addEventListener('click', () => loadPage(page));
      return button;
  };

  // Create "Previous" button
  const prevButton = document.createElement('button');
  prevButton.textContent = '« Previous';
  prevButton.classList.add('px-4', 'py-2', 'mx-1', 'rounded-md', 'bg-gray-200');
  prevButton.disabled = currentPage === 1;
  prevButton.addEventListener('click', () => {
      if (currentPage > 1) {
          loadPage(currentPage - 1);
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
          loadPage(currentPage + 1);
      }
  });
  paginationControls.appendChild(nextButton);
};

const loadPage = async (page) => {
  currentPage = page;
  const listingsData = await fetchListings(page);
  updateListingsUI(listingsData);
};


// Function to update the UI for a specific page
const updateUIForPage = async (pageName) => {
  await main(); // Fetch all necessary data before updating UI
  switch (pageName) {
    case 'profile':
      document.getElementById('profile-name').innerHTML = profileData.first_name + ' ' + profileData.last_name;
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
      break;
    case 'change_password':
      // Code to update the UI for the 'change_password' page
      break;
    case 'update_profile':
      // Code to update the UI for the 'update_profile' page
      break;
    case 'new_property':
      // Code to update the UI for the 'new_property' page
      break;
    case 'view_tenants':
      // Code to update the UI for the 'view_tenants' page
      break;
    case 'view_listings':
      await loadPage(1);
      break;
    case 'messages':
      // Code to update the UI for the 'messages' page
      break;
    case 'view_complaints':
      // Code to update the UI for the 'view_complaints' page
      break;
    case 'issue_notices':
      // Code to update the UI for the 'issue_notices' page
      break;
    case 'payments':
      // Code to update the UI for the 'payments' page
      break;
    default:
      // Handle unknown page names or do nothing
      break;
  }
};

// Ensure the main function runs after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', async () => {
  await main();

  // Update UI based on initial hash value
  const initialPageName = window.location.hash.slice(1);
  updateUIForPage(initialPageName);

  // Listen for hashchange event
  window.addEventListener('hashchange', () => {
    const newPageName = window.location.hash.slice(1);
    updateUIForPage(newPageName);
  });
});