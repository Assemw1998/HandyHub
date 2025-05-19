const profileIcon = document.getElementById('profileIcon');
const dropdownMenu = document.getElementById('dropdownMenu');

profileIcon.addEventListener('click', function () {
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
});

// Optional: close the dropdown when clicking outside
window.addEventListener('click', function (e) {
    if (!profileIcon.contains(e.target) && !dropdownMenu.contains(e.target)) {
        dropdownMenu.style.display = 'none';
    }
});

let currentStep = 1;
let selectedService = '';
let selectedPrice = 0;

function selectService(card, service, price) {
    selectedService = service;
    selectedPrice = price;
    document.querySelectorAll('.service-card-Multi').forEach(c => c.classList.remove('selected'));
    card.classList.add('selected');
    nextStep();
}

function updateProgress() {
    const progress = ((currentStep - 1) / 3) * 100;
    document.querySelector('.progress').style.width = `${progress}%`;
    document.querySelectorAll('.step').forEach((step, index) => {
        if (index + 1 <= currentStep) {
            step.classList.add('active');
        } else {
            step.classList.remove('active');
        }
    });
}

function showStep(step) {
    document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
    document.querySelector(`#step${step}`).classList.add('active');
    currentStep = step;
    updateProgress();
}

function nextStep() {
    if (currentStep < 4) {
        currentStep++;
        showStep(currentStep);
    }
}

function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
    }
}

function updateSummary() {
    document.getElementById('summary-service').textContent = selectedService;
    document.getElementById('summary-price').textContent = `${selectedPrice} JOD`;
    document.getElementById('summary-date').textContent = document.getElementById('date').value;
    document.getElementById('summary-time').textContent = document.getElementById('time').value;
    document.getElementById('summary-name').textContent = document.getElementById('name').value;
    document.getElementById('summary-phone').textContent = document.getElementById('phone').value;
    document.getElementById('summary-email').textContent = document.getElementById('email').value;
    document.getElementById('summary-address').textContent = document.getElementById('address').value;

    const notes = document.getElementById('notes').value;
    if (notes) {
        document.getElementById('notes-container').style.display = 'flex';
        document.getElementById('summary-notes').textContent = notes;
    } else {
        document.getElementById('notes-container').style.display = 'none';
    }
}

document.getElementById('bookingForm').addEventListener('submit', function(e) {
    e.preventDefault();
    alert('Booking submitted successfully!');
    window.location.reload();
});

document.querySelector('#step3 .btn-next').addEventListener('click', updateSummary);

document.addEventListener('DOMContentLoaded', function() {
    const handymanFields = document.querySelector('.handyman-fields');
    const optionBtns = document.querySelectorAll('.option-btn');

    // Toggle between handyman and client registration
    optionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            optionBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            handymanFields.classList.toggle('active', this.dataset.type === 'handyman');
        });
    });

    // Initialize checkbox as unchecked
    const checkbox = document.querySelector('.remember-me input');
    checkbox.checked = false;

    // Custom multi-select dropdown functionality
    const servicesToggle = document.getElementById('servicesToggle');
    const servicesDropdown = document.getElementById('servicesDropdown');
    const serviceCheckboxes = document.querySelectorAll('#servicesDropdown input[type="checkbox"]');
    const selectedServices = document.getElementById('selectedServices');
    const servicesInput = document.getElementById('servicesInput');

    // Toggle dropdown visibility
    servicesToggle.addEventListener('click', function(e) {
        e.stopPropagation();
        servicesDropdown.classList.toggle('show');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function() {
        servicesDropdown.classList.remove('show');
    });

    // Prevent dropdown from closing when clicking inside
    servicesDropdown.addEventListener('click', function(e) {
        e.stopPropagation();
    });

    // Update selected services when checkboxes change
    serviceCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateSelectedServices);
    });

    function updateSelectedServices() {
        const selected = [];
        const selectedElements = [];

        serviceCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const label = checkbox.nextElementSibling.textContent;
                selected.push(checkbox.value);
                selectedElements.push(`
                            <div class="selected-item">
                                ${label}
                                <button type="button" data-value="${checkbox.value}">×</button>
                            </div>
                        `);
            }
        });

        selectedServices.innerHTML = selectedElements.join('');
        servicesInput.value = selected.join(',');
        servicesToggle.textContent = selected.length > 0 ?
            `${selected.length} services selected` :
            'Select services...';

        // Add event listeners to remove buttons
        document.querySelectorAll('.selected-item button').forEach(button => {
            button.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                document.querySelector(`#servicesDropdown input[value="${value}"]`).checked = false;
                updateSelectedServices();
            });
        });
    }

    // Initialize with no selected services
    updateSelectedServices();
});

document.querySelectorAll('.tab').forEach((tab, index) => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        document.querySelectorAll('.tab-content').forEach(content => {
            content.style.display = 'none';
        });
        const contents = ['overview-content', 'seller-content', 'review-content'];
        document.querySelector(`.${contents[index]}`).style.display = 'block';
    });
});
