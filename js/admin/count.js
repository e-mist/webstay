$(document).ready(function () {
  // Tenants Count
  $.ajax({
    url: "./admin/db/count/tenants.php",
    method: "GET",
    dataType: "JSON",
    success: function (data) {
      $("#tenantsCount").text(data.tenantsCount);
    },
  });
});
