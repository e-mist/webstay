$(document).ready(function () {
  let id = localStorage.getItem("id");
  let room_no = localStorage.getItem("room_no");
  let room_type = localStorage.getItem("room_type");
  let apartment = localStorage.getItem("apartment");
  let price = localStorage.getItem("price");
  let details = localStorage.getItem("details");
  let bedrooms = localStorage.getItem("bedrooms");

  $("#id").val(id);
  $("#apartment").val(apartment);
  $("#price").val(price);
  $("#room_no").val(room_no);
  $("#details").val(details);
  $("#type").val(room_type);
  $("#bedrooms").val(bedrooms);

  // Update
  $("#updateRoomForm").submit(function (e) {
    e.preventDefault();

    let form_data = new FormData(this);

    if (
      $("#apartment").val() == "" ||
      $("#price").val() == "" ||
      $("#room_no").val() == "" ||
      $("#details").val() == "" ||
      $("#type").val() == "" ||
      $("#bedrooms").val() == "" ||
      $("#image").val() == ""
    ) {
      Swal.fire({
        icon: "info",
        text: "Fill up all fields!.",
      });
    } else {
      Swal.fire({
        title: "Are you sure?",
        html: `Are you sure you want to update this room from ${apartment}?`,
        icon: "info",
        showCancelButton: true,
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Updated!",
            text: `Room has been updated from aparment ${apartment}.`,
            icon: "success",
          });

          $.ajax({
            url: "./admin/db/room/update.php",
            method: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            success: function () {
              $(".section").load(`./admin/components/rooms/${apartment}.php`);
            },
          });
        }
      });
    }
  });

  // Cancel Button
  $("#cancelBtn").click(function (e) {
    e.preventDefault();

    $(".section").load(`./admin/components/rooms/${apartment}.php`);
  });
});
