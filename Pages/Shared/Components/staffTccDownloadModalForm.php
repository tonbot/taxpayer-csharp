<div class="row mb-4 px-4 bg-white">
    <div class="col app-container">
        <div class="">
            <h5 class="" id="uploadModalLabel">Paye Tcc Download form</h5>
        </div>
        <!-- Modal Body -->
        <div class="">
            <div class="alert alert-dark text-center mb-3">
                <i class="fa fa-info-circle fa-1x" aria-hidden="true"></i>
                Kindly note that you must have completed the annual returns for the three previous years for your TCC to be processed. Failure to meet this requirement will result in rejection.
            </div>

            <form id="payeTccDownloadForm" enctype="multipart/form-data">
                <!-- phone Input -->
                <div class="mb-3 form-group d-none">
                    <label for="appId" class="form-label fw-bold">Application Number</label>
                    <input
                        type="hidden"
                        id="appId"
                        name="appId"
                        class="form-control"
                        placeholder=""
                        value="<?= $_GET['appId'] ?? 0 ?>"
                        readonly
                        required>
                </div>
                <!-- Email Input -->
                <div class="mb-3 d-none">
                    <label for="applicationYear" class=" fw-bold ml-3">Application Year</label>
                    <input
                        type="hidden"
                        id="applicationYear"
                        name="applicationYear"
                        class="form-control"
                        value="<?= $_GET['appYear'] ?? 0 ?>"
                        readonly
                        placeholder=""
                        required>
                </div>
                <!-- Email Input -->
                <div class="mb-3 d-none">
                    <label for="org_taxId" class="form-label fw-bold">Organization TIN</label>
                    <input
                        type="hidden"
                        id="org_taxId"
                        name="org_taxId"
                        class="form-control"
                        placeholder=""
                        value="<?= $_SESSION['tax_id'] ?? 0 ?>"
                        readonly
                        required>
                </div>
                <!-- Email Input -->
                <div class="mb-3 ">
                    <label for="staff_taxId" class=" fw-bold ml-3">Staff TIN</label>
                    <input
                        type="text"
                        id="staff_taxId"
                        name="staff_taxId"
                        class="form-control"
                        placeholder=""
                        required>
                </div>


                <!-- Submit Button -->
                <div class="d-flex justify-content-center mb-5">
                    <button id="payeTccDownloadBtn" type="button" class="btn custom-btn-primary py-3 d-flex align-items-center">
                        <i class="fa fa-spinner fa-spin d-none me-2" id="loadingSpinner"></i>
                        <span>Download Tcc Now</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>