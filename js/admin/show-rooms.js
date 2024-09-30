$(document).ready(function () {
  // Room Data
  function roomData(name, room) {
    $(`#room-data-${name}`).append(`
      <tr>
          <td>${room[3]}</td>
          <td>${room[4]}</td>
          <td>${room[1]}</td>
          <td>${room[5]}</td>
          <td>${room[6]}</td>
          <td>${room[8]}</td>
          <td>
              <button id="editRoom" class="btn-edit" value="${room[0]}">Edit</button>
          </td>
      </tr>
    `);
  }

  // Edit Room
  function editRoom() {
    $("*#editRoom").click(function (e) {
      e.preventDefault();

      const id = $(this).val();

      $.ajax({
        url: "./admin/db/room/search-edit.php",
        method: "POST",
        data: {
          id: id,
        },
        dataType: "JSON",
        success: function (data) {
          localStorage.setItem("id", id);
          localStorage.setItem("room_no", data.room_no);
          localStorage.setItem("apartment", data.apartment);
          localStorage.setItem("price", data.price);
          localStorage.setItem("details", data.details);
          localStorage.setItem("room_type", data.room_type);
          localStorage.setItem("bedrooms", data.bedrooms);

          $(".section").load("./admin/components/rooms/edit-room.php");
        },
      });
    });
  }

  // Dysept
  if (localStorage.getItem("apartment_name") == "dysept") {
    $.ajax({
      url: "./admin/db/get-rooms/dysept.php",
      method: "GET",
      dataType: "JSON",
      success: function (data) {
        data.forEach((room) => {
          roomData("dysept", room);
        });

        editRoom();
      },
    });
  }

  // Jaiden
  if (localStorage.getItem("apartment_name") == "jaiden") {
    $.ajax({
      url: "./admin/db/get-rooms/jaiden.php",
      method: "GET",
      dataType: "JSON",
      success: function (data) {
        data.forEach((room) => {
          roomData("jaiden", room);
        });

        editRoom();
      },
    });
  }

  // Rodrigo
  if (localStorage.getItem("apartment_name") == "rodrigo") {
    $.ajax({
      url: "./admin/db/get-rooms/rodrigo.php",
      method: "GET",
      dataType: "JSON",
      success: function (data) {
        data.forEach((room) => {
          roomData("rodrigo", room);
        });

        editRoom();
      },
    });
  }

  //   // Santiago
  if (localStorage.getItem("apartment_name") == "santiago") {
    $.ajax({
      url: "./admin/db/get-rooms/santiago.php",
      method: "GET",
      dataType: "JSON",
      success: function (data) {
        data.forEach((room) => {
          roomData("santiago", room);
        });

        editRoom();
      },
    });
  }
});
