<h3 style="text-align: center">
    <?= esc($titulo)." usuario: ".esc($usuario)."," ?> tuvo exito
</h3>
<div id="countdown"></div>

<script>
    // Set the date we're counting down to
    let countDownTime = 3

    // Update the count down every 1 second
    let x = setInterval(function() {

        // Display the result in the element with id="demo"
        document.getElementById("countdown").innerHTML = "Redireccionando a la lista de usuarios en " + countDownTime + "..."

        // If the count down is finished, write some text
        if (countDownTime > 0) {
            countDownTime--
        }
        else {
            clearInterval(x)
            window.location.href = '/usuarios'
        }
    }, 1000)
</script>