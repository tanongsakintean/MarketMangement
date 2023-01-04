(function () {
  "use strict";
  window.addEventListener(
    "load",
    function () {
      var forms = document.getElementsByClassName("markets-validation");
      var validation = Array.prototype.filter.call(forms, function (form) {
        form.addEventListener(
          "submit",
          function (event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            } else {
              event.preventDefault();

              axios
                .post("./apis/api_addMarket.php", {
                  headers: {
                    "Content-Type": "application/json",
                  },
                  action: "addMarket",
                  market_name: document.getElementById("market_name").value,
                  market_row: document.getElementById("market_row").value,
                  market_block: document.getElementById("market_block").value,
                  market_address:
                    document.getElementById("market_address").value,
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
            form.classList.add("was-validated");
          },
          false
        );
      });
    },
    false
  );
})();
