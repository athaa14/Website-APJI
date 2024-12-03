document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('multi-step-form');
    const steps = document.querySelectorAll('.step');
    const progressSteps = document.querySelectorAll('.progress-step');
    let currentStep = 0;

    // Validasi langkah saat ini
    function validateStep(step) {
        const inputs = step.querySelectorAll('input, select');
        let isValid = true;

        inputs.forEach(input => {
            // Reset kesalahan sebelumnya
            input.classList.remove('input-error');

            // Periksa apakah input kosong
            if (!input.value.trim()) {
                input.classList.add('input-error'); // Tambahkan latar belakang merah
                isValid = false;
            }

            // Validasi tambahan untuk jenis input tertentu
            if (input.name === 'email') {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(input.value.trim())) {
                    input.classList.add('input-error');
                    isValid = false;
                }
            }

            if (input.name === 'password') {
                if (input.value.length < 8) {
                    input.classList.add('input-error');
                    isValid = false;
                }
            }

            if (input.name === 'confirm-password') {
                const passwordInput = document.querySelector('input[name="password"]');
                if (input.value !== passwordInput.value) {
                    input.classList.add('input-error');
                    passwordInput.classList.add('input-error');
                    isValid = false;
                }
            }
        });

        return isValid;
    }

    // Pindah ke langkah berikutnya
    function nextStep() {
        const currentStepElement = steps[currentStep];
        if (validateStep(currentStepElement)) {
            steps[currentStep].classList.remove('active');
            currentStep++;
            if (currentStep < steps.length) {
                steps[currentStep].classList.add('active');
                updateProgressBar();
            } else {
                form.submit();
            }
        } else {
            alert('Harap lengkapi semua data dengan benar sebelum melanjutkan.');
        }
    }

    // Kembali ke langkah sebelumnya
    function prevStep() {
        if (currentStep > 0) {
            steps[currentStep].classList.remove('active');
            currentStep--;
            steps[currentStep].classList.add('active');
            updateProgressBar();
        }
    }

    // Perbarui progress bar
    function updateProgressBar() {
        progressSteps.forEach((step, index) => {
            if (index <= currentStep) {
                step.classList.add('active');
            } else {
                step.classList.remove('active');
            }
        });
    }

    // Hilangkan error saat pengguna mengetik ulang
    const allInputs = document.querySelectorAll('input, select');
    allInputs.forEach(input => {
        input.addEventListener('input', function() {
            if (this.value.trim()) {
                this.classList.remove('input-error');
            }
        });
    });

    // Pasang event listener untuk tombol
    const nextButtons = document.querySelectorAll('button[onclick="nextStep()"]');
    const backButtons = document.querySelectorAll('button[onclick="prevStep()"]');

    nextButtons.forEach(button => button.addEventListener('click', nextStep));
    backButtons.forEach(button => button.addEventListener('click', prevStep));
});

