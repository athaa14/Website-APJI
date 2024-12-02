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
        // Update the text to show the selected file's name
        this.previousElementSibling.textContent = fileName;
    });
});

// document.querySelectorAll('.file-upload input[type="file"]').forEach(input => {
//     input.addEventListener('change', function() {
//         const file = this.files[0];
//         const previewText = this.previousElementSibling;

//         if (file) {
//             // Update text with the file name
//             previewText.textContent = file.name;

//             // If the file is an image, show a preview
//             const reader = new FileReader();
//             reader.onload = function(e) {
//                 const previewImage = document.createElement('img');
//                 previewImage.src = e.target.result;
//                 previewImage.style.width = '100px'; // Adjust the preview size if needed
//                 previewImage.style.height = 'auto';
//                 // Append the image after the text
//                 previewText.parentElement.appendChild(previewImage);
//             };
//             reader.readAsDataURL(file); // Read file as a data URL (for image preview)
//         }
//     });
// });

document.querySelectorAll('.file-upload input[type="file"]').forEach(input => {
    input.addEventListener('change', function() {
        const file = this.files[0];
        const previewText = this.previousElementSibling;  // Menampilkan nama file di <p> sebelumnya
        const previewDiv = this.closest('.input-group').querySelector('.file-preview');  // Untuk menampilkan preview gambar

        // Hapus preview lama jika ada
        previewDiv.innerHTML = '';

        if (file) {
            // Menampilkan nama file di <p> sebelumnya
            previewText.textContent = file.name;

            // Jika file adalah gambar, tampilkan preview gambar
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100px';  // Ukuran gambar sesuai kebutuhan
                    img.style.height = 'auto';
                    previewDiv.appendChild(img);
                };
                reader.readAsDataURL(file);  // Membaca file gambar sebagai data URL
            }
        }
    });
});
