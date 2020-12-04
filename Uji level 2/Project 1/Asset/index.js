var namaproduk = ['Roti Gandum ', 'Croissant', 'Crumpet','Corn Bread','Sourdough','Pita','Begel','Bialy','Breadsticks','Brioche','Challah','Ciabatta','English muffin','Baguette',' Roti Italia',' Roti Limpa',' Roti Limpa','Air mineral']
var hargaproduk = [20000, 15000, 38000,40000,2000,5000,10000,20000,10000,20000,20000,2000,10000,20000,5000,10000,10000,10000]
var gambarproduk = [
"https://miro.medium.com/max/700/1*Z5Y2rHzStp0IV9X77owNbA.jpeg",
"https://miro.medium.com/max/700/1*ZmH540cJSx2EhG7Zm-J5Lw.jpeg",
"https://miro.medium.com/max/700/1*unnbF4GbPRic_SPzQ_qFWA.jpeg",
"https://miro.medium.com/max/700/1*scXx0Sael4nmA9u57rbLEA.jpeg",
'https://miro.medium.com/max/700/1*IoR_68spbejt83nMaPSxVg.jpeg',
'https://miro.medium.com/max/700/1*9sk1I_hsibyEgh_kBVom3Q.jpeg',
'https://www.superindo.co.id/upload/images/ROTI%20BAGEL_damascusbakery_com.jpg',
'https://www.superindo.co.id/upload/images/ROTI%20BIALYS_divyascookbook_com.jpg',
'https://www.superindo.co.id/upload/images/ROTI%20GRISSINI_blog_foods_com.jpg',
'https://www.superindo.co.id/upload/images/ROTI%20BRIOCHE_finecooking_com.jpg',
'https://www.superindo.co.id/upload/images/ROTI%20CHALLAH_versatilekitcehn_com.jpg',
'https://www.superindo.co.id/upload/images/ROTI%20CIABATTA_resepdunia_blogspot_com.jpg',
'https://www.superindo.co.id/upload/images/ROTI%20CORN%20RYE_tildas_com%20JPG.JPG',
'https://www.superindo.co.id/upload/images/ROTI%20ENGLISH%20MUFFIN_baking911_com.jpg',
'https://www.superindo.co.id/upload/images/ROTI%20BAGUETTE_pixabay_com.jpg',
'https://www.superindo.co.id/upload/images/ROTI%20ITALIA_foodnetwork_com.jpg',
'https://www.superindo.co.id/upload/images/ROTI%20LIMPA_honestcooking_com.jpg',
'https://ecs7.tokopedia.net/img/cache/700/product-1/2020/4/13/batch-upload/batch-upload_8b430994-1243-4132-8351-f3c8fd2b23af.jpeg'
] 

var listproduk = document.getElementById('produk');
var listkeranjang = document.getElementById('list');

var id = [];
var count = {};

console.log(count)

function hitung() {
    var counting = {}; 
    
    id.forEach(function (i) { // tau lah foreach
        counting[i] = (counting[i] || 0) + 1; 
    });

    console.log(counting)

    for (var key in counting) { 
        count[key] = counting[key]; 
        delete counting[key]; 
        console.log(key)
    }
    list(); 
}

function showlistproduk() {
    listproduk.innerHTML =''
    for (let i = 0; i < namaproduk.length; i++) {
        listproduk.innerHTML += '<div class="card ml-3 mt-2" style="width: 10rem;" onclick="addlistproduk('+i+')" >' +
                '<img class="card-img-top" src="'+ gambarproduk[i] +'"alt="Card image cap">'+
                '<div class="card-body">'+
                '<p class="card-text text-center font-weight-bold" style="margin-top: -10px;">' +
                '<span class="text-primary">' +  namaproduk[i] + '</span><br> Rp. ' +
                giveRupiah(hargaproduk[i]) +
                '</p>' +
                '</div>'  
    }
}

showlistproduk()

function giveRupiah(number) {
    number = number.toString(); 
    var sisa = number.length % 3; 
    var rupiah = number.substr(0, sisa); 
    var ribuan = number.substr(sisa).match(/\d{3}/g); 

    if (ribuan) { 
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.'); 
    }
    return rupiah;
}


function list() {
        // bizr angkanya gga dable
    var idKey = id.reduce(function (a, b) {
        if (a.indexOf(b) < 0) a.push(b);
        return a;
    }, []);
    //  console.log(gambarproduk[idKey])
    listkeranjang.innerHTML = '';

    let totalharga = [];
    for (let i = 0; i < idKey.length; i++) {
        hargaA = Number(count[idKey[i]]) * Number(hargaproduk[idKey[i]]);
        totalharga.push(hargaA);
        listkeranjang.innerHTML += '<div class="keranjang card ml-4 mt-2" >' +
            '<div class="row">' +
            '<div class="col-3">' +
                '<img src="'+ gambarproduk[idKey[i]] +'" alt="" class="">' +
            '</div>' +
            '<div class="col-5 text-left">' +
            '<span class="nama">'+ namaproduk[idKey[i]] +'</span>' +
                '<span class="harga">Rp. '+ giveRupiah(hargaproduk[idKey[i]]) +'</span>' +
                '<span class="qty">Quantity : '+count[idKey[i]]+' </span>' +
            '</div>' +
            '<div class="col-4">' +
                '<i class="fas fa-trash fa-3x mt-3 ml-2" style="color: red;" onclick="hapus('+ idKey[i] +')"></i>' +
            '</div>'
            '</div>'
        '</div>' 
    }
    // buat jumlahin array
    totalharga = totalharga.reduce((a, b) => a + b, 0);
    console.log(totalharga)
    var pajak = totalharga * 0.1
    if(totalharga>40000){
        discount = totalharga*0.1
    }else{
        discount = 0
    }
    let totalbelanja = totalharga + pajak - discount 
    $('#diskon').html('Rp ' + giveRupiah(discount))
    $('#ppn').html('Rp ' + giveRupiah(pajak))
    $('#total').html('Rp ' + giveRupiah(totalbelanja))
}

function addlistproduk(i) {
    id.push(i)
    hitung()
}
function hapus(val) {
    var i = 0;
    while (i < id.length) {
        if (id[i].toString() === val.toString()) {
            id.splice(i, 1);
        } else {
            ++i;
        }
    }
    hitung()
}



// payment
tampilRiwayat= document.getElementById('tiwayat')
function bayar(){
if (id == "") {
        Swal.fire({
                icon: 'error',
                title: 'Barang kosong',
                text: 'Anda harus memasukan barang sebelum membayar',
                })
}else{
        Swal.fire({
            icon: 'success',
            title: 'Terima kasih',
            text: 'Barang sudah di masukan ke riwayat pembelian',
        })
    var idbayar = id; 
    var hitungan = count;
    id = [];
    hitung()

    var idKey = idbayar.reduce(function (a, b) { 
        if (a.indexOf(b) < 0) a.push(b);
        return a;
    }, []);

    totalbelanja = document.getElementById('total')
    totalbelanja.innerHTML = ""
        for (let i = 0; i < idKey.length; i++) {
            no = i + 1
            let jumlah = Number(hargaproduk[idKey[i]]) * Number(hitungan[idKey[i]])
            tampilRiwayat.innerHTML += '<tr>'
            + '<td>'+ no +'</td>'
            + '<td>' + namaproduk[idKey[i]] + '</td>'
            + '<td>Rp. ' + giveRupiah(hargaproduk[idKey[i]]) + '</td>'
            + '<td>'+ hitungan[idKey[i]]+'</td>' 
            + '<td>Rp.'+ giveRupiah(jumlah) +'</td>'
            + '</tr>'    
        }
}
}














