function fetchPropertyDetails(propertyId) {
  const url = new URL('findhousequick/engine/property_server.php', window.location.origin);
  url.searchParams.append('type', 'single');
  url.searchParams.append('propertyId', propertyId);

  fetch(url)
    .then(response => response.json())
    .then(data => {
      // Handle the fetched property details data
      const documentRoot = 'C:\\wamp64\\www\\findhousequick';
      const targetElementId = 'property-listing'; // Replace with the ID of the container element

  // Create the section element
  const section = document.createElement('section');
  section.classList.add('px-4', 'pt-8');

  // Create the outer div
  const outerDiv = document.createElement('div');
  outerDiv.classList.add('max-w-6xl', 'mx-auto', 'grid', 'grid-cols-1', 'md:grid-cols-2', 'gap-x-16', 'gap-y-8');

  // Create the first inner div for the slider
  const sliderDiv = document.createElement('div');

  // Create the swiper container div
  const swiperPreviewDiv = document.createElement('div');
  swiperPreviewDiv.classList.add('swiper', 'swiper-preview');

  // Create the swiper-wrapper div
  const swiperWrapperDiv = document.createElement('div');
  swiperWrapperDiv.classList.add('swiper-wrapper');

  // Create the thumbnail swiper container
  const swiperThumbDiv = document.createElement('div');
  swiperThumbDiv.classList.add('swiper', 'swiper-thumb', 'flex', 'flex-wrap', 'gap-4', 'mt-4');
  swiperThumbDiv.setAttribute('thumbsSlider', '');

  // Create the thumbnail swiper-wrapper
  const thumbSwiperWrapperDiv = document.createElement('div');
  thumbSwiperWrapperDiv.classList.add('swiper-wrapper');

  const images = JSON.parse(data.images);

  // Check if images is an object
  if (typeof images === 'object' && images !== null) {
    // Iterate over the object's values
    Object.values(images).forEach(imagePath => {
      let filePath = imagePath.replace(documentRoot, '');
      // Replace backslashes with forward slashes
      filePath = filePath.replace(/\\/g, '/');
      // Prepend '../' to the file path
      const relativePath = '..' + filePath;

      const slide = document.createElement('div');
      slide.classList.add('swiper-slide');

      const img = document.createElement('img');
      img.src = relativePath;
      img.classList.add('w-full', 'h-[460px]', 'object-cover', 'rounded-2xl');
      img.alt = '';

      slide.appendChild(img);
      swiperWrapperDiv.appendChild(slide);

      const thumbSlide = document.createElement('div');
      thumbSlide.classList.add('swiper-slide');

      const thumbImg = document.createElement('img');
      thumbImg.src = relativePath;
      thumbImg.classList.add('aspect-square', 'w-24', 'object-cover', 'rounded-md');
      thumbImg.alt = '';

      thumbSlide.appendChild(thumbImg);
      thumbSwiperWrapperDiv.appendChild(thumbSlide);
    });
  } else if (typeof value === 'string') {
    const slide = document.createElement('div');
    slide.classList.add('swiper-slide');

    const img = document.createElement('img');
    img.src = value;
    img.classList.add('w-full', 'h-[460px]', 'object-cover', 'rounded-2xl');
    img.alt = '';

    slide.appendChild(img);
    swiperWrapperDiv.appendChild(slide);

    const thumbSlide = document.createElement('div');
    thumbSlide.classList.add('swiper-slide');

    const thumbImg = document.createElement('img');
    thumbImg.src = value;
    thumbImg.classList.add('aspect-square', 'w-24', 'object-cover', 'rounded-md');
    thumbImg.alt = '';

    thumbSlide.appendChild(thumbImg);
    thumbSwiperWrapperDiv.appendChild(thumbSlide);
  }

  // Append the swiper-wrapper to the swiper container
  swiperPreviewDiv.appendChild(swiperWrapperDiv);
  sliderDiv.appendChild(swiperPreviewDiv);

  // Append the thumbnail swiper-wrapper to the swiper container
  swiperThumbDiv.appendChild(thumbSwiperWrapperDiv);
  sliderDiv.appendChild(swiperThumbDiv);

  outerDiv.appendChild(sliderDiv);

  // Create the second inner div for the content
  const contentDiv = document.createElement('div');

  // Create the status card
  const statusCardDiv = document.createElement('div');

  const availableSpan = document.createElement('span');
  availableSpan.classList.add('bg-success-light', 'text-success', 'px-2', 'py-1.5', 'text-sm', 'rounded-md');
  availableSpan.textContent = data.status || 'Available';

  const purposeSpan = document.createElement('span');
  purposeSpan.classList.add('bg-primary-light', 'text-primary', 'px-2', 'py-1.5', 'text-sm', 'rounded-md', 'ml-2');
  purposeSpan.textContent = data.purpose || 'For Sale';

  statusCardDiv.appendChild(availableSpan);
  statusCardDiv.appendChild(purposeSpan);

  contentDiv.appendChild(statusCardDiv);

  // Create the heading
  const headingH1 = document.createElement('h1');
  headingH1.classList.add('text-5xl', 'text-text', 'font-bold', 'mt-4', 'mb-5');
  headingH1.textContent = `${data.type || 'House'}, ${data.city || 'City'}`;

  contentDiv.appendChild(headingH1);

  // Create the description
  const descriptionP = document.createElement('p');
  descriptionP.classList.add('text-gray-600', 'font-light', 'text-lg');
  descriptionP.textContent = data.description || 'This is a description of the house.';

  contentDiv.appendChild(descriptionP);

  // Create the amenities section
  const amenitiesDiv = document.createElement('div');
  amenitiesDiv.classList.add('flex', 'flex-wrap', 'gap-4', 'mt-10');

  // Create the amenity items
  const amenityItems = [
    { label: 'Toilets', value: data.toilets || '' },
    { label: 'Bathrooms', value: data.bathrooms || '' },
    { label: 'Rooms', value: data.bedrooms || '' },
    { label: 'Parkings', value: '08' },
    { label: 'Sitting room', value: '03' }
  ];

  amenityItems.forEach(item => {
    const amenityDiv = document.createElement('div');
    amenityDiv.classList.add('flex', 'items-center', 'gap-2', 'font-semibold', 'border', 'border-gray-200', 'px-2', 'py-2', 'rounded-lg');

    const valueSpan = document.createElement('span');
    valueSpan.classList.add('bg-primary', 'text-white', 'px-1.5', 'py-0.5', 'rounded-lg', 'inline-block', 'text-xl');
    valueSpan.textContent = item.value;

    const labelSpan = document.createElement('span');
    labelSpan.classList.add('text-gray-600');
    labelSpan.textContent = item.label;

    amenityDiv.appendChild(valueSpan);
    amenityDiv.appendChild(labelSpan);

    amenitiesDiv.appendChild(amenityDiv);
  });

  contentDiv.appendChild(amenitiesDiv);

  // Create the price section
  const priceDiv = document.createElement('div');
  priceDiv.classList.add('mt-10');

  const priceP = document.createElement('p');
  priceP.classList.add('text-primary', 'text-2xl', 'font-bold');

  const priceText = document.createElement('span');
  

  
  //
})
.catch(error => console.error('Error fetching property details:', error));
}