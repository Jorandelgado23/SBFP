<?php
   include'user_topNav.php';
   ?>
<div class="col-lg-12 grid-margin stretch-card py-4 px-0">
   <div class="card">
      <div class="card-body">
         <div class="mb-3 p-2">
            <div class="d-flex justify-content-between align-items-center mb-0">
               <h4 class="card-title">Student Nutritional Status List <span>Kindergarten</span></h4>
               <p class="card-description mb-0">School Year: <code>2024-2025</code></p>
            </div>
            <div class="d-flex justify-content-between align-items-center">
               <div class="form-group">
                  <label>Section: </label>
                  <select class="js-example-basic-single w-100">
                     <option value="AL">Alabama</option>
                     <option value="WY">Wyoming</option>
                     <option value="AM">America</option>
                     <option value="CA">Canada</option>
                     <option value="RU">Russia</option>
                  </select>
               </div>
               <p class="card-description pb-4">Date of Weighing: <code>12-10-2024</code></p>
            </div>
         </div>
         <div class="d-sm-flex align-items-center justify-content-between border-bottom pt-2 pb-3">
            <ul class="nav nav-tabs" role="tablist">
               <li class="nav-item">
                  <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="false">+ New</a>
               </li>
               <!-- <li class="nav-item">
                  <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">SNS List</a>
               </li> -->
               <!-- <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">SNS Summary</a>
               </li> -->
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="snsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  SNS History
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="snsDropdown">
                     <li><a class="dropdown-item" href="#sns-list" role="tab" aria-selected="false">SNS List</a></li>
                     <li><a class="dropdown-item" href="#sns-summary" role="tab" aria-selected="false">SNS Summary</a></li>
                  </ul>
               </li>
            </ul>
            <div>
               <div class="btn-wrapper">
                  <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Download</a>
               </div>
            </div>
         </div>
         <div class="table-responsive pt-3">
            <table class="table table-bordered table-striped">
               <thead>
                  <tr>
                     <th> # </th>
                     <th> Name </th>
                     <th> Birthday(dd/mm/yy) </th>
                     <th> Weight(kg) </th>
                     <th> Height(meters) </th>
                     <th> Sex </th>
                     <th> Height2(m2) </th>
                     <th> Age(y,m) </th>
                     <th> BMI </th>
                     <th> Nutritional Status </th>
                     <th> Height-for-Age </th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php include'user_botNav.php';
   ?>