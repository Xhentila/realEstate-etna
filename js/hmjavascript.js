//Header Slider 
  // $(function() {
  //   $(".rslides").responsiveSlides();
  // });
// $('.carousel').carousel({
//   interval: 2000
// })

// DropDown Menu of the Properties

// function myFunction() {
//   var checkBox = document.getElementById("myCheck");
//   var text = document.getElementById("box_form1");
//   if (checkBox.checked == true){
//     text.style.display = "block";
//   } else {
//      text.style.display = "none";
//   }
// }


// Show Hidden
// $(document).ready(()=> {
//   $("#hide_item").hide();

//   $("#hide_btn").click(()=> {
//     $("#hide_item").show();

//   });
// });


//   $("#hide_btn").uncheck(()=> {
//     $("#box_form1").hide();
//   });
// });



/*Scroll down nav-menu modification*/
$(document).ready(()=> {
  $("body").scroll(()=> {
    $(".my-nav").css("background-color","#191919bd");
    $(".nav-link").css("color", "#fff");
  
  });
});


$(document).ready(()=> {
  $('#registernow').on('click', function(){
    $('#login').hide();
  });


 
});

