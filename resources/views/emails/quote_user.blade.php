<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quote Request Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333333;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .logo {
            margin-bottom: 20px;
            display: inline-block;
        }

        .logo img {
            max-height: 45px;
            width: auto;
            filter: brightness(0) invert(1);
            display: block;
            margin: 0 auto;
        }

        .header h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header p {
            font-size: 16px;
            margin-top: 8px;
            opacity: 0.9;
        }

        .content {
            padding: 40px 30px;
        }

        .greeting {
            font-size: 18px;
            color: #1e3a8a;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .intro-text {
            font-size: 16px;
            color: #4b5563;
            margin-bottom: 30px;
            line-height: 1.7;
        }

        .summary-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            border-left: 5px solid #1e3a8a;
        }

        .summary-title {
            font-size: 20px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .summary-title::before {
            content: "📋";
            margin-right: 10px;
            font-size: 24px;
        }

        .info-grid {
            display: grid;
            gap: 20px;
        }

        .info-item {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        .info-label {
            font-weight: 700;
            color: #1e3a8a;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .info-value {
            color: #374151;
            font-size: 16px;
            line-height: 1.6;
        }

        .services-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .services-list li {
            background: #f1f5f9;
            padding: 12px 16px;
            margin: 8px 0;
            border-radius: 6px;
            border-left: 3px solid #3b82f6;
            font-size: 15px;
            color: #475569;
            transition: all 0.3s ease;
        }

        .services-list li:hover {
            background: #e2e8f0;
            transform: translateX(2px);
        }

        .services-list li::before {
            content: "✓";
            color: #10b981;
            font-weight: bold;
            margin-right: 10px;
        }

        .message-box {
            background: #fefefe;
            border: 2px dashed #cbd5e1;
            border-radius: 8px;
            padding: 20px;
            font-style: italic;
            color: #64748b;
            line-height: 1.7;
        }

        .next-steps {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }

        .next-steps h3 {
            color: #1e3a8a;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .next-steps p {
            color: #475569;
            font-size: 15px;
            line-height: 1.6;
        }

        .footer {
            background: #1f2937;
            color: #d1d5db;
            padding: 30px;
            text-align: center;
        }

        .footer-content {
            margin-bottom: 20px;
        }

        .team-signature {
            font-size: 18px;
            font-weight: 600;
            color: white;
            margin-bottom: 10px;
        }

        .footer-info {
            font-size: 14px;
            opacity: 0.8;
            line-height: 1.5;
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 20px;
            font-size: 13px;
            opacity: 0.7;
        }

        /* Responsive Design */
        @media only screen and (max-width: 600px) {
            .email-container {
                margin: 10px;
                border-radius: 8px;
            }

            .header,
            .content,
            .footer {
                padding: 25px 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .summary-section {
                padding: 20px;
                margin: 20px 0;
            }

            .info-item {
                padding: 15px;
            }

            .services-list li {
                padding: 10px 12px;
                font-size: 14px;
            }
        }

        @media only screen and (max-width: 480px) {
            .header h1 {
                font-size: 22px;
            }

            .content {
                padding: 20px 15px;
            }

            .summary-title {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <!-- Header Section -->
        <div class="header">
            <div class="logo">
                <img src="{{ $message->embed(public_path('assets/img/logo/logo1.png')) }}"
                    alt="{{ config('app.name') }} Logo">
            </div>
            <h1>Quote Request Received!</h1>
            <p>We're excited to work with you</p>
        </div>

        <!-- Main Content -->
        <div class="content">
            <div class="greeting">
                Dear {{ $quote->company_name }},
            </div>

            <div class="intro-text">
                Thank you for reaching out to us! We have successfully received your quote request and our team is
                already reviewing the details. We appreciate your interest in our services and will get back to you with
                a comprehensive proposal shortly.
            </div>

            <!-- Quote Summary Section -->
            <div class="summary-section">
                <div class="summary-title">
                    Request Summary
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Industry</div>
                        <div class="info-value">{{ $quote->industry }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Preferred Timeline</div>
                        <div class="info-value">{{ $quote->timeline }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Requested Services</div>
                        <div class="info-value">
                            <ul class="services-list">
                                @foreach (json_decode($quote->services) as $service)
                                    <li>{{ $service }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    @if ($quote->message)
                        <div class="info-item">
                            <div class="info-label">Your Message</div>
                            <div class="info-value">
                                <div class="message-box">
                                    {{ $quote->message }}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Next Steps -->
            <div class="next-steps">
                <h3>What Happens Next?</h3>
                <p>Our expert team will carefully review your requirements and prepare a detailed proposal tailored to
                    your specific needs. You can expect to hear from us within 24-48 hours with next steps and any
                    additional questions we might have.</p>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <div class="team-signature">
                    Best regards,<br>
                    The {{ config('app.name') }} Team
                </div>
                <div class="footer-info">
                    Delivering innovative technology solutions<br>
                    that drive your business forward.
                </div>
            </div>
            <div class="footer-bottom">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>
        </div>
    </div>
</body>

</html>
