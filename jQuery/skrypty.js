$(document).ready(function () {
  $("h1").next().slideToggle(0);
  $("h1").click(function () {
    $(this).next().slideToggle(400);
  });
});
