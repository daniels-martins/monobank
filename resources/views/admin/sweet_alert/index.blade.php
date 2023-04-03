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
        $username = "{{ auth()->user()?->name ?? 'Guest' }}" 
        console.log($username);
        swal({
                title: `Good job ${$username}, `,
                text: "Your Message has been submitted Succesfully",
                icon: "success",
                button: "Continue to website",
            })
            .then((value) => {
                if ($username == 'guest')
                    window.location.href = '/'
                window.location.href = '/';
                //  swal(`The returned value is: ${value}`);
            });
    </script>
</body>

</html>
