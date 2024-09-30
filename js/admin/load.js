$(document).ready(function () {
  $(".section").load("./admin/components/reservations.php");

  $("#mainBtn").click(function (e) {
    e.preventDefault();

    $(".section").load("./admin/components/main.php");
  });

  $("#tenantsBtn").click(function (e) {
    e.preventDefault();

    $(".section").load("./admin/components/tenants.php");
  });

  $("#reservationsBtn").click(function (e) {
    e.preventDefault();

    $(".section").load("./admin/components/reservations.php");
  });

  $("#roomsBtn").click(function (e) {
    e.preventDefault();

    $(".section").load("./admin/components/room.php");
  });

  $("#logoutBtn").click(function (e) {
    e.preventDefault();

    Swal.fire({
      text: "Do you want to continue?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "./admin/db/logout.php",
          method: "POST",
          dataType: "JSON",
          data: {
            logout: "invalid",
          },
        });
        Swal.fire({
          text: `Logout successfully! See you next time.`,
          icon: "success",
        }).then((result) => {
          if (result.isConfirmed) {
            location.href = "./adminlogin.php";
          }
        });
      }
    });
  });
});