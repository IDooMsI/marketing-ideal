function whatsapp(service) {
    window.location.href = 'https://api.whatsapp.com/send?phone=5491136659229&text=Estoy interesado por el servicio: ' + service
}

function contacto() {
    var nombre = document.getElementById('nombre')
    var apellido = document.getElementById('apellido')
    var email = document.getElementById('email')
    var mensaje = document.getElementById('mensaje')
    window.location.href = 'https://api.whatsapp.com/send?phone=5491136659229&text=Hola Marketing Ideal mi nombre es: '+nombre +' '+apellido +' '+'Email: '+email+'. Mi Consulta: '+message+
}