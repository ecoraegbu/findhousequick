$(document).ready(function () {
  hashUrlChange(window.location.hash.slice(1));

  $("li > a").click(function () {
    hashUrlChange(this.hash.slice(1));
  });
});

function hashUrlChange(url) {
  $("#content").load("Pages/" + url + ".php");
}
