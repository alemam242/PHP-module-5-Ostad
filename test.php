<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> -->
    <link rel="stylesheet" href="toaster.css">
</head>
<body>

<button type="button" onclick="Toast()">Toast</button>
<button type="button" onclick="makeToast()">New Toast</button>
    

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->
<script src="toaster.js"></script>
<script>
    function Toast(){
        Toastify({
            text: "This is a toast",
            duration: 3000,
            destination: "https://github.com/apvarun/toastify-js",
            newWindow: true,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "linear-gradient(to right, #00b09b, #96c93d)",
            },
            onClick: function(){} // Callback after click
        }).showToast();
    }

    function makeToast(){
        toastr.success('Have fun storming the castle!', 'Miracle Max Says');
    }
</script>
</body>
</html>