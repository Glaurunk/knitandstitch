//  read more / read less collapsibles

if (location.pathname == "/") {

    window.onload = function() {
        var show = document.getElementsByClassName('show-more');
        var hide = document.getElementsByClassName('show-less');
        var els = document.getElementsByClassName('p-card');
        var i;

        for (i = 0; i < els.length; i++ ) {

          if (els[i].innerText.split(' ').length > 50) {

             show[i].classList.remove('hidden');
      }
    }
  }
}


function showMore(more, less, pid) {

  var els = document.getElementById(pid);
  var show = document.getElementById(more);
  var hide = document.getElementById(less);

  show.classList.toggle('hidden');
  hide.classList.toggle('hidden');
  els.classList.toggle('fp-show');

}
