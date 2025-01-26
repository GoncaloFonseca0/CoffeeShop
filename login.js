
document.getElementById('loginForm').addEventListener('submit', async function (e) {
    e.preventDefault();


    const user = document.getElementById('txtusername').value;
    const password = document.getElementById('txtpassworduser').value;

    try {
      
        const response = await fetch('login.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ txtusername: user, txtpassworduser: password })
        });

        const result = await response.json();

        if (result.ok) {
         
            window.location.href = 'dashboard.php'; 
        } else {
           
            const feedback = document.getElementById('feedback');
            feedback.style.display = 'block';
            feedback.textContent = 'Invalid username or password!';
        }
    } catch (error) {
        console.error('Error:', error);
        const feedback = document.getElementById('feedback');
        feedback.style.display = 'block';
        feedback.textContent = 'An error occurred. Please try again later.';
    }
});
