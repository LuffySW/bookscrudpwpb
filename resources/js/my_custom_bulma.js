document.addEventListener("DOMContentLoaded", () => {
        // ============ BURGER MENU ============
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(
        document.querySelectorAll(".navbar-burger"),
        0
      );
      // Check if there are any navbar burgers
      if ($navbarBurgers.length > 0) {
        // Add a click event on each of them
        $navbarBurgers.forEach((el) => {
          el.addEventListener("click", () => {
            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);
    
            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle("is-active");
            $target.classList.toggle("is-active");
          });
        });
      }
      // =====================================
    // ============ MENU DROPDOWN ============
    function menuItem(item) {
        if (item.target !== this) {
          return;
        }
        const nextSibling = item.target.nextSibling.nextSibling.classList;
        item.target.classList.toggle("has-background-grey");
        nextSibling.toggle("is-hidden");
      }
      const menuDropdown = document.querySelectorAll("#header-toggle");
    
      menuDropdown.forEach((menu) => {
        menu.addEventListener("click", menuItem);
      });
    
      // ========= Notification close ===========
      const deleteNotification = document.querySelectorAll(".delete-notification");
    
      deleteNotification.forEach((singleNotification) => {
        const notification = singleNotification.parentNode;
    
        singleNotification.addEventListener("click", () => {
          notification.parentNode.removeChild(notification);
        });
      });
      // ========================================
       // ============File upload input ===============
    const fileInput = document.querySelector('#file-js-example input[type=file]');
    if (fileInput) {
      fileInput.onchange = () => {
          if (fileInput.files.length > 0) {
              const fileName = document.querySelector('#file-js-example .file-name');
              fileName.textContent = fileInput.files[0].name;
          }
      }
    }
    // ========================================
});