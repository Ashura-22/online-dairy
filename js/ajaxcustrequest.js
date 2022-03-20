$(document).ready(function () {
  //ajax call for already exists email verification
  $("#custregemail").on("keypress blur", function () {
    var cust_mail = $("#custregemail").val();
    var reg = /^[A-Z0-9.%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    //console.log("inside");
    $.ajax({
      url: "Customer/addcust.php",
      method: "POST",
      dataType: "JSON",

      data: {
        checkemail: "checkmail",
        cust_mail: cust_mail
      },

      success: function (data) {
        console.log(data);
        if (data != 0) {
          //console.log("nehal");
          $("#statusMsg2").html(
            '<small style="color:red">Email ID Already Used !</small>'
          );
          $("#signup").attr("disabled", true);
        } else if (data == 0) {
          //console.log("yes");
          if (reg.test(cust_mail)) {
            //console.log("ok");
            $("#statusMsg2").html(
              '<small style="color:green">Confirmed!</small>'
            );
            $("#signup").attr("disabled", false);
          }
        } else if (!reg.test(cust_mail)) {
          $("#statusMsg2").html(
            '<small style="color:red">Please Enter Valid Email(example@gmail.com) !</small>'
          );
          $("#signup").attr("disabled", false);
        } else {
          //console.log("else");
        }
        if (cust_mail == "") {
          $("#statusMsg2").html(
            '<small style="color:red">Please Enter Valid Email(example@gmail.com)!</small>'
          );
          $("#signup").attr("disabled", false);
        }
      }
    });
  });
  
  //Below code is for validating name field
  $("#custregname").on("keypress blur", function () {
    var regName = /^[a-zA-Z ]+$/;
    var name= $("#custregname").val();
    //console.log("hoo");
    if(!regName.test(name))
    {
      //console.log("hoi");
      $("#statusMsg1").html(
        '<small style="color:red">Please Enter Valid Name (No special char and numbers) !</small>'
      );
      $("#signup").attr("disabled", true);
    }
    else
    {
      //console.log("hi");
      $("#statusMsg1").html(
        '<small style="color:green">Good to go !</small>'
      );
      $("#signup").attr("disabled", false);
    }
  });

  //Below code is for validating mob field
  $("#custregmob").on("keypress blur", function () {
    var regmob = /^\d{10}$/;
    var mob= $("#custregmob").val();
    //console.log("hoo");
    if(!regmob.test(mob))
    {
      //console.log("hoi");
      $("#statusMsg5").html(
        '<small style="color:red">Please Enter Valid Number !</small>'
      );
      $("#signup").attr("disabled", true);
    }
    else
    { 
      $.ajax({
        url: "Customer/addcust.php",
        method: "POST",
        dataType: "JSON",
  
        data: {
          checkmob: "checkmob",
          cust_mob: mob
        },
  
        success: function (data) {
          console.log(data);
          if (data != 0) {
            console.log("nehal");
            $("#statusMsg5").html(
              '<small style="color:red">Mobile no. is Already Used !</small>'
            );
            $("#signup").attr("disabled", true);
          } else if (data == 0) {
            $("#statusMsg5").html(
                '<small style="color:green">Good to go !</small>'
              );
              $("#signup").attr("disabled", false);
          }
        }
      });
    }
  });
});

function addCust() {
  var reg = /^[A-Z0-9.%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var custregname = $("#custregname").val();
  var custregemail = $("#custregemail").val();
  var custregpass = $("#custregpass").val();
  var custregaddr = $("#custregaddr").val();
  var custregmob = $("#custregmob").val();

  // console.log(custregname);
  //checking form fields on form submission
  if (custregname.trim() == "") {
    $("#statusMsg1").html(
      '<small style="color:red">Please Enter Name !</small>'
    );
    $("#custregname").focus();
    return false;
  } else if (custregemail.trim() == "") {
    $("#statusMsg2").html(
      '<small style="color:red">Please Enter Email !</small>'
    );
    $("#custregemail").focus();
    return false;
  } else if (custregpass.trim() == "") {
    $("#statusMsg3").html(
      '<small style="color:red">Please Enter Password !</small>'
    );
    $("#custregpass").focus();
    return false;
  } else if (custregaddr.trim() == "") {
    $("#statusMsg4").html(
      '<small style="color:red">Please Enter Address !</small>'
    );
    $("#custregaddr").focus();
    return false;
  } else if (custregemail.trim() == "") {
    if (!custregemail.value.match(reg)) {
      $("#statusMsg2").html(
        '<small style="color:red">Please Enter Valid Email(example@gmail.com) !</small>'
      );
      $("#custregemail").focus();
      return false;
    }
  } else {
    $.ajax({
      url: "Customer/addcust.php",
      dataType: "JSON",
      method: "POST",
      data: {
        ctreg: "custreg",
        ctname: custregname,
        ctmail: custregemail,
        ctpass: custregpass,
        ctaddr: custregaddr,
        ctmob: custregmob
      },
      success: function (data) {
        console.log(data);

        if (data == "OK") {
          $("#successMsg").html(
            "<span class='alert alert-success'>Registration Successful !</span>"
          );
          clearCustRegFeild();
        } else if (data == "Failed") {
          $("#successMsg").html(
            "<span class='alert alert-danger'>Unable to register</span>"
          );
        }
      }
    });
  }
}

//Empty All Fields
function clearCustRegFeild() {
  $("#custRegForm").trigger("reset");
  $("#statusMsg1").html(" ");
  $("#statusMsg2").html(" ");
  $("#statusMsg3").html(" ");
  $("#statusMsg4").html(" ");
  $("#statusMsg5").html(" ");
}

//Empty All Fields of Customer Login
function clearCustlogField()
{
  $("#custlogform").trigger("reset");
  $("#loginMsg").html(" ");
}

//Empty All Fields of Admin Login
function clearAdmlogField()
{
  $("#admlogform").trigger("reset");
}

//ajax call for customer login checking email and password of customer
function checkcustlogin() {
  // console.log("login clicked");

  var custlogmail = $("#custemail").val();
  var custlogpass = $("#custpass").val();

  // console.log(custlogmail);
  // console.log(custlogpass);

  $.ajax({
    url: "Customer/addcust.php",
    dataType: "JSON",
    method: "POST",
    data: {
      custcheck: "check",
      custlogmail: custlogmail,
      custlogpass: custlogpass
    },
    success: function (data) {
      console.log(data);
      if (data == 0) {
        $("#loginMsg").html(
          '<small class="alert alert-danger">Invalid ID or Password !</small>'
        );
      } else if (data == 1) {
        $("#loginMsg").html(
          '<div class="spinner-grow text-success" role="status"></div>'
        );
        setTimeout(() => {
          window.location.reload();
        }, 1000);
      }
    }
  });
}
