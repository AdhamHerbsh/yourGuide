$(document).ready(function () {
  $("#preloader").fadeOut();

  $(document).on("click", ".mprekt", function () {
    $(".lsitte").animate({ left: "0" }, 500);
    $(".der4er5").empty();
    htmlStr = '<i class="fas fa-long-arrow-alt-right mppkte"></i>';

    $(".der4er5").html(htmlStr);
  });
  $(document).on("click", ".mppkte", function () {
    $(".lsitte").animate({ left: "-100%" }, 500);
    htmlStr = ' <span class="fas fa-bars mprekt"></span>';

    $(".der4er5").html(htmlStr);
  });

  $("#message-btn").click(function () {
    $.ajax({
      url: "insert_message.php",
      method: "POST",
      data: $("#message-form").serialize(),
      success: function (data) {
        $("#msg2").html(data);
      },
    });
  });

  $(document).on("click", "#opensearch", function () {
    $(".searchbar").slideDown();
  });

  $(document).on("click", ".closebar", function () {
    $(".searchbar").slideUp();
  });

  $(".acc h3").click(function () {
    $(this).next(".content-faq").slideToggle();
    $(this).parent().toggleClass("active");
    $(this).parent().siblings().children(".content-faq").slideUp();
    $(this).parent().siblings().removeClass("active");
  });

  $("#message-btn2").click(function () {
    $.ajax({
      url: "insert_comment.php",
      method: "POST",
      data: $("#message-form2").serialize(),
      success: function (data) {
        $("#msg22").html(data);
      },
    });
  });

  $(document).on("click", ".navbar-collapse.in", function (e) {
    if ($(e.target).is("a")) {
      $(this).collapse("hide");
    }
  });

  $("#lrjerkje").click(function () {
    $(".fmre5re").fadeOut();
  });

  $("#crel8fs8").click(function () {
    removecart();
  });
  $(".favorite").click(function () {
    $("");
    $(".fmre5re").fadeIn();
  });

  $("#sd").click(function () {
    $.ajax({
      url: "insert_message.php",
      method: "POST",
      data: $("#form-sd").serialize(),
      success: function (data) {
        $(".err-msg").html(data);
      },
    });
  });

  $(".up-ava").change(function () {
    $("#sb-bt").css("visibility", "visible");
  });

  $("#a-btn-option").click(function () {
    $.ajax({
      url: "register-ajax.php",
      method: "POST",
      data: $("#form-info").serialize(),
      success: function (data) {
        $(".err-msg").html(data);
      },
    });
  });
});
