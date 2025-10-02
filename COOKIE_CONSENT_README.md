# Cookie Consent System for Mell Luxe Theme

## Overview

This WordPress theme includes a comprehensive cookie consent system that complies with GDPR and other privacy regulations. The system provides users with clear information about cookies and allows them to make informed choices about their privacy preferences.

## Features

- **Cookie Consent Banner**: Appears on first visit with accept/reject options
- **Granular Control**: Users can choose specific cookie categories
- **Persistent Preferences**: User choices are remembered for 1 year
- **Responsive Design**: Works seamlessly on all devices
- **Accessibility**: Keyboard navigation and screen reader support
- **Policy Pages**: Built-in Privacy Policy and Cookie Policy templates
- **Footer Management**: Easy access to cookie preferences

## How It Works

### 1. Initial Visit
When a user first visits the website:
- A cookie consent banner appears at the bottom of the page
- Users can choose to "Accept All" or "Reject All" cookies
- The banner includes links to Privacy Policy and Cookie Policy pages

### 2. Cookie Categories
The system manages three types of cookies:

- **Essential Cookies**: Always enabled (shopping cart, authentication, security)
- **Analytics Cookies**: Optional (Google Analytics, user behavior tracking)
- **Marketing Cookies**: Optional (Facebook Pixel, advertising, retargeting)

### 3. User Preferences
Users can manage their cookie preferences through:
- The initial consent banner
- A "Cookie Preferences" button in the footer
- Individual toggle switches for each cookie category

## File Structure

```
mellluxe/
├── functions.php (Cookie consent functions)
├── js/
│   └── cookie-consent.js (Frontend functionality)
├── style.css (Styling for banner and preferences)
├── page-privacy-policy.php (Privacy policy template)
├── page-cookie-policy.php (Cookie policy template)
└── footer.php (Cookie preferences panel)
```

## Customization

### Modifying the Consent Banner

Edit the `mellluxe_cookie_banner_html()` function in `functions.php`:

```php
function mellluxe_cookie_banner_html() {
    ?>
    <div id="cookie-consent-banner" class="cookie-consent-banner">
        <!-- Customize your banner content here -->
    </div>
    <?php
}
```

### Changing Cookie Expiry

Modify the expiry time in `functions.php`:

```php
$expiry = 365 * 24 * 60 * 60; // 1 year
// Change to: 30 * 24 * 60 * 60; // 30 days
```

### Customizing Styling

Modify the CSS variables in `style.css`:

```css
:root {
    --cookie-banner-bg: var(--primary-color);
    --cookie-banner-border: var(--secondary-color);
    --cookie-banner-text: var(--text-light);
}
```

## Integration with Analytics

### Google Analytics

The system automatically integrates with Google Analytics. When users accept analytics cookies:

```javascript
// Automatically called when analytics cookies are accepted
if (typeof gtag !== 'undefined') {
    gtag('consent', 'update', {
        'analytics_storage': 'granted'
    });
}
```

### Facebook Pixel

Enable Facebook Pixel when marketing cookies are accepted:

```javascript
// Add this to enableMarketingScripts() function
if (typeof fbq !== 'undefined') {
    fbq('consent', 'grant');
}
```

### Custom Analytics

Add your own analytics integration:

```javascript
function enableAnalyticsScripts() {
    // Your custom analytics code here
    if (typeof yourAnalyticsFunction !== 'undefined') {
        yourAnalyticsFunction('enable');
    }
}
```

## Testing

### Test Cookie Consent

1. Clear your browser cookies
2. Visit the website
3. The consent banner should appear
4. Test accept/reject functionality
5. Check that preferences are saved

### Test Preferences Panel

1. Click "Cookie Preferences" in footer
2. Toggle different cookie categories
3. Save preferences
4. Verify changes are applied

### Test Responsiveness

1. Test on mobile devices
2. Verify banner and preferences panel work correctly
3. Check touch interactions

## Privacy Compliance

### GDPR Compliance

- Clear information about cookie usage
- Granular consent options
- Easy withdrawal of consent
- Transparent data processing

### CCPA Compliance

- Right to know what data is collected
- Right to opt-out of data sharing
- Clear privacy policy
- Contact information for requests

### Cookie Law Compliance

- Prior consent for non-essential cookies
- Clear explanation of cookie purposes
- Easy way to manage preferences
- Regular policy updates

## Troubleshooting

### Banner Not Appearing

1. Check if user already has consent cookie
2. Verify JavaScript is loading correctly
3. Check browser console for errors
4. Ensure banner HTML is being output

### Preferences Not Saving

1. Check AJAX endpoint is working
2. Verify nonce is valid
3. Check cookie permissions
3. Test with different browsers

### Styling Issues

1. Verify CSS is loading
2. Check for CSS conflicts
3. Test responsive breakpoints
4. Verify CSS variables are defined

## Maintenance

### Regular Updates

- Review cookie policies annually
- Update privacy information as needed
- Test functionality after theme updates
- Monitor user feedback

### Performance

- Cookies are lightweight and fast
- No impact on page load speed
- Minimal JavaScript footprint
- Efficient cookie management

## Support

For technical support or customization requests:

1. Check this documentation first
2. Review the code comments
3. Test in a staging environment
4. Contact the development team

## Version History

- **v1.0**: Initial implementation
  - Basic consent banner
  - Accept/reject functionality
  - Footer preferences panel
  - Policy page templates

## Future Enhancements

- [ ] Advanced cookie categorization
- [ ] A/B testing for consent rates
- [ ] Integration with consent management platforms
- [ ] Enhanced analytics reporting
- [ ] Multi-language support
- [ ] Cookie consent analytics

---

**Note**: This system is designed to be compliant with current privacy regulations, but it's your responsibility to ensure it meets the specific legal requirements for your jurisdiction and use case.
