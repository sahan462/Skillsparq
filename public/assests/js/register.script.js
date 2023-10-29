
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
  