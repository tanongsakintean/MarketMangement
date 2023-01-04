"use strict";
(function () {
  "use strict";
  window.addEventListener(
    "load",
    function () {
      var forms = document.getElementsByClassName("addUser-validation");
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
              } else {
                axios
                  .post("./apis/api_addUser.php", {
                    headers: {
                      "Content-Type": "application/json",
                    },
                    action: "addUser",
                    user_level: document.getElementById("user_level").value,
                    username: document.getElementById("username").value,
                    password: document.getElementById("newPassword").value,
                    prefix: document.getElementById("prefix").value,
                    fname: document.getElementById("fname").value,
                    lname: document.getElementById("lname").value,
                    tel: document.getElementById("tel").value,
                    address: document.getElementById("address").value,
                    zipcode: document.getElementById("zipcode").value,
                  })
                  .then((res) => {
                    let { status, meg } = res.data;
                    if (status) {
                      Swal.fire({
                        title: "สำเร็จ",
                        text: meg,
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                      }).then(() => window.location.reload());
                    } else {
                      Swal.fire({
                        title: "เกิดข้อผิดพลาด",
                        text: meg,
                        icon: "error",
                      });
                    }
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
