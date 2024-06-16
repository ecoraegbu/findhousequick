// home.js
document.addEventListener('DOMContentLoaded', function() {
  fetch('../engine/session.php')
    .then(response => response.json())
    .then(data => {
      if (data.user) {
        userId = data.user;
      } else {
        userId = null;
      }
      if (data.coordinates && !data.updated_coordinates) {
        showModal(data.coordinates);
      }
    });

  let currentPage = 1;
  const pageSize = 20; // Number of properties to fetch per page
  fetchProperties(currentPage, pageSize);

  const viewMoreButton = document.getElementById('view_more');
  viewMoreButton.addEventListener('click', () => {
    currentPage++;
    fetchProperties(currentPage, pageSize);
  });
});

const modalElement = document.getElementById('modalOverlay');
const modalmessage = document.getElementById('modalmessage');
const no_button = document.getElementById('noBtn');
const yes_button = document.getElementById('yesBtn');

function showModal(coordinates) {
  fetch('../engine/location.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ latitude: coordinates['latitude'], longitude: coordinates['longitude'] })
  })
  .then(response => response.json())
  .then(data => {
    if (data.message) {
      const message = `Your location is required to serve you with properties within your vicinity. Currently, you have your location set at ${data.message}. If this is not your correct location, Please click "No" to set it to your correct location using the Map feature on the Home page. Click "Yes" to set it to this current location.`;
      modalmessage.textContent = message;
      modalElement.classList.remove('hidden');

      // Add event listeners to the yes and no buttons
      no_button.addEventListener('click', handleNoButtonClick);
      yes_button.addEventListener('click', handleYesButtonClick.bind(null, coordinates));
    }
  });
}

function hideModal() {
  modalElement.classList.add('hidden');
}

function handleNoButtonClick() {
  triggerFullscreen();
  // make the map full screen
  hideModal();
}

function handleYesButtonClick(coordinates) {
  // Send a request to ../engine/session.php with the user's location coordinates
  fetch('../engine/session.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(coordinates)
  })
  .then(response => {
    if (response.ok) {
      // Handle successful response
      console.log('Location coordinates updated successfully');
    } else {
      // Handle error
      console.error('Error updating location coordinates');
    }
    hideModal();
  })
  .catch(error => {
    console.error('Error updating location coordinates:', error);
    hideModal();
  });
}

// ... (Other functions, such as fetchProperties and renderProperties)
function fetchProperties(page, pageSize) {
  const url = new URL('findhousequick/engine/property_server.php', window.location.origin);
  url.searchParams.append('page', page);
  url.searchParams.append('pageSize', pageSize);
  url.searchParams.append('type', 'all'); // Include the type parameter

  fetch(url)
    .then(response => response.json())
    .then(data => {
      const propertyContainer = document.getElementById('property_display');
      renderProperties(data, propertyContainer);
    })
    .catch(error => console.error('Error fetching property data:', error));
}

function renderProperties(properties, container) {
  properties.forEach(property => {
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
    const relativePath = '..' + filePath;

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



