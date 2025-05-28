
// Initialize phone number input
const phoneInput = document.querySelector("#phone");
const iti = window.intlTelInput(phoneInput, {
    initialCountry: "auto",
    geoIpLookup: function (callback) {
        fetch("https://ipapi.co/json")
            .then(res => res.json())
            .then(data => callback(data.country_code))
            .catch(() => callback("mo"));
    },
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    separateDialCode: true,
    preferredCountries: ['us', 'gb', 'ca', 'au', 'in', 'ng']
});

// Update hidden input with full international number before form submission
phoneInput.form.addEventListener('submit', function () {
    phoneInput.value = iti.getNumber();
});
