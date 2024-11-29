const steps = document.querySelectorAll('.step');
const progressSteps = document.querySelectorAll('.progress-step');
let currentStep = 0;

function updateProgressBar() {
    progressSteps.forEach((step, index) => {
        if (index <= currentStep) {
            step.classList.add('active');
        } else {
            step.classList.remove('active');
        }
    });
}

function nextStep() {
    // Here you would typically add validation
    steps[currentStep].classList.remove('active');
    currentStep++;
    steps[currentStep].classList.add('active');
    updateProgressBar();
}

function prevStep() {
    steps[currentStep].classList.remove('active');
    currentStep--;
    steps[currentStep].classList.add('active');
    updateProgressBar();
}

// File upload preview
document.querySelectorAll('.file-upload input[type="file"]').forEach(input => {
    input.addEventListener('change', function() {
        const fileName = this.files[0] ? this.files[0].name : 'Upload File';
        this.previousElementSibling.textContent = fileName;
    });
});