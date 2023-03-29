<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>RegistrationForm_v7 by Colorlib</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet"
        href="/static_assets/contact_form/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="/static_assets/contact_form/css/style.css">
    <meta name="robots" content="noindex, follow">
</head>

<body>
    <div class="wrapper">
        <div class="inner">
            <form action="{{ route('contactmessages.store') }}" method="post">@csrf
                <input type="hidden" name="formtype" value="suspension_form">
                <h3>Account Reactivation Form</h3>
                <p>Your accout has been recently suspended. Kindly use this form to inform us of any strange activities
                    on your account.
                    This helps us facilitate your account recovery process
                </p>
                <label class="form-group">
                    <input type="text" name="fname" class="form-control" required>
                    <span>Your First Name</span>
                    <span class="border"></span>
                    @error('fname')
                        <div class="col-12 error"><em class="font-weight-bold">Oops! {{ $message }} </em> </div>
                    @enderror
                </label>

                <label class="form-group">
                    <input type="text" name="lname" class="form-control" required>
                    <span>Your Last Name</span>
                    <span class="border"></span>
                    @error('lname')
                        <div class="col-12 error"><em class="font-weight-bold">Oops! {{ $message }} </em> </div>
                    @enderror
                </label>

                <label class="form-group">
                    <input name="acc_num" type="text" class="form-control" required maxlength="10"
                        value="{{ old('acc_num') }}">
                    <span>Your Account Number with {{ env('APP_NAME') }}</span>
                    <span class="border"></span>
                    @error('acc_num')
                        <div class="col-12 error"><em class="font-weight-bold">Oops! {{ $message }} </em> </div>
                    @enderror
                </label>

                <label class="form-group">
                    <input type="text" name="phone" class="form-control" required>
                    <span>Your Phone Number with {{ env('APP_NAME') }}</span>
                    <span class="border"></span>
                    @error('phone')
                        <div class="col-12 error"><em class="font-weight-bold">Oops! {{ $message }} </em> </div>
                    @enderror
                </label>

                <label class="form-group">
                    <input type="text" name="email" class="form-control" required>
                    <span for="">Your Mail (Registered with {{ env('APP_NAME') }})</span>
                    <span class="border"></span>
                    @error('email')
                        <div class="col-12 error"><em class="font-weight-bold">Oops! {{ $message }} </em> </div>
                    @enderror
                </label>
                <label class="form-group">
                    <textarea name="subject" id="" class="form-control" required></textarea>
                    <span for="">Subject</span>
                    <span class="border"></span>
                    @error('subject')
                        <div class="col-12 error"><em class="font-weight-bold">Oops! {{ $message }} </em> </div>
                    @enderror
                </label>

                <label class="form-group">
                    <textarea name="message" id="" class="form-control" required></textarea>
                    <span for="">Your Message (Tell us how your account got suspended?)</span>
                    <span class="border"></span>
                    @error('message')
                        <div class="col-12 error"><em class="font-weight-bold">Oops! {{ $message }} </em> </div>
                    @enderror
                </label>
                <button>Submit
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    {{-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script> --}}
    {{-- <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script> --}}
    {{-- <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vb26e4fa9e5134444860be286fd8771851679335129114" integrity="sha512-M3hN/6cva/SjwrOtyXeUa5IuCT0sedyfT+jK/OV+s+D0RnzrTfwjwJHhd+wYfMm9HJSrZ1IKksOdddLuN6KOzw==" data-cf-beacon='{"rayId":"7aebc926e9f4b755","version":"2023.3.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script> --}}
</body>

</html>
