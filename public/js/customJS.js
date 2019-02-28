// JS to pop up delete confirmation
function confirmDelete() {

  var del = confirm("Are you sure you want to delete this item? This action cannot be undone.");

  if (del == false) {
    event.preventDefault();
    }
}


function copyToInput($url) {
// get the photo name as a string; pass it to the thumbnail preview both as a name ans as a local url
  var copyText = $url;
  document.getElementById("cover").src = "/gallery/"+copyText;
  document.getElementById("cover").classList.add("thumbnail");
  document.getElementById("inputField").value = copyText;
  document.getElementById("photoPath").innerHTML = copyText;

// hide the modal
  $('#inputForm').modal('hide');
}


function insertPhoto($url2) {
// pass the photo url to a temporary field then copy it to the clipboard
  var str = "http://127.0.0.1:8000/gallery/"+$url2;
  var hiddenInput = document.getElementById("hiddenInput");
  hiddenInput.value = str;
  hiddenInput.select();
  document.execCommand("copy");
// hide the modal
  $('#inputForm').modal('hide');
}


function  addToCarousel(name) {
// just close the modal on click
  $('#insert').modal('hide');
}

// put selected thumbnail to preview and add selected class in order to place border
function preview(path, name) {
  document.getElementById('lightbox').src = path;
  var els = document.getElementsByClassName('slides');
    for (var i = 0; i < els.length; i++)
      {
        els[i].classList.remove('selected');
      }
  (document.getElementById(name)).classList.add('selected');
}


function addPhoto(photo) {
// insert a new cell with photo and photo name when click
// then add value to hidden input and close modal
  var row = document.getElementById('row');
  var cell1 = row.insertCell(0);

  var elem = document.createElement("img");
  elem.setAttribute("height", "120");
  elem.setAttribute("width", "150");
  elem.setAttribute("class", "mr-2 mb-3");
  elem.src = '/gallery/'+photo;
  cell1.setAttribute("id", "{{ $photo }}");
  cell1.setAttribute("onclick", "removeGallery(this.id)");
  cell1.appendChild(elem);
  cell1.innerHTML += "<br>"+photo+"<br><small>click on image to remove</small>";
// for each clicked picture add its name to the hidden input path, then add a comma in order to transform the inputed string to an array inside the controller
  document.getElementById('inputGallery').value += photo+',';

  $('#inputForm').modal('hide');
}


function removeGallery(photo) {

  var el = document.getElementById(photo);
  document.getElementById('inputGallery').value -= photo+',';
  el.remove();
}
