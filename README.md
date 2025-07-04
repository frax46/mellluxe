# Mell Luxe WordPress Theme

A luxury WordPress theme for Mell Luxe beauty products, featuring GSAP animations, scroll snapping, and full WooCommerce integration.

## Features

### 🎨 **Design & UX**
- **Luxury Aesthetic**: Modern, clean design reflecting the premium vegan beauty brand
- **Responsive Design**: Optimized for all devices (desktop, tablet, mobile)
- **Snap Scrolling**: Smooth section-to-section scrolling with viewport snapping
- **Custom Color Palette**: Brand-consistent colors throughout
- **Modern Typography**: Poppins font family for excellent readability

### ⚡ **Animations & Effects**
- **GSAP ScrollTrigger**: Advanced scroll-based animations
- **Fade In Animations**: Smooth content reveals on scroll
- **Slide Animations**: Left, right, and up slide effects
- **Scale In Animations**: Product cards with staggered timing
- **Floating Elements**: Decorative leaf patterns with parallax
- **Hover Effects**: Interactive product cards and buttons

### 🛒 **WooCommerce Integration**
- **Full WooCommerce Support**: Complete e-commerce functionality
- **Custom Product Grid**: Modern card-based product layout
- **Enhanced Single Product Pages**: Split layout with sticky gallery
- **Cart Integration**: Header cart with dynamic count updates
- **Custom Styling**: Theme-consistent WooCommerce elements
- **Mobile Optimized**: Responsive product layouts

### 🎯 **Performance & SEO**
- **Optimized Loading**: Efficient asset loading and caching
- **SEO Ready**: Proper heading structure and meta tags
- **Accessibility**: ARIA labels and keyboard navigation
- **Cross-browser Compatible**: Works on all modern browsers
- **Print Styles**: Optimized for printing

## Installation

### Requirements
- WordPress 5.0 or higher
- PHP 7.4 or higher
- WooCommerce plugin (for e-commerce features)

### Installation Steps

1. **Download the Theme**
   ```bash
   # Clone or download the theme files
   git clone [repository-url] mellluxe
   ```

2. **Upload to WordPress**
   - Upload the theme folder to `/wp-content/themes/`
   - Or use WordPress Admin: Appearance > Themes > Add New > Upload Theme

3. **Activate Theme**
   - Go to Appearance > Themes
   - Click "Activate" on Mell Luxe theme

4. **Install Required Plugins**
   - Install and activate WooCommerce
   - Import sample products (optional)

5. **Configure Theme**
   - Go to Appearance > Customize
   - Configure hero section, contact info, and colors
   - Set up menus: Appearance > Menus

## Theme Structure

```
mellluxe/
├── style.css              # Main stylesheet with theme info
├── functions.php          # Theme functions and setup
├── index.php             # Homepage template
├── header.php            # Header template
├── footer.php            # Footer template
├── woocommerce.php       # WooCommerce shop template
├── single-product.php    # Single product template
├── js/
│   └── theme.js          # GSAP animations and interactions
├── images/
│   └── System Images/    # Brand assets (logo, etc.)
└── README.md            # This documentation
```

## Customization

### Theme Customizer Options

Navigate to **Appearance > Customize** to access:

1. **Hero Section**
   - Hero title text
   - Hero description
   - Hero background image

2. **Contact Information**
   - Contact email address
   - Business details

3. **Site Identity**
   - Custom logo upload
   - Site title and tagline

### Menu Locations

The theme supports two menu locations:

1. **Primary Menu**: Main navigation header
2. **Footer Menu**: Footer links

### Widget Areas

- **Sidebar**: Traditional sidebar widget area
- **Footer Widgets**: Footer widget area for additional content

## Development

### CSS Custom Properties

The theme uses CSS custom properties for consistent styling:

```css
:root {
    --primary-color: #2d5a3d;    /* Brand green */
    --secondary-color: #f4f1eb;  /* Light cream */
    --accent-color: #8b4513;     /* Brown accent */
    --text-dark: #2c2c2c;        /* Dark text */
    --text-light: #ffffff;       /* Light text */
    --transition: all 0.3s ease; /* Standard transition */
    --border-radius: 8px;        /* Standard border radius */
    --shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Standard shadow */
    --max-width: 1200px;         /* Container max width */
}
```

### JavaScript Animations

GSAP animations are handled in `js/theme.js`:

- **ScrollTrigger**: Scroll-based animations
- **Mobile Menu**: Responsive navigation
- **Contact Form**: AJAX form submission
- **Smooth Scrolling**: Anchor link animations
- **Product Interactions**: Hover effects

### WooCommerce Customizations

Custom WooCommerce styling includes:

- **Product Grid**: CSS Grid layout
- **Product Cards**: Modern card design
- **Cart Integration**: Dynamic cart updates
- **Responsive Design**: Mobile-optimized layouts

## Browser Support

- **Chrome**: Latest 2 versions
- **Firefox**: Latest 2 versions
- **Safari**: Latest 2 versions
- **Edge**: Latest 2 versions
- **Mobile Browsers**: iOS Safari, Chrome Mobile

## Performance

### Optimization Features

- **Efficient Loading**: Scripts loaded in footer
- **CDN Assets**: GSAP loaded from CDN
- **Optimized Images**: Responsive image techniques
- **Minimal HTTP Requests**: Consolidated assets
- **Caching Friendly**: Static asset optimization

### Page Speed Recommendations

1. **Image Optimization**: Use WebP format when possible
2. **Caching Plugin**: Install a caching plugin (WP Rocket, W3 Total Cache)
3. **CDN**: Use a content delivery network
4. **Database Optimization**: Regular database cleanup

## Security

### Security Features

- **Nonce Verification**: AJAX requests secured
- **Input Sanitization**: All user inputs sanitized
- **Version Hiding**: WordPress version hidden
- **Secure Headers**: Proper HTTP headers
- **XSS Prevention**: Output escaped properly

## Support & Documentation

### Getting Help

1. **Theme Documentation**: Read this README thoroughly
2. **WordPress Codex**: Reference WordPress documentation
3. **WooCommerce Docs**: For e-commerce specific issues
4. **GSAP Documentation**: For animation customizations

### Common Issues

**GSAP Not Loading**
- Ensure internet connection for CDN
- Check browser console for errors

**Animations Not Working**
- Verify GSAP scripts are loaded
- Check for JavaScript conflicts

**WooCommerce Styling Issues**
- Ensure WooCommerce is activated
- Clear cache after theme activation

## Changelog

### Version 1.0.0
- Initial release
- GSAP ScrollTrigger integration
- Snap scrolling functionality
- WooCommerce support
- Responsive design
- Contact form with AJAX
- Custom post type support

## Credits

### Technologies Used

- **WordPress**: Content management system
- **WooCommerce**: E-commerce functionality
- **GSAP**: Animation library
- **CSS Grid**: Layout system
- **Intersection Observer**: Performance optimization

### Fonts

- **Poppins**: Google Fonts (Primary typeface)

### Images

- Brand assets provided in `images/` directory
- Product images from available asset library

## License

This theme is developed for Mell Luxe and follows WordPress theme development standards. All code follows GPL v2 or later licensing for WordPress compatibility.

---

**Built with ❤️ for Mell Luxe - Where nature meets luxury** #   m e l l l u x e  
 