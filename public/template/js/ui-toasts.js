'use strict';

(function () {
  const toastPlacementExample = document.querySelector('.toast-placement-ex');
  const showToastPlacementBtn = document.querySelector('#showToastPlacement');
  let toastPlacement;

  function successToast(message) {
    showToast('toast-success', 'Sucesso!', message);
  }

  function errorToast(message) {
    showToast('toast-error', 'Erro!', message);
  }

  function showToast(toastClass, title, message) {
    
    if (toastPlacement) {
      toastDispose(toastPlacement);
    }

    toastPlacementExample.classList.add(toastClass);

    const titleElement = toastPlacementExample.querySelector('.fw-semibold');
    if (titleElement) {
      titleElement.textContent = title;
    }

    const messageElement = toastPlacementExample.querySelector('#messageToast');
    if (messageElement) {
      messageElement.textContent = message;
    }

    toastPlacement = new bootstrap.Toast(toastPlacementExample);
    toastPlacement.show();
  }

  function toastDispose(toast) {
    if (toast && toast._element !== null) {
      toast.dispose();
    }
  }

  if (showToastPlacementBtn) {
    showToastPlacementBtn.onclick = function () {
      successToast('Mensagem de sucesso aqui.'); 
    };

    const showErrorToastBtn = document.querySelector('#showErrorToast');
    if (showErrorToastBtn) {
      showErrorToastBtn.onclick = function () {
        errorToast('Mensagem de erro aqui.');
      };
    }
  }
})();