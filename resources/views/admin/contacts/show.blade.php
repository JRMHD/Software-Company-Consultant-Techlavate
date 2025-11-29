<x-admin-layout>
    <div class="contact-detail">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.contacts.index') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="page-title mb-1">Contact Message</h1>
                    <p class="page-subtitle mb-0">Received {{ $contact->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Message Content -->
            <div class="col-lg-8">
                <div class="modern-card mb-4">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Message</h3>
                    </div>
                    <div class="card-body-modern">
                        <div class="message-content">
                            {{ $contact->message }}
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="modern-card">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Contact Information</h3>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Full Name</div>
                                <div class="info-value">{{ $contact->first_name }} {{ $contact->last_name }}</div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Email Address</div>
                                <div class="info-value">
                                    <a href="mailto:{{ $contact->email }}" class="contact-link">{{ $contact->email }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="info-content">
                                <div class="info-label">Phone Number</div>
                                <div class="info-value">
                                    <a href="tel:{{ $contact->phone }}" class="contact-link">{{ $contact->phone }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Sender Profile -->
                <div class="modern-card mb-4">
                    <div class="profile-header">
                        <div class="profile-avatar">
                            {{ substr($contact->first_name, 0, 1) }}
                        </div>
                        <h3 class="profile-name">{{ $contact->first_name }} {{ $contact->last_name }}</h3>
                        <p class="profile-email">{{ $contact->email }}</p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="modern-card mb-4">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Quick Actions</h3>
                    </div>
                    <div class="actions-list">
                        <a href="mailto:{{ $contact->email }}" class="action-item">
                            <div class="action-icon bg-primary">
                                <i class="fa-solid fa-reply"></i>
                            </div>
                            <div>
                                <div class="action-title">Reply via Email</div>
                                <div class="action-desc">Send a response</div>
                            </div>
                        </a>
                        <a href="tel:{{ $contact->phone }}" class="action-item">
                            <div class="action-icon bg-success">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div>
                                <div class="action-title">Call Contact</div>
                                <div class="action-desc">Make a phone call</div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Submission Info -->
                <div class="modern-card">
                    <div class="card-header-simple">
                        <h3 class="card-title-simple">Submission Details</h3>
                    </div>
                    <div class="submission-info">
                        <div class="submission-item">
                            <i class="fa-solid fa-calendar-plus"></i>
                            <div>
                                <div class="submission-label">Submitted</div>
                                <div class="submission-value">{{ $contact->created_at->format('M d, Y \a\t h:i A') }}</div>
                            </div>
                        </div>
                        <div class="submission-item">
                            <i class="fa-solid fa-clock"></i>
                            <div>
                                <div class="submission-label">Time Ago</div>
                                <div class="submission-value">{{ $contact->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .contact-detail {
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
            padding: 32px;
        }

        .message-content {
            font-size: 15px;
            line-height: 1.8;
            color: #374151;
            white-space: pre-wrap;
            background: #f9fafb;
            padding: 24px;
            border-radius: 12px;
            border-left: 4px solid #4E2FDA;
        }

        .info-grid {
            display: grid;
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

        .contact-link {
            color: #4E2FDA;
            text-decoration: none;
        }

        .contact-link:hover {
            text-decoration: underline;
        }

        .profile-header {
            padding: 40px 32px;
            text-align: center;
            background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 20px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 40px;
            margin: 0 auto 20px;
            box-shadow: 0 8px 24px rgba(16, 185, 129, 0.3);
        }

        .profile-name {
            font-size: 20px;
            font-weight: 700;
            color: #111827;
            margin-bottom: 8px;
        }

        .profile-email {
            color: #6b7280;
            font-size: 14px;
            margin: 0;
        }

        .actions-list {
            padding: 24px;
        }

        .action-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 16px;
            border-radius: 12px;
            transition: all 0.2s;
            text-decoration: none;
            margin-bottom: 12px;
        }

        .action-item:last-child {
            margin-bottom: 0;
        }

        .action-item:hover {
            background: #f9fafb;
        }

        .action-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: white;
            flex-shrink: 0;
        }

        .action-icon.bg-primary {
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%);
        }

        .action-icon.bg-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .action-title {
            font-size: 15px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 4px;
        }

        .action-desc {
            font-size: 13px;
            color: #6b7280;
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
        body.dark-mode .profile-name,
        body.dark-mode .action-title,
        body.dark-mode .submission-value {
            color: #f3f4f6;
        }

        body.dark-mode .message-content {
            background: #111827;
            color: #e5e7eb;
        }

        body.dark-mode .info-icon {
            background: #111827;
        }

        body.dark-mode .profile-header {
            background: linear-gradient(135deg, #111827 0%, #1f2937 100%);
        }

        body.dark-mode .action-item:hover {
            background: #111827;
        }

        body.dark-mode .submission-item {
            border-color: #374151;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }

            .profile-avatar {
                width: 80px;
                height: 80px;
                font-size: 32px;
            }

            .info-grid {
                padding: 24px;
            }
        }
    </style>
</x-admin-layout>
