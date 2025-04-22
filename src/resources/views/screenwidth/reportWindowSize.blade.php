<script>
let screenwidth_sending_data = false;

let screenwidth_get = parseInt('{{ screenwidth_get() }}', 10);
// let screenwidth_get = '{{ screenwidth_get() }}';

let screenwidth_auto_reload = {{ config('samybgt.screenwidth.auto_reload') }} ? {{ config('samybgt.screenwidth.auto_reload') }} : false;

let screenwidth_width = 0;

function screenwidth_update_width() {
  screenwidth_width = (window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth);
}

screenwidth_update_width();

console.log('screenwidth_get');
console.log(screenwidth_get);
console.log('screenwidth_width');
console.log(screenwidth_width);

function reportWindowSize() {

  if (screenwidth_sending_data == true) {
    return false;
  }

  screenwidth_sending_data = true;


  // console.log('sending width');

  fetch('{{route("reportWindowSize")}}', {
    method: 'POST',
    mode: 'same-origin',
    headers: {
      "Content-Type": "application/json; charset=utf-8",
      "X-CSRF-TOKEN": '{{csrf_token()}}'
    },
    body: JSON.stringify({width: screenwidth_width })
  }).then((data) => {
    if (screenwidth_auto_reload == true) {
      window.location.reload();
    }
    screenwidth_sending_data = false;
    if (typeof onReportWindowSize === 'function')
    {
      screenwidth_onReportWindowSize();
    }

    // console.log('Received data');
    // console.log(data);
  });
}


const screenwidth_debounce = (callback, wait) => {
  let screenwidth_timeoutId = null
  return (...args) => {
    window.clearTimeout(screenwidth_timeoutId)
    screenwidth_timeoutId = window.setTimeout(() => {
      callback.apply(null, args)
    }, wait)
  }
}

window.addEventListener('resize', screenwidth_debounce(() => {
  screenwidth_update_width();
  if (Math.abs(screenwidth_width - screenwidth_get) > 20) {
    reportWindowSize()
  }
}, 750))

    // Ensure reload doesn't happen endlessly, with a buffer of 20px difference
    if (Math.abs(screenwidth_width - screenwidth_get) > 20) {
        console.log('Screen width mismatch, reporting...');
        reportWindowSize();
    } else {
        console.log('No significant width change detected.');
    }
</script>
