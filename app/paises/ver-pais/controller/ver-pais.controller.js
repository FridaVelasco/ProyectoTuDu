let code = window.location.pathname;
let paisInfo = {};
code = code.split('/');
code = code[code.length - 1];

console.log(code);
traerInfo(code);



async function traerInfo(code) {
    let url = `https://restcountries.com/v3.1/alpha/${code}`;
    let respuesta = await fetch(url);
    
    await respuesta.json().then(
        (pais) => {
            paisInfo = pais[0];
            console.log(paisInfo);
            renderInfo();
        }
    );
}  

function renderInfo() {

    let flagImg = document.getElementById('flagImg');
    flagImg.src = paisInfo.flags.svg;
    console.log(flagImg.src);
    flagImg.alt = paisInfo.flags.alt;

    let divNameMain = document.getElementById('divNameMain');    
    let bReg = document.getElementById('paisRegion');
    let bCap = document.getElementById('paisCapital');
    let bPob = document.getElementById('paisPoblacion');
    let bLang = document.getElementById('paisLang');

    let idiomasObj = paisInfo.languages;
    let fstIdioma;
    Object.entries(idiomasObj).forEach(([codigoIdioma, nombreIdioma]) => {
        // Guarda el primer idioma y rompe el bucle
        if (!fstIdioma) {
          fstIdioma = nombreIdioma;
        }
      });

    
    divNameMain.innerText = `${paisInfo.flag} ${paisInfo.name.common}`;
    bReg.innerText = `${paisInfo.region}`;
    bCap.innerText = `${paisInfo.capital}`;
    bPob.innerText = `${paisInfo.population}`;
    bLang.innerText = `${fstIdioma}`;
}