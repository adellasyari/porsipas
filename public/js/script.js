document.addEventListener('DOMContentLoaded', () => {
    const navbar    = document.getElementById('navbar');
    const hamburger = document.getElementById('hamburger');
    const navMenu   = document.getElementById('nav-menu');
    const navLinks  = document.querySelectorAll('.nav-link');

    // 1. Sticky Navbar Effect on Scroll
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // 2. Mobile Menu Toggle
    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    // 3. Auto-close mobile menu on nav link click
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });

    // =========================================
    // 4. Article Category Filter (Arsip Page)
    // =========================================
    const filterChipsContainer = document.getElementById('filter-chips');
    const articleGrid          = document.getElementById('article-grid');
    const emptyState           = document.getElementById('empty-state');

    if (filterChipsContainer && articleGrid) {
        const chips = filterChipsContainer.querySelectorAll('.chip');
        const cards = articleGrid.querySelectorAll('.article-card');

        filterChipsContainer.addEventListener('click', (e) => {
            const clickedChip = e.target.closest('.chip');
            if (!clickedChip) return;

            chips.forEach(chip => chip.classList.remove('chip--active'));
            clickedChip.classList.add('chip--active');

            const activeFilter = clickedChip.dataset.filter;
            let visibleCount   = 0;

            cards.forEach(card => {
                const isMatch = activeFilter === 'semua' || card.dataset.category === activeFilter;
                if (isMatch) {
                    card.classList.remove('hidden');
                    visibleCount++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (emptyState) {
                emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        });
    }

    // =========================================
    // 5. Catalog Page — Filter & Search Produk
    // =========================================
    const catalogChipsEl = document.getElementById('catalog-filter-chips');
    const catalogGridEl  = document.getElementById('catalog-grid');
    const catalogEmptyEl = document.getElementById('catalog-empty');
    const searchInputEl  = document.getElementById('catalog-search-input');

    if (catalogChipsEl && catalogGridEl) {
        const catChips  = catalogChipsEl.querySelectorAll('.chip');
        const prodCards = catalogGridEl.querySelectorAll('.product-card');

        function filterCatalog() {
            const activeChip   = catalogChipsEl.querySelector('.chip--active');
            const activeFilter = activeChip ? activeChip.dataset.filter : 'semua';
            const searchQuery  = searchInputEl ? searchInputEl.value.toLowerCase().trim() : '';
            let visibleCount   = 0;

            prodCards.forEach(card => {
                const catOk  = activeFilter === 'semua' || card.dataset.category === activeFilter;
                const nameOk = !searchQuery || (card.dataset.name && card.dataset.name.includes(searchQuery));
                const show   = catOk && nameOk;
                card.style.display = show ? '' : 'none';
                if (show) visibleCount++;
            });

            if (catalogEmptyEl) {
                catalogEmptyEl.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        }

        catalogChipsEl.addEventListener('click', (e) => {
            const btn = e.target.closest('.chip');
            if (!btn) return;
            catChips.forEach(c => c.classList.remove('chip--active'));
            btn.classList.add('chip--active');
            filterCatalog();
        });

        if (searchInputEl) {
            let debounce;
            searchInputEl.addEventListener('input', () => {
                clearTimeout(debounce);
                debounce = setTimeout(filterCatalog, 250);
            });
        }
    }

    // =========================================
    // 6. Product Detail — Quantity Selector
    // =========================================
    const qtyMinus    = document.getElementById('qty-minus');
    const qtyPlus     = document.getElementById('qty-plus');
    const qtyValue    = document.getElementById('qty-value');
    const qtyTotal    = document.getElementById('qty-total-price');
    const basePriceEl = document.getElementById('base-price');
    const BASE_PRICE  = basePriceEl ? parseInt(basePriceEl.value, 10) : 0;

    if (qtyMinus && qtyPlus && qtyValue) {
        let qty = 1;

        function updateQty() {
            qtyValue.textContent = qty;
            if (qtyTotal) {
                const formatted = new Intl.NumberFormat('id-ID').format(BASE_PRICE * qty);
                qtyTotal.innerHTML = 'Total: <strong>Rp ' + formatted + '</strong>';
            }
            qtyMinus.disabled = qty <= 1;
        }

        qtyPlus.addEventListener('click',  () => { qty++; updateQty(); });
        qtyMinus.addEventListener('click', () => { if (qty > 1) { qty--; updateQty(); } });
        updateQty();
    }

    // =========================================
    // 7. Product Detail — Tab Switcher
    // =========================================
    const tabHeaderEl = document.getElementById('tab-header');
    if (tabHeaderEl) {
        const tabBtns     = tabHeaderEl.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        tabHeaderEl.addEventListener('click', (e) => {
            const btn = e.target.closest('.tab-btn');
            if (!btn) return;
            tabBtns.forEach(b => b.classList.remove('tab-btn--active'));
            btn.classList.add('tab-btn--active');
            tabContents.forEach(c => {
                c.style.display = c.id === ('tab-' + btn.dataset.tab) ? 'block' : 'none';
            });
        });
    }

    // =========================================
    // 8. Product Detail — Thumbnail Switcher
    // =========================================
    const mainImg = document.querySelector('.product-detail__img-main img');
    const thumbs  = document.querySelectorAll('.product-detail__img-thumbs .thumb');

    if (mainImg && thumbs.length) {
        thumbs.forEach(thumb => {
            thumb.addEventListener('click', () => {
                thumbs.forEach(t => t.classList.remove('thumb--active'));
                thumb.classList.add('thumb--active');
                mainImg.src = thumb.src.replace('w=200', 'w=900');
                mainImg.alt = thumb.alt;
            });
        });
    }

    // =========================================
    // 9. Keranjang — Quantity & Subtotal Update
    // =========================================

    /**
     * Mengubah kuantitas item di keranjang dan meng-update tampilan total.
     * @param {string} itemId  - ID elemen .cart-item (contoh: 'cart-item-1')
     * @param {number} delta   - Perubahan kuantitas (+1 atau -1)
     */
    window.changeQty = function(itemId, delta) {
        const itemEl     = document.getElementById(itemId);
        if (!itemEl) return;

        const basePrice  = parseInt(itemEl.dataset.price, 10);
        const qtyNum     = itemId.replace('cart-item-', '');
        const qtyValEl   = document.getElementById('qty-val-' + qtyNum);
        const priceDisEl = document.getElementById('price-display-' + qtyNum);

        let currentQty = parseInt(qtyValEl.textContent, 10);
        currentQty += delta;
        if (currentQty < 1) currentQty = 1;

        qtyValEl.textContent = currentQty;

        const lineTotal = basePrice * currentQty;
        if (priceDisEl) {
            priceDisEl.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(lineTotal);
        }

        recalcCartSummary();
    };

    /**
     * Hapus item dari keranjang dengan animasi fade-out.
     * @param {string} itemId  - ID elemen .cart-item
     */
    window.removeCartItem = function(itemId) {
        const itemEl = document.getElementById(itemId);
        if (!itemEl) return;

        itemEl.style.transition = 'opacity 0.35s ease, transform 0.35s ease';
        itemEl.style.opacity    = '0';
        itemEl.style.transform  = 'translateX(30px)';

        setTimeout(() => {
            itemEl.remove();
            recalcCartSummary();
            checkCartEmpty();
        }, 350);
    };

    /** Hitung ulang subtotal dan total dari semua item yang tersisa. */
    function recalcCartSummary() {
        const items = document.querySelectorAll('.cart-item');
        let subtotal = 0;
        let totalQty = 0;

        items.forEach(item => {
            const price = parseInt(item.dataset.price, 10);
            const qtyNum = item.id.replace('cart-item-', '');
            const qtyEl  = document.getElementById('qty-val-' + qtyNum);
            const qty    = qtyEl ? parseInt(qtyEl.textContent, 10) : 1;
            subtotal += price * qty;
            totalQty += qty;
        });

        const subtotalEl    = document.getElementById('summary-subtotal');
        const totalEl       = document.getElementById('summary-total');
        const itemCountEl   = document.getElementById('summary-item-count');
        const cartCountEl   = document.getElementById('cart-item-count');

        const formatted = 'Rp ' + new Intl.NumberFormat('id-ID').format(subtotal);

        if (subtotalEl)  subtotalEl.textContent  = formatted;
        if (totalEl)     totalEl.textContent      = formatted;
        if (itemCountEl) itemCountEl.textContent  = '(' + totalQty + ' item)';
        if (cartCountEl) cartCountEl.textContent  = totalQty + ' item';
    }

    /** Tampilkan empty-state jika keranjang kosong. */
    function checkCartEmpty() {
        const items      = document.querySelectorAll('.cart-item');
        const emptyState = document.getElementById('cart-empty-state');
        const checkoutBtn = document.getElementById('btn-checkout');

        if (!emptyState) return;

        if (items.length === 0) {
            emptyState.style.display = 'block';
            if (checkoutBtn) {
                checkoutBtn.style.opacity        = '0.5';
                checkoutBtn.style.pointerEvents  = 'none';
            }
        } else {
            emptyState.style.display = 'none';
            if (checkoutBtn) {
                checkoutBtn.style.opacity        = '1';
                checkoutBtn.style.pointerEvents  = 'auto';
            }
        }
    }

    // =========================================
    // 10. Pembayaran — Pilih Metode Pembayaran
    // =========================================
    const paymentMethods = document.getElementById('payment-methods');

    if (paymentMethods) {
        const payLabels = paymentMethods.querySelectorAll('.payment-method-card');

        payLabels.forEach(label => {
            label.addEventListener('click', () => {
                // Hapus kelas selected dari semua card
                payLabels.forEach(l => l.classList.remove('payment-method-card--selected'));
                // Tambahkan ke yang diklik
                label.classList.add('payment-method-card--selected');
                // Pastikan radio input di dalamnya juga terchecked
                const radio = label.querySelector('input[type="radio"]');
                if (radio) radio.checked = true;
            });
        });
    }

    // =========================================
    // 11. Pembayaran — Logika Modal Interaktif
    // =========================================

    const btnPay     = document.getElementById('btn-pay');
    const modalQris  = document.getElementById('modal-qris');
    const modalBank  = document.getElementById('modal-bank');

    /** Buka overlay + cegah scroll halaman */
    function openModal(modalEl) {
        if (!modalEl) return;
        // Pastikan inline-style tidak menghalangi; serahkan visibilitas ke CSS melalui kelas `active`
        modalEl.style.display = 'flex';
        modalEl.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    /** Tutup semua modal + kembalikan scroll */
    function closeAllModals() {
        [modalQris, modalBank].forEach(m => {
            if (m) {
                m.classList.remove('active');
                m.style.display = 'none';
            }
        });
        document.body.style.overflow = '';
    }

    /** Redirect ke halaman riwayat dengan feedback alert */
    function confirmPayment() {
        closeAllModals();
        alert('Pembayaran Berhasil! Makananmu segera diproses. 🍱');
        window.location.href = '/history';
    }

    // --- Tombol "Bayar Sekarang" ---
    if (btnPay) {
        btnPay.addEventListener('click', function(e) {
            e.preventDefault();

            // Ambil metode yang sedang dipilih
            const selected = document.querySelector('input[name="payment_method"]:checked');
            const method   = selected ? selected.value : 'qris';

            if (method === 'qris') {
                openModal(modalQris);
                startQrisCountdown();

            } else if (method === 'bank') {
                // --- Ambil & validasi pilihan bank ---
                const bankSelector = document.getElementById('bank-selector');
                const bankVal      = bankSelector ? bankSelector.value : '';

                if (!bankVal) {
                    alert('Silakan pilih bank terlebih dahulu!');
                    bankSelector && bankSelector.focus();
                    return;
                }

                // --- Data VA per bank ---
                const bankData = {
                    bsi:     { name: 'Bank Syariah Indonesia', logo: 'BSI',  logoClass: 'va-card__bank-logo--bsi',     va: '900 1234 5678' },
                    bca:     { name: 'Bank BCA',               logo: 'BCA',  logoClass: 'va-card__bank-logo--bca',     va: '014 9876 5432' },
                    mandiri: { name: 'Bank Mandiri',           logo: 'MDR',  logoClass: 'va-card__bank-logo--mandiri', va: '899 1122 3344' },
                    bni:     { name: 'Bank BNI',               logo: 'BNI',  logoClass: 'va-card__bank-logo--bni',     va: '888 5566 7788' },
                };

                const info = bankData[bankVal];

                // --- Update elemen di dalam Modal Bank ---
                const elLogo    = document.getElementById('modal-bank-logo');
                const elName    = document.getElementById('modal-bank-name');
                const elVANum   = document.getElementById('modal-va-number');
                const elSubtit  = document.getElementById('bank-modal-sub');

                if (elLogo) {
                    elLogo.textContent = info.logo;
                    // Reset semua class warna lalu pasang yang sesuai
                    elLogo.className   = 'va-card__bank-logo ' + info.logoClass;
                }
                if (elName)   elName.textContent   = info.name;
                if (elVANum)  elVANum.textContent   = info.va;
                if (elSubtit) elSubtit.textContent  = 'Transfer ke ' + info.name + ' · Virtual Account';

                openModal(modalBank);

            } else {
                // GoPay, COD, dan lainnya
                alert('Pesanan Berhasil Diproses! Makananmu segera disiapkan. 🍱');
                window.location.href = '/history';
            }
        });
    }

    // --- Tutup modal via tombol ✕ ---
    const closeBtns = [
        document.getElementById('close-qris'),
        document.getElementById('close-bank'),
    ];
    closeBtns.forEach(btn => {
        if (btn) btn.addEventListener('click', closeAllModals);
    });

    // --- Tutup modal saat klik overlay (luar kotak) ---
    [modalQris, modalBank].forEach(overlay => {
        if (!overlay) return;
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) closeAllModals();
        });
    });

    // --- Tombol "Batalkan & Pilih Metode Lain" ---
    const cancelBtns = [
        document.getElementById('cancel-qris'),
        document.getElementById('cancel-bank'),
    ];
    cancelBtns.forEach(btn => {
        if (btn) btn.addEventListener('click', closeAllModals);
    });

    // --- Tombol "Saya Sudah Bayar" (QRIS) ---
    const btnQrisPaid = document.getElementById('btn-qris-paid');
    if (btnQrisPaid) btnQrisPaid.addEventListener('click', confirmPayment);

    // --- Tombol "Saya Sudah Transfer" (Bank) ---
    const btnBankPaid = document.getElementById('btn-bank-paid');
    if (btnBankPaid) btnBankPaid.addEventListener('click', confirmPayment);

    // --- Tutup modal dengan tombol ESC ---
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeAllModals();
    });

    // =========================================
    // 12. QRIS — Countdown Timer 5 Menit
    // =========================================
    let qrisTimerInterval = null;

    function startQrisCountdown() {
        const timerEl = document.getElementById('qris-timer');
        if (!timerEl) return;

        // Reset interval sebelumnya jika ada
        if (qrisTimerInterval) clearInterval(qrisTimerInterval);

        let totalSeconds = 5 * 60; // 5 menit

        function formatTime(sec) {
            const m = String(Math.floor(sec / 60)).padStart(2, '0');
            const s = String(sec % 60).padStart(2, '0');
            return m + ':' + s;
        }

        timerEl.innerHTML = 'QR Code kedaluwarsa dalam <strong>' + formatTime(totalSeconds) + '</strong>';

        qrisTimerInterval = setInterval(function() {
            totalSeconds--;
            if (totalSeconds <= 0) {
                clearInterval(qrisTimerInterval);
                timerEl.innerHTML = '<strong style="color:#EF4444;">QR Code telah kedaluwarsa. Silakan coba lagi.</strong>';
                if (btnQrisPaid) {
                    btnQrisPaid.disabled  = true;
                    btnQrisPaid.textContent = '⏱ Waktu Habis';
                    btnQrisPaid.style.opacity = '0.5';
                }
                return;
            }
            timerEl.innerHTML = 'QR Code kedaluwarsa dalam <strong>' + formatTime(totalSeconds) + '</strong>';
        }, 1000);
    }

    // =========================================
    // 13. Transfer Bank — Salin Nomor VA
    // =========================================

    /**
     * Salin nomor VA ke clipboard dan berikan visual feedback.
     * @param {string} elId   - ID elemen yang berisi nomor VA
     * @param {HTMLElement} btn - Tombol yang diklik
     */
    window.copyVA = function(elId, btn) {
        const numEl = document.getElementById(elId);
        if (!numEl) return;

        // Hapus &nbsp; dan spasi sebelum di-copy
        const rawNumber = numEl.innerText.replace(/\s+/g, '');

        navigator.clipboard.writeText(rawNumber).then(function() {
            const original = btn.innerHTML;
            btn.innerHTML   = '✓ Tersalin!';
            btn.classList.add('copied');

            setTimeout(function() {
                btn.innerHTML = original;
                btn.classList.remove('copied');
            }, 2000);
        }).catch(function() {
            // Fallback untuk browser lama
            const tmp = document.createElement('textarea');
            tmp.value = rawNumber;
            document.body.appendChild(tmp);
            tmp.select();
            document.execCommand('copy');
            document.body.removeChild(tmp);

            btn.textContent = '✓ Tersalin!';
            btn.classList.add('copied');
            setTimeout(function() {
                btn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg> Salin';
                btn.classList.remove('copied');
            }, 2000);
        });
    };

    // =========================================
    // 14. History — Interaktivitas Tab Filter
    // =========================================
    const historyTabsEl = document.getElementById('history-tabs');

    if (historyTabsEl) {
        const tabs         = historyTabsEl.querySelectorAll('.history-tab');
        const cards        = document.querySelectorAll('.transaction-card');
        const emptyStateEl = document.getElementById('history-empty');

        historyTabsEl.addEventListener('click', function(e) {
            const clickedTab = e.target.closest('.history-tab');
            if (!clickedTab) return;

            // 1. Pindahkan class active ke tab yang diklik
            tabs.forEach(tab => {
                tab.classList.remove('history-tab--active');
                tab.setAttribute('aria-selected', 'false');
            });
            clickedTab.classList.add('history-tab--active');
            clickedTab.setAttribute('aria-selected', 'true');

            const activeStatus = clickedTab.dataset.status;
            let visibleCount   = 0;

            // 2. Tampilkan / sembunyikan card berdasarkan status
            cards.forEach(card => {
                const cardStatus = card.dataset.status;
                const isVisible  = activeStatus === 'semua' || cardStatus === activeStatus;

                if (isVisible) {
                    card.style.display = '';
                    // Re-trigger slide-in animation
                    card.style.animation = 'none';
                    // Reflow trick agar animasi bisa berjalan ulang
                    void card.offsetWidth;
                    card.style.animation = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // 3. Tampilkan empty state jika tidak ada card yang cocok
            if (emptyStateEl) {
                emptyStateEl.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        });
    }

    // =========================================
    // 15. History — Modal Detail & Lacak Kurir
    // =========================================
    const modalDetail  = document.getElementById('modal-detail');
    const modalTrack   = document.getElementById('modal-track');

    /** Utilitas: buka modal tertentu */
    function openHistoryModal(modalEl) {
        if (!modalEl) return;
        modalEl.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    /** Utilitas: tutup semua history modal */
    function closeHistoryModals() {
        [modalDetail, modalTrack].forEach(m => {
            if (m) m.style.display = 'none';
        });
        document.body.style.overflow = '';
    }

    // --- Delegasi event: buka Modal Detail saat .btn-detail diklik ---
    document.addEventListener('click', function(e) {
        const detailBtn = e.target.closest('.btn-detail');
        if (detailBtn) {
            const orderNum = detailBtn.dataset.order || '';
            // Update nomor invoice di dalam modal
            const invoiceEl = document.getElementById('detail-invoice-num');
            if (invoiceEl) invoiceEl.textContent = orderNum;
            openHistoryModal(modalDetail);
        }
    });

    // --- Delegasi event: buka Modal Track saat .btn-track diklik ---
    document.addEventListener('click', function(e) {
        const trackBtn = e.target.closest('.btn-track');
        if (trackBtn) {
            openHistoryModal(modalTrack);
        }
    });

    // --- Tombol Close (✕) dan "Tutup" di dalam setiap modal ---
    const historyModalClosers = [
        document.getElementById('close-modal-detail'),
        document.getElementById('close-modal-track'),
        document.getElementById('close-detail-btn'),
        document.getElementById('close-track-btn'),
    ];
    historyModalClosers.forEach(btn => {
        if (btn) btn.addEventListener('click', closeHistoryModals);
    });

    // --- Klik area overlay (luar kotak modal) --- 
    [modalDetail, modalTrack].forEach(overlay => {
        if (!overlay) return;
        overlay.addEventListener('click', function(e) {
            if (e.target === overlay) closeHistoryModals();
        });
    });

    // --- Tombol ESC --- (gabungkan dengan existing ESC handler)
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            // Tutup modal history jika salah satunya terbuka
            const anyOpen = [modalDetail, modalTrack].some(
                m => m && m.style.display === 'flex'
            );
            if (anyOpen) closeHistoryModals();
        }
    });

});

// =========================================
// Login Page — Standalone (runs always)
// =========================================
(function() {
    const loginForm     = document.getElementById('login-form');
    const loginError    = document.getElementById('login-error');
    const loginErrorMsg = document.getElementById('login-error-msg');
    const btnLoginText  = document.getElementById('btn-login-text');
    const btnSpinner    = document.getElementById('btn-login-spinner');
    const togglePwdBtn  = document.getElementById('toggle-password');
    const pwdInput      = document.getElementById('login-password');

    // --- Password visibility toggle ---
    if (togglePwdBtn && pwdInput) {
        togglePwdBtn.addEventListener('click', function() {
            const isHidden = pwdInput.type === 'password';
            pwdInput.type  = isHidden ? 'text' : 'password';
            togglePwdBtn.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
            togglePwdBtn.style.color = isHidden ? 'var(--accent-orange)' : '';
        });
    }

    // --- Login form submit ---
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const emailEl = document.getElementById('login-email');
            const email   = emailEl ? emailEl.value.trim() : '';
            const pwd     = pwdInput ? pwdInput.value : '';

            // Validasi kosong
            if (!email || !pwd) {
                showLoginError('Mohon isi email dan password terlebih dahulu.');
                return;
            }

            // Loading state
            if (btnLoginText) btnLoginText.style.display = 'none';
            if (btnSpinner)   btnSpinner.style.display   = 'inline-block';

            // Simulasi delay jaringan
            setTimeout(function() {
                if (email === 'admin@porsipas.com') {
                    window.location.href = '/admin/dashboard';
                } else if (email.includes('@')) {
                    window.location.href = '/katalog';
                } else {
                    if (btnLoginText) btnLoginText.style.display = '';
                    if (btnSpinner)   btnSpinner.style.display   = 'none';
                    showLoginError('Format email tidak valid. Periksa kembali.');
                }
            }, 900);
        });
    }

    function showLoginError(msg) {
        if (!loginError) return;
        if (loginErrorMsg) loginErrorMsg.textContent = msg;
        loginError.style.display = 'flex';
        loginError.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    }

    // --- Admin Sidebar Hamburger Toggle ---
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const adminSidebar  = document.getElementById('admin-sidebar');

    if (sidebarToggle && adminSidebar) {
        sidebarToggle.addEventListener('click', function() {
            adminSidebar.classList.toggle('admin-sidebar--open');
            const isOpen = adminSidebar.classList.contains('admin-sidebar--open');
            sidebarToggle.setAttribute('aria-expanded', isOpen);
        });

        // Tutup sidebar saat klik di luar (mobile)
        document.addEventListener('click', function(e) {
            if (window.innerWidth < 900) {
                if (!adminSidebar.contains(e.target) && e.target !== sidebarToggle) {
                    adminSidebar.classList.remove('admin-sidebar--open');
                }
            }
        });
    }
    // =========================================
    // Register Page Logic
    // =========================================
    const registerForm    = document.getElementById('register-form');
    const registerSuccess = document.getElementById('register-success');
    const btnRegText      = document.getElementById('btn-register-text');
    const btnRegSpinner   = document.getElementById('btn-register-spinner');
    const toggleRegPwdBtn = document.getElementById('toggle-reg-password');
    const regPwdInput     = document.getElementById('reg-password');

    // --- Register Password visibility toggle ---
    if (toggleRegPwdBtn && regPwdInput) {
        toggleRegPwdBtn.addEventListener('click', function() {
            const isHidden = regPwdInput.type === 'password';
            regPwdInput.type  = isHidden ? 'text' : 'password';
            toggleRegPwdBtn.setAttribute('aria-label', isHidden ? 'Sembunyikan password' : 'Tampilkan password');
            toggleRegPwdBtn.style.color = isHidden ? 'var(--accent-orange)' : '';
        });
    }

    // --- Register form submit ---
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Minimal validasi client-side
            const pwd = regPwdInput ? regPwdInput.value : '';
            const confirmPwd = document.getElementById('reg-password-confirm').value;

            if (pwd !== confirmPwd) {
                alert("Password dan Konfirmasi Password tidak cocok!");
                return;
            }

            // Loading state
            if (btnRegText) btnRegText.style.display = 'none';
            if (btnRegSpinner) btnRegSpinner.style.display = 'inline-block';

            // Simulasi API Register
            setTimeout(function() {
                // Tampilkan alert success JS
                alert("Pendaftaran Berhasil! Silakan login menggunakan akun baru Anda.");
                
                // ATAU tampilkan div success dan redirect otomatis
                /*
                if (registerSuccess) {
                    registerSuccess.style.display = 'flex';
                    registerSuccess.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
                */

                // Redirect ke halaman login
                window.location.href = '/login';
            }, 1200);
        });
    }

    // ==========================================
    // MANAJEMEN KELOLA ARTIKEL (DINAMIS SPA)
    // ==========================================
    const articleTableBody = document.getElementById('article-table-body');
    
    // Hanya jalankan script ini jika berada di halaman Kelola Artikel
    if (articleTableBody) {
        
        // 1. Data Dummy Lengkap
        let articles = [
            { id: 1, title: 'Resep Salad Sehat 5 Menit', category: 'Resep Kilat', date: '12 Mei 2026', status: 'Published', thumb: 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=100&q=85&fit=crop', content: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Salad sehat ini sangat mudah dibuat.' },
            { id: 2, title: 'Cara Menyimpan Sayur Agar Awet Seminggu', category: 'Lifehack', date: '10 Mei 2026', status: 'Published', thumb: '', content: 'Bungkus sayur dengan tisu dapur lalu masukkan ke dalam wadah kedap udara.' },
            { id: 3, title: 'Makan Enak Akhir Bulan Budget 15 Ribu', category: 'Tips Hemat', date: '-', status: 'Draft', thumb: '', content: 'Tahu dan tempe bisa disulap jadi makanan mewah dengan bumbu teriyaki.' },
            { id: 4, title: 'Bikin Nasi Goreng Gila ala Abang-abang', category: 'Resep Kilat', date: '08 Mei 2026', status: 'Published', thumb: 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=100&q=85&fit=crop', content: 'Rahasianya ada di kecap manis dan bawang putih geprek.' },
            { id: 5, title: 'Tips Merebus Daging Sapi Agar Cepat Empuk', category: 'Lifehack', date: '05 Mei 2026', status: 'Published', thumb: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143?w=100&q=85&fit=crop', content: 'Gunakan metode 5-30-7. Rebus 5 menit, diamkan 30 menit, rebus lagi 7 menit.' },
            { id: 6, title: 'Ide Bekal Ngampus yang Gak Gampang Basi', category: 'Resep Kilat', date: '-', status: 'Draft', thumb: '', content: 'Hindari makanan bersantan kental jika tidak langsung dimakan.' },
            { id: 7, title: 'Cara Memilih Buah Segar di Pasar', category: 'Lifehack', date: '01 Mei 2026', status: 'Published', thumb: '', content: 'Perhatikan warna dan cium aromanya. Buah matang biasanya lebih harum.' },
            { id: 8, title: 'Menu Seminggu Hemat Anak Kos', category: 'Tips Hemat', date: '28 Apr 2026', status: 'Published', thumb: '', content: 'Buat meal plan. Beli bahan makanan sekaligus untuk seminggu agar lebih murah.' },
            { id: 9, title: 'Resep Ayam Geprek Sambal Bawang Nyoy', category: 'Resep Kilat', date: '25 Apr 2026', status: 'Published', thumb: 'https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?w=100&q=85&fit=crop', content: 'Gunakan bawang putih lebih banyak daripada bawang merah untuk sambal geprek.' },
            { id: 10, title: 'Manfaatkan Sisa Nasi Menjadi Cireng Nasi', category: 'Tips Hemat', date: '20 Apr 2026', status: 'Published', thumb: '', content: 'Jangan buang nasi sisa kemarin. Campur dengan tepung tapioka dan bumbu.' },
            { id: 11, title: 'Cara Mencuci Peralatan Masak Berminyak', category: 'Lifehack', date: '18 Apr 2026', status: 'Published', thumb: '', content: 'Gunakan air hangat dan perasan jeruk nipis.' },
            { id: 12, title: 'Omelet Mie Instan Upgrade Ala Warkop', category: 'Resep Kilat', date: '15 Apr 2026', status: 'Published', thumb: '', content: 'Tambahkan kornet dan keju leleh di atasnya.' }
        ];

        // 2. Fungsi Render Tabel
        const renderArticleTable = (data) => {
            articleTableBody.innerHTML = '';
            
            if (data.length === 0) {
                articleTableBody.innerHTML = '<tr><td colspan="5" style="text-align:center; padding: 2rem;">Tidak ada artikel ditemukan.</td></tr>';
                return;
            }

            data.forEach(art => {
                const thumbHtml = art.thumb 
                    ? `<img src="${art.thumb}" alt="Thumb" class="article-thumb">`
                    : `<div class="article-thumb article-thumb--placeholder">${art.category === 'Tips Hemat' ? '💰' : (art.category === 'Lifehack' ? '💡' : '🍳')}</div>`;
                
                const statusBadge = art.status === 'Published' ? 'badge-published' : 'badge-draft';
                
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>
                        <div class="article-info-cell">
                            ${thumbHtml}
                            <span class="article-title-text">${art.title}</span>
                        </div>
                    </td>
                    <td><span class="badge badge--category">${art.category}</span></td>
                    <td>${art.date}</td>
                    <td><span class="badge ${statusBadge}">${art.status}</span></td>
                    <td style="text-align: right;">
                        <div class="action-buttons">
                            <button type="button" class="btn-icon btn-icon--edit btn-edit-article" data-id="${art.id}" title="Edit Artikel">✏️</button>
                            <button type="button" class="btn-icon btn-icon--delete btn-delete-article" data-id="${art.id}" title="Hapus Artikel">🗑️</button>
                        </div>
                    </td>
                `;
                articleTableBody.appendChild(tr);
            });
        };

        // Render awal
        renderArticleTable(articles);

        // 3. Logika Filter & Pencarian Interaktif
        const filterCategory = document.getElementById('filter-category');
        const searchInput = document.getElementById('search-article');

        const applyFilters = () => {
            const catVal = filterCategory.value;
            const searchVal = searchInput.value.toLowerCase();

            const filtered = articles.filter(art => {
                const matchCat = catVal === 'semua' || art.category === catVal;
                const matchSearch = art.title.toLowerCase().includes(searchVal);
                return matchCat && matchSearch;
            });
            renderArticleTable(filtered);
        };

        if (filterCategory) filterCategory.addEventListener('change', applyFilters);
        if (searchInput) searchInput.addEventListener('input', applyFilters);

        // 4. Manajemen Modal & Simulasi Edit (Event Delegation)
        const modalArticle = document.getElementById('modal-article');
        const modalTitle = document.getElementById('modal-article-title');
        const btnSaveArticle = document.getElementById('btn-save-article');
        const formArticle = document.getElementById('form-article');

        const openModal = () => {
            modalArticle.classList.add('active');
            document.body.style.overflow = 'hidden';
        };

        const closeModal = () => {
            modalArticle.classList.remove('active');
            document.body.style.overflow = '';
            formArticle.reset(); // Bersihkan form setelah ditutup
            document.getElementById('art-id').value = '';
        };

        // Buka modal untuk TAMBAH
        document.getElementById('btn-add-article').addEventListener('click', () => {
            modalTitle.textContent = 'Tambah Artikel Baru';
            btnSaveArticle.textContent = 'Simpan Artikel';
            openModal();
        });

        // Tangkap klik EDIT & HAPUS di dalam tabel
        articleTableBody.addEventListener('click', (e) => {
            const btnEdit = e.target.closest('.btn-edit-article');
            const btnDelete = e.target.closest('.btn-delete-article');

            // Logika EDIT
            if (btnEdit) {
                const id = parseInt(btnEdit.getAttribute('data-id'));
                const art = articles.find(a => a.id === id);
                if (art) {
                    modalTitle.textContent = 'Edit Artikel';
                    btnSaveArticle.textContent = 'Update Artikel';
                    
                    document.getElementById('art-id').value = art.id;
                    document.getElementById('art-title').value = art.title;
                    document.getElementById('art-category').value = art.category;
                    document.getElementById('art-status').value = art.status;
                    document.getElementById('art-thumb').value = art.thumb;
                    document.getElementById('art-content').value = art.content;
                    
                    openModal();
                }
            }

            // Logika HAPUS
            if (btnDelete) {
                const id = parseInt(btnDelete.getAttribute('data-id'));
                const konfirmasi = confirm('Apakah Anda yakin ingin menghapus artikel ini?');
                if (konfirmasi) {
                    articles = articles.filter(a => a.id !== id); // Hapus dari array
                    applyFilters(); // Render ulang tabel
                    alert('Artikel berhasil dihapus!');
                }
            }
        });

        // Tutup modal
        document.getElementById('btn-close-modal-x').addEventListener('click', closeModal);
        document.getElementById('btn-cancel-article').addEventListener('click', closeModal);
        modalArticle.addEventListener('click', (e) => {
            if (e.target === modalArticle) closeModal();
        });

        // Simulasi Form Submit
        formArticle.addEventListener('submit', (e) => {
            e.preventDefault();
            const action = document.getElementById('art-id').value ? 'diperbarui' : 'ditambahkan';
            alert(`Berhasil! Artikel telah ${action}. (Simulasi)`);
            closeModal();
        });
    }

    // ==========================================
    // MANAJEMEN KELOLA PRODUK (DINAMIS SPA)
    // ==========================================
    const productTableBody = document.getElementById('product-table-body');
    
    if (productTableBody) {
        let productData = [
            { id: 1, name: 'Paket Ayam Teriyaki', category: 'Ayam', price: 18000, status: 'Tersedia', thumb: 'https://images.unsplash.com/photo-1569050467447-ce54b3bbc37d?w=100&q=85', desc: 'Saus teriyaki autentik kaya rasa.' },
            { id: 2, name: 'Sop Iga Sapi Porsi Pas', category: 'Daging', price: 25000, status: 'Tersedia', thumb: 'https://images.unsplash.com/photo-1544025162-d76694265947?w=100&q=85', desc: 'Iga sapi empuk dengan kuah bening.' },
            { id: 3, name: 'Tumis Sayur Campur Sehat', category: 'Sayur/Vegan', price: 12000, status: 'Tersedia', thumb: 'https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=100&q=85', desc: 'Campuran sayuran segar kaya serat.' },
            { id: 4, name: 'Ayam Geprek Sambal Bawang', category: 'Pedas', price: 16000, status: 'Habis', thumb: 'https://images.unsplash.com/photo-1588166524941-3bf61a9c41db?w=100&q=85', desc: 'Ayam krispi dengan sambal nendang.' },
            { id: 5, name: 'Rendang Daging Porsi Pas', category: 'Daging', price: 28000, status: 'Tersedia', thumb: 'https://images.unsplash.com/photo-1603360946369-dc9bb6258143?w=100&q=85', desc: 'Bumbu rendang Minang 15 rempah.' },
            { id: 6, name: 'Nasi Goreng Gila Spesial', category: 'Pedas', price: 15000, status: 'Tersedia', thumb: 'https://images.unsplash.com/photo-1512058564366-18510be2db19?w=100&q=85', desc: 'Sosis, bakso, telur dengan saus gurih pedas.' },
            { id: 7, name: 'Tumis Kangkung Terasi', category: 'Sayur/Vegan', price: 12000, status: 'Habis', thumb: 'https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?w=100&q=85', desc: 'Kangkung segar dengan terasi wangi.' },
            { id: 8, name: 'Daging Sapi Lada Hitam', category: 'Daging', price: 26000, status: 'Tersedia', thumb: 'https://images.unsplash.com/photo-1546833999-b9f581a1996d?w=100&q=85', desc: 'Sapi slice premium dengan saus lada hitam.' }
        ];

        const renderProductTable = (data) => {
            productTableBody.innerHTML = '';
            if (data.length === 0) {
                productTableBody.innerHTML = '<tr><td colspan="5" style="text-align:center; padding: 2rem;">Tidak ada produk ditemukan.</td></tr>';
                return;
            }

            data.forEach(prod => {
                const statusBadge = prod.status === 'Tersedia' ? 'badge-published' : 'badge-danger';
                
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>
                        <div class="article-info-cell">
                            <img src="${prod.thumb}" alt="Thumb" class="table-thumbnail">
                            <span class="article-title-text">${prod.name}</span>
                        </div>
                    </td>
                    <td><span class="badge badge--category">${prod.category}</span></td>
                    <td>Rp ${prod.price.toLocaleString('id-ID')}</td>
                    <td><span class="badge ${statusBadge}">${prod.status}</span></td>
                    <td style="text-align: right;">
                        <div class="action-buttons">
                            <button type="button" class="btn-icon btn-icon--edit btn-edit-product" data-id="${prod.id}" title="Edit Produk">✏️</button>
                            <button type="button" class="btn-icon btn-icon--delete btn-delete-product" data-id="${prod.id}" title="Hapus Produk">🗑️</button>
                        </div>
                    </td>
                `;
                productTableBody.appendChild(tr);
            });
        };

        renderProductTable(productData);

        const filterProdCategory = document.getElementById('filter-product-category');
        const searchProdInput = document.getElementById('search-product');

        const applyProdFilters = () => {
            const catVal = filterProdCategory.value;
            const searchVal = searchProdInput.value.toLowerCase();

            const filtered = productData.filter(prod => {
                const matchCat = catVal === 'semua' || prod.category === catVal;
                const matchSearch = prod.name.toLowerCase().includes(searchVal);
                return matchCat && matchSearch;
            });
            renderProductTable(filtered);
        };

        if (filterProdCategory) filterProdCategory.addEventListener('change', applyProdFilters);
        if (searchProdInput) searchProdInput.addEventListener('input', applyProdFilters);

        const modalProduct = document.getElementById('modal-product');
        const modalProdTitle = document.getElementById('modal-product-title');
        const btnSaveProduct = document.getElementById('btn-save-product');
        const formProduct = document.getElementById('form-product');

        const openProdModal = () => {
            modalProduct.classList.add('active');
            document.body.style.overflow = 'hidden';
        };

        const closeProdModal = () => {
            modalProduct.classList.remove('active');
            document.body.style.overflow = '';
            formProduct.reset();
            document.getElementById('prod-id').value = '';
        };

        document.getElementById('btn-add-product').addEventListener('click', () => {
            modalProdTitle.textContent = 'Tambah Produk Baru';
            btnSaveProduct.textContent = 'Simpan Produk';
            openProdModal();
        });

        productTableBody.addEventListener('click', (e) => {
            const btnEdit = e.target.closest('.btn-edit-product');
            const btnDelete = e.target.closest('.btn-delete-product');

            if (btnEdit) {
                const id = parseInt(btnEdit.getAttribute('data-id'));
                const prod = productData.find(p => p.id === id);
                if (prod) {
                    modalProdTitle.textContent = 'Edit Produk';
                    btnSaveProduct.textContent = 'Update Produk';
                    
                    document.getElementById('prod-id').value = prod.id;
                    document.getElementById('prod-name').value = prod.name;
                    document.getElementById('prod-category').value = prod.category;
                    document.getElementById('prod-price').value = prod.price;
                    document.getElementById('prod-status').value = prod.status;
                    document.getElementById('prod-thumb').value = prod.thumb;
                    document.getElementById('prod-desc').value = prod.desc;
                    
                    openProdModal();
                }
            }

            if (btnDelete) {
                const id = parseInt(btnDelete.getAttribute('data-id'));
                const konfirmasi = confirm('Apakah Anda yakin ingin menghapus produk ini?');
                if (konfirmasi) {
                    productData = productData.filter(p => p.id !== id);
                    applyProdFilters();
                    alert('Produk berhasil dihapus!');
                }
            }
        });

        document.getElementById('btn-close-product-x').addEventListener('click', closeProdModal);
        document.getElementById('btn-cancel-product').addEventListener('click', closeProdModal);
        modalProduct.addEventListener('click', (e) => {
            if (e.target === modalProduct) closeProdModal();
        });

        formProduct.addEventListener('submit', (e) => {
            e.preventDefault();
            const action = document.getElementById('prod-id').value ? 'diperbarui' : 'ditambahkan';
            alert(`Berhasil! Produk telah ${action}. (Simulasi)`);
            closeProdModal();
        });
    }

    // ==========================================
    // MANAJEMEN KELOLA PENGGUNA (DINAMIS SPA)
    // ==========================================
    const userTableBody = document.getElementById('user-table-body');
    
    if (userTableBody) {
        let userData = [
            { id: 1, name: 'Budi Santoso', email: 'budi@student.com', role: 'Student', status: 'Aktif', avatar: '' },
            { id: 2, name: 'Siti Aminah', email: 'siti@student.com', role: 'Student', status: 'Aktif', avatar: '' },
            { id: 3, name: 'Admin Pusat', email: 'admin@porsipas.com', role: 'Admin', status: 'Aktif', avatar: '' },
            { id: 4, name: 'Tono Subagyo', email: 'tono.s@student.com', role: 'Student', status: 'Banned', avatar: '' },
            { id: 5, name: 'Rina Kusuma', email: 'rina@student.com', role: 'Student', status: 'Aktif', avatar: '' },
            { id: 6, name: 'Ahmad Fauzan', email: 'ahmad@student.com', role: 'Student', status: 'Aktif', avatar: '' },
            { id: 7, name: 'Maya Sari', email: 'maya.admin@porsipas.com', role: 'Admin', status: 'Aktif', avatar: '' },
            { id: 8, name: 'Doni Pratama', email: 'doni@student.com', role: 'Student', status: 'Banned', avatar: '' }
        ];

        const renderUserTable = (data) => {
            userTableBody.innerHTML = '';
            if (data.length === 0) {
                userTableBody.innerHTML = '<tr><td colspan="5" style="text-align:center; padding: 2rem;">Tidak ada pengguna ditemukan.</td></tr>';
                return;
            }

            data.forEach(user => {
                const statusBadge = user.status === 'Aktif' ? 'badge-published' : 'badge-banned';
                const initial = user.name.charAt(0).toUpperCase();
                
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>
                        <div class="article-info-cell">
                            <div class="avatar-round">${initial}</div>
                            <span class="article-title-text">${user.name}</span>
                        </div>
                    </td>
                    <td>${user.email}</td>
                    <td><span class="badge ${user.role === 'Admin' ? 'badge-draft' : 'badge--category'}">${user.role}</span></td>
                    <td><span class="badge ${statusBadge}">${user.status}</span></td>
                    <td style="text-align: right;">
                        <div class="action-buttons">
                            <button type="button" class="btn-icon btn-icon--edit btn-edit-user" data-id="${user.id}" title="Edit Pengguna">✏️</button>
                            <button type="button" class="btn-icon btn-icon--delete btn-delete-user" data-id="${user.id}" title="Hapus Pengguna">🗑️</button>
                        </div>
                    </td>
                `;
                userTableBody.appendChild(tr);
            });
        };

        renderUserTable(userData);

        const filterUserRole = document.getElementById('filter-user-role');
        const searchUserInput = document.getElementById('search-user');

        const applyUserFilters = () => {
            const roleVal = filterUserRole.value;
            const searchVal = searchUserInput.value.toLowerCase();

            const filtered = userData.filter(user => {
                const matchRole = roleVal === 'semua' || user.role === roleVal;
                const matchSearch = user.name.toLowerCase().includes(searchVal) || user.email.toLowerCase().includes(searchVal);
                return matchRole && matchSearch;
            });
            renderUserTable(filtered);
        };

        if (filterUserRole) filterUserRole.addEventListener('change', applyUserFilters);
        if (searchUserInput) searchUserInput.addEventListener('input', applyUserFilters);

        const modalUser = document.getElementById('modal-user');
        const modalUserTitle = document.getElementById('modal-user-title');
        const btnSaveUser = document.getElementById('btn-save-user');
        const formUser = document.getElementById('form-user');

        const openUserModal = () => {
            modalUser.classList.add('active');
            document.body.style.overflow = 'hidden';
        };

        const closeUserModal = () => {
            modalUser.classList.remove('active');
            document.body.style.overflow = '';
            formUser.reset();
            document.getElementById('user-id').value = '';
        };

        document.getElementById('btn-add-user').addEventListener('click', () => {
            modalUserTitle.textContent = 'Tambah User Baru';
            btnSaveUser.textContent = 'Simpan User';
            openUserModal();
        });

        userTableBody.addEventListener('click', (e) => {
            const btnEdit = e.target.closest('.btn-edit-user');
            const btnDelete = e.target.closest('.btn-delete-user');

            if (btnEdit) {
                const id = parseInt(btnEdit.getAttribute('data-id'));
                const user = userData.find(u => u.id === id);
                if (user) {
                    modalUserTitle.textContent = 'Edit Pengguna';
                    btnSaveUser.textContent = 'Update User';
                    
                    document.getElementById('user-id').value = user.id;
                    document.getElementById('user-name').value = user.name;
                    document.getElementById('user-email').value = user.email;
                    document.getElementById('user-role').value = user.role;
                    document.getElementById('user-status').value = user.status;
                    
                    openUserModal();
                }
            }

            if (btnDelete) {
                const id = parseInt(btnDelete.getAttribute('data-id'));
                const konfirmasi = confirm('Apakah Anda yakin ingin menghapus pengguna ini?');
                if (konfirmasi) {
                    userData = userData.filter(u => u.id !== id);
                    applyUserFilters();
                    alert('Pengguna berhasil dihapus!');
                }
            }
        });

        document.getElementById('btn-close-user-x').addEventListener('click', closeUserModal);
        document.getElementById('btn-cancel-user').addEventListener('click', closeUserModal);
        modalUser.addEventListener('click', (e) => {
            if (e.target === modalUser) closeUserModal();
        });

        formUser.addEventListener('submit', (e) => {
            e.preventDefault();
            const action = document.getElementById('user-id').value ? 'diperbarui' : 'ditambahkan';
            alert(`Berhasil! Data pengguna telah ${action}. (Simulasi)`);
            closeUserModal();
        });
    }

    // ==========================================
    // MANAJEMEN KELOLA TRANSAKSI (DINAMIS SPA)
    // ==========================================
    const trxTableBody = document.getElementById('trx-table-body');
    
    if (trxTableBody) {
        let transactionData = [
            { id: 1, inv: 'INV-20260512-001', name: 'Budi Santoso', date: '12 Mei 2026, 09:30', total: 45000, status: 'Diproses', address: 'Jl. Merdeka No. 10, Jakarta', items: ['2x Paket Ayam Teriyaki'] },
            { id: 2, inv: 'INV-20260512-002', name: 'Siti Aminah', date: '12 Mei 2026, 10:15', total: 25000, status: 'Dikirim', address: 'Kost Mawar Indah, Kamar 5A', items: ['1x Sop Iga Sapi Porsi Pas'] },
            { id: 3, inv: 'INV-20260512-003', name: 'Andi Pratama', date: '11 Mei 2026, 19:40', total: 60000, status: 'Selesai', address: 'Apartemen Sudirman Tower B', items: ['1x Rendang Daging', '2x Nasi Goreng Gila'] },
            { id: 4, inv: 'INV-20260512-004', name: 'Maya Sari', date: '12 Mei 2026, 11:05', total: 32000, status: 'Diproses', address: 'Jl. Melati Raya Blok C/12', items: ['2x Ayam Geprek Sambal Bawang'] },
            { id: 5, inv: 'INV-20260512-005', name: 'Tono Subagyo', date: '11 Mei 2026, 18:20', total: 24000, status: 'Selesai', address: 'Asrama Mahasiswa Gedung Barat', items: ['2x Tumis Kangkung Terasi'] },
            { id: 6, inv: 'INV-20260512-006', name: 'Rina Kusuma', date: '12 Mei 2026, 13:50', total: 78000, status: 'Diproses', address: 'Komp. Griya Hijau No. 8', items: ['3x Daging Sapi Lada Hitam'] },
            { id: 7, inv: 'INV-20260512-007', name: 'Ahmad Fauzan', date: '12 Mei 2026, 08:10', total: 36000, status: 'Dikirim', address: 'Jl. Diponegoro Gg. 2', items: ['1x Paket Ayam Teriyaki', '1x Sop Ayam Klaten'] },
            { id: 8, inv: 'INV-20260512-008', name: 'Dewi Lestari', date: '10 Mei 2026, 12:00', total: 15000, status: 'Selesai', address: 'Kost Putri Srikandi', items: ['1x Nasi Goreng Gila Spesial'] }
        ];

        const renderTrxTable = (data) => {
            trxTableBody.innerHTML = '';
            if (data.length === 0) {
                trxTableBody.innerHTML = '<tr><td colspan="6" style="text-align:center; padding: 2rem;">Tidak ada transaksi ditemukan.</td></tr>';
                return;
            }

            data.forEach(trx => {
                let badgeClass = 'badge-published'; // Hijau untuk Selesai
                if (trx.status === 'Diproses') badgeClass = 'badge-warning';
                if (trx.status === 'Dikirim') badgeClass = 'badge-info';
                
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td><strong style="color: var(--text-primary);">${trx.inv}</strong></td>
                    <td>${trx.name}</td>
                    <td>${trx.date}</td>
                    <td><strong>Rp ${trx.total.toLocaleString('id-ID')}</strong></td>
                    <td><span class="badge ${badgeClass}">${trx.status}</span></td>
                    <td style="text-align: right;">
                        <div class="action-buttons">
                            <button type="button" class="btn-icon btn-icon--edit btn-view-trx" data-id="${trx.id}" title="Detail Transaksi">👁️</button>
                        </div>
                    </td>
                `;
                trxTableBody.appendChild(tr);
            });
        };

        renderTrxTable(transactionData);

        const filterTrxStatus = document.getElementById('filter-trx-status');
        const searchTrxInput = document.getElementById('search-trx');

        const applyTrxFilters = () => {
            const statusVal = filterTrxStatus.value;
            const searchVal = searchTrxInput.value.toLowerCase();

            const filtered = transactionData.filter(trx => {
                const matchStatus = statusVal === 'semua' || trx.status === statusVal;
                const matchSearch = trx.inv.toLowerCase().includes(searchVal) || trx.name.toLowerCase().includes(searchVal);
                return matchStatus && matchSearch;
            });
            renderTrxTable(filtered);
        };

        if (filterTrxStatus) filterTrxStatus.addEventListener('change', applyTrxFilters);
        if (searchTrxInput) searchTrxInput.addEventListener('input', applyTrxFilters);

        const modalTrx = document.getElementById('modal-trx');
        const formTrx = document.getElementById('form-trx');

        const openTrxModal = () => {
            modalTrx.classList.add('active');
            document.body.style.overflow = 'hidden';
        };

        const closeTrxModal = () => {
            modalTrx.classList.remove('active');
            document.body.style.overflow = '';
        };

        trxTableBody.addEventListener('click', (e) => {
            const btnView = e.target.closest('.btn-view-trx');
            if (btnView) {
                const id = parseInt(btnView.getAttribute('data-id'));
                const trx = transactionData.find(t => t.id === id);
                if (trx) {
                    document.getElementById('trx-id').value = trx.id;
                    document.getElementById('detail-inv').textContent = trx.inv;
                    document.getElementById('detail-name').textContent = trx.name;
                    document.getElementById('detail-address').textContent = trx.address;
                    
                    const ulItems = document.getElementById('detail-items');
                    ulItems.innerHTML = '';
                    trx.items.forEach(item => {
                        const li = document.createElement('li');
                        li.textContent = item;
                        ulItems.appendChild(li);
                    });

                    document.getElementById('trx-status-update').value = trx.status;
                    openTrxModal();
                }
            }
        });

        document.getElementById('btn-close-trx-x').addEventListener('click', closeTrxModal);
        document.getElementById('btn-cancel-trx').addEventListener('click', closeTrxModal);
        modalTrx.addEventListener('click', (e) => {
            if (e.target === modalTrx) closeTrxModal();
        });

        formTrx.addEventListener('submit', (e) => {
            e.preventDefault();
            const id = parseInt(document.getElementById('trx-id').value);
            const newStatus = document.getElementById('trx-status-update').value;
            
            const trxIndex = transactionData.findIndex(t => t.id === id);
            if (trxIndex !== -1) {
                transactionData[trxIndex].status = newStatus;
                applyTrxFilters(); 
            }
            
            alert('Status transaksi berhasil diperbarui! (Simulasi)');
            closeTrxModal();
        });
    }

}());
