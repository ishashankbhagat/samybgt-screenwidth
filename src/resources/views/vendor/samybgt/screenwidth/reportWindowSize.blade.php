<script>

function reportWindowSize() {

    let width = window.innerWidth;
    
    let isMobile = false;

    // if agent is mobile
    if (1||isMobile) {
        width = window.screen.width;
    }
    console.log('sending width');
    console.log(width);

    fetch('{{route("reportWindowSize")}}', {
        method: 'POST',
        mode: 'same-origin',
        headers: {
            "Content-Type": "application/json; charset=utf-8",
            "X-CSRF-TOKEN": '{{csrf_token()}}'
        },
        body: JSON.stringify({
            '_token': '{{csrf_token()}}',
            'width': width,
        })
    }).then((data) => {
        console.log('Received data');
        console.log(data); 
    });
}

window.addEventListener("resize", reportWindowSize);
</script>

@if(screenwidth_get() == null)
<script>
reportWindowSize()
</script>
@endif