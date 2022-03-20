// function addProduct()
// {
//     var product_name = $("#product_name").val();
//     var product_desc = $("#product_desc").val();
//     var product_type = $("#product_type").val();
//     var product_quan = $("#product_quan").val();
//     var product_price = $("#product_price").val();
//     var product_img = $("#product_img").val();

//     //console.log(product_name);
//     // console.log(product_type);
//     //console.log(product_img);

//     if(product_name.trim() == "" && product_desc.trim() == "" && product_type.trim() == "" && product_quan.trim() == "" && product_price.trim() == "" && product_img.trim() == "")
//     {
//         console.log("hii");
//         $("#statusmsg").html(
//             '<div class="alert alert-warning col-sm-6 ml-5 mt-2">Please Enter Details</div>'
//           );
//     }
//     else {
//         $.ajax({
//           url: "./addproduct.php",
//           dataType: "JSON",
//           method: "POST",
//           data: {
//             pro_check: "check",
//             pro_name: product_name,
//             pro_desc: product_desc,
//             pro_type: product_type,
//             pro_quan: product_quan,
//             pro_price: product_price,
//             pro_img: product_img,
//           },
//           success: function (data) {
//             console.log(data);
    
//             // if (data == "OK") {
//             //   $("#successMsg").html(
//             //     "<span class='alert alert-success'>Registration Successful !</span>"
//             //   );
//             //   clearCustRegFeild();
//             // } else if (data == "Failed") {
//             //   $("#successMsg").html(
//             //     "<span class='alert alert-danger'>Unable to register</span>"
//             //   );
//             // }
//           }
//         });
//       }
// }