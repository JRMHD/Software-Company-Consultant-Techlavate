<h2>New Newsletter Subscription</h2>
<p>Email: {{ $email }}</p>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Newsletter Subscription</title>
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

        .notification-badge {
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

        .notification-section {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #1e3a8a;
            text-align: center;
        }

        .notification-icon {
            font-size: 32px;
            margin-bottom: 10px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        .notification-text {
            color: #1e3a8a;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .notification-subtext {
            color: #1e40af;
            font-size: 14px;
        }

        .subscriber-details {
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

        .subscriber-email {
            color: #1e40af;
            text-decoration: none;
            font-weight: 600;
            font-size: 18px;
        }

        .subscriber-email:hover {
            text-decoration: underline;
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

        .stats-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            text-align: center;
        }

        .stats-title {
            color: #1e3a8a;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .stat-item {
            padding: 15px;
            background: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 12px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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

        .growth-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 15px;
            padding: 12px 20px;
            background: #ecfdf5;
            border-radius: 8px;
            border: 1px solid #10b981;
        }

        .growth-icon {
            color: #10b981;
            font-size: 18px;
            margin-right: 8px;
        }

        .growth-text {
            color: #065f46;
            font-size: 14px;
            font-weight: 600;
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

            .subscriber-details {
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

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
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

            .stats-grid {
                grid-template-columns: 1fr;
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
            <h1>New Subscriber! 📧</h1>
            <p>Your newsletter is growing</p>
            <div class="notification-badge">
                Newsletter Growth
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Notification Section -->
            <div class="notification-section">
                <div class="notification-icon">🎉</div>
                <div class="notification-text">New Newsletter Subscription</div>
                <div class="notification-subtext">Someone just joined your mailing list!</div>
            </div>

            <!-- Timestamp -->
            <div class="timestamp">
                <strong>Subscribed:</strong> {{ now()->format('F j, Y \a\t g:i A T') }}
            </div>

            <!-- Subscriber Details Section -->
            <div class="subscriber-details">
                <div class="details-title">
                    Subscriber Information
                </div>

                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Email Address</div>
                        <div class="info-value">
                            <a href="mailto:{{ $email }}" class="subscriber-email">{{ $email }}</a>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Subscription Source</div>
                        <div class="info-value">Website Newsletter Form</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Status</div>
                        <div class="info-value">
                            <span style="color: #10b981; font-weight: 600;">✓ Active Subscriber</span>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">Welcome Email</div>
                        <div class="info-value">
                            <span style="color: #10b981; font-weight: 600;">✓ Automatically Sent</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="growth-indicator">
                <span class="growth-icon">📊</span>
                <span class="growth-text">Your newsletter audience is expanding!</span>
            </div>
        </div>

        <!-- Action Section -->
        <div class="action-section">
            <h3>Next Steps</h3>
            <p>Your new subscriber has been automatically added to your mailing list and received a welcome email.
                Consider reviewing your upcoming newsletter content to ensure it provides value to your growing
                audience.</p>


        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-content">
            <div class="footer-note">
                This is an automated notification from your {{ config('app.name') }} newsletter system.<br>
                Keep creating valuable content to engage your growing subscriber base.
            </div>
        </div>
        <div class="footer-bottom">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
            Newsletter Management System
        </div>
    </div>
    </div>
</body>

</html>
