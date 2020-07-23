var resize = function(){
  // 必要な値の取得
  var body = document.body;
  var windowInnerHeight = window.innerHeight;
  var sidebar = document.getElementById("sidebar");
  var navHeight = document.getElementById("nav-top").clientHeight;

  //　bodyのパディングとsidebarの長さの変更
  body.style.paddingTop = navHeight + "px";
  sidebar.style.height = windowInnerHeight - navHeight + "px";
};
resize();
window.onresize = resize();
