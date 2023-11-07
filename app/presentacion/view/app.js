const array= ['Abigail','María Jóse','Nayeli'];
        array.forEach(
            (Element) =>{
              alert(Element);
            }
        );

        function cambioName(cambio){
            const nombreCompleto = document.getElementById('nombre');

            if(cambio == 0){
                nombreCompleto.innerHTML = nombres[0];
            }
            if (cambio == 1){
                nombreCompleto.innerHTML = nombres [1];
            }
            if (cambio == 2){
                nombreCompleto.innerHTML = nombres [2];
            }
            if (cambio == 3) {
                nombreCompleto.innerHTML = 'Frida Velasco Barragan';
            }

        }

        function noStyles(){
            document.styleSheets[0].disabled = true;
            document.styleSheets[1].disabled= true;
            console.log(document.styleSheets)
        }

        function reStyle(n){
            noStyles()
         
            document.styleSheets[n].disabled = false;
        }
        reStyle(0)