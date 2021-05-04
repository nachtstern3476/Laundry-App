$('document').ready(function(){    
    var tbl_member = $("#table-member").DataTable({"sDom": 'ftp',"lengthChange": false,"pageLength":5})

    let namaError = $('#nama-error') 
    let telpError = $('#telp-error') 
    let genderError = $('#gender-error') 
    let alamatError = $('#alamat-error')

    $('#addMember').submit(async function(e) {
        $('#addMember button').prop('disabled', true)
        e.preventDefault()
        removeError()

        let url = $(this).attr('action') 
        let data = {
            'nama' :$('#namaUser').val(),
            'telp' : $('#noTelp').val(),
            'gender' : $('#jenisKelamin').val(),
            'alamat' : $('#alamat').val(),
        } 
        ajax(url, 'POST', data).then(result=>{
            $('#addMember button').prop('disabled', false)
            let res = JSON.parse(result) 
            if (res.error) {
                if (res.errorItem.namaUser) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.namaUser}</small>`) 
                if (res.errorItem.telp) telpError.html(`<small><span class='text-danger'>* </span>${res.errorItem.telp}</small>`) 
                if (res.errorItem.gender) genderError.html(`<small><span class='text-danger'>* </span>${res.errorItem.gender}</small>`) 
                if (res.errorItem.alamat) alamatError.html(`<small><span class='text-danger'>* </span>${res.errorItem.alamat}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
                    window.location = res.url
                })
            }
        }).catch(err=>{
            $('#addMember button').prop('disabled', false)
            console.log(err) 
        })
    })

    $('#editMember').submit(function(e) {
        $('#editMember button').prop('disabled', true)
        e.preventDefault()
        removeError()

        let url = $(this).attr('action') 
        let data = {
            'nama' :$('#namaUser').val(),
            'telp' : $('#noTelp').val(),
            'alamat' : $('#alamat').val(),
            'gender' : $('#jenisKelamin').val(),
        } 
        ajax(url, 'PUT', data).then(result=>{
            $('#editMember button').prop('disabled', false)
            let res = JSON.parse(result) 
            if (res.error) {
                if (res.errorItem.namaUser) namaError.html(`<small><span class='text-danger'>* </span>${res.errorItem.namaUser}</small>`) 
                if (res.errorItem.noTelp) telpError.html(`<small><span class='text-danger'>* </span>${res.errorItem.noTelp}</small>`) 
                if (res.errorItem.gender) genderError.html(`<small><span class='text-danger'>* </span>${res.errorItem.gender}</small>`) 
                if (res.errorItem.alamat) alamatError.html(`<small><span class='text-danger'>* </span>${res.errorItem.alamat}</small>`) 
            }else{
                Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                .then(()=>{
                    window.location = res.url
                })
            }
        }).catch(err=>{
            $('#editMember button').prop('disabled', false)
            console.log(err) 
        })
    })

    $('a[data-id="deleteMember"]').on('click', function(e) {
        $(this).addClass('disabled');
        e.preventDefault() 

        let url = $(this).attr('href') 
        Swal.fire({
            title: 'Apa anda yakin',
            text: "Data yang dihapus tidak bisa dikembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true,
        }).then((result) => {
            if (!result.dismiss) {
                ajax(url, 'DELETE').then(result=>{
                    $(this).removeClass('disabled');
                    let res = JSON.parse(result) 
                    Swal.fire(fisrtLetterUpercase(res.status), res.message, res.status)
                    .then(()=>{
                        window.location.reload(true)
                    })
                }).catch(err=>{
                    $(this).removeClass('disabled');
                    console.log(err) 
                })
            }else{
                $(this).removeClass('disabled');
            }
        })
    })

    function removeError() {
        namaError.html('')
        telpError.html('')
        genderError.html('')
        alamatError.html('')
    }
})