// property_preview.js
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const propertyId = urlParams.get('property');
  // you have to get the user details if they exist otherwise return false
  const userId = urlParams.get('user');
    if (propertyId) {
      fetchPropertyDetails(propertyId);
      fetchProperties('similar', propertyId);
      const viewMoreButton = document.getElementById('view_more');
      viewMoreButton.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default action

        const url = new URL('listings.php', window.location.href);
        
        url.searchParams.append('type', 'similar');
        url.searchParams.append('propertyId', propertyId);
        window.location.href = url.toString();
    });
      if(userId){
        const book_inspection_button = document.getElementById('book_inspection');
        const rent_now_button = document.getElementById('rent_now');
        book_inspection_button.addEventListener('click',function(event){
          event.preventDefault();
          book_inspection(propertyId, userId);
        })
        rent_now_button.addEventListener('click', function(event){
          event.preventDefault();
          rent_now(propertyId, userId);
        })
      }else {
        //redirect to sign up. php but keep the property id so that after signing up the user can return to the page.

      }

    }
  });
  function book_inspection(propertyId){
    
    const url = new URL('book_inspection.php', window.location.href);
    url.searchParams.append(propertyId);
    window.location.href = url.toString();
  }
  function rent_now(propertyId){
    terms_and_condition.php
  }
  function fetchPropertyDetails(propertyId) {
    const url = new URL('findhousequick/engine/property_server.php', window.location.origin);
    url.searchParams.append('type', 'single');
    url.searchParams.append('propertyId', propertyId);
  
    fetch(url)
      .then(response => response.json())
      .then(data => {
        // Handle the fetched property details data
        const documentRoot = 'C:\\wamp64\\www\\findhousequick';
        const propertySliderElement = document.getElementById('property_slider');
        const propertySliderThumbnail = document.getElementById('property_slider_wrapper');
        const houseStatus = document.getElementById('house_status');
        const purpose = document.getElementById('purpose');
        const houseTypeCity = document.getElementById('house_type_city');
        const houseDecription = document.getElementById('house_decription');
        const toilets = document.getElementById('toilets');
        const bathrooms = document.getElementById('bathrooms');
        const bedrooms = document.getElementById('bedrooms');
        const housePrice = document.getElementById('price');
        const images = JSON.parse(data.images); 

        let propertySliderHTML = '';
        let propertySliderThumbnailHTML = '';

        // Check if images is an object
        if (typeof images === 'object' && images !== null) {
          // Iterate over the object's values
          Object.values(images).forEach(imagePath => {
            let filePath = imagePath.replace(documentRoot, '');
            // Replace backslashes with forward slashes
            filePath = filePath.replace(/\\/g, '/');
            // Prepend '../' to the file path
            const relativePath = '..' + filePath;

            propertySliderHTML += `
              <div class="swiper-slide">
                <img src="${relativePath}" class="w-full h-[460px] object-cover rounded-2xl" alt="">
              </div>
            `;
            propertySliderThumbnailHTML += `
              <div class="swiper-slide">
                <img src="${relativePath}" class="aspect-square w-24 object-cover rounded-md" alt="">
              </div>
            `;
          });
        } else {
          console.error('Error: images data is not an object');
        }

        propertySliderElement.innerHTML = propertySliderHTML;
        propertySliderThumbnail.innerHTML = propertySliderThumbnailHTML;
        houseStatus.innerHTML = data.status;
        purpose.innerHTML = data.purpose;
        houseTypeCity.innerHTML = data.type + " " + data.city;
        houseDecription.innerHTML = data.description;
        housePrice.innerHTML = data.price + `<small class="text-gray-500 font-normal">/ Per year</small>`;
        toilets.innerHTML = data.toilets;
        bathrooms.innerHTML = data.bathrooms;
        bedrooms.innerHTML = data.bedrooms;
      })
      .catch(error => console.error('Error fetching property details:', error));
  }
  function fetchProperties(type, propertyId) {
    let page = 1;
    const pageSize = 5; 
    const url = new URL('findhousequick/engine/property_server.php', window.location.origin);
    url.searchParams.append('page', page);
    url.searchParams.append('pageSize', pageSize);
    url.searchParams.append('type', type);
    url.searchParams.append('propertyId', propertyId);
  
    fetch(url)
      .then(response => response.json())
      .then(data => {
        const propertyContainer = document.getElementById('listing');
        renderProperties(data, propertyContainer);
      })
      .catch(error => console.error('Error fetching property data:', error));
  }
  function renderProperties(data, container) {
    container.innerHTML = ''; // Clear the container
  
    let html = '';
  
    data.forEach((property, index) => {
      const isFirstSlide = index === 0;
      const groupClass = isFirstSlide ? ' group' : '';
      const images = JSON.parse(property.images);
  
      // Remove the document root from the beginning of the file path
      const getRelativePath = (filePath) => filePath.replace(/^.*?(\/?uploads)/, '$1');
  
      html += `
        <div class="swiper-slide border border-gray-100 p-4 rounded-lg bg-white${groupClass}">
          <div class="relative">
            <img src="../${getRelativePath(images['profile-pic'])}" class="aspect-video w-full object-cover rounded-lg" alt="${property.type}">
            <div class="w-full h-full bg-black bg-opacity-50 opacity-0${groupClass ? ' group-hover:opacity-100' : ''} absolute inset-0 rounded-lg p-2 transition-all">
              <div class="flex flex-wrap gap-1">
                <span class="bg-primary text-white px-2 py-1.5 text-sm rounded-md">${property.status}</span>
                <span class="bg-success text-white px-2 py-1.5 text-sm rounded-md">${property.purpose}</span>
              </div>
            </div>
          </div>
  
          <a href="preview.php?property=${property.id}" class="block mt-3 text-text hover:text-opacity-80 font-semibold text-xl truncate" title="${property.type}">${property.type}</a>
          <p class="text-sm text-gray-400 -mt-1">${property.city}, ${property.state}</p>
  
          <p class="text-primary font-semibold mt-1 text-xl">${property.price} <small class="text-gray-500 font-normal">/yearly</small></p>
        </div>
      `;
    });
  
    container.innerHTML = html;
//INITIALIZE THE SWIPER SO THAT THE IMAGES CAN SLIDE

    const swiper = new Swiper('.swiper-similar', {
      // Optional parameters
      direction: 'horizontal',
      slidesPerView: 1,
      spaceBetween: 30,

      // If we need pagination

      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 30,
        },
      },

    });

    const thumb = new Swiper('.swiper-thumb', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
      slidesPerView: 6,
      spaceBetween: 16,
    });

    const preview = new Swiper('.swiper-preview', {
      // Optional parameters
      direction: 'horizontal',
      spaceBetween: 16,

      thumbs: {
        swiper: thumb,
      },


    });
  }
  