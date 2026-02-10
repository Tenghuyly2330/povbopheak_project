
document.addEventListener("DOMContentLoaded", function () {

  /* ======================
     SELECT2 (Safe Initialize)
  ======================= */
  if ($(".size-color").length) {
      $(".size-color").select2();
  }

  /* ======================
     REMOVE POST (Safe)
  ======================= */
  $(document).on("click", ".remove-post-key", function () {
      let id = $(this).data("id") || $(this).attr("data-value");
      if (id && $("#remove_id").length) {
          $("#remove_id").val(id);
      }
  });

  /* ======================
     READ MORE / LESS (Safe)
  ======================= */
  document.querySelectorAll(".toggle-text").forEach(function (btn) {
      btn.addEventListener("click", function () {
          let td = this.closest("td");
          if (!td) return;

          let shortText = td.querySelector(".short-text");
          let fullText = td.querySelector(".full-text");

          if (shortText && fullText) {
              shortText.classList.toggle("d-none");
              fullText.classList.toggle("d-none");
          }

          this.textContent = this.textContent === "Read more" ? "Read less" : "Read more";
      });
  });

  /* ======================
     IMAGE PREVIEW (Safe)
  ======================= */
  const inputFile1 = document.getElementById("profileFile");
  const previewImage1 = document.getElementById("previewImage");
  const uploadPlaceholder1 = document.getElementById("uploadPlaceholder");

  if (inputFile1 && previewImage1 && uploadPlaceholder1) {
      inputFile1.addEventListener("change", function () {
          const file = this.files[0];
          if (!file) return;

          const reader = new FileReader();
          reader.onload = function (e) {
              previewImage1.src = e.target.result;
              previewImage1.classList.remove("hidden");
              uploadPlaceholder1.classList.add("hidden");
          };
          reader.readAsDataURL(file);
      });
  }

  /* ======================
     MULTIPLE UPLOAD PREVIEW (Safe)
  ======================= */
  document.querySelectorAll('.uploader').forEach(uploader => {
      const inputFile = uploader.querySelector("input[type='file']");
      const previewImage = uploader.querySelector(".preview-image");
      const placeholder = uploader.querySelector(".upload-placeholder");
      const resetBtn = uploader.querySelector(".reset-btn");

      if (!inputFile || !previewImage) return;

      // Save old image
      previewImage.dataset.old = previewImage.src || "";

      inputFile.addEventListener("change", function () {
          const file = this.files[0];
          if (!file) return;

          const reader = new FileReader();
          reader.onload = function (e) {
              previewImage.src = e.target.result;
              previewImage.classList.remove("hidden");
              if (placeholder) placeholder.classList.add("hidden");
              if (resetBtn) resetBtn.classList.remove("hidden");
          };
          reader.readAsDataURL(file);
      });

      if (resetBtn) {
          resetBtn.addEventListener("click", function (e) {
              e.preventDefault();
              inputFile.value = "";

              const old = previewImage.dataset.old;

              if (old) {
                  previewImage.src = old;
                  previewImage.classList.remove("hidden");
                  if (placeholder) placeholder.classList.add("hidden");
              } else {
                  previewImage.src = "";
                  previewImage.classList.add("hidden");
                  if (placeholder) placeholder.classList.remove("hidden");
                  resetBtn.classList.add("hidden");
              }
          });
      }
  });

  /* ======================
     CKEditor (Safe)
  ======================= */
  let editorEl = document.querySelector("#content_kh");
  if (editorEl) {
      ClassicEditor.create(editorEl, {
          toolbar: [
            'undo', 'redo', '|',
            'heading', '|',
            'bold', 'italic', 'underline', 'strikethrough', '|',
            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
            'alignment', '|',
            'bulletedList', 'numberedList', 'blockQuote', '|',
            'link', 'insertTable', 'imageUpload'
          ],
          fontSize: {
            options: ['tiny', 'small', 'default', 'big', 'huge']
          }
      }).catch(console.error);
  }

});






















// $(document).ready(function () {

//   //Category Select 2
//   $('.size-color').select2();

//   //Append Value for remove post
//   $('.remove-post-key').click(function () {
//     var postId = $(this).attr('data-value');
//     $('.remove-val').val(postId);
//   })

// });
// // Button click to remove
// $(document).ready(function () {
//   $('.remove-post-key').click(function () {
//     var postId = $(this).data('id'); // <-- correct
//     $('#remove_id').val(postId); // set into hidden input
//   });
// });
// // click show more 
// // $(document).on("click", ".toggle-text", function () {
// //     let td = $(this).closest("td");
// //     td.find(".short-text, .full-text").toggleClass("d-none");
// //     $(this).text($(this).text() === "Read more" ? "Show less" : "Read more");
// // });
// document.addEventListener("DOMContentLoaded", function () {
//   document.querySelectorAll(".toggle-text").forEach(function (btn) {
//     btn.addEventListener("click", function () {
//       let td = this.closest("td");
//       td.querySelector(".short-text").classList.toggle("d-none");
//       td.querySelector(".full-text").classList.toggle("d-none");
//       this.textContent = this.textContent === "Read more" ? "Read less" : "Read more";
//     });
//   });
// });
// // Show preview image when uplaod image
// const inputFile1 = document.getElementById("profileFile");
// const previewImage1 = document.getElementById("previewImage");
// const uploadPlaceholder1 = document.getElementById("uploadPlaceholder");

// inputFile1.addEventListener("change", function () {
//   const file = this.files[0];
//   if (file) {
//     const reader = new FileReader();
//     reader.onload = function (e) {
//       previewImage1.src = e.target.result;
//       previewImage1.classList.remove("hidden");
//       uploadPlaceholder.classList.add("hidden");
//     };
//     reader.readAsDataURL(file);
//   }
// });
// /// Preview Update
// document.addEventListener('DOMContentLoaded', function () {
//   document.querySelectorAll('.uploader').forEach(uploader => {
//     const inputFile = uploader.querySelector("input[type='file']");
//     const previewImage = uploader.querySelector(".preview-image");
//     const placeholder = uploader.querySelector(".upload-placeholder");
//     const resetBtn = uploader.querySelector(".reset-btn");

//     // store old src (for update case)
//     if (previewImage && previewImage.src) {
//       previewImage.dataset.old = previewImage.src || '';
//       // if there was an old image shown server-side, ensure placeholder hidden
//       if (previewImage.dataset.old && !previewImage.classList.contains('hidden')) {
//         if (placeholder) placeholder.classList.add('hidden');
//         if (resetBtn) resetBtn.classList.remove('hidden');
//       }
//     }

//     if (!inputFile) return; // safety

//     inputFile.addEventListener('change', function () {
//       const file = this.files && this.files[0];
//       if (!file) return;

//       const reader = new FileReader();
//       reader.onload = function (e) {
//         if (previewImage) {
//           previewImage.src = e.target.result;
//           previewImage.classList.remove('hidden');
//         }
//         if (placeholder) placeholder.classList.add('hidden');
//         if (resetBtn) resetBtn.classList.remove('hidden');
//       };
//       reader.readAsDataURL(file);
//     });

//     if (resetBtn) {
//       resetBtn.addEventListener('click', function (ev) {
//         ev.preventDefault();
//         // Clear file selection
//         if (inputFile) inputFile.value = '';

//         const oldSrc = previewImage ? previewImage.dataset.old || '' : '';

//         if (oldSrc) {
//           // restore old image (update form)
//           previewImage.src = oldSrc;
//           previewImage.classList.remove('hidden');
//           if (placeholder) placeholder.classList.add('hidden');
//           // keep reset visible (user may still want to clear)
//         } else {
//           // no old image => clear preview and show placeholder
//           if (previewImage) {
//             previewImage.src = '';
//             previewImage.classList.add('hidden');
//           }
//           if (placeholder) placeholder.classList.remove('hidden');
//           resetBtn.classList.add('hidden');
//         }
//       });
//     }
//   });
// });

// // Ck Editor

// // {{-- CK Editor --}}
// ClassicEditor.create(document.querySelector('#content_kh'), {
//   toolbar: [
//     'undo', 'redo', '|',
//     'heading', '|',
//     'bold', 'italic', 'underline', 'strikethrough', '|',
//     'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
//     'alignment', '|',
//     'bulletedList', 'numberedList', 'blockQuote', '|',
//     'link', 'insertTable', 'imageUpload'
//   ],
//   fontSize: {
//     options: ['tiny', 'small', 'default', 'big', 'huge']
//   },
//   fontFamily: {
//     options: [
//       'default',
//       'Arial, Helvetica, sans-serif',
//       'Courier New, Courier, monospace',
//       'Georgia, serif',
//       'Lucida Sans Unicode, Lucida Grande, sans-serif',
//       'Tahoma, Geneva, sans-serif',
//       'Times New Roman, Times, serif',
//       'Trebuchet MS, Helvetica, sans-serif',
//       'Verdana, Geneva, sans-serif'
//     ]
//   }
// }).catch(console.error);
