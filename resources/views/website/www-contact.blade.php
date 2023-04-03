@include('admin.partials.www.header')

<section class="page-top-section set-bg" data-setbg="/static_assets/website/img/loans/1.jpg">
    <div class="container">
        <h2>Contact</h2>
        <nav class="site-breadcrumb">
            <a class="sb-item" href="/">Home</a>
            <span class="sb-item active">Contact</span>
        </nav>
    </div>
</section>


<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Get in touch</h2>
                    <p>We are here to help you with any questions or concerns you may have about our products and
                        services. Whether you need assistance with opening an account, managing your finances, or
                        applying for a loan, our friendly and knowledgeable team is ready to assist you.

                        Please fill out the form below to get in touch with us, and we will respond to your inquiry as
                        soon as possible. We appreciate your feedback and look forward to hearing from you!</p>
                    <ul>
                        <li><i class="flaticon-032-placeholder"></i>PO Box 63, Winslow, NY 46540</li>
                        <li><i class="flaticon-029-telephone-1"></i>(619) 483-2333</li>
                        <li><i class="flaticon-025-arroba"></i>info@bluebirdglobals.com</li>
                        <li><i class="flaticon-038-wall-clock"></i>Everyday: 06:00 -22:00</li>
                    </ul>
                    {{-- <div class="social-links">
                        <a href="contact.html#"><i class="fa fa-facebook"></i></a>
                        <a href="contact.html#"><i class="fa fa-instagram"></i></a>
                        <a href="contact.html#"><i class="fa fa-linkedin"></i></a>
                        <a href="contact.html#"><i class="fa fa-pinterest"></i></a>
                        <a href="contact.html#"><i class="fa fa-twitter"></i></a>
                        <a href="contact.html#"><i class="fa fa-youtube-play"></i></a>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-8">
                <form class="contact-form" method="post" action="{{ route('contactmessages.store') }}">@csrf
                    <div class="row my-1">
                        <div class="col-md-6">
                            <input required type="text" placeholder="Your Name" name="fullname">
                            @error('fullname')
                                <small class="error"><b>Oops! {{ $message }}</b></small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input required type="text" placeholder="Your E-mail" name="email">
                            @error('email')
                                <small class="error"><b>Oops! {{ $message }}</b></small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-1">
                            <input required type="text" placeholder="Phone" name="phone" minlength="10" maxlength="15">
                            @error('phone')
                                <small class="error"><b>Oops! {{ $message }}</b></small>
                            @enderror
                        </div>

                        <div class="col-md-12 my-1">
                            <input required type="text" placeholder="Subject" name="subject">
                            @error('subject')
                                <small class="error"><b>Oops! {{ $message }}</b></small>
                            @enderror
                        </div>

                        <textarea required placeholder="Your Message" name="message"></textarea>
                        @error('message')
                            <div class="error"><b>Oops! {{ $message }}</b></div>
                        @enderror
                        <div class="my-3">
                            <button class="site-btn">send message</button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10784.188505644011!2d19.053119335158936!3d47.48899529453826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1543907528304"
            style="border:0" allowfullscreen></iframe>
    </div>
    </div>
</section>

<!-- calculate credit score placeholder -->

@include('admin.partials.www.footer')
