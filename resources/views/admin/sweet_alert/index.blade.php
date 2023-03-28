<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <script>
        //   swal("Here's the title!", "...and here's the text!");
        $username = "{{ auth()->user()->name }}"
        console.log($username);
        swal({
                title: `Good job ${$username}, `,
                text: "Your Message has been submitted Succesfully",
                icon: "success",
                button: "Continue to Dashboard",
            })
            .then((value) => {
                window.location.href = '/dashboard';
                //  swal(`The returned value is: ${value}`);
            });
    </script>
</body>

</html>
