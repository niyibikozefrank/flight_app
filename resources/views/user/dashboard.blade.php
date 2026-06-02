<x-app-layout>
    <x-slot name="header">
        <h2 style="font-size: 2rem; font-weight: 700; color: #0f172a;">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div style="padding: 2rem 0;">
        <div style="max-width: 7xl; margin: 0 auto; padding: 0 1rem;">
            
            <!-- Welcome Card -->
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 1rem; padding: 2rem; margin-bottom: 2rem; color: white;">
                <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 0.5rem;">Welcome, {{ Auth::user()->name }}!</h3>
                <p style="font-size: 1rem; opacity: 0.9;">Manage your patient profile, appointments, and medical records.</p>
            </div>

            <!-- Quick Actions Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
                
                <!-- My Profile Card -->
                <div style="background: white; border-radius: 1rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07); overflow: hidden; transition: all 0.3s;">
                    <div style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); padding: 1.5rem; color: white;">
                        <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">👤 My Profile</h4>
                    </div>
                    <div style="padding: 1.5rem;">
                        <p style="color: #64748b; margin-bottom: 1rem;">View and edit your profile information</p>
                        <a href="{{ route('user.profile.edit') }}" style="display: inline-block; background: #3b82f6; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.3s;" onmouseover="this.style.background='#2563eb'" onmouseout="this.style.background='#3b82f6'">
                            Edit Profile
                        </a>
                    </div>
                </div>

                <!-- Patients Card -->
                <div style="background: white; border-radius: 1rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07); overflow: hidden; transition: all 0.3s;">
                    <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); padding: 1.5rem; color: white;">
                        <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">🏥 My Patients</h4>
                    </div>
                    <div style="padding: 1.5rem;">
                        <p style="color: #64748b; margin-bottom: 1rem;">Manage your patient records</p>
                        <a href="{{ route('user.patients.index') }}" style="display: inline-block; background: #10b981; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.3s;" onmouseover="this.style.background='#059669'" onmouseout="this.style.background='#10b981'">
                            View Patients
                        </a>
                    </div>
                </div>

                <!-- Doctors Card -->
                <div style="background: white; border-radius: 1rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07); overflow: hidden; transition: all 0.3s;">
                    <div style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%); padding: 1.5rem; color: white;">
                        <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">👨‍⚕️ Doctors</h4>
                    </div>
                    <div style="padding: 1.5rem;">
                        <p style="color: #64748b; margin-bottom: 1rem;">View available doctors</p>
                        <a href="{{ route('user.doctors.index') }}" style="display: inline-block; background: #f59e0b; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.3s;" onmouseover="this.style.background='#d97706'" onmouseout="this.style.background='#f59e0b'">
                            View Doctors
                        </a>
                    </div>
                </div>

                <!-- Appointments Card -->
                <div style="background: white; border-radius: 1rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07); overflow: hidden; transition: all 0.3s;">
                    <div style="background: linear-gradient(135deg, #ec4899 0%, #db2777 100%); padding: 1.5rem; color: white;">
                        <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">📅 Appointments</h4>
                    </div>
                    <div style="padding: 1.5rem;">
                        <p style="color: #64748b; margin-bottom: 1rem;">Schedule and manage appointments</p>
                        <a href="{{ route('user.appointments.index') }}" style="display: inline-block; background: #ec4899; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.3s;" onmouseover="this.style.background='#db2777'" onmouseout="this.style.background='#ec4899'">
                            View Appointments
                        </a>
                    </div>
                </div>

                <!-- Medical Records Card -->
                <div style="background: white; border-radius: 1rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07); overflow: hidden; transition: all 0.3s;">
                    <div style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%); padding: 1.5rem; color: white;">
                        <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">📋 Medical Records</h4>
                    </div>
                    <div style="padding: 1.5rem;">
                        <p style="color: #64748b; margin-bottom: 1rem;">View your medical history</p>
                        <a href="{{ route('user.medical.index') }}" style="display: inline-block; background: #8b5cf6; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.3s;" onmouseover="this.style.background='#7c3aed'" onmouseout="this.style.background='#8b5cf6'">
                            View Records
                        </a>
                    </div>
                </div>

                <!-- Create Appointment Card -->
                <div style="background: white; border-radius: 1rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07); overflow: hidden; transition: all 0.3s;">
                    <div style="background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%); padding: 1.5rem; color: white;">
                        <h4 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 0.5rem;">➕ New Appointment</h4>
                    </div>
                    <div style="padding: 1.5rem;">
                        <p style="color: #64748b; margin-bottom: 1rem;">Book a new appointment</p>
                        <a href="{{ route('user.appointments.create') }}" style="display: inline-block; background: #06b6d4; color: white; padding: 0.5rem 1rem; border-radius: 0.5rem; text-decoration: none; font-weight: 500; transition: all 0.3s;" onmouseover="this.style.background='#0891b2'" onmouseout="this.style.background='#06b6d4'">
                            Book Now
                        </a>
                    </div>
                </div>
            </div>

            <!-- Info Section -->
            <div style="background: #f0f4f8; border-radius: 1rem; padding: 2rem; border-left: 4px solid #3b82f6;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color: #0f172a; margin-bottom: 1rem;">📌 Quick Info</h3>
                <ul style="list-style: none; padding: 0; color: #475569;">
                    <li style="margin-bottom: 0.75rem;">✓ Create and manage your patient profile</li>
                    <li style="margin-bottom: 0.75rem;">✓ View available doctors in the clinic</li>
                    <li style="margin-bottom: 0.75rem;">✓ Book and manage your appointments</li>
                    <li style="margin-bottom: 0.75rem;">✓ Access your medical records and history</li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
