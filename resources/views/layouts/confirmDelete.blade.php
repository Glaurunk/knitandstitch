<script>
// JS to pop up delete confirmation
function confirmDelete() {

  var del = confirm("Είστε σίγουροι ότι θέλετε να συνεχίσετε; Η διαγραφή θα είναι οριστική.");

  if (del == false) {
    event.preventDefault();
    }
}

</script>
