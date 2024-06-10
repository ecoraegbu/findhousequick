// property_preview.js
document.addEventListener('DOMContentLoaded', function() {
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
        //renderPropertyDetails(data);
        console.log(data);
      })
      .catch(error => console.error('Error fetching property details:', error));
  }
  
  function fetchSimilarProperties(propertyId) {
    // the issue here is that the view more button is called within a function. it has to have access to the parameters from
    // property to be able to redirect properly to the listings.php page.
    // what we should do would be to add an event listener that would listen for click on the button and call a function 
    // which would fetch the property id and cause the redirect appropriately.
    let currentPage = 1;
    const pageSize = 5; // Number of similar properties to fetch per page
  
    fetchProperties(currentPage, pageSize, 'similar', propertyId);
  
    const viewMoreButton = document.getElementById('view_more');
    viewMoreButton.addEventListener('click', () => {
      const url = new URL('listings.php', window.location.origin);
      url.searchParams.append('type', 'similar');
      url.searchParams.append('propertyId', propertyId);
      window.location.href = url.toString();
    });
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
        //renderProperties(data, propertyContainer, type === 'similar');
        console.log(data)
      })
      .catch(error => console.error('Error fetching property data:', error));
  }