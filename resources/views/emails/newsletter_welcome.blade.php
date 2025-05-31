<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to Our Newsletter!</title>
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
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: shimmer 3s ease-in-out infinite alternate;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-20px) translateY(-20px);
            }

            100% {
                transform: translateX(20px) translateY(20px);
            }
        }

        .logo {
            margin-bottom: 20px;
            display: inline-block;
            position: relative;
            z-index: 2;
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
            position: relative;
            z-index: 2;
        }

        .header p {
            font-size: 16px;
            margin-top: 8px;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        .welcome-badge {
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
            position: relative;
            z-index: 2;
        }

        .content {
            padding: 40px 30px;
        }

        .celebration-section {
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            text-align: center;
            border-left: 5px solid #1e3a8a;
        }

        .celebration-icon {
            font-size: 48px;
            margin-bottom: 15px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }

        .celebration-title {
            font-size: 24px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 10px;
        }

        .celebration-subtitle {
            color: #1e40af;
            font-size: 16px;
            font-weight: 500;
        }

        .greeting {
            font-size: 18px;
            color: #1e3a8a;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .main-message {
            font-size: 16px;
            color: #4b5563;
            margin-bottom: 30px;
            line-height: 1.7;
            text-align: center;
        }

        .benefits-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 12px;
            padding: 30px;
            margin: 30px 0;
            border-left: 5px solid #1e3a8a;
        }

        .benefits-title {
            font-size: 20px;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .benefits-title::before {
            content: "✨";
            margin-right: 10px;
            font-size: 24px;
        }

        .benefits-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .benefits-list li {
            background: white;
            padding: 15px 20px;
            margin: 12px 0;
            border-radius: 8px;
            border-left: 3px solid #3b82f6;
            font-size: 15px;
            color: #475569;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .benefits-list li:hover {
            background: #f1f5f9;
            transform: translateX(5px);
        }

        .benefits-list li::before {
            content: "📧";
            margin-right: 12px;
            font-size: 16px;
        }

        .benefits-list li:nth-child(2)::before {
            content: "🎯";
        }

        .benefits-list li:nth-child(3)::before {
            content: "💼";
        }

        .benefits-list li:nth-child(4)::before {
            content: "🎉";
        }

        .social-section {
            background: white;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        .social-title {
            color: #1e3a8a;
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .social-text {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .social-link {
            display: inline-block;
            padding: 10px 16px;
            background: #1e3a8a;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: #1e40af;
            transform: translateY(-2px);
        }

        .preferences-section {
            background: #fefefe;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 25px;
            margin: 30px 0;
            text-align: center;
        }

        .preferences-title {
            color: #1e3a8a;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .preferences-text {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .preferences-link {
            color: #1e40af;
            text-decoration: none;
            font-weight: 600;
        }

        .preferences-link:hover {
            text-decoration: underline;
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
            margin-bottom: 15px;
        }

        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 20px;
            font-size: 13px;
            opacity: 0.7;
        }

        .unsubscribe-link {
            color: #9ca3af;
            text-decoration: none;
            font-size: 12px;
        }

        .unsubscribe-link:hover {
            color: #d1d5db;
            text-decoration: underline;
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

            .celebration-section,
            .benefits-section {
                padding: 20px;
                margin: 20px 0;
            }

            .benefits-list li {
                padding: 12px 15px;
                font-size: 14px;
            }

            .social-links {
                flex-direction: column;
                align-items: center;
            }

            .social-link {
                width: 200px;
            }
        }

        @media only screen and (max-width: 480px) {
            .header h1 {
                font-size: 22px;
            }

            .content {
                padding: 20px 15px;
            }

            .celebration-title {
                font-size: 20px;
            }

            .benefits-title {
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
            <h1>Welcome Aboard! 🎉</h1>
            <p>You're now part of our community</p>
            <div class="welcome-badge">
                Newsletter Subscriber
            </div>
        </div>

        <!-- Main Content -->
        <div class="content">
            <!-- Celebration Section -->
            <div class="celebration-section">
                <div class="celebration-icon">🎊</div>
                <div class="celebration-title">Thanks for Subscribing!</div>
                <div class="celebration-subtitle">You've made an excellent choice</div>
            </div>

            <div class="greeting">
                Hello there!
            </div>

            <div class="main-message">
                Thanks for joining our newsletter! We're thrilled to have you as part of our community.
                Stay tuned for updates, news, and special offers that we'll be sharing exclusively with our subscribers.
            </div>

            <!-- Benefits Section -->
            <div class="benefits-section">
                <div class="benefits-title">
                    What to Expect
                </div>

                <ul class="benefits-list">
                    <li><strong>Industry Updates:</strong> Stay informed with the latest news and trends in our field
                    </li>
                    <li><strong>Exclusive Content:</strong> Get access to insights and tips you won't find anywhere else
                    </li>
                    <li><strong>Special Offers:</strong> Be the first to know about promotions and exclusive deals</li>
                    <li><strong>Company News:</strong> Get behind-the-scenes updates and exciting announcements</li>
                </ul>
            </div>

            <!-- Social Media Section -->
            <div class="social-section">
                <div class="social-title">Stay Connected</div>
                <div class="social-text">Follow us on social media for daily updates and community discussions</div>
                <div class="social-links">
                    <a href="#" class="social-link">📘 Facebook</a>
                    <a href="#" class="social-link">🐦 Twitter</a>
                    <a href="#" class="social-link">💼 LinkedIn</a>
                    <a href="#" class="social-link">📷 Instagram</a>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <div class="team-signature">
                    Welcome to the family!<br>
                    – The {{ config('app.name') }} Team
                </div>
                <div class="footer-info">
                    We're excited to share our journey with you<br>
                    and keep you updated on everything that matters.
                </div>
            </div>
            <div class="footer-bottom">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.<br>
                <a href="#" class="unsubscribe-link">Unsubscribe</a> |
                <a href="#" class="unsubscribe-link">Update Preferences</a>
            </div>
        </div>
    </div>
</body>

</html>
