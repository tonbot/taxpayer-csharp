<div class="tab-pane fade show bg-white py-4" id="nav-addPayment" role="tabpanel" aria-labelledby="nav-addPayment-tab" tabindex="0">
    <div class="app-container">
        <h5 class="text-left pb-4">Additional Payment</h5>
        <div class="border border-1 receipt-item" id="receiptContainer">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Direct Assessment</th>
                        <th>Direct Amount</th>
                        <th>Development Levy</th>
                        <th>Development Amount</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="receiptTableBody">
                    <!-- Dynamic rows will be added here -->
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <button class="btn btn-dark shadow-lg py-2" id="addNewPayment" type="button">Add Payment</button>
        </div>

        <div class="modal modal-lg fade" id="additionalPaymentModal" tabindex="-1" aria-labelledby="additionalPaymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="additionalPaymentModalLabel">Additional Payment Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Instructions -->
                        <div class="alert alert-dark">Please fill out the form below. You can choose to enter both the Direct Assessment and Development Levy receipt numbers, or you may fill out just one of the fields. Ensure all required information is entered for the selected option to process your additional payment successfully.</div>

                        <!-- Form Inside Modal -->
                        <form id="additionalPaymentForm">
                            <div class="mb-3">
                                <label for="directAssessment" class="form-label">Direct Assessment</label>
                                <input type="text" class="form-control"
                                    onblur="checkReceipt(this, '#daddDirYearName', '#additionalDirAssAmount', '#daddDirYearPurpose', '#daddDirYearDate', '#daddDirYearerror', '.daddDiryear')" id="additionalDirAssReceiptNo">
                                <small id="daddDirYearerror" class="form-text text-muted"></small>
                                <div class="daddDiryear d-none app-container">
                                    <p>Name: <small id="daddDirYearName" class="form-text text-muted"></small></p>
                                    <p>Amount: <input id="additionalDirAssAmount" class="form-text text-muted input-no-border"></input></p>
                                    <p>Revenue Type: <small id="daddDirYearPurpose" class="form-text text-muted"></small></p>
                                    <p>Payment Date: <small id="daddDirYearDate" class="form-text text-muted"></small></p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="developmentLevy" class="form-label">Development Levy</label>
                                <input type="text" class="form-control"
                                    onblur="checkReceipt(this, '#daddDevYearName', '#additionalDevLevyAmount', '#daddDevYearPurpose', '#daddDevYearDate', '#daddDevYearerror', '.daddDevyear')"
                                    id="additionalDevLevyReceiptNo">
                                <small id="daddDevYearerror" class="form-text text-muted"></small>
                                <div class="daddDevyear d-none app-container">
                                    <p>Name: <small id="daddDevYearName" class="form-text text-muted"></small></p>
                                    <p>Amount: <input id="additionalDevLevyAmount" class="form-text text-muted input-no-border"></input></p>
                                    <p>Revenue Type: <small id="daddDevYearPurpose" class="form-text text-muted"></small></p>
                                    <p>Payment Date: <small id="daddDevYearDate" class="form-text text-muted"></small></p>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">For Year</label>
                                <select id="additionalPaymentYear" name="additionalPaymentYear" class="form-control">
                                    <option value=""></option>
                                    <?php
                                    $currentYear = date('Y');
                                    $years = [
                                        $currentYear - 3,
                                        $currentYear - 2,
                                        $currentYear - 1,
                                    ];
                                    foreach ($years as $year) {
                                        echo "<option value='$year'>$year</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-danger shadow-sm" id="addMorePayment" onclick="addMorePayment() " type="button">Save</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>