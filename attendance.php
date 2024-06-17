<div class="content"> <?php include('base.php'); ?> </div>



<main role="main" class="main-content">

    <div class="col-md-12 my-4">
        <h2 class="h4 mb-1">Attendance & Meal Monitoring</h2>
        <p>Choose School</p>
        <div class="form-group col-2 p-0">
            <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref">Status</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                <option selected>Choose...</option>
                <option value="1">Processing</option>
                <option value="2">Success</option>
                <option value="3">Pending</option>
                <option value="3">Hold</option>
            </select>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <div class="toolbar row mb-3">
                    <div class="col">

                    </div>
                    <div class="col ml-auto">
                        <div class="dropdown float-right">
                            <button class="btn btn-primary float-right ml-3" type="button">Add more +</button>
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                            <div class="dropdown-menu" aria-labelledby="actionMenuButton">
                                <a class="dropdown-item" href="#">Export</a>
                                <a class="dropdown-item" href="#">Delete</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- table -->
                <table class="table table-bordered">
                    <thead>
                        <tr role="row">
                            <th colspan="2" rowspan="2">ID</th>
                            <th colspan="20">Actual Feeding</th>
                        </tr>
                        <tr role="row">
                            <?php
                            // Retrieve current page number from URL parameter or default to 1
                            $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
                            
                            // Calculate starting and ending indices for the table
                            $itemsPerPage = 20; // Number of items per page
                            $startIndex = ($currentPage - 1) * $itemsPerPage + 1;
                            $endIndex = min($startIndex + $itemsPerPage - 1, 120);
                            
                            // Print table headers for the current page
                            for ($i = $startIndex; $i <= $endIndex; $i++) {
                                echo '<th>' . $i . '</th>';
                            }
                            ?>
                        </tr>
                    </thead>

                    <tbody>
                    <tr role="row">
                        <th>✔️</th>
                        <th>ID nung student</th>                  
                         <?php
                            // Print empty cells for the current page
                            for ($i = $startIndex; $i <= $endIndex; $i++) {
                                echo '<th></th>';
                            }
                            ?>
                    </tr>
                    </tbody>
                </table>
                <!-- Pagination -->
                <nav aria-label="Table Paging" class="mb-0 text-muted">
                    <ul class="pagination justify-content-end mb-0">
                        <?php
                        // Print Previous link
                        if ($currentPage > 1) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
                        } else {
                            echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                        }
                        
                        // Print numbered page links
                        for ($i = 1; $i <= ceil(120 / $itemsPerPage); $i++) {
                            echo '<li class="page-item' . ($i === $currentPage ? ' active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }
                        
                        // Print Next link
                        if ($currentPage < ceil(120 / $itemsPerPage)) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
                        } else {
                            echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div> <!-- simple table -->
</main>
