window.addEventListener('DOMContentLoaded', () => {
    //let's hide the profile picture on loading then make it visible when user data is verified.
    const profilePicture = document.getElementById('profilePic');
    profilePicture.style.display ='none';
    getSessionData()
      .then(sessionData => {
        // Check if user_role exists in the session data
        if (sessionData.user) {
          // Hide the login and register buttons
          const loginButton = document.querySelector('a[href="login.php"]');
          const registerButton = document.querySelector('a[href="register.php"]');
          profilePicture.style.display ='block'
          if (loginButton && registerButton) {
            loginButton.style.display = 'none';
            registerButton.style.display = 'none';
          }
          const dashboardLink = document.getElementById('dashboardlink');
          const logoutlink = document.getElementById('logout');
          if (dashboardLink) {
            const url = `../engine/redirect.php?user_role=${sessionData.user_role}&user=${sessionData.user}`;
            dashboardLink.href = url;
          }
          if(logoutlink){
            const url = `../pages/logout.php`;
            logoutlink.href = url;
          }
        }
      })
      .catch(error => console.error('Error fetching session data:', error));
  
    //fetchProperties();
  });
  /* function communicateWithRedirect(user_role, user_id) {
    // Build the URL with user_role and user parameters
    const url = `../engine/redirect.php?user_role=${user_role}&user=${user_id}`;
  
    // Communicate with redirect.php using fetch
    fetch(url)
      .then(response => response.text())
      .then(data => {
        console.log('Response from redirect.php:', data);
        // Handle the response data as needed
      })
      .catch(error => console.error('Error communicating with redirect.php:', error));
  } */
  /* function fetchProperties(requestType = 'all') {
    fetch(`../engine/home_server.php?request=${requestType}`)
      .then(response => response.json())
      .then(properties => {
        const propertyContainer = document.querySelector('.property-container');
        properties.forEach(property => {
          const propertyElement = createPropertyElement(property);
          propertyContainer.appendChild(propertyElement);
        });
      })
      .catch(error => console.error('Error fetching properties:', error));
  }
  
  function createPropertyElement(property) {
    const propertyElement = document.createElement('div');
    propertyElement.classList.add('property');
    // Add the necessary HTML structure and content for the property element
    return propertyElement;
  }
   */
  function getSessionData() {
    return fetch('../engine/session.php')
      .then(response => response.json())
      .then(sessionData => {
        return sessionData;
      });
  }