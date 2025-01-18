$(document).ready(function () {
  $(".gallery img").each(function (index) {
    $(this)
      .delay(index * 200)
      .animate({ opacity: 1 }, 500);
  });

  $(".gallery img").click(function () {
    const src = $(this).attr("src");
    $("#modalImage").attr("src", src);
    $(".modal").fadeIn(300);
  });

  $("#closeModal").click(function () {
    $(".modal").fadeOut(300);
  });

  $(".modal").click(function (event) {
    if (!$(event.target).closest(".modal-content").length) {
      $(".modal").fadeOut(300);
    }
  });

  $(document).click(function (event) {
    if (!$(event.target).closest(".modal, .gallery img").length) {
      $(".modal").fadeOut(300);
    }
  });
});
