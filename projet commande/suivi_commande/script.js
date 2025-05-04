
const progress = document.getElementById('progress');
const 
steps = document.querySelectorAll('.step');
const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');

let currentStep = 2;

nextBtn.addEventListener('click', () => {
  currentStep++;
  if (currentStep > steps.length) currentStep = steps.length;
  updateProgress();
});

prevBtn.addEventListener('click', () => {
  currentStep--;
  if (currentStep < 2) currentStep = 1;
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

  const progressWidth = ((currentStep ) / (steps.length )) * 100;
  progress.style.width = `${progressWidth}%`;

  prevBtn.disabled = currentStep === 2;
  nextBtn.disabled = currentStep === steps.length;
}
