<div class="footer1-section-area">
    <div class="container">
        <div class="row">
            <!-- Logo and Description -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-logo-area">
                    <img src="assets/img/logo/logo1.png" alt="Techlavate Solutions Logo"
                        style="width: 120px; height: auto;">
                    <p>Techlavate Solutions empowers businesses with modern Microsoft Dynamics 365, Power Platform, and
                        ERP solutions that drive efficiency, innovation, and growth.</p>
                    <ul>
                        <li><a href="#"><img src="assets/img/icons/facebook.svg" alt="Facebook"></a></li>
                        <li><a href="#"><img src="assets/img/icons/instagram.svg" alt="Instagram"></a></li>
                        <li><a href="#"><img src="assets/img/icons/linkedin.svg" alt="LinkedIn"></a></li>
                        <li><a href="#"><img src="assets/img/icons/youtube.svg" alt="YouTube"></a></li>
                    </ul>
                </div>
            </div>
            <!-- Navigation Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-logo-area1">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/faq">FAQ</a></li>
                        <li><a href="/contact">Contact Us</a></li>
                        <li><a href="/quote">Request Free Quote</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-logo-area2">
                    <h3>Get in Touch</h3>
                    <ul>
                        <li><a href="mailto:info@techlavate.com"><img src="assets/img/icons/email.svg"
                                    alt=""><span>info@techlavate.com</span></a></li>
                        <li><a href="#"><img src="assets/img/icons/location.svg" alt=""><span>8708
                                    700 Twelve Oaks Center Dr #246, Wayzata, MN 55391</span></a></li>
                        <li><a href="tel:952-353-6368 "><img src="assets/img/icons/phone.svg"
                                    alt=""><span>952-353-6368 </span></a></li>
                    </ul>
                </div>
            </div>

            <!-- Newsletter -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-logo-area3">
                    <h3>Subscribe Our Newsletter</h3>
                    <form id="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <button type="submit" class="header-btn1">Subscribe <span><i
                                    class="fa-solid fa-arrow-right"></i></span></button>
                    </form>

                    <div id="newsletter-loading" style="display:none; text-align:center; margin: 10px;">
                        <div class="spinner"></div>
                    </div>

                    <div id="newsletter-message" style="margin-top:10px; text-align:center;"></div>

                    <style>
                        .spinner {
                            border: 4px solid #f3f3f3;
                            border-top: 4px solid #3498db;
                            border-radius: 50%;
                            width: 30px;
                            height: 30px;
                            animation: spin 1s linear infinite;
                            margin: 0 auto;
                        }

                        @keyframes spin {
                            0% {
                                transform: rotate(0deg);
                            }

                            100% {
                                transform: rotate(360deg);
                            }
                        }
                    </style>
                </div>
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#newsletter-form').submit(function(e) {
                        e.preventDefault();
                        $('#newsletter-message').html('');
                        $('#newsletter-loading').show();

                        const form = $(this);
                        const submitBtn = form.find('button[type="submit"]');
                        const url = form.attr('action');

                        submitBtn.prop('disabled', true).css('opacity', '0.5').css('cursor', 'not-allowed');

                        $.ajax({
                            type: 'POST',
                            url: url,
                            data: form.serialize(),
                            success: function(response) {
                                $('#newsletter-loading').hide();
                                $('#newsletter-message').css('color', 'green').html(response.success);
                                form[0].reset();
                                submitBtn.prop('disabled', false).css('opacity', '1').css('cursor',
                                    'pointer');
                            },
                            error: function(xhr) {
                                $('#newsletter-loading').hide();
                                if (xhr.status === 422) {
                                    const errors = xhr.responseJSON.errors;
                                    let errorMessages = '';
                                    $.each(errors, function(key, val) {
                                        errorMessages += val[0] + '<br>';
                                    });
                                    $('#newsletter-message').css('color', 'red').html(errorMessages);
                                } else {
                                    $('#newsletter-message').css('color', 'red').html(
                                        'An unexpected error occurred.');
                                }
                                submitBtn.prop('disabled', false).css('opacity', '1').css('cursor',
                                    'pointer');
                            }
                        });
                    });
                });
            </script>

        </div>

        <div class="space40"></div>

        <!-- Copyright -->
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-area">
                    <div class="pera">
                        <p>ⓒCopyright {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
                            Designed and Developed by <a href="https://jrmhd.tech/" target="_blank">Jrmhd
                                Technologies</a></p>
                    </div>
                    <ul>
                        <li><a href="/faq">FAQ</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
