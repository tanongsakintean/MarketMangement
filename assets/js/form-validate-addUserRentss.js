"use strict";
(function () {
  "use strict";
  window.addEventListener(
    "load",
    function () {
      var forms = document.getElementsByClassName("addUser-validation-Rent");
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener(
          "submit",
          function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            } else {
              event.preventDefault();
              if (
                document.getElementById("newPassword").value !=
                document.getElementById("replyPassword").value
              ) {
                Swal.fire({
                  title: "เกิดข้อผิดพลาด",
                  text: "รหัสผ่านไม่ตรงกัน!",
                  icon: "error",
                });
              }
            }
            form.classList.add("was-validated");
          },
          false
        );
      });
    },
    false
  );
})();
