$(document).ready(function () {
  $.ajax({
    url: "./admin/db/get-rooms/jaiden.php",
    method: "GET",
    dataType: "JSON",
    success: function (data) {
      data.forEach((room) => {
        if (room[8] == "available") {
          $("#data").append(`
            <div class="box">
             <div class="images" >
                <!-- Previous Button -->
                <div class="prev" id="prev-${room[0]}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="gainsboro" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                  </svg>
                </div>
                <div class="img images${room[0]}" >
                </div>

                <!-- Next Button -->
                <div class="next" id="next-${room[0]}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="gainsboro" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                  </svg>
                </div>
             </div>
             <div class="content">
                <h3>Room ${room[3]}</h3>
                <p>${room[4]}</p>
                <p><b>Price: </b>PHP${room[6]}</p>
                <button value = "${room[0]}" class="btn" id="reserveBtn">Reserve Now</button>
             </div>
          </div>
            `);
        } else {
          $("#data").append(`
            <div class="box">
             <div class="images" >
                <!-- Previous Button -->
                <div class="prev" id="prev-${room[0]}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="gainsboro" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                  </svg>
                </div>
                <div class="img images${room[0]}" >
                </div>

                <!-- Next Button -->
                <div class="next" id="next-${room[0]}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="gainsboro" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                  </svg>
                </div>
             </div>
             <div class="content">
                <h3>Room ${room[3]}</h3>
                <p>${room[4]}</p>
                <p><b>Price: </b>PHP${room[6]}</p>
                <button disabled value = "${room[0]}" class="btn" id="reserveBtn">Occupied</button>
             </div>
          </div>
            `);
        }

        dir_obj = JSON.parse(room[7]);

        dir_obj.forEach((dir) => {
          $(`.images${room[0]}`).append(`
              <img src="./admin/uploads/${dir.name}" alt="${dir.name} Image"></img>
            `);
        });

        // Image Scrolling Functionality
        $(`#next-${room[0]}`).click(function (e) {
          e.preventDefault();
          $(`.images${room[0]}`).animate({ scrollLeft: "+=300px" }, 400);
        });

        $(`#prev-${room[0]}`).click(function (e) {
          e.preventDefault();
          $(`.images${room[0]}`).animate({ scrollLeft: "-=300px" }, 400);
        });
      });

      $("*#reserveBtn").click(function (e) {
        e.preventDefault();

        const id = $(this).val();

        localStorage.setItem("reserve_no", id);
        localStorage.setItem("reserve_apartment", "Jaiden Apartment");

        data.forEach((room) => {
          if (room[0] == id) {
            localStorage.setItem("reserve_room_no", room[3]);
            localStorage.setItem("reserve_total_payment", room[6]);
          }
        });
        window.location.href = "reservation.php";
      });
    },
  });
});
