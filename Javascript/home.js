document.addEventListener('DOMContentLoaded', () => {
  // Fetch session data
  fetchSessionData();

  // Initialize pagination variables
  let currentPage = 1;
  const pageSize = 20;

  // Fetch properties for the initial page
  fetchProperties(currentPage, pageSize);

  // Add event listener for view more button
  const viewMoreButton = document.getElementById('view_more');
  viewMoreButton.addEventListener('click', () => {
    currentPage++;
    fetchProperties(currentPage, pageSize);
  });
});

// Modal elements
const modalElement = document.getElementById('modalOverlay');
const modalMessage = document.getElementById('modalmessage');
const noButton = document.getElementById('noBtn');
const yesButton = document.getElementById('yesBtn');

// Global userId variable
let userId = null;

// Fetch session data and handle location modal
async function fetchSessionData() {
  try {
    const response = await fetch('../engine/session.php');
    const data = await response.json();

    // Set userId if available
    if (data.user) {
      userId = data.user;
    }

    // Show location modal if coordinates are present and not updated
    if (data.coordinates && !data.updated_coordinates) {
      showModal(data.coordinates);
    }
  } catch (error) {
    console.error('Error fetching session data:', error);
  }
}

// Show the location modal
async function showModal(coordinates) {
  try {
    const response = await fetch('../engine/location.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ latitude: coordinates.latitude, longitude: coordinates.longitude }),
    });
    const data = await response.json();

    if (data.message) {
      const message = `Your location is required to serve you with properties within your vicinity. Currently, you have your location set at ${data.message}. If this is not your correct location, Please click "No" to set it to your correct location using the Map feature on the Home page. Click "Yes" to set it to this current location.`;
      modalMessage.textContent = message;
      modalElement.classList.remove('hidden');

      // Add event listeners to the buttons
      noButton.addEventListener('click', handleNoButtonClick);
      yesButton.addEventListener('click', handleYesButtonClick.bind(null, coordinates, 'put', 'updated_coordinates')); // Added specifier
    }
  } catch (error) {
    console.error('Error fetching location data:', error);
  }
}

// Hide the location modal
function hideModal() {
  modalElement.classList.add('hidden');
}

// Handle 'No' button click
function handleNoButtonClick() {
  triggerFullscreen(); // Make the map full screen
  hideModal();
}

// Handle 'Yes' button click
async function handleYesButtonClick(coordinates, action, specifier) {
  try {
    const response = await fetch('../engine/session.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ coordinates, action, specifier }), // Added specifier
    });

    if (response.ok) {
      console.log('Location coordinates updated successfully');
    } else {
      console.error('Error updating location coordinates');
    }
    hideModal();
  } catch (error) {
    console.error('Error updating location coordinates:', error);
    hideModal();
  }
}

// Fetch properties based on page and page size
async function fetchProperties(page, pageSize) {
  try {
    const url = new URL('findhousequick/engine/property_server.php', window.location.origin);
    url.searchParams.append('page', page);
    url.searchParams.append('pageSize', pageSize);
    url.searchParams.append('type', 'all'); // Include the type parameter

    const response = await fetch(url);
    const properties = await response.json();

    const propertyContainer = document.getElementById('property_display');
    renderProperties(properties, propertyContainer);
  } catch (error) {
    console.error('Error fetching property data:', error);
  }
}

// Render properties in the container
function renderProperties(properties, container) {
  container.innerHTML = ''; // Clear previous properties

  properties.forEach((property) => {
    const { id, type, city, state, price, status, purpose, images } = property;
    const urls = JSON.parse(images);
    const imageSrc = urls['profile-pic'];

    // Define the document root of your web server
    const documentRoot = 'C:\\wamp64\\www\\findhousequick';

    // Remove the document root from the beginning of the file path
    let filePath = imageSrc.replace(documentRoot, '');

    // Replace backslashes with forward slashes
    filePath = filePath.replace(/\\/g, '/');

    // Prepend '../' to the file path
    const relativePath = '../' + filePath;

    const propertyCard = `
      <div class="p-3 rounded-lg bg-white group transition-all">
        <div class="relative">
          <img src="${relativePath}" class="aspect-video object-cover w-full rounded-lg" alt="${type}">
          <div class="w-full h-full bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 absolute inset-0 rounded-lg p-2 transition-all">
            <div class="flex flex-wrap gap-1">
              <span class="bg-primary text-white px-2 py-1.5 text-xs rounded-md">${status}</span>
              <span class="bg-success text-white px-2 py-1.5 text-xs rounded-md">${purpose}</span>
            </div>
          </div>
        </div>
        <a href="preview.php?property=${id}&user=${userId}" class="block mt-3 text-text hover:text-opacity-80 font-semibold text-xl truncate" title="${type}, ${city}">${type}, ${city}.</a>
        <p class="text-sm text-gray-400 -mt-1">${city}, ${state}</p>
        <p class="text-primary font-semibold mt-1 text-xl">₦${Number(price).toLocaleString()}</p>
      </div>
    `;

    container.innerHTML += propertyCard;
  });
}