    // Function to open different order types
    function openOrderType(evt, orderType) {
      var i, ordercontent, tablinks;
      ordercontent = document.getElementsByClassName("ordercontent");
      for (i = 0; i < ordercontent.length; i++) {
          ordercontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(orderType).style.display = "block";
      evt.currentTarget.className += " active";
      
      document.getElementById("defaultOpen_" + orderType.charAt(0).toUpperCase() + orderType.slice(1)).click();
  }

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

  // Open the default tab for each order type
  document.getElementById("defaultOpen_1").click();
  document.getElementById("defaultOpen_Package").click();
  document.getElementById("defaultOpen_Job").click();
  document.getElementById("defaultOpen_Milestone").click();