document.addEventListener('DOMContentLoaded', function() {
  const url = new URL(window.location.href);
  const urlParams = new URLSearchParams(url.search);
  const propertyId = urlParams.get('propertyId');
  const type = urlParams.get('type');
  const userId = urlParams.get('user');
  
  //get the applyfilters button
  const apply_filter = document.getElementById('apply_filter');
  apply_filter.addEventListener('click', function(event) {
      event.preventDefault();
      //call the filters function
      applyFilters();
  });

  fetchProperties(type, propertyId, userId); // Pass the userId to the fetchProperties function
  //add an event listener on the apply filters button
});

function applyFilters() {
  // Get the values of the filter form fields
  const type = document.getElementById('type').value;
  const status = document.getElementById('status').value;
  const location = document.getElementById('location').value;
  const room = document.getElementById('room').value;
  const bedroom = document.getElementById('bedroom').value;
  const toilet = document.getElementById('toilet').value;
  const from = document.getElementById('from').value;
  const to = document.getElementById('to').value;

  // Construct the URL with the filter parameters
  let page = 1;
  const pageSize = 20;
  const url = new URL('findhousequick/engine/property_server.php', window.location.origin);
  url.searchParams.append('page', page);
  url.searchParams.append('pageSize', pageSize);
  url.searchParams.append('type', 'filter');
  url.searchParams.append('propertyType', type);
  url.searchParams.append('status', status);
  url.searchParams.append('location', location);
  url.searchParams.append('room', room);
  url.searchParams.append('bedroom', bedroom);
  url.searchParams.append('toilet', toilet);
  url.searchParams.append('from', from);
  url.searchParams.append('to', to);

  // Send the request and handle the response
  fetch(url)
      .then(response => response.json())
      .then(data => {
          const propertyContainer = document.getElementById('listing');
          renderProperties(data, propertyContainer);
      })
      .catch(error => console.error('Error fetching property data:', error));
}

function fetchProperties(type, propertyId, userId) {
  let page = 1;
  const pageSize = 20;
  const url = new URL('findhousequick/engine/property_server.php', window.location.origin);
  url.searchParams.append('page', page);
  url.searchParams.append('pageSize', pageSize);
  url.searchParams.append('type', type);
  url.searchParams.append('propertyId', propertyId);
  url.searchParams.append('userId', userId); // Append the userId to the URL's query parameters

  fetch(url)
      .then(response => response.json())
      .then(data => {
          
          const propertyContainer = document.getElementById('listing');
          renderProperties(data, propertyContainer);
      })
      .catch(error => console.error('Error fetching property data:', error));
}

function renderProperties(data, container) {
  const result_info = document.getElementById('result_info');
  const result_info1 = document.getElementById('result_info1');
  const result_info2 = document.getElementById('result_info2');
  container.innerHTML = ''; // Clear the container
  let html = '';
  if(data === 0){
    result_info1.innerHTML = 'Sorry! No Result Found for This Search';
    result_info2.innerHTML = 'Try Searching for Something Else.'

  }else{
    result_info1.innerHTML = 'Showing Results for Search';
    result_info2.innerHTML = 'Try other searches.'
    data.forEach((property) => {
      const images = JSON.parse(property.images);
      // Remove the document root from the beginning of the file path
      const getRelativePath = (filePath) => filePath.replace(/^.*?(\/?uploads)/, '$1');

      html += `
     <div class="shadow-card p-4 rounded-lg bg-white group hover:-translate-y-4 transition-all">
     <div class="relative">
       <img src="../${getRelativePath(images['profile-pic'])}" class="aspect-square object-cover rounded-lg" alt="${property.type}">
       <div class="w-full h-full bg-black bg-opacity-50 opacity-0  group-hover:opacity-100 absolute inset-0 rounded-lg p-2 transition-all">
         <div class="flex flex-wrap gap-1">
           <span class="bg-primary text-white px-2 py-1.5 text-sm rounded-md">${property.status}</span>
           <span class="bg-success text-white px-2 py-1.5 text-sm rounded-md">${property.purpose}</span>
         </div>
       </div>
     </div>
      <a href="preview.php?property=${property.id}"" class="block mt-3 text-text hover:text-opacity-80 font-semibold text-xl truncate" title="${property.type}">${property.type}</a>
     <p class="text-sm text-gray-400 -mt-1">${property.city}, ${property.state}</p>
      <p class="text-primary font-semibold mt-1 text-xl">&#x20A6;${property.price} <small class="text-gray-500 font-normal">/yearly</small>
     </p>
   </div>
     `;
  });
  container.innerHTML = html;
  }

}