# WordPress.org Submission Checklist

This document provides a checklist for submitting the UK Tax Calculator plugin to WordPress.org.

## Pre-Submission Checklist

### Required Files ✅
- [x] Main plugin file (`uk-tax-calculator.php`) with proper headers
- [x] `readme.txt` in WordPress.org format
- [x] `LICENSE` file (GPL v2 or later)
- [x] All code files properly organized

### Plugin Headers ✅
```php
Plugin Name: UK NI & Employer Tax Calculator (2025-2026)
Plugin URI: https://github.com/farukdesk/UK-NI-Employer-Tax-Calculator-2025-to-2026---WordPress-Plugin
Description: Calculate UK Income Tax, National Insurance, and Employer NI contributions for the 2025-2026 tax year
Version: 1.0.0
Author: Faruk Desk
Author URI: https://github.com/farukdesk
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: uk-tax-calculator
Domain Path: /languages
Requires at least: 5.0
Requires PHP: 7.0
```

### Code Quality ✅
- [x] Follows WordPress Coding Standards
- [x] No PHP errors or warnings
- [x] Proper sanitization and validation
- [x] Nonce verification for AJAX calls
- [x] Proper escaping of output
- [x] No SQL queries (not using database)
- [x] Secure AJAX implementation

### Security ✅
- [x] Direct file access prevention (`if (!defined('ABSPATH'))`)
- [x] Input sanitization (`sanitize_text_field`, `floatval`)
- [x] Nonce verification for forms
- [x] No external API calls (privacy-compliant)
- [x] No data storage (no personal data collection)

### Functionality ✅
- [x] Plugin activates without errors
- [x] Shortcode works correctly
- [x] JavaScript loads properly
- [x] CSS loads properly
- [x] AJAX requests work
- [x] Calculations are accurate
- [x] No conflicts with default WordPress themes

### Documentation ✅
- [x] Complete `readme.txt` with all sections
- [x] Installation instructions
- [x] FAQ section
- [x] Changelog
- [x] Screenshots descriptions
- [x] Upgrade notices

### Licensing ✅
- [x] GPL v2 or later license
- [x] Compatible with WordPress license
- [x] No proprietary code
- [x] All assets properly licensed

## WordPress.org Plugin Guidelines Compliance

### Required Guidelines ✅

1. **Trialware or Feature Restricted**
   - ✅ Plugin is 100% free with no restrictions

2. **Service Provider or Affiliate Links**
   - ✅ No affiliate links or service provider dependencies

3. **Calling Remote Servers**
   - ✅ No external API calls or remote connections

4. **Hijacking Hooks and Filters**
   - ✅ No interference with core WordPress functionality

5. **Undocumented Libraries**
   - ✅ Only uses WordPress core jQuery (already included)

6. **Embedding External Scripts**
   - ✅ No external scripts or CDN dependencies

7. **Secure Code**
   - ✅ Proper sanitization, validation, and nonce verification

8. **Trademarks**
   - ✅ No trademark violations (HMRC data is public)

9. **GPL Compatible License**
   - ✅ GPL v2 or later

10. **Functional Plugin**
    - ✅ Fully functional with no placeholder features

## Submission Steps

### 1. Create WordPress.org Account
- Go to https://wordpress.org/
- Create a free account if you don't have one
- Verify your email address

### 2. Submit Plugin
- Go to https://wordpress.org/plugins/developers/add/
- Fill in the form:
  - **Plugin Name**: UK NI & Employer Tax Calculator (2025-2026)
  - **Plugin Description**: Brief description of functionality
  - **Plugin URL**: GitHub repository URL (optional)
- Upload the plugin ZIP file
- Submit for review

### 3. Wait for Review
- Reviews typically take 1-14 days
- WordPress.org team will review for:
  - Security issues
  - Guideline compliance
  - Code quality
  - Proper licensing

### 4. SVN Repository Access
- Once approved, you'll receive SVN repository access
- Repository URL will be: `https://plugins.svn.wordpress.org/uk-ni-employer-tax-calculator/`

### 5. Upload to SVN

```bash
# Checkout the repository
svn co https://plugins.svn.wordpress.org/uk-ni-employer-tax-calculator/ uk-tax-calculator-svn
cd uk-tax-calculator-svn

# Add plugin files to /trunk
cp -r /path/to/plugin/* trunk/

# Add screenshots to /assets (if you have them)
cp screenshot-1.png assets/
cp screenshot-2.png assets/

# Add all files
svn add trunk/* assets/*

# Commit with a message
svn ci -m "Initial commit of version 1.0.0"

# Tag the release
svn cp trunk tags/1.0.0
svn ci -m "Tagging version 1.0.0"
```

## Post-Submission

### After Plugin is Live
1. Monitor support forum for questions
2. Test on various WordPress versions
3. Gather user feedback
4. Plan for updates

### For Updates
1. Update version number in main plugin file
2. Update `Stable tag` in readme.txt
3. Add changelog entry
4. Commit to trunk
5. Tag new version in SVN

## Screenshots for WordPress.org

Place these in the `.wordpress-org/` or SVN `assets/` folder:

### Required Screenshots
1. **screenshot-1.png** - Calculator form interface (1280x720 or similar)
2. **screenshot-2.png** - Results display (1280x720 or similar)
3. **screenshot-3.png** - Mobile responsive view (375x812 or similar)

### Optional Assets
- **banner-772x250.png** - Plugin directory banner
- **banner-1544x500.png** - High-res banner
- **icon-128x128.png** - Plugin icon
- **icon-256x256.png** - High-res icon

## Testing Recommendations

### Before Submission
- [ ] Test on fresh WordPress installation
- [ ] Test with default Twenty Twenty-Four theme
- [ ] Test with popular themes (Astra, GeneratePress)
- [ ] Test on PHP 7.0, 7.4, 8.0, 8.1, 8.2
- [ ] Test on WordPress 5.0, 6.0, 6.4
- [ ] Test all major browsers (Chrome, Firefox, Safari, Edge)
- [ ] Test on mobile devices
- [ ] Test with common plugins (Yoast SEO, Contact Form 7)

### Common Issues to Check
- [ ] No PHP warnings or notices
- [ ] No JavaScript console errors
- [ ] CSS loads properly
- [ ] Responsive design works
- [ ] Shortcode renders correctly
- [ ] AJAX requests complete successfully
- [ ] No conflicts with jQuery

## Support

### Prepare for Support Questions
- Create a support email or forum
- Document common issues and solutions
- Be responsive to user questions
- Update FAQ based on user feedback

### Common User Questions
1. How to use the shortcode?
2. What tax code should I use?
3. Are calculations accurate?
4. Can it be customized?
5. Does it work with page builders?

## Marketing

### After Plugin is Live
- Share on social media
- Write blog post about the plugin
- Submit to WordPress plugin showcases
- Engage with users on WordPress.org forum
- Consider creating video tutorial

## Maintenance

### Annual Updates Required
- Update for new tax year (around March/April each year)
- Update tax rates and thresholds
- Update version numbers
- Test with latest WordPress version
- Update documentation

### Long-term Maintenance
- Monitor WordPress core updates
- Keep compatible with latest PHP versions
- Address security issues promptly
- Respond to user support requests
- Consider feature enhancements based on feedback

## Contact Information

For questions about the plugin:
- **GitHub**: https://github.com/farukdesk
- **Plugin Repository**: (Will be available after approval)
- **Support Forum**: (Will be available after approval)

## Version History

### Version 1.0.0 (Initial Release)
- Income Tax calculation for 2025-2026
- Employee National Insurance calculation
- Employer National Insurance calculation
- Responsive design
- AJAX-based calculator
- Shortcode support

---

**Status**: ✅ Ready for WordPress.org Submission

**Last Updated**: 2025-10-19

**Next Steps**: 
1. Create WordPress.org account
2. Submit plugin for review
3. Prepare screenshots
4. Wait for approval
5. Upload to SVN repository
