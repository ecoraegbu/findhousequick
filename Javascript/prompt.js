
    let promptTimeout;

    function showPrompt(status, message, duration = 5000) {
      const prompt = document.getElementById('prompt');
      const messageText = prompt.querySelector('.message-text');
      const icon = prompt.querySelector('.icon');
    
      messageText.textContent = message;
    
      if (status === 'success') {
        icon.classList.add('success');
        icon.classList.remove('failure');
      } else {
        icon.classList.add('failure');
        icon.classList.remove('success');
      }
    
      prompt.style.display = 'flex';
    
      clearTimeout(promptTimeout);
      promptTimeout = setTimeout(() => {
        closePrompt();
      }, duration);
    }
    
    function closePrompt() {
      const prompt = document.getElementById('prompt');
      prompt.style.display = 'none';
    }
    
    document.addEventListener('click', function(event) {
      const prompt = document.getElementById('prompt');
      const closeBtn = prompt.querySelector('.close-btn');
      if (event.target === closeBtn) {
        closePrompt();
        clearTimeout(promptTimeout);
      } else if (!prompt.contains(event.target)) {
        closePrompt();
        clearTimeout(promptTimeout);
      }
    });
    
    // Trigger the prompt at the end of a stage in your user flow
    // Example:
    // showPrompt('success', 'Your data has been submitted successfully!', 3000); // Show for 3 seconds
    // showPrompt('failure', 'An error occurred. Please try again later.'); // Show for 5 seconds (default)
