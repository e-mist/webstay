$(document).ready(function () {
  // Render All
  $.ajax({
    url: "./admin/db/reserve/get.php",
    method: "GET",
    dataType: "JSON",
    success: function (data) {
      data.forEach((reserve) => {
        if (reserve[10] == null) {
          if (reserve[11] == "pending") {
            $("#reservations-data").append(`
                    <tr>
                        <td>${reserve[1]}</td>
                        <td>${reserve[3]}</td>
                        <td>${reserve[8]}</td>
                        <td>${reserve[9]}</td>
                        <td colspan="2">Advised that payment must be paid within 7 days</td>
                    </tr>
                    `);
          }

          $.ajax({
            url: "./admin/db/room/get.php",
            method: "GET",
            dataType: "JSON",
            success: function (room_data) {
              let apartment = reserve[8];
              let room_id = 0;

              room_data.forEach((room) => {
                if (
                  room[2] ==
                    apartment.replace(" Apartment", "").toLowerCase() &&
                  parseInt(room[3]) == parseInt(reserve[9])
                ) {
                  room_id = room[0];
                }

                // Time limit 7 days for payment
                if (reserve[12] != "") {
                  let dateOne = moment(reserve[12]);
                  let dateTwo = moment(Date.now());

                  //   // Function call
                  // let result = dateTwo.diff(dateOne, "seconds");
                  let result = dateTwo.diff(dateOne, "days");
                  // console.log("No of days: ", result);

                  if (result >= 7) {
                    Swal.fire({
                      title: "Declining A Reservation.",
                      html: `We're sorry, <b>${reserve[1]}</b>. Unfortunately, your reservation from <b>${apartment}</b> - <b>Room No:${reserve[9]}</b><br>
                       cannot be confirmed due to 7 days of no payment.<br>
                       Please choose an alternative date or contact us for further assistance.`,
                      icon: "info",
                    }).then((result) => {
                      if (result.isConfirmed) {
                        $.ajax({
                          url: "./admin/db/reserve/decline.php",
                          method: "POST",
                          data: {
                            id: reserve[0],
                            room_id: room_id,
                          },
                        });

                        $(".section").load(
                          "./admin/components/reservations.php"
                        );
                      }
                    });
                  }
                }
              });
            },
          });
        } else {
          if (reserve[11] == "pending") {
            if (reserve[10] == "" || reserve[10] == null) {
              $("#reservations-data").append(`
                <tr>
                    <td>${reserve[1]}</td>
                    <td>${reserve[3]}</td>
                    <td>${reserve[8]}</td>
                    <td>${reserve[9]}</td>
                    <td></td>
                    <td class="btn-reserve">
                        <button class="btn-success" id="approveBtn" value="${reserve[0]}">Approve</button>
                        <button class="btn-danger" id="declineBtn" value="${reserve[0]}">Decline</button>
                    </td>
                </tr>
                `);
            } else {
              $("#reservations-data").append(`
                <tr>
                    <td>${reserve[1]}</td>
                    <td>${reserve[3]}</td>
                    <td>${reserve[8]}</td>
                    <td>${reserve[9]}</td>
                    <td><a href="./admin/proof_uploads/${reserve[10]}" target="_blank">Show Image</a></td>
                    <td class="btn-reserve">
                        <button class="btn-success" id="approveBtn" value="${reserve[0]}">Approve</button>
                        <button class="btn-danger" id="declineBtn" value="${reserve[0]}">Decline</button>
                    </td>
                </tr>
                `);
            }
          }
        }
      });

      //   Approve
      $("*#approveBtn").click(function (e) {
        e.preventDefault();

        const id = $(this).val();

        $.ajax({
          url: "./admin/db/reserve/search-reserve.php",
          method: "POST",
          dataType: "JSON",
          data: {
            id: id,
          },
          success: function (data) {
            $.ajax({
              url: "./admin/db/room/get.php",
              method: "GET",
              dataType: "JSON",
              success: function (room_data) {
                let apartment = data.apartment
                  .replace(" Apartment", "")
                  .toLowerCase();

                room_data.forEach((room) => {
                  if (
                    room[2] == apartment &&
                    parseInt(room[3]) == parseInt(data.room_no)
                  ) {
                    room_id = room[0];
                  }
                });

                Swal.fire({
                  title: "Are you sure?",
                  html: `Are you sure to approve the reservation of <b>${data.name}</b>?`,
                  icon: "info",
                  showCancelButton: true,
                }).then((result) => {
                  if (result.isConfirmed) {
                    Swal.fire({
                      title: "Success!",
                      html: `Reservation approved!.`,
                      icon: "success",
                    }).then((result) => {
                      if (result.isConfirmed) {
                        $.ajax({
                          url: "./admin/db/reserve/approve.php",
                          method: "POST",
                          data: {
                            id: id,
                            room_id: room_id,
                          },
                        });

                        $(".section").load(
                          "./admin/components/reservations.php"
                        );
                      }
                    });
                  }
                });
              },
            });
          },
        });
      });

      //   Decline
      $("*#declineBtn").click(function (e) {
        e.preventDefault();

        const id = $(this).val();

        $.ajax({
          url: "./admin/db/reserve/search-reserve.php",
          method: "POST",
          dataType: "JSON",
          data: {
            id: id,
          },
          success: function (data) {
            $.ajax({
              url: "./admin/db/room/get.php",
              method: "GET",
              dataType: "JSON",
              success: function (room_data) {
                let apartment = data.apartment
                  .replace(" Apartment", "")
                  .toLowerCase();

                room_data.forEach((room) => {
                  if (
                    room[2] == apartment &&
                    parseInt(room[3]) == parseInt(data.room_no)
                  ) {
                    room_id = room[0];
                  }
                });

                Swal.fire({
                  title: "Are you sure?",
                  html: `Are you sure you want to decline the reservation of <b>${data.name}</b><br> <i>This action cannot be undone.</i>`,
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Yes, decline it!",
                }).then((result) => {
                  if (result.isConfirmed) {
                    Swal.fire({
                      title: "Declined!",
                      text: "Reservation has been declined.",
                      icon: "success",
                    }).then((result) => {
                      if (result.isConfirmed) {
                        $(".section").load(
                          "./admin/components/reservations.php"
                        );
                      }
                    });

                    $.ajax({
                      url: "./admin/db/reserve/decline.php",
                      method: "POST",
                      data: {
                        id: id,
                        room_id: room_id,
                      },
                    });
                  }
                });
              },
            });
          },
        });
      });
    },
  });

  $("#searchBtn").click(function (e) {
    e.preventDefault();

    if ($("#apartment").val() == "") {
      Swal.fire({
        text: `Apartment fields required.`,
        icon: "info",
      });
    } else {
      $.ajax({
        url: "./admin/db/reserve/search.php",
        method: "POST",
        dataType: "JSON",
        data: {
          name: $("#name").val(),
          apartment: $("#apartment").val(),
        },
        success: function (data) {
          let row = "";
          data.forEach((reserve) => {
            if (reserve[10] == null) {
              if (reserve[11] == "pending") {
                row += `<tr>
                            <td>${reserve[1]}</td>
                            <td>${reserve[3]}</td>
                            <td>${reserve[8]}</td>
                            <td>${reserve[9]}</td>
                            <td colspan="2">Advised that payment must be paid within 7 days</td>
                        </tr> `;
              }
            } else {
              if (reserve[11] == "pending") {
                row += `<tr>
                              <td>${reserve[1]}</td>
                              <td>${reserve[3]}</td>
                              <td>${reserve[8]}</td>
                              <td>${reserve[9]}</td>
                              <td><a href="./admin/proof_uploads/${reserve[10]}" target="_blank">Show Image</a></td>
                              <td class="btn-reserve">
                                  <button class="btn-success" id="approveBtn" value="${reserve[0]}">Approve</button>
                                  <button class="btn-danger" id="declineBtn" value="${reserve[0]}">Decline</button>
                              </td>
                          </tr> `;
              }
            }
          });

          if (row == "") {
            $("#reservations-data").html(
              `<tr colspan="6">No reservation data</tr>`
            );
          } else {
            $("#reservations-data").html(row);
          }

          //   Approve
          $("*#approveBtn").click(function (e) {
            e.preventDefault();

            const id = $(this).val();

            $.ajax({
              url: "./admin/db/reserve/search-reserve.php",
              method: "POST",
              dataType: "JSON",
              data: {
                id: id,
              },
              success: function (data) {
                $.ajax({
                  url: "./admin/db/room/get.php",
                  method: "GET",
                  dataType: "JSON",
                  success: function (room_data) {
                    let apartment = data.apartment
                      .replace(" Apartment", "")
                      .toLowerCase();

                    room_data.forEach((room) => {
                      if (
                        room[2] == apartment &&
                        parseInt(room[3]) == parseInt(data.room_no)
                      ) {
                        room_id = room[0];
                      }
                    });

                    Swal.fire({
                      title: "Are you sure?",
                      html: `Are you sure to approve the reservation of <b>${data.name}</b>?`,
                      icon: "info",
                      showCancelButton: true,
                    }).then((result) => {
                      if (result.isConfirmed) {
                        Swal.fire({
                          title: "Success!",
                          html: `Reservation approved!.`,
                          icon: "success",
                        }).then((result) => {
                          if (result.isConfirmed) {
                            $.ajax({
                              url: "./admin/db/reserve/approve.php",
                              method: "POST",
                              data: {
                                id: id,
                                room_id: room_id,
                              },
                            });

                            $(".section").load(
                              "./admin/components/reservations.php"
                            );
                          }
                        });
                      }
                    });
                  },
                });
              },
            });
          });

          //   Decline
          $("*#declineBtn").click(function (e) {
            e.preventDefault();

            const id = $(this).val();

            $.ajax({
              url: "./admin/db/reserve/search-reserve.php",
              method: "POST",
              dataType: "JSON",
              data: {
                id: id,
              },
              success: function (data) {
                $.ajax({
                  url: "./admin/db/room/get.php",
                  method: "GET",
                  dataType: "JSON",
                  success: function (room_data) {
                    let apartment = data.apartment
                      .replace(" Apartment", "")
                      .toLowerCase();

                    room_data.forEach((room) => {
                      if (
                        room[2] == apartment &&
                        parseInt(room[3]) == parseInt(data.room_no)
                      ) {
                        room_id = room[0];
                      }
                    });

                    Swal.fire({
                      title: "Are you sure?",
                      html: `Are you sure you want to decline the reservation of <b>${data.name}</b><br> <i>This action cannot be undone.</i>`,
                      text: "You won't be able to revert this!",
                      icon: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "#3085d6",
                      cancelButtonColor: "#d33",
                      confirmButtonText: "Yes, decline it!",
                    }).then((result) => {
                      if (result.isConfirmed) {
                        Swal.fire({
                          title: "Declined!",
                          text: "Reservation has been declined.",
                          icon: "success",
                        }).then((result) => {
                          if (result.isConfirmed) {
                            $(".section").load(
                              "./admin/components/reservations.php"
                            );
                          }
                        });

                        $.ajax({
                          url: "./admin/db/reserve/decline.php",
                          method: "POST",
                          data: {
                            id: id,
                            room_id: room_id,
                          },
                        });
                      }
                    });
                  },
                });
              },
            });
          });
        },
      });
    }
  });

  //   Show Approved Reservations
  $("#showApprovedBtn").click(function (e) {
    e.preventDefault();

    $(".section").load("./admin/components/approved-reservations.php");
  });
});
