function deleteFile (filename, id) {
  Swal.fire({
    title: 'Delete ' + filename + " ?",
    text: "You won't be able to undo this action",
    icon: 'warning',
    footer: "Deleting file: " + filename,
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Delete'
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      location.href="/delete.php?id=" + id
    } 
  })

}