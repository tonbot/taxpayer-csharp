 <!-- Modal Structure -->
 <div id="payeTccModal" class="modal fade" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <!-- Modal Header -->
             <div class="modal-header">
                 <h5 class="modal-title" id="uploadModalLabel">Paye Tcc Application</h5>
                 <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <!-- Modal Body -->
             <div class="modal-body">
                 <div class="alert alert-dark text-center mb-3">
                     <i class="fa fa-info-circle fa-1x" aria-hidden="true"></i>
                     Kindly note that you must have completed the annual returns for the three previous years for your TCC to be processed. Failure to meet this requirement will result in rejection.
                 </div>

                 <form id="payeTccRequestForm" enctype="multipart/form-data">
                     <!-- phone Input -->
                     <div class="mb-3">
                         <label for="phone" class="form-label fw-bold">Your Phone Number</label>
                         <input
                             type="tel"
                             id="phone"
                             name="phone"
                             class="form-control"
                             placeholder=""
                             required>
                         <div class="form-text">We will use this phone to contact you regarding your request.</div>
                     </div>
                     <!-- Email Input -->
                     <div class="mb-3">
                         <label for="email" class="form-label fw-bold">Your Email Address</label>
                         <input
                             type="email"
                             id="email"
                             name="email"
                             class="form-control"
                             placeholder=""
                             required>
                         <div class="form-text">We will use this email to contact you regarding your request.</div>
                     </div>

                     <!-- Textarea for Form H1 Details -->
                     <div class="mb-3">
                         <label for="requestNote" class="form-label fw-bold">Write a Request Note</label>
                         <textarea
                             id="requestNote"
                             name="requestNote"
                             class="form-control"
                             rows="6"
                             placeholder=""
                             required></textarea>
                         <div class="form-text">A request note is the note that will.</div>
                     </div>

                     <!-- Submit Button -->
                     <div class="d-flex justify-content-center mb-5">
                         <button id="payeTccRequestBtn" type="button" class="btn custom-btn-primary py-3 d-flex align-items-center">
                             <i class="fa fa-spinner fa-spin d-none me-2" id="loadingSpinner"></i>
                             <span>Submit Form</span>
                         </button>
                     </div>
                 </form>


             </div>
         </div>
     </div>
 </div>