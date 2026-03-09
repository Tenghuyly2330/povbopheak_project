/**
 * UI Modals (Safe)
 */
'use strict';

(function () {

  // YouTube Modal — safe check
  const youTubeModal = document.querySelector('#youTubeModal');
  if (youTubeModal) {
    const youTubeModalVideo = youTubeModal.querySelector('iframe');

    youTubeModal.addEventListener('hidden.bs.modal', function () {
      if (youTubeModalVideo) {
        youTubeModalVideo.setAttribute('src', '');
      }
    });
  }

  // Autoplay YouTube when modal opens — safe check
  const autoPlayYouTubeModal = function () {
    const modalTriggerList = document.querySelectorAll('[data-bs-toggle="modal"]');

    modalTriggerList.forEach(function (triggerEl) {
      triggerEl.addEventListener("click", function () {
        const modalTarget = this.getAttribute('data-bs-target');
        const videoSRC = this.getAttribute('data-theVideo');
        if (!modalTarget || !videoSRC) return;

        const modalVideo = document.querySelector(`${modalTarget} iframe`);
        if (modalVideo) {
          modalVideo.src = `${videoSRC}?autoplay=1`;
        }
      });
    });
  };

  autoPlayYouTubeModal();

})();















// /**
//  * UI Modals
//  */

// 'use strict';

// (function () {
//   // On hiding modal, remove iframe video/audio to stop playing
//   const youTubeModal = document.querySelector('#youTubeModal'),
//     youTubeModalVideo = youTubeModal.querySelector('iframe');
//   youTubeModal.addEventListener('hidden.bs.modal', function () {
//     youTubeModalVideo.setAttribute('src', '');
//   });

//   // Function to get and auto play youTube video
//   const autoPlayYouTubeModal = function () {
//     const modalTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="modal"]'));
//     modalTriggerList.map(function (modalTriggerEl) {
//       modalTriggerEl.onclick = function () {
//         const theModal = this.getAttribute('data-bs-target'),
//           videoSRC = this.getAttribute('data-theVideo'),
//           videoSRCauto = `${videoSRC}?autoplay=1`,
//           modalVideo = document.querySelector(`${theModal} iframe`);
//         if (modalVideo) {
//           modalVideo.setAttribute('src', videoSRCauto);
//         }
//       };
//     });
//   };

//   // Calling function on load
//   autoPlayYouTubeModal();
// })();

