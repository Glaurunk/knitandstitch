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
  document.getElementById("cover").src = "/storage/photos/"+copyText;
  document.getElementById("cover").classList.add("thumbnail");
  document.getElementById("inputField").value = copyText;
  document.getElementById("photoPath").innerHTML = copyText;

// hide the modal
  $('#inputForm').modal('hide');
}


function insertPhoto($url2) {
// pass the photo url to a temporary field then copy it to the clipboard
  var str = "http://127.0.0.1:8000/storage/photos/"+$url2;
  var hiddenInput = document.getElementById("hiddenInput");
  hiddenInput.value = str;
  hiddenInput.select();
  document.execCommand("copy");
// hide the modal
  $('#inputForm').modal('hide');
}


function  addToCarousel(name) {

  $('#insert').modal('hide');

}
