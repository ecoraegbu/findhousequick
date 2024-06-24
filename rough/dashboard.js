/* // Using the user element of the session data, make a fetch API call to ../engine/profile.php with action parameter
; // Replace with the desired action value
*/
let profileData;
let sessionData;

// Main function to control the flow
const main = async () => {
  // First, make a fetch API call to ../engine/check_login.php
  fetch('../engine/check_login.php')
    .then(response => response.json())
    .then(data => {
      // If the response is false, redirect to index.php
      if (!data.logged_in) {
        const url = new URL('findhousequick/pages/login.php', window.location.origin);
        window.location.href = url;
        return;
      }
    })
    .catch(error => {
      console.error('Error checking login:', error);
    });

  // Async function to fetch session data
  const session = async () => {
    const response = await fetch('../engine/session.php');
    const data = await response.json();
    sessionData = data;
  }
  await session();

  // Fetch the profile data using a fetch API call to ../engine/session.php
  const profile = async () => {
    const action = 'get';
    const response = await fetch(`../engine/profile.php?user=${sessionData.user}&action=${action}`);
    const data = await response.json();
    profileData = data;
  }
  await profile();

  const listings = async () => {
    const action = 'get';
    const response = await fetch(`../engine/property.php?user=${sessionData.user}&action=${action}`);
    const data = await response.json();
    listingsData = data;
  }
  await listings();
}

// Function to update the UI for a specific page
const  updateUIForPage = async (pageName) => {
  await main();
  switch (pageName) {
    case 'profile':
      $profile_name = document.getElementById('profile-name').innerHTML = profileData.first_name + ' ' + profileData.last_name;
      $address = 'address';
      $age = 'age';
      $employment_status = document.getElementById('employment-status').innerHTML = profileData.employment_status;
      $lga = document.getElementById('lga').innerHTML = profileData.lgas;
      $middle_name = 'middle_name';
      $religion = document.getElementById('religion').innerHTML = profileData.religion;;
      $state = document.getElementById('state').innerHTML = profileData.state;
      $first_name = document.getElementById('first-name').innerHTML = profileData.first_name;
      $last_name = document.getElementById('last-name').innerHTML = profileData.last_name;
      $phone = document.getElementById('phone').innerHTML = profileData.phone;
      $gender = document.getElementById('gender').innerHTML = profileData.sex;
      $marital_status = document.getElementById('marital-status').innerHTML = profileData.marital_status;
      $last_name = document.getElementById('last-name').innerHTML = profileData.last_name;
      break;
    case 'change_password':
      // Code to update the UI for the 'listings' page
      break;
    case 'update_profile':
      // Code to update the UI for the 'listings' page
      break;
    case 'new_property':
      // Code to update the UI for the 'listings' page
      break;
    case 'view_tenants':
      // Code to update the UI for the 'listings' page
      break;
    case 'view_listings':
      // Code to update the UI for the 'listings' page
      listingsData.items.forEach(data => {
        const urls = JSON.parse(data.images);
        const imageSrc = urls['profile-pic'];
    
        // Define the document root of your web server
        const documentRoot = 'C:\\wamp64\\www\\findhousequick';
    
        // Remove the document root from the beginning of the file path
        let filePath = imageSrc.replace(documentRoot, '');
    
        // Replace backslashes with forward slashes
        filePath = filePath.replace(/\\/g, '/');
    
        // Prepend '../' to the file path
        const relativePath = '../' + filePath;
        const row = `
          <tr class="text-sm text-gray-800 font-medium border-b border-gray-200 hover:bg-gray-100">
            <td class="py-4">${data.id}</td>
            <td class="py-4"><img src="${relativePath}" class="w-20 h-20 bg-slate-500" alt="Image"></td>
            <td class="py-4">${data.landlord_name}</td>
            <td class="py-4">${data.description}</td>
            <td class="py-4">${data.address}</td>
            <td class="py-4"><span class="inline-block ${data.status.toLowerCase() === 'available' ? 'bg-success' : 'bg-error'} text-white py-1.5 px-3 rounded-md">${data.status.toUpperCase()}</span></td>
            <td class="py-4"><a href="#" class="inline-block bg-primary text-white py-1.5 px-2 rounded-md"><i class="fas fa-edit h-4 w-4"></i></a><a href="#" class="ml-2 inline-block bg-error text-white py-1.5 px-2 rounded-md"><i class="fas fa-trash-alt h-4 w-4"></i></a></td>
          </tr>`;
      
        // Insert row directly into "listings-table"
        document.getElementById("listings-table").innerHTML += row;
      });
      break;
    case 'messages':
      // Code to update the UI for the 'listings' page
      break;
    case 'view_complaints':
      // Code to update the UI for the 'listings' page
      break;
    case 'issue_notices':
      // Code to update the UI for the 'listings' page
      break;
    case 'payments':
      // Code to update the UI for the 'listings' page
      break;
      // Add more cases for other pages
    default:
      // Handle unknown page names or do nothing
      break;
  }
}

// Ensure the main function runs after the DOM is fully loaded
document.addEventListener('DOMContentLoaded', async () => {
  // Your code here
  await main();

  // Update UI based on initial hash value
  const initialPageName = window.location.hash.slice(1);
  updateUIForPage(initialPageName);

  // Listen for hashchange event
  window.addEventListener('hashchange', () => {
    const newPageName = window.location.hash.slice(1);
    updateUIForPage(newPageName);
  });
});