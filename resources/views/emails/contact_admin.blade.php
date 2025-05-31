<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Contact Message Received</title>
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

        .priority-badge {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-top: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .content {
            padding: 40px 30px;
        }

        .alert-section {
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #1e3a8a;
            text-align: center;
        }

        .alert-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .alert-text {
            color: #1e3a8a;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .alert-subtext {
            color: #1e40af;
            font-size: 14px;
        }

        .contact-details {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            border-left: 5px solid #1e3a8a;
        }

        .details-title {
            font-size: 20px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .details-title::before {
            content: "👤";
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

        .contact-email {
            color: #1e40af;
            text-decoration: none;
            font-weight: 600;
        }

        .contact-email:hover {
            text-decoration: underline;
        }

        .phone-number {
            color: #059669;
            font-weight: 600;
        }

        .message-section {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        .message-content {
            background: #fefefe;
            border: 2px dashed #cbd5e1;
            border-radius: 8px;
            padding: 20px;
            color: #64748b;
            line-height: 1.7;
            font-size: 15px;
            white-space: pre-wrap;
        }

        .action-section {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }

        .action-section h3 {
            color: #1e40af;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .action-section p {
            color: #475569;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: #1e40af;
            color: white;
        }

        .btn-primary:hover {
            background: #1e3a8a;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: white;
            color: #1e40af;
            border: 2px solid #1e40af;
        }

        .btn-secondary:hover {
            background: #1e40af;
            color: white;
        }

        .timestamp {
            background: #f1f5f9;
            padding: 15px 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
            font-size: 14px;
            color: #64748b;
        }

        .timestamp strong {
            color: #374151;
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

        .footer-note {
            font-size: 14px;
            opacity: 0.8;
            line-height: 1.5;
            margin-bottom: 15px;
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

            .contact-details {
                padding: 20px;
                margin: 20px 0;
            }

            .info-item {
                padding: 15px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 200px;
            }
        }

        @media only screen and (max-width: 480px) {
            .header h1 {
                font-size: 22px;
            }

            .content {
                padding: 20px 15px;
            }

            .details-title {
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
            <h1>New Contact Message!</h1>
            <p>Someone has reached out through your website</p>
            <div class="priority-badge">
                🔔 Requires Response
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Alert Section -->
            <div class="alert-section">
                <div class="alert-icon">📬</div>
                <div class="alert-text">New Contact Form Submission</div>
                <div class="alert-subtext">A potential client has sent you a message and is waiting for your response
                </div>
            </div>

            <!-- Timestamp -->
            <div class="timestamp">
                <strong>Received:</strong> {{ now()->format('F j, Y \a\t g:i A T') }}
            </div>

            <!-- Contact Details Section -->
            <div class="contact-details">
                <div class="details-title">
                    Contact Information
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">First Name</div>
                        <div class="info-value">{{ $data->first_name }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Last Name</div>
                        <div class="info-value">{{ $data->last_name }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Email Address</div>
                        <div class="info-value">
                            <a href="mailto:{{ $data->email }}" class="contact-email">{{ $data->email }}</a>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Phone Number</div>
                        <div class="info-value">
                            @if ($data->phone)
                                <span class="phone-number">{{ $data->phone }}</span>
                            @else
                                <span style="color: #9ca3af; font-style: italic;">Not provided</span>
                            @endif
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Message</div>
                        <div class="info-value">
                            <div class="message-section">
                                <div class="message-content">{{ $data->message }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Section -->
            <div class="action-section">
                <h3>Recommended Actions</h3>
                <p>Respond promptly to maintain a professional image and potentially convert this inquiry into a new
                    client relationship.</p>

                <div class="action-buttons">
                    <a href="mailto:{{ $data->email }}?subject=Re: Your Contact Form Inquiry&body=Hi {{ $data->first_name }},%0D%0A%0D%0AThank you for reaching out to us through our website. I received your message and wanted to respond personally.%0D%0A%0D%0A"
                        class="btn btn-primary">
                        ✉️ Reply via Email
                    </a>
                    @if ($data->phone)
                        <a href="tel:{{ $data->phone }}" class="btn btn-secondary">
                            📞 Call Now
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-note">
                    This is an automated notification from your {{ config('app.name') }} contact form.<br>
                    Please respond to the inquiry as soon as possible to maintain excellent customer service.
                </div>
            </div>
            <div class="footer-bottom">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
                Contact Management System
            </div>
        </div>
    </div>
</body>

</html>
