require('./bootstrap');



if (document.getElementById('app')) {
    var app = new Vue({
      el: '#app'
    });
  }
  
if (document.getElementById('confirmareliminar')) {
    __webpack_require__(/*! ./confirmareliminar */ "./resources/js/confirmareliminar.js");
 }