//Evitar que los formularios se envien dos veces
//Seleccionamos la propiedad form, metodo submit, luego busca este metodo y le añadimos la propiedad disable si esta true (Es decir si se esta enviando)
$("form").on("submit", function(){
    $(this).find('input[type="submit"]').attr('disabled', true);
});