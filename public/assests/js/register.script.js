
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm");
    const phoneNumberInput = document.getElementById("phoneNumber");
  
    form.addEventListener("submit", function (event) {
      const phoneNumber = phoneNumberInput.value.trim();
  
      if (!isSriLankanPhoneNumber(phoneNumber)) {
        alert("Please enter a valid Sri Lankan phone number.");
        event.preventDefault(); 
      }
    });
  
    function isSriLankanPhoneNumber(phoneNumber) {
      const sriLankanPhonePattern = /^(?:\+94|0)([1-9]\d{1,2})\d{6,7}$/;
      return sriLankanPhonePattern.test(phoneNumber);
    }
  });
  
function checkPasswordStrength(password) {
  // Minimum length requirement
  if (password.length < 8) {
      return 'Password must be at least 8 characters long';
  }

  // Regular expressions to check for various criteria
  var hasUpperCase = /[A-Z]/.test(password);
  var hasLowerCase = /[a-z]/.test(password);
  var hasNumbers = /\d/.test(password);
  var hasSpecialChars = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(password);

  // Check if all criteria are met
  if (!(hasUpperCase && hasLowerCase && hasNumbers && hasSpecialChars)) {
      return 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character';
  }

  // Password is strong
  return 'Password strength: Strong';
}

// Get the password input element
var passwordInput = document.getElementById('password');
const warningMessage = document.getElementById('passwordError');
// Attach the checkPasswordStrength function to the input event
passwordInput.addEventListener('input', function() {
    var password = passwordInput.value;
    var strengthMessage = checkPasswordStrength(password);
    // Display the strength message or perform any other actions based on it
    warningMessage.textContent = strengthMessage;
});
