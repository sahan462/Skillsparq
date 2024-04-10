document.addEventListener("DOMContentLoaded", function() {
    const notificationIcon = document.querySelector(".notificationIcon");
    const notificationBox = document.querySelector(".notificationBox");
   
    function showNotificationBox() {
        notificationBox.style.display = "block";
    }
    
    function hideNotificationBox() {
        notificationBox.style.display = "none";
    }
    
    // Show notification box on click
    notificationIcon.addEventListener("click", showNotificationBox);
    
    // Hide notification box on click outside
    document.addEventListener("click", function(event) {
        if (!notificationIcon.contains(event.target)) {
        hideNotificationBox();
        }
    });
      
  
    // Sample function to populate notification items
    function populateNotifications() {
      const notificationList = document.querySelector(".notificationList");
      // Sample notifications
      const notifications = [
        "Notification 1",
        "Notification 2",
        "Notification 3"
      ];
      notifications.forEach(notification => {
        const listItem = document.createElement("li");
        listItem.textContent = notification;
        notificationList.appendChild(listItem);
      });
    }
  
    // Call function to populate notifications
    populateNotifications();
  });
  