document.addEventListener("DOMContentLoaded", function() {
    // Fetch the token when the page loads
    fetch('../engine/token.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('token').value = data.token;
        })
        .catch(error => console.error('Error:', error));

            // Check if the user is already logged in
    fetch('../engine/check_login.php')
    .then(response => response.json())
    .then(data => {
        if (data.logged_in) {
            // User is already logged in, redirect to index.php
            window.location.href = '../index.php';
        }
    })
    .catch(error => console.error('Error:', error));

        // Get the form element
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
        
            const formData = new FormData();
            formData.append('username', document.getElementById('email').value);
            formData.append('token', document.getElementById('token').value);
            formData.append('password', document.getElementById('password').value);
            formData.append('remember', document.getElementById('remember').checked);
            console.log(formData)
            fetch('../engine/login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    // Redirect the user to the appropriate page
                    window.location.href = '../index.php';
                } else {
                    document.getElementById('error').innerText = data.message || 'An error occurred.';
                }
            })
            .catch(error => console.error('Error:', error));
        });

    })