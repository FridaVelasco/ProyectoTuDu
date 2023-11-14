let buttonContainer = document.getElementById('button-container');
let paisesContainer = document.getElementById('paises-container');

let regiones = {
    Africa: "africa",
    Asia: "asia",
    Europa: "europe",
    Oceania: "ocean",
    America: "americas",
};

//let countries = [];

let continentes = Object.keys(regiones);

for(let continente of continentes){
    let button = document.createElement('button');
    button.classList.add('btn', 'btn-outline-primary', 'm-1');
    button.textContent = continente;
    button.onclick = (evt) => onContinenteButtonClick(continente);

    buttonContainer.appendChild(button);

}

function onContinenteButtonClick(contiente){
    clearContainer(paisesContainer);
    let buttons = buttonContainer.children;
    console.log(buttons);
    console.log(buttonContainer.textContent);
    for(let button of buttons){
        if(button.innerText===contiente){
            if(button.classList.contains('active')){
                button.classList.remove("active");
                //limpiar el paisesContainer
                return;
            }
            button.classList.add("active");
            continue;
        }
        button.classList.remove("active");
    }
    requestContriesData(contiente);
}

async function requestContriesData(continente){
    let url = `https://restcountries.com/v3.1/region/${regiones[continente]}?fields=flags,flag,name,capital,population,cca3`;//este tipo de comillas (altgr+}) nos permite inscrustar como en php
    let respuesta = await fetch(url);
    await respuesta.json().then(paises=>{
        console.log("Paises: " , paises);
        countries=paises;
        renderizarPaises(paisesContainer, countries);
    });
    // respuesta.then((paises)=>{
    //     console.log("Paises: " , paises);
    // });
}



// Diseñar ver-pais 
// Modificar la vista y usar el controlador js para extraer el final de la url y usarla para hacer la peticion a restcountries y mostrar toda la informacion del pais 