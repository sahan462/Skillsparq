// Function to open different order states within each order type
function openCity(evt, orderState) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(orderState).style.display = "block";
  evt.currentTarget.className += " active";
}

// Function to open order type content
function openOrderType(event) {
  var selectedOrderType = event.target.value;
  var orderContent = document.getElementsByClassName("ordercontent");
  for (var i = 0; i < orderContent.length; i++) {
      orderContent[i].style.display = "none";
  }
  document.getElementById(selectedOrderType).style.display = "block";
  // Trigger click event on the default tab for the selected order type
  document.getElementById("defaultOpen_" + selectedOrderType.charAt(0).toUpperCase() + selectedOrderType.slice(1)).click();
}

// Open the default tab for the selected order type
document.getElementById("orderTypeSelect").addEventListener("change", openOrderType);
document.getElementById("defaultOpen_Package").click();
