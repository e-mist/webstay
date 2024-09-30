$(document).ready(function () {
  $.ajax({
    url: "./admin/db/reserve/get-approved.php",
    method: "GET",
    dataType: "JSON",
    success: function (data) {
      data.forEach((reserve) => {
        let image_dir = "";
        if (reserve[5] == null && reserve[6] == null) {
          if (reserve[10] == "" || reserve[10] == null) {
            image_dir = "";
          } else {
            image_dir = `<td><a href="./admin/proof_uploads/${reserve[10]}" target="_blank">Show Image</a></td>`;
          }
          $("#reservations-data").append(`
            <tr>
                <td>${reserve[1]}</td>
                <td>${reserve[3]}</td>
                <td>${reserve[8]}</td>
                <td>${reserve[9]}</td>
                <td></td>
                <td></td>
                ${image_dir}
            </tr>
            `);
        } else {
          $("#reservations-data").append(`
            <tr>
                <td>${reserve[1]}</td>
                <td>${reserve[3]}</td>
                <td>${reserve[8]}</td>
                <td>${reserve[9]}</td>
                <td>${reserve[5]}</td>
                <td>${reserve[6]}</td>
                <td><a href="./admin/proof_uploads/${reserve[10]}" target="_blank">Show Image</a></td>
            </tr>
            `);
        }
      });
    },
  });

  $("#backShowReservation").click(function (e) {
    e.preventDefault();

    $(".section").load("./admin/components/reservations.php");
  });
});
