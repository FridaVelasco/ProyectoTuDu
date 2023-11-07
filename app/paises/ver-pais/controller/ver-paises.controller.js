// alert("funciona???");
let  code = window.location.pathname;
let paisInfo ={};

code=code.split('/');

console.log(code);
traerInfo();

code=code[code.length - 1];

async function traerInfo(){
    let url = `https://restcountries.com/v3.1/alpha/${code}`;
    let respuesta = await fetch (url);
    await repuesta.json().them(
        (pais) => {
            paisInfo = pais[0];
            console.log(paisInfo);
            renderInfo();
        }
    )
}

function renderInfo() {
    let flagImg = document.getElementById('flagImg');
    flagImg.src = paisInfo.flags.svg;
    flagImg.alt = paisInfo.flags.svg;
    
    let divNameMain = document.getElementById('divNameMain');
    divNameMain.innerText = `${paisInfo.flag} ${paisInfo.name.common}`;
    
    let divOfficial = document.getElementById('divOfficial');
    divOfficial.innerText = `${paisInfo.flag} ${paisInfo.name.common}`;
    
    let divNative = document.getElementById('divNative');
    divNative.innerText = `${paisInfo.flag} ${paisInfo.name.common}`;
    
    let divCapital = document.getElementById('divCapital');
    divCapital.innerText = `${paisInfo.flag} ${paisInfo.name.common}`;
    
    let divPopulation = document.getElementById('divPopulation');
    divPopulation.innerText = `${paisInfo.flag} ${paisInfo.name.common}`;
    
}


let flagImg = document.getElementById('flagImg');

flagImg.src="";