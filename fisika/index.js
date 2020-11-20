 tampil = document.getElementById('main3')
 console.log(tampil)
function hitung() {
    tampil.innerHTML  = '';
   let vs = parseFloat(document.getElementById("v1").value)
   let vp = parseFloat(document.getElementById("v2").value)
   let is = parseFloat(document.getElementById("v3").value)
   let ip = parseFloat(document.getElementById("v4").value) 
   let a = 1;
    let hasil = vs * is 
    let hasil2 = vp * ip 
    let hasil3 = hasil / hasil2 * 1 
    tampil.innerHTML += `Jawaban :<br>
                            Rumus  : η = (Vs.Is/Vp.Ip x 100%)<br>
                            Tegangan primmer (vp) = ${vp} V<br> 
                            Tegangan skunder (vs) = ${vs} V<br>
                            Arus primer (ip) = ${ip} A<br>
                            Arus Skunder (is) = ${is} A<br>
                            η = ${vs} * ${vp} / ${ip} * ${is} * 100% = ${hasil3}
                            `
}


//card
//dropdown

var coll = document.getElementsByClassName("title");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("mouseenter", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    
    if (content.style.maxHeight === "500px") {
      content.style.maxHeight = "0";
    } else {
      content.style.maxHeight = "500px";
    }
  });
}
