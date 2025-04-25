<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna | Dashboard</title>
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 
</head>
<body>
    <div class="container">
        <div class="profile-card">
            <div class="profile-header">
                Profil Pengguna
            </div>
            <div class="profile-body">
                <div class="profile-detail">
                    <div class="profile-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="profile-info">
                        <div class="profile-label">Nama Lengkap</div>
                        <div class="profile-value">{{ $user->nama }}</div>
                    </div>
                </div>
                
                <div class="profile-detail">
                    <div class="profile-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="profile-info">
                        <div class="profile-label">Email</div>
                        <div class="profile-value">{{ $user->email }}</div>
                    </div>
                </div>
                
                <div class="profile-detail">
                    <div class="profile-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <div class="profile-info">
                        <div class="profile-label">join</div>
                        <div class="profile-value">{{ $user->created_at->format('d F Y') }}</div>
                    </div>
                </div>
            </div>
            <div class="profile-footer">
                terakhir liat mah pas: {{ date('d F Y') }}
            </div>
        </div>
    </div>
</body>
</html>