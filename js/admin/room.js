$(document).ready(function () {
  // Room 1
  $(".room1").mouseenter(function (e) {
    e.preventDefault();

    $(".room-name1").removeClass("unshow");
    $(".room-name1").addClass("show");
  });

  $("*.room1").mouseleave(function (e) {
    e.preventDefault();

    $(".room-name1").removeClass("show");
    $(".room-name1").addClass("unshow");
  });

  //   Room2
  $(".room2").mouseenter(function (e) {
    e.preventDefault();

    $(".room-name2").removeClass("unshow");
    $(".room-name2").addClass("show");
  });

  $("*.room2").mouseleave(function (e) {
    e.preventDefault();

    $(".room-name2").removeClass("show");
    $(".room-name2").addClass("unshow");
  });

  //   Room3
  $(".room3").mouseenter(function (e) {
    e.preventDefault();

    $(".room-name3").removeClass("unshow");
    $(".room-name3").addClass("show");
  });

  $("*.room3").mouseleave(function (e) {
    e.preventDefault();

    $(".room-name3").removeClass("show");
    $(".room-name3").addClass("unshow");
  });

  //   Room4
  $(".room4").mouseenter(function (e) {
    e.preventDefault();

    $(".room-name4").removeClass("unshow");
    $(".room-name4").addClass("show");
  });

  $("*.room4").mouseleave(function (e) {
    e.preventDefault();

    $(".room-name4").removeClass("show");
    $(".room-name4").addClass("unshow");
  });

  // Apartment Room Show
  function getRoom(apartment) {
    $.ajax({
      url: `./admin/db/get-rooms/${apartment}.php`,
      method: "GET",
      dataType: "JSON",
      success: function (data) {
        let room_no = 1;
        if (data.length > 0) {
          data.forEach((room) => {
            room_no = parseInt(room[3]) + 1;
          });
        } else {
          room_no = 1;
        }
        $("#room_no").val(room_no);
      },
    });
  }
  $("#dysept").click(function (e) {
    e.preventDefault();

    apartment = "dysept";
    localStorage.setItem("apartment_name", "dysept");

    $(".section").load("./admin/components/rooms/dysept.php");

    roomForm = () => {
      getRoom(apartment);
    };
  });

  $("#jaiden").click(function (e) {
    e.preventDefault();

    apartment = "jaiden";
    localStorage.setItem("apartment_name", "jaiden");

    $(".section").load("./admin/components/rooms/jaiden.php");

    roomForm = () => {
      getRoom(apartment);
    };
  });

  $("#rodrigo").click(function (e) {
    e.preventDefault();

    apartment = "rodrigo";
    localStorage.setItem("apartment_name", "rodrigo");

    $(".section").load("./admin/components/rooms/rodrigo.php");

    roomForm = () => {
      getRoom(apartment);
    };
  });

  $("#santiago").click(function (e) {
    e.preventDefault();

    apartment = "santiago";
    localStorage.setItem("apartment_name", "santiago");

    $(".section").load("./admin/components/rooms/santiago.php");

    roomForm = () => {
      getRoom(apartment);
    };
  });

  // Room Form Show
  $("#addShowRoom").click(function (e) {
    e.preventDefault();

    $(".section").load("./admin/components/rooms/add-new-room.php");

    roomForm();
  });

  $("#addRoomForm").submit(function (e) {
    e.preventDefault();

    $("#apartment").val(apartment);

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
        html: `Are you sure you want to add this room from ${apartment}?`,
        icon: "info",
        showCancelButton: true,
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Added!",
            text: `Room has been added from aparment ${apartment}.`,
            icon: "success",
          });

          $.ajax({
            url: "./admin/db/room/add.php",
            method: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
          });

          $(".section").load(`./admin/components/rooms/${apartment}.php`);
        }
      });
    }
  });

  // Back Button
  $("#backBtn").click(function (e) {
    e.preventDefault();

    $(".section").load(`./admin/components/rooms/${apartment}.php`);
  });
});
