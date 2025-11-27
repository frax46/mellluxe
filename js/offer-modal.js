/**
 * Offer Modal - Shows once per day
 * Displays a special offer modal that appears once per day when users visit the site
 */

(function() {
    'use strict';

    // DOM elements
    const offerModal = document.getElementById('offer-modal');
    const offerModalOverlay = document.getElementById('offer-modal-overlay');
    const offerModalClose = document.getElementById('offer-modal-close');

    // Check if modal elements exist
    if (!offerModal || !offerModalOverlay || !offerModalClose) {
        return;
    }

    // Storage key for tracking when modal was last shown
    const STORAGE_KEY = 'mellluxe_offer_modal_last_shown';
    const ONE_DAY_MS = 24 * 60 * 60 * 1000; // 24 hours in milliseconds

    /**
     * Get today's date as a string (YYYY-MM-DD format)
     * @returns {string} Today's date
     */
    function getTodayDateString() {
        const today = new Date();
        return today.toISOString().split('T')[0]; // Returns YYYY-MM-DD
    }

    /**
     * Check if modal should be shown today
     * @returns {boolean} True if modal should be shown
     */
    function shouldShowModal() {
        try {
            const lastShownDate = localStorage.getItem(STORAGE_KEY);
            const todayDate = getTodayDateString();

            // If no date stored or date is different from today, show modal
            if (!lastShownDate || lastShownDate !== todayDate) {
                return true;
            }

            return false;
        } catch (error) {
            // If localStorage is not available, show modal anyway
            console.warn('localStorage not available:', error);
            return true;
        }
    }

    /**
     * Save today's date to localStorage
     */
    function saveModalShownDate() {
        try {
            const todayDate = getTodayDateString();
            localStorage.setItem(STORAGE_KEY, todayDate);
        } catch (error) {
            console.warn('Could not save to localStorage:', error);
        }
    }

    /**
     * Show the modal with animation
     */
    function showModal() {
        if (!offerModal) return;

        // Add active class to trigger CSS animations
        offerModal.classList.add('active');
        
        // Prevent body scroll when modal is open
        document.body.style.overflow = 'hidden';

        // Save that modal was shown today
        saveModalShownDate();
    }

    /**
     * Hide the modal with animation
     */
    function hideModal() {
        if (!offerModal) return;

        // Remove active class to trigger CSS animations
        offerModal.classList.remove('active');
        
        // Restore body scroll
        document.body.style.overflow = '';
    }

    /**
     * Initialize the modal
     */
    function initOfferModal() {
        // Check if modal should be shown
        if (shouldShowModal()) {
            // Small delay to ensure page is loaded
            setTimeout(() => {
                showModal();
            }, 500);
        }

        // Close button event
        if (offerModalClose) {
            offerModalClose.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                hideModal();
            });
        }

        // Overlay click event (close when clicking outside modal)
        if (offerModalOverlay) {
            offerModalOverlay.addEventListener('click', () => {
                hideModal();
            });
        }

        // Prevent modal content clicks from closing the modal
        const offerModalContent = offerModal.querySelector('.offer-modal-content');
        if (offerModalContent) {
            offerModalContent.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        }

        // ESC key to close modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && offerModal.classList.contains('active')) {
                hideModal();
            }
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initOfferModal);
    } else {
        // DOM is already ready
        initOfferModal();
    }

})();

