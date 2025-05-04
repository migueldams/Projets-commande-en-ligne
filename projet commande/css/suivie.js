let currentStep = 3; // 0-based index, starts at step 4 (Order in Progress)

function updateSteps() {
  const steps = document.querySelectorAll('.step');
  steps.forEach((step, index) => {
    if (index <= currentStep) {
      step.classList.add('active');
    } else {
      step.classList.remove('active');
    }
  });

  document.querySelector('button[onclick="prevStep()"]').disabled = currentStep === 0;
  document.querySelector('button[onclick="nextStep()"]').disabled = currentStep === steps.length - 1;
}

function nextStep() {
  const steps = document.querySelectorAll('.step');
  if (currentStep < steps.length - 1) {
    currentStep++;
    updateSteps();
  }
}

function prevStep() {
  if (currentStep > 0) {
    currentStep--;
    updateSteps();
  }
}

window.onload = updateSteps;