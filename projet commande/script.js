
const progress = document.getElementById('progress');
const steps = document.querySelectorAll('.step');
const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');

let currentStep = 1;

nextBtn.addEventListener('click', () => {
  currentStep++;
  if (currentStep > steps.length) currentStep = steps.length;
  updateProgress();
});

prevBtn.addEventListener('click', () => {
  currentStep--;
  if (currentStep < 1) currentStep = 1;
  updateProgress();
});

function updateProgress() {
  steps.forEach((step, index) => {
    if (index < currentStep) {
      step.classList.add('active');
    } else {
      step.classList.remove('active');
    }
  });

  const progressWidth = ((currentStep - 1) / (steps.length - 1)) * 100;
  progress.style.width = `${progressWidth}%`;

  prevBtn.disabled = currentStep === 1;
  nextBtn.disabled = currentStep === steps.length;
}
