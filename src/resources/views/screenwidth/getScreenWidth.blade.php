<form action="{{route('setScreenWidth')}}" method="post">
    @csrf
    <input type="hidden" name="screenWidth" class="screenWidth" value="">
    <!-- <button type="submit">submit</button> -->
</form>


<script>
    let screenWidth = window.screen.width;
    document.querySelector('.screenwidth').value = screenWidth;

    document.querySelector('form').submit();
</script>