@extends('layouts.website.main')

@section('title', 'Kontak Kami')

@section('content')
<div class="container">
    <section class="content">
        <h2>Hubungi Kami</h2>
        
        <div class="about-grid">
            <!-- Form Kontak -->
            <div class="about-card">
                <h3>Kirim Pesan</h3>
                <form class="contact-form">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn-explore">Kirim Pesan</button>
                </form>
            </div>
            
            <!-- Informasi Kontak -->
            <div class="about-card">
                <h3>Informasi Kontak</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong> Jl. Central Catredal No. 123, UnderWorld</li>
                    <li><i class="fas fa-envelope"></i> <strong>Email:</strong> Quinella@Catredal.com</li>
                    <li><i class="fas fa-phone"></i> <strong>Telepon:</strong> +62 123 4567 890</li>
                    <li><i class="fas fa-clock"></i> <strong>Jam Operasional:</strong> Senin-Jumat: 08.00-17.00 WIB</li>
                </ul>
                
                <div class="social-links" style="justify-content: flex-start; margin-top: 20px;">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Lokasi -->
        <div class="about-card" style="margin-top: 30px;">
            <h3>Lokasi Kami</h3>
            <div style="height: 300px; background: #e3f2fd; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-top: 20px;">
                <p style="color: #0288d1; font-weight: bold;">[Peta Lokasi akan ditampilkan di sini]</p>
            </div>
        </div>
    </section>
</div>
@endsection