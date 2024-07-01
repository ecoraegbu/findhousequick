// Object to store ongoing fetch promises
const fetchPromises = new Map();

// Function to create a unique key for fetch promises
const createFetchKey = (endpoint, params = {}) => {
  return JSON.stringify({ endpoint, params });
};

// Generic fetch function with deduplication
const fetchWithDeduplication = async (endpoint, params = {}) => {
  const fetchKey = createFetchKey(endpoint, params);

  // Check if there's an ongoing fetch for this data
  if (fetchPromises.has(fetchKey)) {
    return fetchPromises.get(fetchKey);
  }

  // If not, create a new fetch promise
  const fetchPromise = fetch(endpoint, {
    method: 'GET',
    headers: { 'Content-Type': 'application/json' },
    // Add any necessary params to the URL
  })
    .then(response => response.json())
    .then(data => {
      // Remove the promise from fetchPromises
      fetchPromises.delete(fetchKey);
      return data;
    })
    .catch(error => {
      // Remove the promise from fetchPromises
      fetchPromises.delete(fetchKey);
      throw error;
    });

  // Store the promise in fetchPromises
  fetchPromises.set(fetchKey, fetchPromise);

  return fetchPromise;
};

// Specific fetch functions using fetchWithDeduplication
const fetchLoginStatus = () => fetchWithDeduplication('../engine/check_login.php');
const fetchSessionData = () => fetchWithDeduplication('../engine/session.php');
const fetchProfileData = (userId) => fetchWithDeduplication(`../engine/profile.php?user=${userId}&action=get`);
const fetchListings = (userId, page = 1) => fetchWithDeduplication(`../engine/property.php`, { user: userId, action: 'get', page, itemsPerPage });
const fetchTenants = (userId, page = 1) => fetchWithDeduplication(`../engine/tenants.php`, { user: userId, action: 'get', page, itemsPerPage: 12 });
const fetchMessages = (userId, type, action, page = 1) => fetchWithDeduplication(`../engine/message.php`, { user_id: userId, action, type, page, itemsPerPage });

// Main function to control the flow
const main = async () => {
  showLoadingIndicator();
  try {
    // Check login status
    const loginData = await fetchLoginStatus();

    if (!loginData.logged_in) {
      window.location.href = new URL('findhousequick/pages/login.php', window.location.origin);
      return;
    }

    // Fetch session and profile data
    const sessionData = await fetchSessionData();
    const profileData = await fetchProfileData(sessionData.user);

    // Update profile UI
    document.getElementById('profile-n').innerHTML = `${profileData.first_name} ${profileData.last_name}`;

    // Prefetch dashboard data
    prefetchDashboardData(sessionData.user);

  } catch (error) {
    console.error('Error during fetching:', error);
  } finally {
    hideLoadingIndicator();
  }
};

// Prefetch data for dashboard
const prefetchDashboardData = (userId) => {
  fetchListings(userId);
  fetchTenants(userId);
  fetchMessages(userId, 'received', 'get_all');
};

// Fetch data for a given pageType
const fetchData = async (pageType, type = null, action = null, page = currentPage) => {
  showLoadingIndicator();
  try {
    const sessionData = await fetchSessionData();
    let data;

    switch (pageType) {
      case 'listings':
        data = await fetchListings(sessionData.user, page);
        break;
      case 'inbox':
      case 'sent':
        data = await fetchMessages(sessionData.user, type, action, page);
        break;
      case 'tenants':
        data = await fetchTenants(sessionData.user, page);
        break;
      default:
        return null;
    }

    return data;
  } catch (error) {
    console.error('Error during fetching:', error);
  } finally {
    hideLoadingIndicator();
  }
};

// Update the UI of a table based on fetched data
const updateTableUI = (data, tableId) => {
  // ... (rest of the function remains the same)
};

// Update UI for a specific page
const updateUIForPage = async (pageName) => {
  showLoadingIndicator();
  try {
    const sessionData = await fetchSessionData();
    
    switch (pageName) {
      case 'dashboard':
        const [listingsData, tenantsData] = await Promise.all([
          fetchListings(sessionData.user),
          fetchTenants(sessionData.user)
        ]);
        document.getElementById('total_listings').innerHTML = listingsData ? listingsData.totalItems : 'N/A';
        document.getElementById('total_tenants').innerHTML = tenantsData ? tenantsData.totalItems : 'N/A';
        break;
      case 'profile':
        const profileData = await fetchProfileData(sessionData.user);
        document.getElementById('profile-name').innerHTML = `${profileData.first_name} ${profileData.last_name}`;
        // ... (update other profile fields)
        break;
      case 'inbox':
        const inboxData = await fetchData('inbox', 'received', 'get_all');
        updateTableUI(inboxData, 'messages-table');
        break;
      case 'sent':
        const sentData = await fetchData('sent', 'sent', 'get_all');
        updateTableUI(sentData, 'messages-table');
        break;
      case 'view_tenants':
        const tenantsData = await fetchData('tenants');
        updateTableUI(tenantsData, 'tenants-table');
        break;
      case 'view_listings':
        const listingsData = await fetchData('listings');
        updateTableUI(listingsData, 'listings-table');
        break;
    }
  } catch (error) {
    console.error('Error during updating UI:', error);
  } finally {
    hideLoadingIndicator();
  }
};

// Handle page loading
const loadPage = async (page, pageType, type = null, action = null, table) => {
  currentPage = page;
  const data = await fetchData(pageType, type, action, page);
  updateTableUI(data, table);
};

// Initialize the application
document.addEventListener('DOMContentLoaded', async () => {
  await main();
  
  const initialPageName = window.location.hash.slice(1);
  updateUIForPage(initialPageName);

  window.addEventListener('hashchange', () => {
    const newPageName = window.location.hash.slice(1);
    updateUIForPage(newPageName);
  });
});