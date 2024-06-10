// property_preview.js
document.addEventListener('DOMContentLoaded', function() {
    window.onerror = function(errorMsg, url, lineNumber, column, errorObj) {
      // Log the error message, URL, line number, column number, and error object
      console.error('Error: ' + errorMsg);
      console.error('URL: ' + url);
      console.error('Line: ' + lineNumber);
      console.error('Column: ' + column);
      console.error('Error Object: ', errorObj);
    
      // Optionally, you can also display the error in an alert or other UI element
      alert('An error occurred: ' + errorMsg + ' at ' + url + ':' + lineNumber + ':' + column);
    
      // Return false to prevent the default error handling behavior (e.g., showing the error in the browser console)
      return false;
    };
    const viewMoreButton = document.getElementById('view_more');
    viewMoreButton.addEventListener('click', () => {
      const url = new URL('./listings.php', window.location.origin);
      url.searchParams.append('type', 'similar');
      url.searchParams.append('propertyId', propertyId);
      console.log(url.toString()); // Check the constructed URL
      window.location.assign(url.toString());
    });
      const urlParams = new URLSearchParams(window.location.search);
      const propertyId = urlParams.get('property');
    
      if (propertyId) {
        fetchPropertyDetails(propertyId);
        fetchSimilarProperties(propertyId);
      }
    });
    
    function fetchPropertyDetails(propertyId) {
      const url = new URL('findhousequick/engine/property_server.php', window.location.origin);
      url.searchParams.append('type', 'single');
      url.searchParams.append('propertyId', propertyId);
    
      fetch(url)
        .then(response => response.json())
        .then(data => {
          // Handle the fetched property details data
          renderPropertyDetails(data);
        })
        .catch(error => console.error('Error fetching property details:', error));
    }
    
    function fetchSimilarProperties(propertyId) {
      let currentPage = 1;
      const pageSize = 5; // Number of similar properties to fetch per page
    
      fetchProperties(currentPage, pageSize, 'similar', propertyId);
    
  
    }
    
    function fetchProperties(page, pageSize, type, propertyId) {
      const url = new URL('findhousequick/engine/property_server.php', window.location.origin);
      url.searchParams.append('page', page);
      url.searchParams.append('pageSize', pageSize);
      url.searchParams.append('type', type);
      url.searchParams.append('propertyId', propertyId);
    
      fetch(url)
        .then(response => response.json())
        .then(data => {
          const propertyContainer = document.getElementById('property_display');
          renderProperties(data, propertyContainer, type === 'similar');
        })
        .catch(error => console.error('Error fetching property data:', error));
    }
    
    function renderProperties(properties, container, isSimilar) {
      properties.forEach((property, index) => {
        const { id, type, city, state, price, status, purpose, images } = property;
        const urls = JSON.parse(images);
        const imageSrc = urls['profile-pic'];
    
        let filePath = imageSrc.replace('C:\\wamp64\\www\\findhousequick', '');
        filePath = filePath.replace(/\\/g, '/');
        const relativePath = '..' + filePath;
    
        const propertyCard = `
          <div class="swiper-slide border border-gray-100 p-4 rounded-lg bg-white ${isSimilar && index === 0 ? 'group' : ''}">
          <div class="relative">
          <img src="${relativePath}" class="aspect-video w-full object-cover rounded-lg" alt="${type}">
          <div class="w-full h-full bg-black bg-opacity-50 opacity-0  group-hover:opacity-100 absolute inset-0 rounded-lg p-2 transition-all">
            <div class="flex flex-wrap gap-1">
              <span class="bg-primary text-white px-2 py-1.5 text-sm rounded-md">${status}</span>
              <span class="bg-success text-white px-2 py-1.5 text-sm rounded-md">${purpose}</span>
            </div>
          </div>
        </div>
  
        <a href="preview.php?property=${id}" class="block mt-3 text-text hover:text-opacity-80 font-semibold text-xl truncate" title="${type}, ${city}">R${type}, ${city}</a>
        <p class="text-sm text-gray-400 -mt-1">${city}, ${state}</p>
  
        <p class="text-primary font-semibold mt-1 text-xl">&#x20A6;${Number(price).toLocaleString()} <small class="text-gray-500 font-normal"></small>
        </p>
          </div>
        `;
    
        container.innerHTML += propertyCard;
      });
    }
    
    function renderPropertyDetails(property) {
      // Clear previous content
      const propertyDetailsPreview = document.getElementById('property_details_preview');
      propertyDetailsPreview.innerHTML = '';
    
      const { id, type, city, state, price, status, purpose, description, toilets, bathrooms, bedrooms, images } = property;
      const urls = JSON.parse(images);
    
      // Define the document root of your web server
      const documentRoot = 'C:\\wamp64\\www\\findhousequick';
    
      // Populate property images and thumbnails
      let propertyImagesHtml = '';
      let propertyThumbnailsHtml = '';
    
      Object.entries(urls).forEach(([name, value], index) => {
        let filePath = value.replace(documentRoot, '');
        filePath = filePath.replace(/\\/g, '/');
        const relativePath = '..' + filePath;
      
        propertyImagesHtml += `
          <div class="swiper-slide">
            <img src="${relativePath}" class="w-full h-[460px] object-cover rounded-2xl" alt="${type}">
          </div>
        `;
      
        propertyThumbnailsHtml += `
          <div class="swiper-slide">
            <img src="${relativePath}" class="aspect-square w-24 object-cover rounded-md" alt="${type}">
          </div>
        `;
      });
    
      // Populate property details
      const propertyDetailsHtml = `
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-8">
          <!-- Slider with thumbnail -->
          <div id="property_images_display" class="">
            <div id="property_swiper_preview" class="swiper swiper-preview">
              <div id="property_slides" class="swiper-wrapper">
                ${propertyImagesHtml}
              </div>
            </div>
    
            <!-- Thumbnail use php to programmatically create the slide. for the number of pictures in the picture array/ the size of the array. -->
            <div id="property_thumbslider" thumbsSlider="" class="swiper swiper-thumb flex flex-wrap gap-4 mt-4">
              <div class="swiper-wrapper">
                ${propertyThumbnailsHtml}
              </div>
            </div>
          </div>
          <div id="property_details_display" class="">
    
            <!-- Status Card -->
            <div class="">
              <!-- Available -->
              <span class="bg-success-light text-success px-2 py-1.5 text-sm rounded-md">${status}</span>
              <!-- For Sale -->
              <span class="bg-primary-light text-primary px-2 py-1.5 text-sm rounded-md ml-2">${purpose}</span>
            </div>
    
            <h1 class="text-5xl text-text font-bold mt-4 mb-5">${type}, ${city}</h1>
            <p class="text-gray-600 font-light text-lg">${description}.</p>
    
            <div class="flex flex-wrap gap-4 mt-10">
              <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
                <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl">${toilets}</span>
                <span class="text-gray-600">Toilets</span>
              </div>
              <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
                <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl">${bathrooms}</span>
                <span class="text-gray-600">Bathrooms</span>
              </div>
              <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
                <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl">${bedrooms}</span>
                <span class="text-gray-600">Rooms</span>
              </div>
              <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
                <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl">08</span>
                <span class="text-gray-600">Parkings</span>
              </div>
              <div class="flex items-center gap-2 font-semibold border border-gray-200 px-2 py-2 rounded-lg">
                <span class="bg-primary text-white px-1.5 py-0.5 rounded-lg inline-block text-xl">03</span>
                <span class="text-gray-600">Sitting room</span>
              </div>
            </div>
    
            <div class="mt-10">
              <p class="text-primary text-2xl font-bold">${price} <small class="text-gray-500 font-normal">/ Per year</small></p>
            </div>
    
            <div class="mt-2">
              <a href="terms_and_condition.php" class="bg-primary text-white px-6 py-3 inline-block rounded-lg hover:bg-blue-600">Rent Now</a>
              <a href="book_inspection.php" class="bg-gray-100 text-primary px-6 py-3 inline-block rounded-lg ml-2 hover:bg-gray-200">Book Inspection</a>
            </div>
    
          </div>
        </div>
      `;
    
      propertyDetailsPreview.innerHTML = propertyDetailsHtml;
    }