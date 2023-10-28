<?php
// setcookie("data","Hello World!",time()-300);
echo $_COOKIE['ndata'];
?>


<!-- To get access with cookies using JavaScript -->
<!-- Js Library URL: https://github.com/js-cookie/js-cookie -->
<script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
<script>
    // Cookies.set("ndata","Alemam",{ expires: 1 });
    alert(Cookies.get("ndata"));
    Cookies.remove("ndata");
</script>