 <!-- Modal Structure -->
 <div id="uploadModalFormH1" class="modal fade" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
         <div class="modal-content">
             <!-- Modal Header -->
             <div class="modal-header">
                 <h5 class="modal-title" id="uploadModalLabel">Upload FORM H1</h5>
                 <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <!-- Modal Body -->
             <div class="modal-body">
                 <div class="alert alert-dark text-center mb-3"><i class="fa fa-info-circle fa-1x" aria-hidden="true"></i>
                     Please upload your <b>FORM H1</b> as a CSV file. Ensure the file follows the specified format for accurate processing.
                 </div>

                 <form id="FormH1Form" enctype="multipart/form-data">
                     <!-- Year Input -->
                     <div class="mb-3">
                         <label for="year" class="form-label fw-bold">For which year?</label>
                         <input type="number" id="year" name="year" class="form-control" min="2000" max="2100" required>
                     </div>

                     <!-- File Input -->
                     <div class="mb-3">
                         <label for="scheduleTemplate" class="form-label fw-bold">Upload Form H1</label>
                         <input
                             type="file"
                             id="formH1"
                             name="formH1"
                             class="form-control"
                             accept=".csv"
                             required>
                         <div class="form-text">Only .csv files are accepted.</div>
                     </div>

                     <!-- Submit Button -->
                     <div class="d-flex justify-content-center mb-5">
                         <button id='submitFormH1Btn' type="button" class="btn custom-btn-primary py-3 d-flex align-items-center">
                             <i class="fa fa-spinner fa-spin d-none me-2" id="loadingSpinner"></i>
                             <span>Submit Form</span>
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>