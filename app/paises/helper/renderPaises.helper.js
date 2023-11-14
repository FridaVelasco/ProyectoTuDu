function renderizarPaises(padre, countries){
    for(let country of countries){
        //creando card
        let cardDiv = document.createElement("div");
        cardDiv.classList.add(
        'card', 
        'border-primary',
        'p-1',
        'col-12',
        'col-sm-6',
        'col-md-6',
        'col-lg-6');
        // creando la imagen
        let img = document.createElement("img");
        img.classList.add('card-img-top');
        img.src = country.flags.svg;
        img.alt=country.flags.alt;
        //agregarndo img al card
        cardDiv.appendChild(img);

        // Construyendo la seccion de informacion (Nombresini)
        let namesDiv = document.createElement('div');
        namesDiv.classList.add(
            'card-body'
        );
        // Agregando namesDiv al card
        cardDiv.appendChild(namesDiv);

        let h5=document.createElement("h5");
        h5.classList.add('card-title', 'text-center');
        h5.innerText=`${country.flag} ${country.name.common}`;
        // Agregando h5 a namesDiv 
        namesDiv.appendChild(h5);

        // Agregando la linea hr a namesDiv
        namesDiv.appendChild(document.createElement('hr'));

        // Creando div para el nombre oficial 
        let officialDiv = document.createElement('div');
        officialDiv.classList.add(
            'd-flex',
            'justify-content-between'
        );
        namesDiv.appendChild(officialDiv);

        // Agregando officialDiv al namesDiv
        officialDiv.innerHTML = `
            <p class="card-text mb-1">Oficial: ${country.name.official}</p>
        `;

        // Creando div para el nombre nativo 
        let nativeDiv = document.createElement('div');
        nativeDiv.classList.add(
            'd-flex',
            'justify-content-between'
        );
        namesDiv.appendChild(nativeDiv);
        
        // Extraer nombre nativo 
        let keys = Object.keys(country.name.nativeName);
        let key=keys[keys.length-1];
        let nativeName = country.name.nativeName[key].official;

        // Agregando nativeDiv al namesDiv
        namesDiv.appendChild(nativeDiv);
        nativeDiv.innerHTML = `
        <p class="card-text mb-1">Nativo: ${nativeName}</p>
        `;
        

        //creando div del nombre capital
        let capitalInfoDiv = document.createElement('div');
        capitalInfoDiv.classList.add(
            'd-flag',
            'justify-content-between'
            );
        
        capitalInfoDiv.innerHTML = `
        <div><strong>Capital:</strong></div>
        <div class="text-end">${country.capital[0]}</div>
        `;

        //agregando capitalDiv al cardDiv
        cardDiv.appendChild(capitalInfoDiv);



        //creando div del nombre population
        let populationInfoDiv = document.createElement('div');
        populationInfoDiv.classList.add(
            'd-flag',
            'justify-content-between'
            );
        
        populationInfoDiv.innerHTML = `
        <div><strong>Population:</strong></div>
        <div class="text-end">${country.population}</div>
        `;

        //agregando pupulationDiv al cardDiv
        cardDiv.appendChild(populationInfoDiv);

        //creando footer
        let footerCardDiv = document.createElement('div')
        footerCardDiv.classList.add(
            'card-footer',
        );

        cardDiv.appendChild(footerCardDiv);

        //creando link
        let link = document.createElement('a');
        link.classList.add(
            'btn',
            'btn-primary'
        );
        link.href = '/paises/ver-pais/'+ country.cca3;
        link.innerText = 'Ver mas...';
        footerCardDiv.appendChild(link);

        padre.appendChild(cardDiv);
    }

}
function clearContainer(container){
    container.innerHTML='';
}