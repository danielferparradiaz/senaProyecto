// dataAlertMessage(mensaje, icono, posicion, tiempo);

function dataAlertMessage(texto, icon, position, time){
    Swal.fire({
        icon: icon,
        position: position,
        text: texto,
        timer: time,
        showConfirmButton: false,
        timerProgressBar: true,
        toast: true
      })
}


const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-outline-success px-5 mx-auto',
    cancelButton: 'btn btn-outline-primary px-2 mx-auto ',
    title: 'text-center fs-5',
    htmlContainer: 'shadow'
  },
  buttonsStyling: false
})

function dataAlertMessagewithconfirm(texto, icon, position, time, confirm, cancel){
      swalWithBootstrapButtons.fire({
          title: texto,
        //   text: texto,
          icon: icon,
          position: position,
          timerProgressBar: true,
        //   timer: time,
          toast: true,
          showCancelButton: true,
          confirmButtonText: confirm,
          cancelButtonText: cancel,
          reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
            location.href = "/carrito"
        }
      })


    }
