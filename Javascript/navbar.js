window.addEventListener('DOMContentLoaded', () => {
  // Let's hide the profile picture on loading then make it visible when user data is verified.
  const profilePicture = document.getElementById('profilePic');
  if (profilePicture) {
    profilePicture.style.display = 'none';
    fetch('../engine/session.php')
      .then(response => response.json())
      .then(data => {
        const sessionData = data; // Store the response data in sessionData
        // Check if user_role exists in the session data
        if (sessionData.user) {
          // Hide the login and register buttons
          const loginButton = document.querySelector('a[href="login.php"]');
          const registerButton = document.querySelector('a[href="register.php"]');
          profilePicture.style.display = 'block';
          if (loginButton && registerButton) {
            loginButton.style.display = 'none';
            registerButton.style.display = 'none';
          }
          const dashboardLink = document.getElementById('dashboardlink');
          const logoutlink = document.getElementById('logout');
          if (dashboardLink) {
            const url = `../engine/redirect.php?user_role=${encodeURIComponent(sessionData.user_role)}&user=${encodeURIComponent(sessionData.user)}`;
            dashboardLink.href = url;
          }
          if (logoutlink) {
            const url = `../pages/logout.php`;
            logoutlink.href = url;
          }
        }
      })
      .catch(error => console.log('Error fetching session data: ' + error),
              error => alert('error' + error));
  }
});