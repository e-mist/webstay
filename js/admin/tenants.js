$(document).ready(function () {
  // Show Form Tenants
  $("#addShowForm").click(function (e) {
    e.preventDefault();

    $(".section").load("./admin/components/add-new-tenants.php");
  });

  // Back Button
  $("#backBtn").click(function (e) {
    e.preventDefault();

    $(".section").load("./admin/components/tenants.php");
  });

  // Get All Tenants
  $.ajax({
    url: "./admin/db/tenants/get.php",
    method: "GET",
    dataType: "JSON",
    success: function (data) {
      data.forEach((tenant) => {
        $("#tenants-data").append(`
            <tr>
                <td>${tenant[1]}</td>
                <td>${tenant[2]}</td>
                <td>${tenant[3]}</td>
                <td>
                    <button class="btn-danger" id="deleteBtn" value="${tenant[0]}">Delete</button>
                </td>
            </tr>
        `);
      });

      // Delete Tenants
      $("*#deleteBtn").click(function (e) {
        e.preventDefault();

        const id = $(this).val();

        let name = "";

        data.forEach((tenant) => {
          if (id == tenant[0]) {
            name = tenant[1];
          }

          Swal.fire({
            title: "Are you sure?",
            html: `Are you sure you want to remove <b>${name}</b> from the tenants? <br> <i>This action cannot be undone.</i>`,
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
          }).then((result) => {
            if (result.isConfirmed) {
              Swal.fire({
                title: "Removed!",
                text: "Tenant has been removed.",
                icon: "success",
              });

              $.ajax({
                url: "./admin/db/tenants/delete.php",
                method: "POST",
                data: {
                  id: id,
                },
              });

              $(".section").load("./admin/components/tenants.php");
            }
          });
        });
      });
    },
  });

  // Search Tenants
  $("#searchBtn").click(function (e) {
    e.preventDefault();

    const name = $("#name").val();
    const apartment_assign = $("#apartment_assign").val();

    if (apartment_assign == "") {
      Swal.fire({
        icon: "info",
        text: "Apartment assign required.",
      });
    } else {
      $.ajax({
        url: "./admin/db/tenants/search.php",
        method: "POST",
        data: {
          name: name,
          apartment_assign: apartment_assign,
        },
        dataType: "JSON",
        success: function (data) {
          let row = "";

          data.forEach((tenant) => {
            row += `<tr>
                <td>${tenant[1]}</td>
                <td>${tenant[2]}</td>
                <td>${tenant[3]}</td>
                <td>
                    <button class="btn-danger" id="deleteBtn" value="${tenant[0]}">Delete</button>
                </td>
            </tr>`;
          });

          if (row == "") {
            $("#tenants-data").html(
              `<tr><td colspan="4" style="text-align: center; padding: 5rem; font-weight: bolder">No tenants data</td></tr>`
            );
          } else {
            $("#tenants-data").html(row);
          }

          // Delete Tenants
          $("*#deleteBtn").click(function (e) {
            e.preventDefault();

            const id = $(this).val();

            let name = "";

            data.forEach((tenant) => {
              if (id == tenant[0]) {
                name = tenant[1];
              }

              Swal.fire({
                title: "Are you sure?",
                html: `Are you sure you want to remove <b>${name}</b> from the tenants? <br> <i>This action cannot be undone.</i>`,
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
              }).then((result) => {
                if (result.isConfirmed) {
                  Swal.fire({
                    title: "Removed!",
                    text: "Tenant has been removed.",
                    icon: "success",
                  });

                  $.ajax({
                    url: "./admin/db/tenants/delete.php",
                    method: "POST",
                    data: {
                      id: id,
                    },
                  });

                  $(".section").load("./admin/components/tenants.php");
                }
              });
            });
          });
        },
      });
    }
  });

  // Add Tenants
  $("#addTenantsBtn").click(function (e) {
    e.preventDefault();

    const name = $("#name").val();
    const contact_number = $("#contact_number").val();
    const apartment_assign = $("#apartment_assign").val();

    if (name == "" || contact_number == "" || apartment_assign == "") {
      Swal.fire({
        icon: "info",
        text: "Fill up all fields!",
      });
    } else {
      $.ajax({
        url: "./admin/db/tenants/add.php",
        method: "POST",
        data: {
          name: name,
          contact_number: contact_number,
          apartment_assign: apartment_assign,
        },
        success: function () {
          Swal.fire({
            icon: "success",
            text: "Tenants added successfully!",
          });

          $("form").trigger("reset");
        },
      });
    }
  });
});
