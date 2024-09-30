$(document).ready(function () {
  // Logout user
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
          url: "./admin/db/logout_user.php",
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
            location.href = "./index.php";
          }
        });
      }
    });
  });

  function renderApartments(rent_max, rent_min, name, image_dir, gmap, rooms) {
    let rent_range = "";

    if (rent_max == rent_min) {
      rent_range = `PHP${rent_max}`;
    } else {
      rent_range = `PHP${rent_min} - PHP${rent_max}`;
    }

    $("#apartments-data").append(`
          <div class="box">
             <div class="image">
                <img src="${image_dir}" alt="${name} Image">
             </div>
             <div class="content">
                <h3>${name}</h3>
                <h2>${rent_range}</h2>
                <a href="${rooms}" class="btn">See more</a>
             </div>
             <div style="text-align: center; width: 100%">
              <a style="font-size: 2rem;" target="_blank" href="${gmap}">Visit Here</a>
             </div>
             
          </div>
    `);
  }

  function searchApartments(row, data) {
    let rent_range = "";

    data.forEach((apartment) => {
      if (apartment[3] == apartment[4]) {
        rent_range = `PHP${apartment[3]}`;
      } else {
        rent_range = `PHP${apartment[4]} - PHP${apartment[3]}`;
      }

      row += `
        <div class="box">
             <div class="image">
                <img src="${apartment[15]}" alt="${apartment[1]} Image">
             </div>
             <div class="content">
                <h3>${apartment[1]}</h3>
                <h2>${rent_range}</h2>
                <a href="${apartment[17]}" class="btn">See more</a>
             </div>
             <div style="text-align: center; width: 100%">
              <a style="font-size: 2rem;" target="_blank" href="${apartment[16]}">Visit Here</a>
             </div>
          </div>
        `;
    });

    return row;
  }
  // Render All Apartments
  $.ajax({
    url: "./admin/db/apartments/get.php",
    method: "GET",
    dataType: "JSON",
    success: function (data) {
      data.forEach((apartment) => {
        renderApartments(
          apartment[3],
          apartment[4],
          apartment[1],
          apartment[15],
          apartment[16],
          apartment[17]
        );
      });
    },
  });

  let row = "";
  let water = "";
  let electricity = "";
  let contract = "";
  let curfew = "";
  let pet = "";
  let parking = "";
  let visitors = "";

  // Filter
  $("#name").keyup(function () {
    const val = $("#name").val();

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: val,
        type: $("#type").val(),
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: parseInt($("#capacity").val()),
        water: water,
        electricity: electricity,
        contract: contract,
        curfew: curfew,
        pet: pet,
        parking: parking,
        visitors: visitors,
      },
      success: function (data) {
        console.log(data);
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });

  $("#type").click(function () {
    const val = $(this).val();

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: $("#name").val(),
        type: val,
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: parseInt($("#capacity").val()),
        water: water,
        electricity: electricity,
        contract: contract,
        curfew: curfew,
        pet: pet,
        parking: parking,
        visitors: visitors,
      },
      success: function (data) {
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });

  $("#btnApply").click(function (e) {
    e.preventDefault();

    const minPrice = parseInt($("#min-input").val());
    const maxPrice = parseInt($("#max-input").val());

    if (minPrice > maxPrice) {
      Swal.fire({
        icon: "info",
        text: "Invalid input price range.",
      });
    } else {
      $("#min").val(minPrice);
      let minSlider = (0 + minPrice) / 105;
      $(".progress").css({ left: `${minSlider}%` });

      $("#max").val(maxPrice);
      let maxSlider = (10000 - maxPrice) / 105;
      $(".progress").css({ right: `${maxSlider}%` });

      $.ajax({
        url: "./admin/db/apartments/search.php",
        method: "POST",
        dataType: "JSON",
        data: {
          name: $("#name").val(),
          type: $("#type").val(),
          minPrice: minPrice,
          maxPrice: maxPrice,
          capacity: parseInt($("#capacity").val()),
          water: water,
          electricity: electricity,
          contract: contract,
          curfew: curfew,
          pet: pet,
          parking: parking,
          visitors: visitors,
        },
        success: function (data) {
          if (data == "") {
            $("#apartments-data").html(`
              <div div class="box">
               <div class="content">
                  <h3>No apartment data</h3>
               </div>
            </div>`);
          } else {
            $("#apartments-data").html(searchApartments(row, data));
          }
        },
      });
    }
  });

  $("#capacity").click(function () {
    const val = $(this).val();

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: $("#name").val(),
        type: $("#type").val(),
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: val,
        water: water,
        electricity: electricity,
        contract: contract,
        curfew: curfew,
        pet: pet,
        parking: parking,
        visitors: visitors,
      },
      success: function (data) {
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });

  $("#water").click(function () {
    if ($("#water").prop("checked")) {
      val = "yes";
    } else {
      val = "";
    }

    water = val;

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: $("#name").val(),
        type: $("#type").val(),
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: parseInt($("#capacity").val()),
        water: val,
        electricity: electricity,
        contract: contract,
        curfew: curfew,
        pet: pet,
        parking: parking,
        visitors: visitors,
      },
      success: function (data) {
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });

  $("#electricity").click(function () {
    if ($("#electricity").prop("checked")) {
      val = "yes";
    } else {
      val = "";
    }

    electricity = val;

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: $("#name").val(),
        type: $("#type").val(),
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: parseInt($("#capacity").val()),
        water: water,
        electricity: val,
        contract: contract,
        curfew: curfew,
        pet: pet,
        parking: parking,
        visitors: visitors,
      },
      success: function (data) {
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });

  $("#contract").click(function () {
    if ($("#contract").prop("checked")) {
      val = "yes";
    } else {
      val = "";
    }

    contract = val;

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: $("#name").val(),
        type: $("#type").val(),
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: parseInt($("#capacity").val()),
        water: water,
        electricity: electricity,
        contract: val,
        curfew: curfew,
        pet: pet,
        parking: parking,
        visitors: visitors,
      },
      success: function (data) {
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });

  $("#curfew").click(function () {
    if ($("#curfew").prop("checked")) {
      val = "yes";
    } else {
      val = "";
    }

    curfew = val;

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: $("#name").val(),
        type: $("#type").val(),
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: parseInt($("#capacity").val()),
        water: water,
        electricity: electricity,
        contract: contract,
        curfew: val,
        pet: pet,
        parking: parking,
        visitors: visitors,
      },
      success: function (data) {
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });

  $("#pet").click(function () {
    if ($("#pet").prop("checked")) {
      val = "allowed";
    } else {
      val = "";
    }

    pet = val;

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: $("#name").val(),
        type: $("#type").val(),
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: parseInt($("#capacity").val()),
        water: water,
        electricity: electricity,
        contract: contract,
        curfew: curfew,
        pet: val,
        parking: parking,
        visitors: visitors,
      },
      success: function (data) {
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });

  $("#parking").click(function () {
    if ($("#parking").prop("checked")) {
      val = "allowed";
    } else {
      val = "";
    }

    parking = val;

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: $("#name").val(),
        type: $("#type").val(),
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: parseInt($("#capacity").val()),
        water: water,
        electricity: electricity,
        contract: contract,
        curfew: curfew,
        pet: pet,
        parking: val,
        visitors: visitors,
      },
      success: function (data) {
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });

  $("#visitors").click(function () {
    if ($("#visitors").prop("checked")) {
      val = "allowed";
    } else {
      val = "";
    }

    visitors = val;

    $.ajax({
      url: "./admin/db/apartments/search.php",
      method: "POST",
      dataType: "JSON",
      data: {
        name: $("#name").val(),
        type: $("#type").val(),
        minPrice: parseInt($("#min-input").val()),
        maxPrice: parseInt($("#max-input").val()),
        capacity: parseInt($("#capacity").val()),
        water: water,
        electricity: electricity,
        contract: contract,
        curfew: curfew,
        pet: pet,
        parking: parking,
        visitors: val,
      },
      success: function (data) {
        if (data == "") {
          $("#apartments-data").html(`
            <div div class="box">
             <div class="content">
                <h3>No apartment data</h3>
             </div>
          </div>`);
        } else {
          $("#apartments-data").html(searchApartments(row, data));
        }
      },
    });
  });
});
