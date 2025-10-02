/**
 * Site Preferences (Cookie Consent)
 * This file is intentionally named without cookie/gdpr keywords to avoid ad-blockers.
 */

(function() {
	'use strict';

	function boot() {
		initCookieConsent();
		initCookiePreferences();
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}

	function initCookieConsent() {
		const banner = document.getElementById('cookie-consent-banner');
		const acceptBtn = document.querySelector('.cookie-consent-accept');
		const rejectBtn = document.querySelector('.cookie-consent-reject');

		if (!banner || !acceptBtn || !rejectBtn) return;

		setTimeout(() => {
			banner.style.display = 'block';
			banner.classList.add('cookie-consent-visible');
		}, 1000);

		acceptBtn.addEventListener('click', function(e) {
			e.preventDefault();
			handleCookieConsent('accept');
		});

		rejectBtn.addEventListener('click', function(e) {
			e.preventDefault();
			handleCookieConsent('reject');
		});

		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && banner.style.display !== 'none') {
				handleCookieConsent('reject');
			}
		});
	}

	function initCookiePreferences() {
		const toggleBtn = document.getElementById('cookie-preferences-toggle');
		const panel = document.getElementById('cookie-preferences-panel');
		const saveBtn = document.getElementById('cookie-save-preferences');
		const resetBtn = document.getElementById('cookie-reset-preferences');

		if (!toggleBtn || !panel || !saveBtn || !resetBtn) return;

		loadCookiePreferences();

		toggleBtn.addEventListener('click', function() {
			const isVisible = panel.style.display !== 'none';
			panel.style.display = isVisible ? 'none' : 'block';
			if (!isVisible) loadCookiePreferences();
		});

		document.addEventListener('click', function(e) {
			if (!panel.contains(e.target) && !toggleBtn.contains(e.target)) panel.style.display = 'none';
		});

		saveBtn.addEventListener('click', function() {
			saveCookiePreferences();
			panel.style.display = 'none';
		});

		resetBtn.addEventListener('click', function() {
			resetCookiePreferences();
		});

		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && panel.style.display !== 'none') panel.style.display = 'none';
		});
	}

	function loadCookiePreferences() {
		const analyticsCheckbox = document.getElementById('analytics-cookies-optional');
		const marketingCheckbox = document.getElementById('marketing-cookies-optional');
		if (!analyticsCheckbox || !marketingCheckbox) return;
		analyticsCheckbox.checked = mellluxeCheckAnalyticsCookies();
		marketingCheckbox.checked = mellluxeCheckMarketingCookies();
	}

	function saveCookiePreferences() {
		const analyticsCheckbox = document.getElementById('analytics-cookies-optional');
		const marketingCheckbox = document.getElementById('marketing-cookies-optional');
		if (!analyticsCheckbox || !marketingCheckbox) return;

		const expiry = 365 * 24 * 60 * 60; // 1 year
		setCookie('mellluxe_analytics_cookies', analyticsCheckbox.checked ? 'enabled' : 'disabled', expiry);
		setCookie('mellluxe_marketing_cookies', marketingCheckbox.checked ? 'enabled' : 'disabled', expiry);
		setCookie('mellluxe_cookie_consent', 'custom', expiry);
		showCookieMessage('Cookie preferences saved successfully!', 'success');
		if (analyticsCheckbox.checked) enableAnalyticsScripts();
		if (marketingCheckbox.checked) enableMarketingScripts();
	}

	function resetCookiePreferences() {
		const analyticsCheckbox = document.getElementById('analytics-cookies-optional');
		const marketingCheckbox = document.getElementById('marketing-cookies-optional');
		if (analyticsCheckbox) analyticsCheckbox.checked = true;
		if (marketingCheckbox) marketingCheckbox.checked = true;
	}

	function setCookie(name, value, expiry) {
		const date = new Date();
		date.setTime(date.getTime() + (expiry * 1000));
		const expires = 'expires=' + date.toUTCString();
		document.cookie = name + '=' + value + ';' + expires + ';path=/;secure;samesite=strict';
	}

	function showCookieMessage(message, type) {
		const messageEl = document.createElement('div');
		messageEl.className = `cookie-message cookie-message-${type}`;
		messageEl.textContent = message;
		document.body.appendChild(messageEl);
		setTimeout(() => messageEl.classList.add('show'), 100);
		setTimeout(() => { messageEl.classList.remove('show'); setTimeout(() => messageEl.remove(), 300); }, 3000);
	}

	function handleCookieConsent(action) {
		const banner = document.getElementById('cookie-consent-banner');
		banner.classList.add('cookie-consent-hiding');
		setTimeout(() => { banner.style.display = 'none'; }, 300);

		const expiry = 365 * 24 * 60 * 60;

		// Try server-side persistence first
		try {
			const formData = new FormData();
			formData.append('action', 'mellluxe_cookie_consent');
			formData.append('consent_action', action);
			formData.append('nonce', mellluxe_cookie_ajax.nonce);
			fetch(mellluxe_cookie_ajax.ajax_url, { method: 'POST', body: formData, credentials: 'same-origin' })
				.then(() => {
					if (action === 'accept') { enableAnalyticsScripts(); enableMarketingScripts(); }
				})
				.catch(() => fallbackSet(action));
		} catch (e) {
			fallbackSet(action);
		}

		function fallbackSet(choice) {
			// If AJAX blocked, still persist on client
			if (choice === 'accept') {
				setCookie('mellluxe_cookie_consent', 'accepted', expiry);
				setCookie('mellluxe_analytics_cookies', 'enabled', expiry);
				setCookie('mellluxe_marketing_cookies', 'enabled', expiry);
				enableAnalyticsScripts();
				enableMarketingScripts();
			} else {
				setCookie('mellluxe_cookie_consent', 'rejected', expiry);
				setCookie('mellluxe_analytics_cookies', 'disabled', expiry);
				setCookie('mellluxe_marketing_cookies', 'disabled', expiry);
			}
		}
	}

	function enableAnalyticsScripts() {
		if (typeof gtag !== 'undefined') {
			gtag('consent', 'update', { 'analytics_storage': 'granted' });
		}
	}

	function enableMarketingScripts() {
		// Add vendor-specific grants here if needed
	}

	window.mellluxeCheckCookieConsent = function() {
		return document.cookie.split(';').some(item => item.trim().startsWith('mellluxe_cookie_consent=accepted'));
	};
	window.mellluxeCheckAnalyticsCookies = function() {
		return document.cookie.split(';').some(item => item.trim().startsWith('mellluxe_analytics_cookies=enabled'));
	};
	window.mellluxeCheckMarketingCookies = function() {
		return document.cookie.split(';').some(item => item.trim().startsWith('mellluxe_marketing_cookies=enabled'));
	};

})();
