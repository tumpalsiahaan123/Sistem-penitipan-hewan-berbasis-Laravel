// ===== NAVBAR MOBILE MENU =====
document.addEventListener('DOMContentLoaded', function() {
    // Toggle mobile menu
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function() {
            navLinks.classList.toggle('active');
        });
    }
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.nav-container') && navLinks.classList.contains('active')) {
            navLinks.classList.remove('active');
        }
    });
    
    // Set active nav link based on current page
    setActiveNavLink();
    
    // Initialize any page-specific functionality
    initializePage();
});

// Function to set active navigation link
function setActiveNavLink() {
    const currentPage = window.location.pathname.split('/').pop() || 'index.html';
    const navLinks = document.querySelectorAll('.nav-links a');
    
    navLinks.forEach(link => {
        const linkPage = link.getAttribute('href');
        if (linkPage === currentPage) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });
}

// Function to initialize page-specific features
function initializePage() {
    const currentPage = window.location.pathname.split('/').pop();
    
    switch(currentPage) {
        case 'index.html':
            initDashboard();
            break;
        case 'data-hewan.html':
            initDataHewan();
            break;
        case 'data-pemilik.html':
            initDataPemilik();
            break;
        case 'riwayat.html':
            initRiwayat();
            break;
    }
}

// ===== DASHBOARD FUNCTIONS =====
function initDashboard() {
    console.log('Dashboard initialized');
    
    // Add click effects to dashboard cards
    const cards = document.querySelectorAll('.dashboard-card');
    if (cards.length > 0) {
        cards.forEach(card => {
            card.addEventListener('click', function() {
                const link = this.querySelector('a');
                if (link) {
                    window.location.href = link.href;
                }
            });
        });
    }
    
    // Initialize charts if any
    initDashboardCharts();
}

function initDashboardCharts() {
    // This would be where you initialize charts (using Chart.js, etc.)
    // For now, we'll just log
    console.log('Charts would be initialized here');
}

// ===== DATA HEWAN FUNCTIONS =====
function initDataHewan() {
    console.log('Data Hewan page initialized');
    
    // Handle form submission
    const formTambahHewan = document.getElementById('formTambahHewan');
    if (formTambahHewan) {
        formTambahHewan.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Data hewan berhasil ditambahkan!');
            this.reset();
            // In a real app, you would send data to server here
        });
    }
    
    // Handle delete buttons
    const deleteButtons = document.querySelectorAll('.action-btn.delete');
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            if (confirm('Apakah Anda yakin ingin menghapus data hewan ini?')) {
                const row = this.closest('tr');
                row.style.opacity = '0';
                setTimeout(() => {
                    row.remove();
                    showNotification('Data hewan berhasil dihapus!', 'success');
                }, 300);
            }
        });
    });
}

// ===== DATA PEMILIK FUNCTIONS =====
function initDataPemilik() {
    console.log('Data Pemilik page initialized');
    
    // Similar functionality to data hewan
    const formTambahPemilik = document.getElementById('formTambahPemilik');
    if (formTambahPemilik) {
        formTambahPemilik.addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Data pemilik berhasil ditambahkan!');
            this.reset();
        });
    }
}

// ===== RIWAYAT FUNCTIONS =====
function initRiwayat() {
    console.log('Riwayat page initialized');
    
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    filterButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterButtons.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            // Filter table rows based on data-filter attribute
            const filter = this.getAttribute('data-filter');
            filterTableRows(filter);
        });
    });
}

function filterTableRows(filter) {
    const rows = document.querySelectorAll('.table tbody tr');
    rows.forEach(row => {
        if (filter === 'all') {
            row.style.display = '';
        } else {
            const status = row.getAttribute('data-status');
            if (status === filter) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
}

// ===== NOTIFICATION SYSTEM =====
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <span>${message}</span>
        <button class="notification-close">&times;</button>
    `;
    
    // Add styles if not already added
    if (!document.querySelector('#notification-styles')) {
        const styles = document.createElement('style');
        styles.id = 'notification-styles';
        styles.textContent = `
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px 20px;
                border-radius: var(--radius-sm);
                color: white;
                font-weight: 500;
                display: flex;
                align-items: center;
                justify-content: space-between;
                min-width: 300px;
                max-width: 400px;
                z-index: 9999;
                animation: slideIn 0.3s ease;
                box-shadow: var(--shadow);
            }
            .notification-success { background: var(--success); }
            .notification-error { background: var(--danger); }
            .notification-info { background: var(--primary); }
            .notification-warning { background: var(--warning); }
            .notification-close {
                background: none;
                border: none;
                color: white;
                font-size: 20px;
                cursor: pointer;
                margin-left: 15px;
            }
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
        `;
        document.head.appendChild(styles);
    }
    
    // Add to page
    document.body.appendChild(notification);
    
    // Close button functionality
    notification.querySelector('.notification-close').addEventListener('click', function() {
        notification.style.animation = 'slideOut 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    });
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => notification.remove(), 300);
        }
    }, 5000);
}