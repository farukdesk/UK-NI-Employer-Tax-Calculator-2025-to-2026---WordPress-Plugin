# Installation Guide

## Requirements

Before installing, make sure your WordPress site meets these requirements:

- **WordPress**: Version 5.0 or higher
- **PHP**: Version 7.0 or higher
- **jQuery**: Included with WordPress (no additional setup needed)

## Installation Methods

### Method 1: WordPress Admin Upload (Recommended)

1. **Download the Plugin**
   - Download the latest release ZIP file from GitHub
   - Or download from WordPress.org plugin repository

2. **Upload via WordPress Admin**
   - Log in to your WordPress admin dashboard
   - Navigate to **Plugins > Add New**
   - Click the **Upload Plugin** button at the top
   - Click **Choose File** and select the ZIP file
   - Click **Install Now**

3. **Activate**
   - After installation completes, click **Activate Plugin**
   - The plugin is now active and ready to use

4. **Add to Your Site**
   - Go to any page or post
   - Add the shortcode: `[uk_tax_calculator]`
   - Publish or update the page
   - View your page to see the calculator in action

### Method 2: Manual Installation via FTP

1. **Download the Plugin**
   - Download the plugin ZIP file
   - Extract it on your computer

2. **Upload via FTP**
   - Connect to your site via FTP
   - Navigate to `/wp-content/plugins/`
   - Upload the extracted `uk-tax-calculator` folder
   - The final path should be: `/wp-content/plugins/uk-tax-calculator/`

3. **Activate**
   - Log in to WordPress admin
   - Go to **Plugins**
   - Find "UK NI & Employer Tax Calculator"
   - Click **Activate**

4. **Add to Your Site**
   - Add shortcode `[uk_tax_calculator]` to any page

### Method 3: Manual Installation via cPanel

1. **Download the Plugin**
   - Download the plugin ZIP file

2. **Upload via cPanel**
   - Log in to your hosting cPanel
   - Open **File Manager**
   - Navigate to `/wp-content/plugins/`
   - Click **Upload** at the top
   - Select and upload the ZIP file
   - After upload, return to File Manager
   - Right-click the ZIP file and select **Extract**
   - Delete the ZIP file after extraction

3. **Activate**
   - Log in to WordPress admin
   - Go to **Plugins**
   - Find and activate the plugin

### Method 4: WordPress.org Repository (When Published)

1. **Search in WordPress**
   - Log in to WordPress admin
   - Go to **Plugins > Add New**
   - Search for "UK Tax Calculator"
   - Find "UK NI & Employer Tax Calculator (2025-2026)"

2. **Install**
   - Click **Install Now**
   - Wait for installation to complete

3. **Activate**
   - Click **Activate**

4. **Use**
   - Add `[uk_tax_calculator]` to any page

## Post-Installation Setup

### 1. Create a Calculator Page

**Option A: New Page**
1. Go to **Pages > Add New**
2. Enter page title (e.g., "Tax Calculator")
3. Add the shortcode: `[uk_tax_calculator]`
4. Click **Publish**

**Option B: Existing Page**
1. Go to **Pages > All Pages**
2. Edit the page where you want the calculator
3. Add the shortcode: `[uk_tax_calculator]`
4. Click **Update**

### 2. Add to Navigation Menu (Optional)

1. Go to **Appearance > Menus**
2. Select your menu
3. Find your calculator page in "Pages"
4. Click **Add to Menu**
5. Arrange the menu item
6. Click **Save Menu**

### 3. Test the Calculator

1. Visit the page where you added the calculator
2. Enter a test salary (e.g., 50000)
3. Click "Calculate Tax"
4. Verify the results display correctly

## Integration Examples

### With Gutenberg Editor

1. Add a **Shortcode** block
2. Type: `[uk_tax_calculator]`
3. Update the page

### With Classic Editor

1. In the editor, place cursor where you want the calculator
2. Type: `[uk_tax_calculator]`
3. Update the page

### With Elementor

1. Add a **Shortcode** widget
2. In the widget settings, enter: `[uk_tax_calculator]`
3. Update the page

### With Divi Builder

1. Add a **Code** module
2. In the module settings, enter: `[uk_tax_calculator]`
3. Save the page

### With WPBakery (Visual Composer)

1. Add a **Raw HTML** element
2. Enter: `[uk_tax_calculator]`
3. Save the page

### In a Widget

1. Go to **Appearance > Widgets**
2. Add a **Shortcode** widget to your sidebar
3. Enter: `[uk_tax_calculator]`
4. Save the widget

### In a PHP Template File

```php
<?php echo do_shortcode('[uk_tax_calculator]'); ?>
```

## Verification

After installation, verify everything is working:

### Check Plugin is Active
- Go to **Plugins**
- Confirm "UK NI & Employer Tax Calculator" shows as active

### Check Files are Present
Via FTP or cPanel File Manager, verify these files exist:
```
/wp-content/plugins/uk-tax-calculator/
├── assets/
│   ├── css/
│   │   └── calculator.css
│   └── js/
│       └── calculator.js
├── templates/
│   └── calculator-form.php
├── uk-tax-calculator.php
├── readme.txt
└── README.md
```

### Test Functionality
1. Visit a page with the shortcode
2. The calculator form should display
3. Enter a salary and click "Calculate Tax"
4. Results should appear below the form

## Troubleshooting

### Plugin Not Appearing in Plugins List

**Issue**: After upload, plugin doesn't show in plugins list

**Solutions**:
- Check the folder structure is correct
- Folder should be `/wp-content/plugins/uk-tax-calculator/`
- Main file should be `uk-tax-calculator.php`
- Try refreshing the Plugins page

### Shortcode Shows as Text

**Issue**: Shortcode appears as `[uk_tax_calculator]` on the page

**Solutions**:
- Make sure the plugin is activated
- Check you're using the correct shortcode
- Try deactivating and reactivating the plugin
- Clear your site cache if using a caching plugin

### Calculator Not Displaying

**Issue**: Nothing appears where shortcode is placed

**Solutions**:
- Check browser console for JavaScript errors
- Verify plugin is activated
- Try switching to a default WordPress theme temporarily
- Disable other plugins to check for conflicts

### Styling Issues

**Issue**: Calculator looks broken or unstyled

**Solutions**:
- Clear browser cache (Ctrl+F5)
- Clear WordPress cache if using a cache plugin
- Check if theme has conflicting CSS
- Try viewing in different browser

### Permission Error During Installation

**Issue**: Cannot upload or activate plugin

**Solutions**:
- Check file permissions on `/wp-content/plugins/` (should be 755)
- Contact your hosting provider for permission issues
- Try manual FTP installation instead

## Uninstallation

If you need to remove the plugin:

### Standard Uninstall
1. Go to **Plugins**
2. Find "UK NI & Employer Tax Calculator"
3. Click **Deactivate**
4. Click **Delete**
5. Confirm deletion

### Manual Uninstall
1. Deactivate the plugin in WordPress admin
2. Via FTP or cPanel, delete the folder:
   `/wp-content/plugins/uk-tax-calculator/`

**Note**: The plugin doesn't store any data in the database, so uninstallation is clean.

## Getting Help

If you encounter issues during installation:

1. **Check Documentation**
   - Read this installation guide
   - Check the USAGE.md file
   - Review the README.md

2. **Common Issues**
   - Most issues are resolved by proper file permissions
   - Check WordPress and PHP version requirements
   - Try the troubleshooting steps above

3. **Support**
   - Open an issue on GitHub
   - Visit WordPress.org support forum
   - Check existing issues for solutions

## Next Steps

After successful installation:

1. Read the [USAGE.md](USAGE.md) guide
2. Customize appearance if needed (see USAGE.md)
3. Test with various salary amounts
4. Share the calculator page with your users

Enjoy using the UK Tax Calculator! 🎉
