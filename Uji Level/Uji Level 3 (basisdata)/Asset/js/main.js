// date time
date = new Date();
arrbulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
arrhari = ["Senin", "Selasa","Rabu",'Kamis','Jumat','Sabtu','Minggu'];
arrhari.unshift('');
hari = date.getDay();
tanggal = date.getDate();
bulan = date.getMonth();
tahun = date.getFullYear();
// console.log(hari);
$('#tanggal').html( arrhari[hari] +', '+tanggal+" "+arrbulan[bulan]+" "+tahun);

// search engine
$('#search').keyup(function () {
    value = $(this).val();
    $(".col-md-3").filter(function() {
    
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
})


function tambahBarang(id) {
    console.log(id);
    $.ajax({
        url:'session/setsession.php?session=' + id,
        type:'get',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            if (data == 'berhasil') {
                location.reload();
            } else if (data == 'gagal') {
                Swal.fire({
                    title: 'stock sudah kosong',
                    icon: 'warning',
                })
            }
        }
    });
}

function kurangBarang(id) {
    $.get('session/sessionKurang.php?session=' + id);
    location.reload();
}

function hapusBarang(id) {
    $.get('session/delSession.php?session=' + id);
    location.reload();
}

// function AddPayment(){
//     $.get('delSession.php');
//     location.reload();
// }