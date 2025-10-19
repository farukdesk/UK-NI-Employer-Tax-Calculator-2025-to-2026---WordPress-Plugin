# Contributing to UK Tax Calculator

Thank you for considering contributing to the UK Tax Calculator plugin! This document provides guidelines for contributing.

## How to Contribute

### Reporting Bugs

If you find a bug, please open an issue with:
- Clear description of the bug
- Steps to reproduce
- Expected behavior
- Actual behavior
- WordPress version
- PHP version
- Browser (if relevant)

### Suggesting Features

Feature suggestions are welcome! Please:
- Check if the feature has already been suggested
- Provide a clear use case
- Explain why it would benefit users

### Code Contributions

1. **Fork the Repository**
   ```bash
   git clone https://github.com/farukdesk/UK-NI-Employer-Tax-Calculator-2025-to-2026---WordPress-Plugin.git
   cd UK-NI-Employer-Tax-Calculator-2025-to-2026---WordPress-Plugin
   ```

2. **Create a Branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```

3. **Make Changes**
   - Follow WordPress Coding Standards
   - Test your changes thoroughly
   - Update documentation if needed

4. **Commit Changes**
   ```bash
   git add .
   git commit -m "Add: Your feature description"
   ```

5. **Push and Create Pull Request**
   ```bash
   git push origin feature/your-feature-name
   ```

## Coding Standards

### PHP

Follow [WordPress PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/):

```php
// Good
function calculate_tax( $salary, $tax_code = '1257L' ) {
    $income_tax = 0;
    
    if ( $salary > 0 ) {
        // Calculate tax
    }
    
    return $income_tax;
}

// Use proper indentation (tabs, not spaces for PHP)
// Use spaces around operators
// Add spaces after commas
```

### JavaScript

Follow [WordPress JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/):

```javascript
// Good
function formatCurrency( amount ) {
    return '£' + Number( amount ).toLocaleString( 'en-GB', {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    });
}

// Use camelCase for variable names
// Add spaces around operators
// Use single quotes for strings
```

### CSS

Follow [WordPress CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/):

```css
/* Good */
.uk-tax-calculator-container {
    background: #ffffff;
    border-radius: 12px;
    padding: 30px;
}

/* Use lowercase for selectors and properties */
/* Use tabs for indentation */
/* Include a space after the colon */
```

## Testing

Before submitting a pull request:

1. **Test Calculations**
   - Test with various salary amounts
   - Test with different tax codes
   - Verify percentages are correct
   - Check monthly calculations

2. **Test Compatibility**
   - Test on multiple WordPress versions
   - Test on different PHP versions (7.0+)
   - Test on different browsers
   - Test responsive design

3. **Test Integration**
   - Test shortcode placement
   - Test with page builders
   - Test with various themes

## Documentation

Update documentation when:
- Adding new features
- Changing existing functionality
- Fixing bugs that affect usage

Documentation to update:
- README.md (if major changes)
- USAGE.md (if user-facing changes)
- Code comments (for complex logic)
- readme.txt (for WordPress.org)

## Tax Year Updates

When updating for a new tax year:

1. **Update Constants** in `uk-tax-calculator.php`:
   ```php
   $personal_allowance = 12570; // Update for new tax year
   $basic_rate_limit = 50270;
   $higher_rate_limit = 125140;
   $ni_primary_threshold = 12570;
   $ni_upper_earnings_limit = 50270;
   $ni_secondary_threshold = 5000;
   ```

2. **Update Tax Rates**:
   - Income tax bands and rates
   - National Insurance rates
   - Thresholds

3. **Update Documentation**:
   - README.md
   - USAGE.md
   - readme.txt
   - Plugin header

4. **Update Version**:
   - Plugin header version
   - UK_TAX_CALC_VERSION constant
   - Changelog in readme.txt

5. **Test Thoroughly**:
   - Run test scenarios
   - Compare with HMRC calculators
   - Test edge cases

## Pull Request Process

1. **Update Documentation**
   - Update README if needed
   - Add changelog entry
   - Update version numbers

2. **Test Your Changes**
   - Run through test scenarios
   - Test on clean WordPress install
   - Test with popular themes/plugins

3. **Create Pull Request**
   - Clear title describing the change
   - Detailed description of what and why
   - Link to related issues
   - Include screenshots if UI changes

4. **Code Review**
   - Address review comments
   - Make requested changes
   - Keep discussion focused

## Release Process

For maintainers:

1. **Update Version Numbers**
   - uk-tax-calculator.php header
   - UK_TAX_CALC_VERSION constant
   - readme.txt stable tag

2. **Update Changelog**
   - readme.txt changelog
   - README.md changelog

3. **Tag Release**
   ```bash
   git tag -a v1.0.0 -m "Version 1.0.0"
   git push origin v1.0.0
   ```

4. **WordPress.org Deployment**
   - Update SVN repository
   - Test on WordPress.org
   - Monitor initial reviews

## Resources

- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [WordPress Plugin Developer Handbook](https://developer.wordpress.org/plugins/)
- [WordPress Plugin Review Guidelines](https://developer.wordpress.org/plugins/wordpress-org/detailed-plugin-guidelines/)
- [HMRC Tax Rates and Thresholds](https://www.gov.uk/government/publications/rates-and-thresholds-for-employers-2025-to-2026)

## Questions?

If you have questions about contributing:
- Open a discussion on GitHub
- Check existing issues and pull requests
- Review the documentation

## License

By contributing, you agree that your contributions will be licensed under the GPL v2 or later license.

## Code of Conduct

- Be respectful and professional
- Welcome newcomers
- Focus on constructive feedback
- Help maintain a positive community

Thank you for contributing to making this plugin better! 🎉
