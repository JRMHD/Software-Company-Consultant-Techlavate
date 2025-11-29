<x-admin-layout>
    <div class="form-page">
        <!-- Page Header -->
        <div class="page-header mb-4">
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('admin.users.index') }}" class="btn-back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="page-title mb-1">Create New User</h1>
                    <p class="page-subtitle mb-0">Add a new user to the system</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="modern-card">
                    <div class="card-body-modern">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf

                            <div class="row g-4">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            <i class="fa-solid fa-user"></i>
                                            Full Name
                                        </label>
                                        <input type="text" 
                                               class="form-control-modern @error('name') is-invalid @enderror" 
                                               name="name" 
                                               value="{{ old('name') }}" 
                                               placeholder="Enter full name"
                                               required>
                                        @error('name')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            <i class="fa-solid fa-envelope"></i>
                                            Email Address
                                        </label>
                                        <input type="email" 
                                               class="form-control-modern @error('email') is-invalid @enderror" 
                                               name="email" 
                                               value="{{ old('email') }}" 
                                               placeholder="user@example.com"
                                               required>
                                        @error('email')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Role -->
                                <div class="col-md-12">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            <i class="fa-solid fa-shield-halved"></i>
                                            User Role
                                        </label>
                                        <div class="role-selector">
                                            <label class="role-option">
                                                <input type="radio" name="role" value="user" {{ old('role') === 'user' ? 'checked' : '' }} required>
                                                <div class="role-card">
                                                    <div class="role-icon bg-primary">
                                                        <i class="fa-solid fa-user"></i>
                                                    </div>
                                                    <div class="role-info">
                                                        <div class="role-title">Regular User</div>
                                                        <div class="role-description">Standard access to the platform</div>
                                                    </div>
                                                    <div class="role-check">
                                                        <i class="fa-solid fa-check-circle"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            <label class="role-option">
                                                <input type="radio" name="role" value="admin" {{ old('role') === 'admin' ? 'checked' : '' }}>
                                                <div class="role-card">
                                                    <div class="role-icon bg-danger">
                                                        <i class="fa-solid fa-shield-halved"></i>
                                                    </div>
                                                    <div class="role-info">
                                                        <div class="role-title">Administrator</div>
                                                        <div class="role-description">Full system access and permissions</div>
                                                    </div>
                                                    <div class="role-check">
                                                        <i class="fa-solid fa-check-circle"></i>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        @error('role')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            <i class="fa-solid fa-lock"></i>
                                            Password
                                        </label>
                                        <input type="password" 
                                               class="form-control-modern @error('password') is-invalid @enderror" 
                                               name="password" 
                                               placeholder="Enter password"
                                               required>
                                        @error('password')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <div class="form-group-modern">
                                        <label class="form-label-modern">
                                            <i class="fa-solid fa-lock"></i>
                                            Confirm Password
                                        </label>
                                        <input type="password" 
                                               class="form-control-modern" 
                                               name="password_confirmation" 
                                               placeholder="Confirm password"
                                               required>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="form-actions">
                                <button type="submit" class="btn-modern btn-primary">
                                    <i class="fa-solid fa-check"></i>
                                    <span>Create User</span>
                                </button>
                                <a href="{{ route('admin.users.index') }}" class="btn-modern btn-secondary">
                                    <i class="fa-solid fa-times"></i>
                                    <span>Cancel</span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-page {
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
            margin: 0;
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

        .card-body-modern {
            padding: 32px;
        }

        .form-group-modern {
            margin-bottom: 0;
        }

        .form-label-modern {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-label-modern i {
            color: #9ca3af;
            font-size: 16px;
        }

        .form-control-modern {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.2s;
            background: white;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: #4E2FDA;
            box-shadow: 0 0 0 4px rgba(78, 47, 218, 0.1);
        }

        .form-control-modern.is-invalid {
            border-color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
        }

        .role-selector {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 16px;
        }

        .role-option {
            cursor: pointer;
            margin: 0;
        }

        .role-option input[type="radio"] {
            display: none;
        }

        .role-card {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            transition: all 0.2s;
            background: white;
        }

        .role-option input[type="radio"]:checked + .role-card {
            border-color: #4E2FDA;
            background: rgba(78, 47, 218, 0.05);
        }

        .role-card:hover {
            border-color: #d1d5db;
        }

        .role-icon {
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

        .role-icon.bg-primary {
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%);
        }

        .role-icon.bg-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        }

        .role-info {
            flex: 1;
        }

        .role-title {
            font-weight: 600;
            color: #111827;
            font-size: 15px;
            margin-bottom: 4px;
        }

        .role-description {
            font-size: 13px;
            color: #6b7280;
        }

        .role-check {
            color: #4E2FDA;
            font-size: 24px;
            opacity: 0;
            transition: opacity 0.2s;
        }

        .role-option input[type="radio"]:checked + .role-card .role-check {
            opacity: 1;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            padding-top: 32px;
            border-top: 1px solid #f3f4f6;
        }

        .btn-modern {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-modern.btn-primary {
            background: linear-gradient(135deg, #4E2FDA 0%, #7c3aed 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(78, 47, 218, 0.3);
        }

        .btn-modern.btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(78, 47, 218, 0.4);
        }

        .btn-modern.btn-secondary {
            background: #f3f4f6;
            color: #6b7280;
        }

        .btn-modern.btn-secondary:hover {
            background: #e5e7eb;
            color: #374151;
        }

        /* Dark Mode */
        body.dark-mode .btn-back {
            background: #1f2937;
            border-color: #374151;
            color: #9ca3af;
        }

        body.dark-mode .btn-back:hover {
            background: #374151;
            color: #f3f4f6;
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

        body.dark-mode .form-label-modern {
            color: #e5e7eb;
        }

        body.dark-mode .form-control-modern {
            background: #111827;
            border-color: #374151;
            color: #f3f4f6;
        }

        body.dark-mode .form-control-modern:focus {
            border-color: #4E2FDA;
        }

        body.dark-mode .role-card {
            background: #111827;
            border-color: #374151;
        }

        body.dark-mode .role-option input[type="radio"]:checked + .role-card {
            background: rgba(78, 47, 218, 0.1);
        }

        body.dark-mode .role-title {
            color: #f3f4f6;
        }

        body.dark-mode .form-actions {
            border-color: #374151;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 24px;
            }

            .card-body-modern {
                padding: 24px;
            }

            .role-selector {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-modern {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</x-admin-layout>
