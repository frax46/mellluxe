/**
 * Cookie Consent Management
 * Handles the display and interaction with the cookie consent banner
 */

(function() {
	'use strict';

	function boot() {
		initCookieConsent();
		initCookiePreferences();
	}

	// Ensure init runs whether DOMContentLoaded already fired or not
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', boot);
	} else {
		boot();
	}

	function initCookieConsent() {
		const banner = document.getElementById('cookie-consent-banner');
		const acceptBtn = document.querySelector('.cookie-consent-accept');
		const rejectBtn = document.querySelector('.cookie-consent-reject');

		if (!banner || !acceptBtn || !rejectBtn) {
			return;
		}

		// Show banner after a short delay
		setTimeout(() => {
			banner.style.display = 'block';
			// Add entrance animation
			banner.classList.add('cookie-consent-visible');
		}, 1000);

		// Handle accept button click
		acceptBtn.addEventListener('click', function(e) {
			e.preventDefault();
			handleCookieConsent('accept');
		});

		// Handle reject button click
		rejectBtn.addEventListener('click', function(e) {
			e.preventDefault();
			handleCookieConsent('reject');
		});

		// Handle banner close on escape key
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
		const analyticsCheckbox = document.getElementById('analytics-cookies-optional');
		const marketingCheckbox = document.getElementById('marketing-cookies-optional');

		if (!toggleBtn || !panel || !saveBtn || !resetBtn) {
			return;
		}

		// Load current preferences
		loadCookiePreferences();

		// Toggle panel visibility
		toggleBtn.addEventListener('click', function() {
			const isVisible = panel.style.display !== 'none';
			panel.style.display = isVisible ? 'none' : 'block';
			
			if (!isVisible) {
				// Load current preferences when opening
				loadCookiePreferences();
			}
		});

		// Close panel when clicking outside
		document.addEventListener('click', function(e) {
			if (!panel.contains(e.target) && !toggleBtn.contains(e.target)) {
				panel.style.display = 'none';
			}
		});

		// Save preferences
		saveBtn.addEventListener('click', function() {
			saveCookiePreferences();
			panel.style.display = 'none';
		});

		// Reset to default
		resetBtn.addEventListener('click', function() {
			resetCookiePreferences();
		});

		// Handle escape key
		document.addEventListener('keydown', function(e) {
			if (e.key === 'Escape' && panel.style.display !== 'none') {
				panel.style.display = 'none';
			}
		});
	}

	function loadCookiePreferences() {
		const analyticsCheckbox = document.getElementById('analytics-cookies-optional');
		const marketingCheckbox = document.getElementById('marketing-cookies-optional');

		if (analyticsCheckbox && marketingCheckbox) {
			// Check if analytics cookies are enabled
			const analyticsEnabled = mellluxeCheckAnalyticsCookies();
			const marketingEnabled = mellluxeCheckMarketingCookies();

			analyticsCheckbox.checked = analyticsEnabled;
			marketingCheckbox.checked = marketingEnabled;
		}
	}

	function saveCookiePreferences() {
		const analyticsCheckbox = document.getElementById('analytics-cookies-optional');
		const marketingCheckbox = document.getElementById('marketing-cookies-optional');

		if (!analyticsCheckbox || !marketingCheckbox) {
			return;
		}

		const analyticsEnabled = analyticsCheckbox.checked;
		const marketingEnabled = marketingCheckbox.checked;

		// Set cookies based on preferences
		const expiry = 365 * 24 * 60 * 60; // 1 year
		
		if (analyticsEnabled) {
			setCookie('mellluxe_analytics_cookies', 'enabled', expiry);
		} else {
			setCookie('mellluxe_analytics_cookies', 'disabled', expiry);
		}

		if (marketingEnabled) {
			setCookie('mellluxe_marketing_cookies', 'enabled', expiry);
		} else {
			setCookie('mellluxe_marketing_cookies', 'disabled', expiry);
		}

		// Always set consent cookie
		setCookie('mellluxe_cookie_consent', 'custom', expiry);

		// Show success message
		showCookieMessage('Cookie preferences saved successfully!', 'success');

		// Update analytics and marketing scripts based on preferences
		if (analyticsEnabled) {
			enableAnalyticsScripts();
		}
		if (marketingEnabled) {
			enableMarketingScripts();
		}
	}

	function resetCookiePreferences() {
		const analyticsCheckbox = document.getElementById('analytics-cookies-optional');
		const marketingCheckbox = document.getElementById('marketing-cookies-optional');

		if (analyticsCheckbox && marketingCheckbox) {
			analyticsCheckbox.checked = true;
			marketingCheckbox.checked = true;
		}
	}

	function setCookie(name, value, expiry) {
		const date = new Date();
		date.setTime(date.getTime() + (expiry * 1000));
		const expires = 'expires=' + date.toUTCString();
		document.cookie = name + '=' + value + ';' + expires + ';path=/;secure;samesite=strict';
	}

	function showCookieMessage(message, type) {
		// Create message element
		const messageEl = document.createElement('div');
		messageEl.className = `cookie-message cookie-message-${type}`;
		messageEl.textContent = message;
		
		// Add to page
		document.body.appendChild(messageEl);
		
		// Show message
		setTimeout(() => {
			messageEl.classList.add('show');
		}, 100);
		
		// Hide message after 3 seconds
		setTimeout(() => {
			messageEl.classList.remove('show');
			setTimeout(() => {
				messageEl.remove();
			}, 300);
		}, 3000);
	}

	function handleCookieConsent(action) {
		const banner = document.getElementById('cookie-consent-banner');
		
		// Add exit animation
		banner.classList.add('cookie-consent-hiding');
		
		// Hide banner after animation
		setTimeout(() => {
			banner.style.display = 'none';
		}, 300);

		// Send AJAX request to save preference
		const formData = new FormData();
		formData.append('action', 'mellluxe_cookie_consent');
		formData.append('consent_action', action);
		formData.append('nonce', mellluxe_cookie_ajax.nonce);

		fetch(mellluxe_cookie_ajax.ajax_url, {
			method: 'POST',
			body: formData,
			credentials: 'same-origin'
		})
		.then(response => response.json())
		.then(data => {
			if (data.success) {
				// If accepted, enable analytics and marketing scripts
				if (action === 'accept') {
					enableAnalyticsScripts();
					enableMarketingScripts();
				}
			}
		})
		.catch(error => {
			console.error('Error saving cookie preference:', error);
		});
	}

	function enableAnalyticsScripts() {
		// Enable Google Analytics if it exists
		if (typeof gtag !== 'undefined') {
			gtag('consent', 'update', {
				'analytics_storage': 'granted'
			});
		}

		// Enable other analytics scripts here
		// Example: Facebook Pixel, Google Tag Manager, etc.
	}

	function enableMarketingScripts() {
		// Enable marketing scripts if they exist
		// Example: Facebook Pixel, Google Ads, etc.
		
		// You can add specific marketing script initialization here
		// Example:
		// if (typeof fbq !== 'undefined') {
		// 	fbq('consent', 'grant');
		// }
	}

	// Public function to check if cookies are accepted
	window.mellluxeCheckCookieConsent = function() {
		return document.cookie.split(';').some(item => 
			item.trim().startsWith('mellluxe_cookie_consent=accepted')
		);
	};

	// Public function to check if analytics cookies are enabled
	window.mellluxeCheckAnalyticsCookies = function() {
		return document.cookie.split(';').some(item => 
			item.trim().startsWith('mellluxe_analytics_cookies=enabled')
		);
	};

	// Public function to check if marketing cookies are enabled
	window.mellluxeCheckMarketingCookies = function() {
		return document.cookie.split(';').some(item => 
			item.trim().startsWith('mellluxe_marketing_cookies=enabled')
		);
	};

})();
