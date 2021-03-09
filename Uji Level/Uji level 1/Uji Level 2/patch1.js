//array barang
var barang = [
    ["Telur Dadar", "Rp 200.000.000", "https://upload.wikimedia.org/wikipedia/commons/b/b1/FoodOmelete.jpg"],
]
var barangTampil =  document.getElementById("main")
//Barang Tampil (Card)
for (let i = 0; i < barang.length; i++) {
    barangTampil.innerHTML += '<div class="card rounded mb-2 ml-3 mr-1 mt-2 drag" id="' + i + '" onclick="tambahBarang(this.id)">' +
        '<img class="card-img-top" src="' + barang[i][2] + '">' +
        '<div class="card-body text-center">' +
        '<p class="card-title text-truncate">' + barang[i][0] + '</p>' +
        '<p class="card-text">' + barang[i][1] + '</p>' +
        '</div>' +
        '</div>'
}
//Search engine
//array barangid sama objek barangid
var barangid = [];
var hitung = {};
//Hitung barang
function hitungBarang() {
    var hitungBarang = {}
    barangid.forEach(function(i) {
        hitungBarang[i] = (hitungBarang[i] || 0) + 1;
    });

    for (var key in hitungBarang) {
        hitung[key] = hitungBarang[key];
        delete hitungBarang[key];
    }
    tampilBarang();
    }
//Hitung Rupiah
function rupiahUang(number) {
    number = number.toString();
    var sisa = number.length % 3;
    var rupiah = number.substr(0, sisa);
    var ribuan = number.substr(sisa).match(/\d{3}/g);
    console.log(ribuan)

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    return rupiah;
}
//Tampilan
function tampilBarang() {
    var tampil = document.getElementById("keranjang");
    tampil.innerHTML = "";

    var tersaring = barangid.reduce(function (a, b) {
        if (a.indexOf(b) < 0) a.push(b);
        return a;
    }, []);

    var hargatotal = [];
    for (i = 0; i < tersaring.length; i++) {
        var hargaakhir = Number(hitung[tersaring[i]]) * Number(barang[tersaring[i]][1].replace(/\R\S+/g, '').replace(".", ""));
        hargatotal.push(hargaakhir);
        console.log(hargaakhir)

        tampil.innerHTML += '<div class="w-100 border mt-1">' +
            '<div class="row mt-1">' +
            '<div class="col">' + barang[tersaring[i]][0] + '</div>' +
            '<div class="col-4"> Rp ' + rupiahUang(hargaakhir) + '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col">' +
            '<div class="row">' +
            '<div class="col-4 mt-1">' +
            '<div>Unit Price:</div>' +
            '</div>' +
            '<div class="col-8">' +
            '<span>' + barang[tersaring[i]][1] + '</span>' +
            '</div>' +
            '</div>' +
            '<div class="row">' +
            '<div class="col-4 mt-1">' +
            '<div>Quantity:</div>' +
            '</div>' +
            '<div class="col-8">' +
            '<div class="input-group mb-2">' +
            '<div class="input-group-prepend">' +
            '<button class="btn input-group-text" onclick="minBarang(' + tersaring[i] + ')"><i class="fas fa-minus"></i></button>' +
            '</div>' +
            '<div class="inputan">' +
            '<input type="text" class="form-control text-center shadow-none" value="' + hitung[tersaring[i]] + '" autocomplete="off" maxlength="2" oninput="ubahNilai(' + tersaring[i] + ',this.value)">' +
            '</div>' +
            '<div class="input-group-append">' +
            '<button class="btn input-group-text" onclick="maxBarang(' + tersaring[i] + ')">' +
            '<i class="fas fa-plus"></i>' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-3 ">' +
            '<button class="btn shadow-none" onclick="hapus(' + tersaring[i] + ')">' +
            '<i class="far fa-trash-alt fa-2x"></i>' +
            '</button>' +
            '</div>' +
            '</div>' +
            '</div>'
    }
    hargatotal = hargatotal.reduce((a, b) => a + b, 0);
    var tax = hargatotal * 0.10;
    var discount = hargatotal * 0.02;

    var hasilnya = hargatotal + tax;
    if (hargatotal > 10000) {
        $("#discount").html("Rp " + rupiahUang(discount));
        hasilnya = hargatotal + tax - discount;
    } else {
        $("#discount").html("Rp  0");
    }

    $('#total').html('Rp ' + rupiahUang(hargatotal));
    $('#tax').html('Rp ' + rupiahUang(tax));
    $('#totalamount').html('Rp ' + rupiahUang(hasilnya));

    hargatotal > 0 ? $('#bayar').prop('disabled', false) : $('#bayar').prop('disabled', true);
}
//TambahBarang (Masukin array ke hitung barang untuk di filter di tampil barang)
function tambahBarang(i) {
    barangid.push(i)
    hitungBarang()
}
//ubahnilai
function ubahNilai(id,val) {
    id = barangid.toString();
    val = Number(val);

    var awal = []
    var i = 0;
    while (i < barangid.length) {
        if (barangid[i] === id) {
            awal.push(barangid[i])
            if (awal.length > 1) {
                barangid.splice(i,1);
            }else{
            //    ++1;
        }
    }
}


    if (val >= 1) {
        for (let i = 0; i < val - 1; i++) {
            barangid.push(id)
        }
    }
    $(document).keydown(function (obJEvent) {
        if (obJEvent.keyCode === 13) {
            hitungBarang()
        }
    });
    console.log(val)
}

//MinBarang (untuk ngurangin barang)
function minBarang(val) {
    if (hitung[val] > 1) {
        var awal  = []
        var i = 0;
        while (i < barangid.length) {
            if (barangid[i] === val.toString()) {
                awal.push(barangid[i])
                if (awal.length > 1) {
                    barangid.splice(i,1)
                    break;
                }else{
                ++i;
                }
        }
    }
}
        hitungBarang()
    }
//Max(untuk nambahin barang)
function maxBarang(i) {
    if (hitung[i] < 99) {
        barangid.push(i.toString());
    }
    hitungBarang();
}


//barang hapus
function hapus(i) {
    var a = 0 ;
    while (a < barangid.length) {
        if (barangid[a] === i.toString()) {
            barangid.splice(a,1)
        }else{
         //   ++1;
        }
    }
    hitungBarang()
}

//modal
$('#animatedberhasil').on('show.bs.modal', function (e) {
    setTimeout(function () {
        $('#modalanimate').hide();
        $('#modalsucces').show();
    }, 3000);
});
//Jam
setInterval(function () {
    var now = new Date();
    var mins = ('0' + now.getMinutes()).slice(-2);
    var hr = now.getHours() % 12 || 12;
    var Time = hr + " : " + mins;
    Time += now.getHours() >= 12 ? "AM" : " PM"
    $(".jam").html(Time);
}, 1000);