document.addEventListener("DOMContentLoaded", function() {
    // Fetch the token when the page loads
    fetch('./engine/token.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('token').value = data.token;
        })
        .catch(error => console.error('Error:', error));

                  // Check if the user is already logged in
    fetch('./engine/check_login.php')
    .then(response => response.json())
    .then(data => {
        if (data.logged_in) {
            // User is already logged in, redirect to index.php
            window.location.href = 'index.php';
        }
    })
    .catch(error => console.error('Error:', error));

        document.getElementById('forgotForm').addEventListener('submit', function(event) {
            event.preventDefault();
        
            const formData = new FormData();
            formData.append('email', document.getElementById('email').value);
            formData.append('token', document.getElementById('token').value);
        
            fetch('engine/forgot.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.status === 'success') {
                    alert('Reset link has been sent. Check your email.');
                } else {
                    document.getElementById('error').innerText = data.message || 'An error occurred.';
                }
            })
            .catch(error => console.error('Error:', error));
        });
});
