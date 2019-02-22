<script>
// JS to pop up delete confirmation
function confirmDelete() {

  var del = confirm("Are you sure you wish to continue? This action is non reversible.");

  if (del == false) {
    event.preventDefault();
    }
}

</script>
