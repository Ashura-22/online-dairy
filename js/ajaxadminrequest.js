//ajax call for admin login checking email and password of admin
function checkadminlogin() {
  // console.log("login clicked");

  var adminlogmail = $("#adminemail").val();
  var adminlogpass = $("#adminpass").val();

    //  console.log(adminlogmail);
    //  console.log(adminlogpass);

  $.ajax({
    url: "Admin/admin.php",
    Type: "JSON", 
    method: "POST",
    data: {
      admincheck: "check",
      adminlogmail: adminlogmail,
      adminlogpass: adminlogpass,
    },
    success: function (data) {
      // console.log(data);
      if (data == 0) {
        $("#successadminMsg").html(
          '<small class="alert alert-danger">Invalid ID or Password !</small>'
        );
      } 
      else if (data == 1) {
        $("#successadminMsg").html(
          '<div class="spinner-grow text-success" role="status"></div>'
        );
        setTimeout(() => {
          window.location.href = "Admin/admindashboard.php";
        }, 1000);
      }
    }
  });
}
