@section('swal-scripts')
<script type="text/javascript" class="init">
    $(document).ready(function() {
        $('#createForm').on('submit',function(e){
            e.preventDefault();

            var form = document.querySelector('#createForm');
            var data = new FormData(form);

            axios.post($('#createForm').attr('action'),data)
                .then(response => {
                    if(response.data.error) {
                        // console.log('succes error');
                        // console.log(response.data);

                    } else {
                        // console.log('success success');
                        // console.log(response.data);
                        swal({
                            title: 'Success',
                            text:"Berhasil Menambahkan Data",
                            icon: "success",
                            timer: 1000,
                            button: false
                            })
                        .then(function() {
                                window.location.reload();
                        });
                        form.reset();
                        $('#createModal').modal('hide')
                    }
                })
                .catch(error => {
                    let errors = ""
                    // console.log(error);
                    // console.log('error');
                    try {
                        errors = Object.values(error.response.data.errors).map(msg => msg[0])
                        errors = errors.join()
                    } catch(e) {
                        error = "Gagal menambahkan User"
                    }
                    swal({
                        title: "Gagal",
                        text:errors,
                        icon: "warning"
                    });
                })
        })
    } );

    function updateThis(){
        event.preventDefault();
        var form = document.querySelector('#editForm');
        var data = new FormData(form);

        axios.post($('#editForm').attr('action'),data)
            .then(response => {
                if(response.data.error) {
                    // console.log('succes error');
                    // console.log(response.data);

                } else {
                    // console.log('success success');
                    console.log(response.data);
                    swal({
                        title: 'Success',
                        text:"Berhasil Mengubah Data",
                        icon: "success",
                        timer: 1000,
                        button: false
                        })
                    .then(function() {
                            window.location.reload();
                    });
                    form.reset();
                    $('#editModal').modal('hide')
                }
            })
            .catch(error => {
                let errors = ""
                console.log(error);
                console.log('errorx');
                try {
                    errors = Object.values(error.response.data.errors).map(msg => msg[0])
                    errors = errors.join()
                    console.log(errors);
                } catch(e) {
                    error = "Gagal Mengubah Data"
                }
                swal({
                    title: "Gagal",
                    text: errors,
                    icon: "warning"
                });
            })
    }

    function deleteThis(id) {
        event.preventDefault();
        var form = $('#deleteForm-'+id);

        swal({
            title: "Apakah Anda Yakin?",
            text: "Anda akan menghapus data ini",
            icon: "warning",
            buttons: ["Batal", "Hapus"],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                swal({
                    title: 'Success',
                    text:"Berhasil Menghapus Data",
                    icon: "success",
                    timer: 1000,
                    button: false
                })
                .then(function(){
                    form.submit();
                })
            } else {

            }
        });
    }
</script>
@endsection