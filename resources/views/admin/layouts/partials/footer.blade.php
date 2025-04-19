<footer class="luxury-footer">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="text-gold-soft">
            &copy; 2024–2025 <a href="#" class="text-gold text-decoration-none">Tunglor25</a>. All rights reserved.
        </div>
        <div class="d-flex gap-3">
            <a href="#" class="text-gold-soft text-decoration-none">
                <i class="fas fa-lock me-1"></i> Privacy Policy
            </a>
            <a href="#" class="text-gold-soft text-decoration-none">
                <i class="fas fa-file-contract me-1"></i> Terms
            </a>
            <a href="tel:0344122842" class="text-gold text-decoration-none">
                <i class="fas fa-phone me-1"></i> 0344 122 842
            </a>
        </div>
    </div>
</footer>

<style>
    .luxury-footer {
        position: fixed;
        bottom: 0;
        left: var(--sidebar-width);
        right: 0;
        height: var(--footer-height);
        z-index: 1020;
        background: linear-gradient(135deg, #121212 0%, #1a1a1a 100%);
        border-top: 1px solid var(--border-gold);
        box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        padding: 0 2rem;
    }

    .luxury-footer::before {
        content: '';
        position: absolute;
        top: -3px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent 0%, var(--gold-light) 20%, var(--gold) 50%, var(--gold-light) 80%, transparent 100%);
        box-shadow: 0 2px 5px rgba(212, 175, 55, 0.5);
    }

    .text-gold { color: var(--gold) !important; }
    .text-gold-soft { color: var(--gold-soft) !important; }
</style>
