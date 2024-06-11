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

// Assuming you have a JSON object containing the image URLs
const pictures = { /* JSON object with image URLs */ };

// Add the pictures to the swiper-wrapper and thumbnail swiper-wrapper
Object.entries(pictures).forEach(([key, value]) => {
  if (Array.isArray(value)) {
    value.forEach(picUrl => {
      const slide = document.createElement('div');
      slide.classList.add('swiper-slide');

      const img = document.createElement('img');
      img.src = picUrl;
      img.classList.add('w-full', 'h-[460px]', 'object-cover', 'rounded-2xl');
      img.alt = '';

      slide.appendChild(img);
      swiperWrapperDiv.appendChild(slide);

      const thumbSlide = document.createElement('div');
      thumbSlide.classList.add('swiper-slide');

      const thumbImg = document.createElement('img');
      thumbImg.src = picUrl;
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
});

// Append the swiper-wrapper to the swiper container
swiperPreviewDiv.appendChild(swiperWrapperDiv);
sliderDiv.appendChild(swiperPreviewDiv);

// Append the thumbnail swiper-wrapper to the swiper container
swiperThumbDiv.appendChild(thumbSwiperWrapperDiv);
sliderDiv.appendChild(swiperThumbDiv);

outerDiv.appendChild(sliderDiv);
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
availableSpan.textContent = 'Available'; // Replace with the actual status

const purposeSpan = document.createElement('span');
purposeSpan.classList.add('bg-primary-light', 'text-primary', 'px-2', 'py-1.5', 'text-sm', 'rounded-md', 'ml-2');
purposeSpan.textContent = 'For Sale'; // Replace with the actual purpose

statusCardDiv.appendChild(availableSpan);
statusCardDiv.appendChild(purposeSpan);

contentDiv.appendChild(statusCardDiv);

// Create the heading
const headingH1 = document.createElement('h1');
headingH1.classList.add('text-5xl', 'text-text', 'font-bold', 'mt-4', 'mb-5');
headingH1.textContent = 'House, City'; // Replace with the actual type and city

contentDiv.appendChild(headingH1);

// Create the description
const descriptionP = document.createElement('p');
descriptionP.classList.add('text-gray-600', 'font-light', 'text-lg');
descriptionP.textContent = 'This is a description of the house.'; // Replace with the actual description

contentDiv.appendChild(descriptionP);

// Create the amenities section
const amenitiesDiv = document.createElement('div');
amenitiesDiv.classList.add('flex', 'flex-wrap', 'gap-4', 'mt-10');

// Create the amenity items
const amenityItems = [
  { label: 'Toilets', value: '2' },
  { label: 'Bathrooms', value: '3' },
  { label: 'Rooms', value: '4' },
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
priceText.textContent = '100000'; // Replace with the actual price

const priceSmall = document.createElement('small');
priceSmall.classList.add('text-gray-500', 'font-normal');
priceSmall.textContent = ' / Per year';

priceP.appendChild(priceText);
priceP.appendChild(priceSmall);

priceDiv.appendChild(priceP);
contentDiv.appendChild(priceDiv);

// Create the action buttons
const actionsDiv = document.createElement('div');
actionsDiv.classList.add('mt-2');

const rentNowLink = document.createElement('a');
rentNowLink.href = 'terms_and_condition.php';
rentNowLink.classList.add('bg-primary', 'text-white', 'px-6', 'py-3', 'inline-block', 'rounded-lg', 'hover:bg-blue-600');
rentNowLink.textContent = 'Rent Now';

const bookInspectionLink = document.createElement('a');
bookInspectionLink.href = 'book_inspection.php';
bookInspectionLink.classList.add('bg-gray-100', 'text-primary', 'px-6', 'py-3', 'inline-block', 'rounded-lg', 'ml-2', 'hover:bg-gray-200');
bookInspectionLink.textContent = 'Book Inspection';

actionsDiv.appendChild(rentNowLink);
actionsDiv.appendChild(bookInspectionLink);

contentDiv.appendChild(actionsDiv);

outerDiv.appendChild(contentDiv);

section.appendChild(outerDiv);

// Append the section to the document body
document.body.appendChild(section);