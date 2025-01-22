  <!-- biodata start-->
  <div class="tab-pane fade show active bg-white py-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

      <div class="d-flex justify-content-between">
          <!-- <h5>Personal Details</h5> -->
      </div>
      <div class="line"></div>
      <form class="py-4 app-container" id="biodataForm">

          <div class="form-group mb-5">
              <label for="taxId">Tax ID(EKTIN) </label>
              <input value="<?= $_SESSION['tax_id'] ?? '' ?>" type="number" class="form-control" id="taxId" name="taxId" placeholder="" readonly>
              <small id="fullname" class="form-text text-muted"></small>
          </div>

          <div class="form-group mb-5">
              <label for="fname">First Name <em>*</em></label>
              <input value="<?= $_SESSION['fname'] ?? '' ?>" type="text" class="form-control" id="first_name" name="first_name" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="lname">Last Name <em>*</em></label>
              <input value="<?= $_SESSION['lname'] ?? '' ?>" type="text" class="form-control" id="last_name" name="last_name" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="mname">Middle Name</label>
              <input value="<?= $_SESSION['mname'] ?? '' ?>" type="text" class="form-control" id="middle_name" name="middle_name" placeholder="" readonly>
          </div>

          <div class="form-group mb-5">
              <label for="phone">Phone Number <em>*</em></label>
              <input value="<?= $_SESSION['phone'] ?? '' ?>" type="number" class="form-control" id="phone" name="phone" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="email">Email <em>*</em></label>
              <input value="<?= $_SESSION['email'] ?? '' ?>" type="email" class="form-control" id="email" name="email" placeholder="" required readonly>
          </div>

          <div class="form-group mb-5">
              <label for="taxStation">Tax Stations <em>*</em></label>
              <select class="form-control mb-5 select-2" id="taxStation" name="taxStation" required>
                  <option value=""></option>
                  <?php foreach ($stations as $station) : ?>
                      <option value="<?= $station['id'] ?>"><?= $station['station_name'] ?></option>
                  <?php endforeach; ?>
              </select>
          </div>

          <div class="form-group mb-5">
              <label for="adres">Home Address <em>*</em></label>
              <input type="text" class="form-control" id="home_address" name="home_address" placeholder="" required>
          </div>

          <div class="form-group mb-5">
              <label for="btype">Source Of Income <em>*</em></label>
              <input type="text" class="form-control" id="business_type" name="business_type" placeholder="" required>
          </div>

          <div class="form-group mb-5">
              <label for="cname">Company/Business Name</label>
              <input type="text" class="form-control" id="business_name" name="business_name" placeholder="" >
          </div>

          <div class="form-group mb-5">
              <label for="cadres">Company/Business Address </label>
              <input type="text" class="form-control" id="business_address" name="business_address" placeholder="" >
          </div>

          <div class="form-group mb-5">
              <label for="nin">NIN <em>*</em></label>
              <input value="<?= $_SESSION['nin'] ?? '' ?>" type="number" class="form-control" id="nin" name="nin" placeholder="" required>
          </div>

          <div class="form-group mb-5">
              <label for="bvn">BVN or International Passport No</label>
              <input type="number" class="form-control" id="bvn" name="bvn" placeholder="">
          </div>

      

          <div class="form-group mb-5">
              <label for="purpose">TCC Purpose <em>*</em></label>
              <textarea class="form-control" id="purpose" name="purpose" rows="4" placeholder="" required></textarea>
          </div>


          <div class="d-flex justify-content-center">
              <button type="button" class="btn btn-success px-5 mt-3 p-2" onclick="validateTccForm('biodataForm')">Next</button>
          </div>
      </form>

  </div>