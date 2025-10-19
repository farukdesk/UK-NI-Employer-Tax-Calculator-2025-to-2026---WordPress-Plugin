/**
 * UK Tax Calculator JavaScript
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // Handle form submission
        $('#uk-tax-calculator-form').on('submit', function(e) {
            e.preventDefault();
            
            // Get form values
            const salary = $('#annual-salary').val();
            const taxCode = $('#tax-code').val() || '1257L';
            
            // Validate input
            if (!salary || salary <= 0) {
                showError('Please enter a valid salary amount');
                return;
            }
            
            // Hide error and results
            hideError();
            $('#calculator-results').hide();
            
            // Show loading state
            setLoadingState(true);
            
            // Make AJAX request
            $.ajax({
                url: ukTaxCalc.ajax_url,
                type: 'POST',
                data: {
                    action: 'calculate_uk_tax',
                    nonce: ukTaxCalc.nonce,
                    salary: salary,
                    tax_code: taxCode
                },
                success: function(response) {
                    if (response.success) {
                        displayResults(response.data);
                    } else {
                        showError(response.data.message || 'An error occurred during calculation');
                    }
                },
                error: function() {
                    showError('Unable to calculate tax. Please try again.');
                },
                complete: function() {
                    setLoadingState(false);
                }
            });
        });
        
        // Format currency
        function formatCurrency(amount) {
            return '£' + Number(amount).toLocaleString('en-GB', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });
        }
        
        // Format percentage
        function formatPercentage(percentage) {
            return Number(percentage).toFixed(0) + '%';
        }
        
        // Display results
        function displayResults(data) {
            // Update tax code info
            $('#result-tax-code').text(data.tax_code_used);
            $('#result-personal-allowance').text(formatCurrency(data.personal_allowance_used));
            
            // Update employee deductions
            $('#income-tax-annual').text(formatCurrency(data.annual.income_tax));
            $('#income-tax-monthly').text(formatCurrency(data.monthly.income_tax));
            $('#income-tax-percentage').text(formatPercentage(data.percentages.income_tax));
            
            $('#employee-ni-annual').text(formatCurrency(data.annual.employee_ni));
            $('#employee-ni-monthly').text(formatCurrency(data.monthly.employee_ni));
            $('#employee-ni-percentage').text(formatPercentage(data.percentages.employee_ni));
            
            $('#total-taxes-annual').text(formatCurrency(data.annual.total_taxes));
            $('#total-taxes-monthly').text(formatCurrency(data.monthly.total_taxes));
            $('#total-taxes-percentage').text(formatPercentage(data.percentages.total_taxes));
            
            $('#net-income-annual').text(formatCurrency(data.annual.net_income));
            $('#net-income-monthly').text(formatCurrency(data.monthly.net_income));
            $('#net-income-percentage').text(formatPercentage(data.percentages.net_income));
            
            // Update employer costs
            $('#salary-annual').text(formatCurrency(data.annual.salary));
            $('#salary-monthly').text(formatCurrency(data.monthly.salary));
            
            $('#employer-ni-annual').text(formatCurrency(data.annual.employer_ni));
            $('#employer-ni-monthly').text(formatCurrency(data.monthly.employer_ni));
            
            $('#total-cost-annual').text(formatCurrency(data.annual.total_cost_to_employer));
            $('#total-cost-monthly').text(formatCurrency(data.monthly.total_cost_to_employer));
            
            // Show results with animation
            $('#calculator-results').slideDown(400);
            
            // Scroll to results on mobile
            if ($(window).width() < 768) {
                $('html, body').animate({
                    scrollTop: $('#calculator-results').offset().top - 20
                }, 400);
            }
        }
        
        // Show error message
        function showError(message) {
            $('#calculator-error .error-message').text(message);
            $('#calculator-error').slideDown(300);
            
            // Hide error after 5 seconds
            setTimeout(function() {
                hideError();
            }, 5000);
        }
        
        // Hide error message
        function hideError() {
            $('#calculator-error').slideUp(300);
        }
        
        // Set loading state
        function setLoadingState(loading) {
            const $button = $('.btn-calculate');
            const $btnText = $('.btn-text');
            const $btnLoader = $('.btn-loader');
            
            if (loading) {
                $button.prop('disabled', true);
                $btnText.hide();
                $btnLoader.show();
            } else {
                $button.prop('disabled', false);
                $btnText.show();
                $btnLoader.hide();
            }
        }
        
        // Format salary input on blur
        $('#annual-salary').on('blur', function() {
            const value = $(this).val();
            if (value && value > 0) {
                // Remove any existing commas and parse as float
                const numValue = parseFloat(value.replace(/,/g, ''));
                if (!isNaN(numValue)) {
                    $(this).val(Math.round(numValue));
                }
            }
        });
        
        // Allow only numbers in salary input
        $('#annual-salary').on('keypress', function(e) {
            // Allow: backspace, delete, tab, escape, enter
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, down, up
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
        
        // Uppercase tax code
        $('#tax-code').on('input', function() {
            $(this).val($(this).val().toUpperCase());
        });
        
    });

})(jQuery);
