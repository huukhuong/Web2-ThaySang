// Làm hiệu ứng mượt khi scroll
$("a[href*='#']:not([href='#])").click(function () {
  // a[href*='#']:not([href='#]) => bỏ qua thẻ a có href là "#"
  let target = $(this).attr("href"); // lấy đường dẫn trong thẻ a

  $('html,body').stop().animate({
    scrollTop: $(target).offset().top // srcoll lên top element
  }, 1000); //1s
  event.preventDefault(); //chặn event mặc định khi click thẻ a
});