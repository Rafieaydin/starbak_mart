var namapro = document.getElementById("nama_pro").value
if (namapro == "") {
    document.getElementById("button1").style.display = "inline"
    document.getElementById("button2").style.display = "none"
    document.getElementById("button").style.display = "none"
}

var semuadata = []

function tampil() {
    var data = document.getElementById('tampildata')
    var nama = semuadata.map(function (nama) {
        return nama.nama
    });
    var kategori = semuadata.map(function (kategori) {
        return kategori.kategori
    });
    var gambar = semuadata.map(function (gambar) {
        return gambar.gambar
    });
    var kode = semuadata.map(function (kode) {
        return kode.kode
    });
    var harga = semuadata.map(function (harga) {
        return harga.harga
    });
    var satuan = semuadata.map(function (satuan) {
        return satuan.satuan
    });
    var stock = semuadata.map(function (stock) {
        return stock.stock
    });

    data.innerHTML = ''
    for (i = 0; i < nama.length; i++) {
        no = i + 1
        data.innerHTML += '<tr>' +
            '<td><p class"text">' + no + '</p></td>' +
            '<td><p class"text">' + kode[i] + '</p></td>' +
            '<td><p class"text">' + nama[i] + '</p></td>' +
            '<td><p class"text">' + harga[i] + '</p></td>' +
            '<td><p class"text">' + satuan[i] + '</p></td>' +
            '<td><p class"text">' + kategori[i] + '</p></td>' +
            '<td><p class"text" id="stock'+no+'">' + stock[i] + '</p></td>' +
            '<td><p class"text"><img src="' + gambar[i] + '" class="image"></p></td>' +
            "<td>" +
            '<button class="btn btn-warning mr-1" onclick="edit(' + i + ')">Edit</button>' +
            '<button class="btn btn-danger" onclick="remove(' + i + ')">hapus</button>' +
            '</td>' +
            '</tr>'
        var stocks = document.getElementById('stock' + no + '')
        if (Number(stocks.innerHTML) < 5) {
            stocks.style.backgroundColor = "red"
            stocks.style.color = "white"
        } else {
            stocks.style.backgroundColor = ""
            stocks.style.color = ""
        }
    }
}
var index = []

function edit(i) {
    var nama = semuadata.map(function (nama) {
        return nama.nama
    });
    var kategori = semuadata.map(function (kategori) {
        return kategori.kategori
    });
    var gambar = semuadata.map(function (gambar) {
        return gambar.gambar
    });
    var kode = semuadata.map(function (kode) {
        return kode.kode
    });
    var harga = semuadata.map(function (harga) {
        return harga.harga
    });
    var satuan = semuadata.map(function (satuan) {
        return satuan.satuan
    });
    var stock = semuadata.map(function (stock) {
        return stock.stock
    });
    document.getElementById('kode_pro').value = kode[i]
    document.getElementById('nama_pro').value = nama[i]
    document.getElementById('gambar').value = harga[i]
    document.getElementById('kategori').value = satuan[i]
    document.getElementById('satuan').value = kategori[i]
    document.getElementById('harga').value = gambar[i]
    document.getElementById('stock').value = stock[i]

    document.getElementById("button1").style.display = "none"
    document.getElementById("button2").style.display = "inline"
    document.getElementById("button").style.display = "inline"
    index.push(i)
}

function simpanedit() {
    var add_kode = document.getElementById('kode_pro').value
    var add_nama = document.getElementById('nama_pro').value
    var add_gambar = document.getElementById('gambar').value
    var add_kategori = document.getElementById('kategori').value
    var add_satuan = document.getElementById('satuan').value
    var add_harga = document.getElementById('harga').value
    var add_stock = document.getElementById('stock').value

    if (add_nama != "" && add_kategori != "" && add_kode != "" && add_satuan != "" && add_harga != "" && add_gambar != "" && add_stock != "") {
        var edit = ({
            kode: add_kode,
            nama: add_nama,
            kategori: add_kategori,
            gambar: add_gambar,
            satuan: add_satuan,
            harga: add_harga,
            stock: add_stock
        })
        semuadata = Object.assign([], semuadata, {
            [index]: edit
        })
        index.pop()
        document.getElementById('kode_pro').value = ''
        document.getElementById('nama_pro').value = ''
        document.getElementById('gambar').value = ''
        document.getElementById('kategori').value = ''
        document.getElementById('satuan').value = ''
        document.getElementById('harga').value = ''
        document.getElementById('stock').value = ''
        document.getElementById("button1").style.display = "inline"
        document.getElementById("button2").style.display = "none"
        document.getElementById("button").style.display = "none"
        tampil()
    } else {
        $("body").prepend(
            "<div id='alert-popup' class='alert alert-danger' role='alert'>Tidak boleh kosong</div>"
        );
        setTimeout(function () {
            $("#alert-popup").alert("close");
        }, 2000);
    }
}

function batal() {
    document.getElementById('kode_pro').value = ''
    document.getElementById('nama_pro').value = ''
    document.getElementById('gambar').value = ''
    document.getElementById('kategori').value = ''
    document.getElementById('satuan').value = ''
    document.getElementById('harga').value = ''
    document.getElementById('stock').value = ''
    document.getElementById("button1").style.display = "inline"
    document.getElementById("button2").style.display = "none"
    document.getElementById("button").style.display = "none"
}

function pesan() {
    var add_kode = document.getElementById('kode_pro').value
    var add_nama = document.getElementById('nama_pro').value
    var add_gambar = document.getElementById('gambar').value
    var add_kategori = document.getElementById('kategori').value
    var add_satuan = document.getElementById('satuan').value
    var add_harga = document.getElementById('harga').value
    var add_stock = document.getElementById('stock').value

    if (add_nama != "" && add_kategori != "" && add_kode != "" && add_satuan != "" && add_harga != "" && add_gambar != "" && add_stock != "") {
        semuadata.push({
            kode: add_kode,
            nama: add_nama,
            kategori: add_kategori,
            gambar: add_gambar,
            satuan: add_satuan,
            harga: add_harga,
            stock: add_stock
        })
        document.getElementById('kode_pro').value = ''
        document.getElementById('nama_pro').value = ''
        document.getElementById('gambar').value = ''
        document.getElementById('kategori').value = ''
        document.getElementById('satuan').value = ''
        document.getElementById('harga').value = ''
        document.getElementById('stock').value = ''
    } else {
        $("body").prepend(
            "<div id='alert-popup' class='alert alert-danger' role='alert'>Tidak boleh kosong</div>"
        );
        setTimeout(function () {
            $("#alert-popup").alert("close");
        }, 2000);
    }
    tampil()
}

function remove(i) {
    semuadata.splice(i, 1);
    tampil()
}

function kodeproduk(value) {
    var kategori = semuadata.map(function (kategori) {
        return kategori.kategori
    });
    var idkode = []
    var kodekatagori = value.split(" ").filter(function (e) {
        return e.trim().length > 0;
    });
    for (i = 0; i < kodekatagori.length; i++) {
        if (kodekatagori.length == 1) {
            var code = kodekatagori[i].slice(0, 2)
        } else {
            var code = kodekatagori[i].slice(0, 1)
        }
        idkode.push(code)
    }

    var kodeproduk = idkode.join("")
    kodeproduk = kodeproduk.toUpperCase()
    if (idkode.length == 0) {
        document.getElementById("kode_pro").value = ''
    } else {
        var count = 1;
        for (i = 0; i < kategori.length; ++i) {
            if (kategori[i].toLowerCase() == value.toLowerCase()) {
                count++;
            }
        }
        if (count < 10) {
            document.getElementById("kode_pro").value = kodeproduk + '-00' + count
        } else if (count < 100) {
            document.getElementById("kode_pro").value = kodeproduk + '-0' + count
        } else {
            document.getElementById("kode_pro").value = kodeproduk + '-' + count
        }
    }
}