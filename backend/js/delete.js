
$(document).ready(function(){
$('.delete_employee').click(function(e){
e.preventDefault();
var empid = $(this).attr('data-emp-id');
var parent = $(this).parent("td").parent("tr");

    swal({
        

  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false



    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'deCli.php',
                type: 'POST',
                data: 'empid=' +empid,
                dataType: 'json'
            })
                .done(function (response) {
                    swal('Deleted!', response.message, response.status);
                    fetch();
                })
                .fail(function () {
                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                });
        }

    })


});
});



                                                    


