<x-admin-layout>
    <div class="quote-detail">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.quotes.index') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="page-title mb-1">Quote Request Details</h1>
                    <p class="page-subtitle mb-0">Submitted {{ $quote->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Company Information -->
            <div class="col-lg-8">
                <div class="modern-card mb-4">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Company Information</h3>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Company Name</div>
                                <div class="info-value">{{ $quote->company_name }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-industry"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Industry</div>
                                <div class="info-value">{{ $quote->industry }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Company Size</div>
                                <div class="info-value">{{ $quote->company_size }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-clock"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Timeline</div>
                                <div class="info-value">
                                    <span class="timeline-badge timeline-{{ strtolower(str_replace([' ', '+'], ['-', 'plus'], $quote->timeline)) }}">
                                        {{ $quote->timeline }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services Requested -->
                <div class="modern-card mb-4">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Services Requested</h3>
                    </div>
                    <div class="card-body-modern">
                        @php
                            $services = $quote->services;
                            // If it's already an array from the cast, use it
                            // Otherwise it might be a string that needs decoding
                            if (!is_array($services) && is_string($services)) {
                                $services = json_decode($services, true);
                            }
                        @endphp
                        @if(is_array($services) && count($services) > 0)
                            <div class="services-grid">
                                @foreach($services as $service)
                                    <div class="service-badge">
                                        <i class="fa-solid fa-check-circle"></i>
                                        {{ $service }}
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mb-0">No services specified</p>
                        @endif
                        @if($quote->other_services)
                            <div class="mt-3">
                                <div class="other-services-label">Other Services:</div>
                                <div class="other-services-value">{{ $quote->other_services }}</div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Message -->
                @if($quote->message)
                    <div class="modern-card">
                        <div class="card-header-simple">
                            <h3 class="card-title-simple">Additional Message</h3>
                        </div>
                        <div class="card-body-modern">
                            <div class="message-content">
                                {{ $quote->message }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="modern-card mb-4">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Contact Details</h3>
                    </div>
                    <div class="contact-info">
                        <div class="contact-item">
                            <div class="contact-icon bg-primary">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div>
                                <div class="contact-label">Email</div>
                                <a href="mailto:{{ $quote->email }}" class="contact-value">{{ $quote->email }}</a>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon bg-success">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <div class="contact-label">Phone</div>
                                <a href="tel:{{ $quote->phone }}" class="contact-value">{{ $quote->phone }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submission Info -->
                <div class="modern-card">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Submission Info</h3>
                    </div>
                    <div class="submission-info">
                        <div class="submission-item">
                            <i class="fa-solid fa-calendar-plus"></i>
                            <div>
                                <div class="submission-label">Submitted</div>
                                <div class="submission-value">{{ $quote->created_at->format('M d, Y \a\t h:i A') }}</div>
                            </div>
                        </div>
                        <div class="submission-item">
                            <i class="fa-solid fa-clock"></i>
                            <div>
                                <div class="submission-label">Time Ago</div>
                                <div class="submission-value">{{ $quote->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .quote-detail {
            padding: 0;
        }

        .btn-back {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border: 1px solid #e5e7eb;
            color: #6b7280;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #f9fafb;
            color: #111827;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 14px;
        }

        .modern-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-header-simple {
            padding: 24px;
            border-bottom: 1px solid #f3f4f6;
        }

        .card-title-simple {
            font-size: 18px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .card-body-modern {
            padding: 24px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 24px;
            padding: 24px;
        }

        .info-item {
            display: flex;
            gap: 16px;
        }

        .info-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            background: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 18px;
            flex-shrink: 0;
        }

        .info-label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 15px;
            font-weight: 600;
            color: #111827;
        }

        .timeline-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .timeline-immediate {
            background: rgba(239, 68, 68, 0.1);
            color: #dc2626;
        }

        .timeline-1-3-months {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }

        .timeline-3-6-months {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
        }

        .timeline-6plus-months {
            background: rgba(107, 114, 128, 0.1);
            color: #6b7280;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 12px;
        }

        .service-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 16px;
            background: rgba(78, 47, 218, 0.05);
            border: 1px solid rgba(78, 47, 218, 0.1);
            border-radius: 10px;
            color: #4E2FDA;
            font-size: 14px;
            font-weight: 500;
        }

        .other-services-label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .other-services-value {
            font-size: 14px;
            color: #111827;
            padding: 12px;
            background: #f9fafb;
            border-radius: 8px;
        }

        .message-content {
            font-size: 14px;
            line-height: 1.6;
            color: #374151;
            white-space: pre-wrap;
        }

        .contact-info {
            padding: 24px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .contact-item:last-child {
            border-bottom: none;
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
        }

        .contact-icon.bg-primary {
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%);
        }

        .contact-icon.bg-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .contact-label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .contact-value {
            font-size: 15px;
            font-weight: 600;
            color: #111827;
            text-decoration: none;
        }

        .contact-value:hover {
            color: #4E2FDA;
        }

        .submission-info {
            padding: 24px;
        }

        .submission-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 16px 0;
            border-bottom: 1px solid #f3f4f6;
        }

        .submission-item:last-child {
            border-bottom: none;
        }

        .submission-item i {
            color: #9ca3af;
            font-size: 18px;
            margin-top: 2px;
        }

        .submission-label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 4px;
        }

        .submission-value {
            font-size: 14px;
            font-weight: 600;
            color: #111827;
        }

        /* Dark Mode */
        body.dark-mode .btn-back {
            background: #1f2937;
            border-color: #374151;
            color: #9ca3af;
        }

        body.dark-mode .page-title {
            color: #f3f4f6;
        }

        body.dark-mode .page-subtitle {
            color: #9ca3af;
        }

        body.dark-mode .modern-card {
            background: #1f2937;
        }

        body.dark-mode .card-header-simple {
            border-color: #374151;
        }

        body.dark-mode .card-title-simple,
        body.dark-mode .info-value,
        body.dark-mode .contact-value,
        body.dark-mode .submission-value {
            color: #f3f4f6;
        }

        body.dark-mode .info-icon {
            background: #111827;
        }

        body.dark-mode .service-badge {
            background: rgba(78, 47, 218, 0.1);
            border-color: rgba(78, 47, 218, 0.2);
        }

        body.dark-mode .other-services-value {
            background: #111827;
            color: #f3f4f6;
        }

        body.dark-mode .message-content {
            color: #e5e7eb;
        }

        body.dark-mode .contact-item,
        body.dark-mode .submission-item {
            border-color: #374151;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .services-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</x-admin-layout>
