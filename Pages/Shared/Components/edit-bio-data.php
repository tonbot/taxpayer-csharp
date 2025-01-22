  <!-- biodata start-->
  <div class="tab-pane fade show active bg-white py-4 " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

      <div class="d-flex justify-content-between">
          <!-- <h5>Personal Details</h5> -->
      </div>
      <div class="line"></div>
      <!-- <div class="alert alert-warning text-center">
          <p>Please ensure that you provide accurate and complete personal information.</p>
      </div> -->
      <form class="py-4 app-container" id="biodataForm">

          <h5 class="text-left pb-4">Personal Information</h5>

          <div class="form-group mb-5">
              <label for="appId">Application Number</label>
              <input type="number" value="<?= $tccdata['application_number'] ?? '' ?>" class="form-control" id="appId" name="appId" placeholder="" readonly>
          </div>

          <div class="form-group mb-5">
              <label for="taxId">Tax ID (EKTIN)</label>
              <input type="number" value="<?= $tccdata['taxId'] ?? '' ?>" class="form-control" id="taxId" name="taxId" placeholder="" readonly>
          </div>

          <div class="form-group mb-5">
              <label for="fname">First Name <em>*</em></label>
              <input type="text" value="<?= $tccdata['first_name'] ?? '' ?>" class="form-control" id="first_name" name="first_name" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="lname">Last Name <em>*</em></label>
              <input type="text" value="<?= $tccdata['last_name'] ?? '' ?>" class="form-control" id="last_name" name="last_name" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="mname">Middle Name</label>
              <input type="text" value="<?= $tccdata['middle_name'] ?? '' ?>" class="form-control" id="middle_name" name="middle_name" placeholder="" readonly>
          </div>

          <div class="form-group mb-5">
              <label for="phone">Phone Number <em>*</em></label>
              <input type="number" value="<?= $tccdata['phone'] ?? '' ?>" class="form-control" id="phone" name="phone" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="email">Email <em>*</em></label>
              <input type="email" value="<?= $tccdata['email'] ?? '' ?>" class="form-control" id="email" name="email" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="taxStation">Tax Stations <em>*</em></label>
              <select class="form-control mb-5 select-2" id="taxStation" name="taxStation" required readonly>
                  <option value="<?= $tccdata['taxStation_id'] ?? '' ?>"><?= $tccdata['station_name'] ?? '' ?></option>
              </select>
          </div>

          <div class="form-group mb-5">
              <label for="btype">Source Of Income <em>*</em></label>
              <input type="text" value="<?= $tccdata['business_type'] ?? '' ?>" class="form-control" id="business_type" name="business_type" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="cname">Company/Business Name <em>*</em></label>
              <input type="text" value="<?= $tccdata['business_name'] ?? ''?>" class="form-control" id="business_name" name="business_name" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="cadres">Company/Business Address <em>*</em></label>
              <input type="text" value="<?= $tccdata['business_address'] ?? ''  ?>" class="form-control" id="business_address" name="business_address" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="nin">NIN</label>
              <input type="number" value="<?= $tccdata['nin'] ?? '' ?>" class="form-control" id="nin" name="nin" placeholder="" readonly>
          </div>

          <div class="form-group mb-5">
              <label for="bvn">BVN or International Passport No</label>
              <input type="number" value="<?= $tccdata['bvn'] ?? '' ?>" class="form-control" id="bvn" name="bvn" placeholder="" readonly>
          </div>

          <div class="form-group mb-5">
              <label for="adres">Home Address <em>*</em></label>
              <input type="text" value="<?= $tccdata['home_address'] ?? '' ?>" class="form-control" id="home_address" name="home_address" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="purpose">TCC Purpose</label>
              <textarea class="form-control" id="purpose" name="purpose" rows="4" placeholder="" readonly><?= $tccdata['tcc_purpose'] ?? '' ?></textarea>
          </div>
<!-- 
          <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-success px-5 mt-3 p-2" onclick="validateForm('biodataForm')">Next</button>
          </div> -->

      </form>


  </div>