$('document').ready(function(){
    $('#setting').submit(function(e){
        $('#setting button').prop('disabled', true)
        e.preventDefault()

        let url = $(this).attr('action')
        let data = {
            'pajak': $('#pajak').val(),
        }
        if ($('#changeOutlet').length) data.outlet = $('#changeOutlet').val();

        ajax(url, 'PUT', data).then(result=>{
            $('#setting button').prop('disabled', false)
            Swal.fire('Success', 'Berhasil melakukan perubahan', 'success')
            .then(()=>{
                $('#settings').modal('hide')
                window.location.reload(true)
            })
        }).catch(err=>{
            $('#setting button').prop('disabled', false)
        })
    })
})

function ajax(url, type, data= '', data2= ''){
    return new Promise((resolve, reject)=>{
        $.ajax({
            url: url,
            type: type,
            data: {data, data2},
            success: resolve,
            error: reject
        })
    })
}
function rupiahFormat(harga) {
    let formater = new Intl.NumberFormat('ID')
    return formater.format(harga)
}
function fisrtLetterUpercase(string){
    return string.charAt(0).toUpperCase() + string.slice(1) 
}

// ---------------------------------------------------------------------
// function removeRow(table, tabstring, id) {
//     table.row(`[data-list="listItem${id}"]`).remove().draw(false)
//     $(`#${tabstring} tbody`).children().each(function(i, val) {
//         console.log(val)
//         val.children[0].innerHTML = i+1
//     })
// }