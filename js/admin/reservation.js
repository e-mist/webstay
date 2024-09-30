$(document).ready(function () {
  const limitPerson = localStorage.getItem("limitPerson");

  $("#limitPerson").text(limitPerson);

  $("#nextBtn").click(function (e) {
    e.preventDefault();

    let name = $("#name").val();
    let email = $("#email").val();
    let phone = $("#phone").val();
    let address = $("#address").val();
    let guests = $("#guests").val();
    // let check_in = $("#check_in").val();
    // let check_out = $("#check_out").val();

    if (
      name == "" ||
      email == "" ||
      phone == "" ||
      address == "" ||
      // check_in == "" ||
      // check_out == "" ||
      guests == ""
    ) {
      Swal.fire({
        icon: "info",
        text: "Fill up all fields!.",
      });
    } else if (!email.includes("@")) {
      Swal.fire({
        icon: "info",
        text: "Email fields must have '@'.",
      });
    } else if (parseInt(limitPerson) < parseInt(guests)) {
      Swal.fire({
        icon: "info",
        text: "Number of guest must not extend from the limit.",
      });
    } else {
      $(".first-form").removeClass("show");
      $(".first-form").addClass("unshow");

      $(".second-form").removeClass("unshow");
      $(".second-form").addClass("show");

      $("#title").text("PAYMENT");

      let id = localStorage.getItem("reserve_no");
      let apartment_name = localStorage.getItem("reserve_apartment");
      let reserve_room_no = localStorage.getItem("reserve_room_no");
      let reserve_total_payment = localStorage.getItem("reserve_total_payment");

      $("#apartment_name").text(apartment_name);
      $("#reserve_room_no").text(reserve_room_no);
      $("#reserve_payment").text(reserve_total_payment);

      $("#payment").val(reserve_total_payment);
      $("#apartment").val(apartment_name);
      $("#room_no").val(reserve_room_no);
      $("#id").val(id);
    }
  });

  $("#reservation-form").submit(function (e) {
    e.preventDefault();

    let form_data = new FormData(this);

    if ($("#proof_payment").val() == "") {
      Swal.fire({
        title: "Are you sure?",
        html: `Are you sure you won't upload a proof of payment?`,
        icon: "info",
        showCancelButton: true,
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Success!",
            html: `Reservation completed.`,
            icon: "success",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "apartments.php";
            }
          });

          $.ajax({
            url: "./admin/db/reserve/add.php",
            method: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
          });
        }
      });
    } else {
      Swal.fire({
        title: "Are you sure?",
        html: `Are you sure to reserve this room?`,
        icon: "info",
        showCancelButton: true,
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Success!",
            html: `Reservation completed.`,
            icon: "success",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "apartments.php";
            }
          });

          $.ajax({
            url: "./admin/db/reserve/add.php",
            method: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
          });
        }
      });
    }
  });

  const apartment_name = localStorage.getItem("reserve_apartment");

  let duration = moment().add(6, "M").format("YYYY-MM-DD");
  let todayDate = moment(Date.now()).format("YYYY-MM-DD");

  if (apartment_name == "Rodrigo Apartment") {
    $("*#contractAgreement").removeClass("unshow");
    $("*#contractAgreement").addClass("show");

    $("#check_in").val(todayDate);
    $("#check_out").val(duration);
  }

  if (apartment_name == "Dysept Apartment") {
    $("*#contractAgreement").removeClass("unshow");
    $("*#contractAgreement").addClass("show");

    $("#check_in").val(todayDate);
    $("#check_out").val(duration);
  }
});
