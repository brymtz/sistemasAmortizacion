/*var modeSwitch = document.querySelector('.mode-switch');
  modeSwitch.addEventListener('click', function () {                    
   document.documentElement.classList.toggle('light');
   modeSwitch.classList.toggle('active');
  });*/
  window.addEventListener('popstate', function (event){
    var stateObj = event.state;
    loadContent();
  });

function changePage(event){
  event.preventDefault();

  var stateObj = {datos: ""+ event.currentTarget.href};
  history.pushState(stateObj, "Titulo", ""+event.currentTarget.href);

  loadContent();
}
