// home.js
document.addEventListener('DOMContentLoaded', function() {
  let currentPage = 1;
  const pageSize = 20; // Number of properties to fetch per page
  fetchProperties(currentPage, pageSize);

  const viewMoreButton = document.getElementById('view_more');
  viewMoreButton.addEventListener('click', () => {
    currentPage++;
    fetchProperties(currentPage, pageSize);
  });
});

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
        <a href="preview.php?property=${id}" class="block mt-3 text-text hover:text-opacity-80 font-semibold text-xl truncate" title="${type}, ${city}">${type}, ${city}.</a>
        <p class="text-sm text-gray-400 -mt-1">${city}, ${state}</p>
        <p class="text-primary font-semibold mt-1 text-xl">&#x20A6;${Number(price).toLocaleString()}</p>
      </div>
    `;

    container.innerHTML += propertyCard;
  });
}