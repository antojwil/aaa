<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
   exit; // Make sure to exit after redirecting
}

// Retrieve user information from the session
$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Risk Management System</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        /* Add this style to remove white border */
        .wrapper {
            border: none; /* Remove border */
        }
        /* Style for the review table */
        #review-table {
            width: 100%;
            border-collapse: collapse;
        }
        #review-table th, #review-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        #review-table th {
            background-color: #f2f2f2;
        }
        /* Hide review table initially */
        #review-container {
            display: none;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>Risk Management System</h2>
        <ul>
            <li><a href="dashboard.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="#"><i class="fas fa-bahai"></i>Overview</a></li>
            <li><a href="#" onclick="openForm()"><i class="fas fa-asterisk"></i>Risk Management</a></li>
            <li><a href="#"><i class="fas fa-project-diagram"></i>ISO 27001 Controls</a></li>
            <li><a href="#" onclick="loadCurrentRiskTrends()"><i class="fas fa-atom"></i>Current risk trends</a></li>
            <li><a href="#" onclick="viewSubmittedRisks()"><i class="fab fa-expeditedssl"></i> Submitted Risks</a></li>
            <li><a href="#" onclick="loadPlanMitigation()"><i class="fas fa-tasks"></i> View Mitigation</a></li>
            <li><a href="#" onclick="loadReview()"><i class="fas fa-star"></i> Review</a></li> <!-- New "Review" link -->
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
        </ul> 
    </div>
    <div class="main_content" id="main_content">
        <div class="header">
            <div>Welcome, <?php echo isset($user["full_name"]) ? $user["full_name"] : ""; ?></div>
            <!-- Other header content -->
        </div>  
        <div class="info" id="form-container">
            <!-- Form content will be loaded here -->
        </div>
        <div class="info" id="submitted-risks-container" style="display:none;">
            <!-- Submitted risks content will be loaded here -->
        </div>
        <div class="info" id="plan-mitigation-container" style="display:none;">
            <!-- Plan mitigation content will be loaded here -->
        </div>
        <div class="info" id="approved-mitigation-container" style="display:none;">
            <!-- Approved mitigation plans content will be loaded here -->
        </div>
        <div id="review-container">
            <!-- Review table container -->
            <div id="review-content">
                <!-- Review table content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle opening/closing the form and loading content
    function openForm() {
        // Load form content using jQuery
        $("#form-container").load("form.php");
        // Display the form container
        document.getElementById("form-container").style.display = "block";
        // Hide other containers if visible
        hideOtherContainers("form-container");
    }

    // JavaScript to handle opening/closing the submitted risks
    function viewSubmittedRisks() {
        // Load submitted risks content using jQuery
        $("#submitted-risks-container").load("view-submitted-risks.php");
        // Display the submitted risks container
        document.getElementById("submitted-risks-container").style.display = "block";
        // Hide other containers if visible
        hideOtherContainers("submitted-risks-container");
    }

    // JavaScript function to load approved mitigation
    function loadPlanMitigation() {
        // Load approved mitigation content using jQuery
        $("#plan-mitigation-container").load("view-mitigation.php");
        // Display the plan mitigation container
        document.getElementById("plan-mitigation-container").style.display = "block";
        // Hide other containers if visible
        hideOtherContainers("plan-mitigation-container");
    }

    function loadCurrentRiskTrends() {
        // Load current risk trends content using jQuery
        $("#form-container").load("current-risk-trends.php");
        // Hide submitted risks, plan mitigation, and approved mitigation containers if visible
        document.getElementById("submitted-risks-container").style.display = "none";
        document.getElementById("plan-mitigation-container").style.display = "none";
        document.getElementById("approved-mitigation-container").style.display = "none";
        // Display the form container
        document.getElementById("form-container").style.display = "block";
    
    }

    // Function to load the review table content
    function loadReview() {
        // Show the review container and hide other content
        document.getElementById("review-container").style.display = "block";
        hideOtherContainers("review-container");

        // Load dynamic data into the review table
        $("#review-content").load("fetch-review.php");
    }

    // Function to hide other containers except the specified one
    function hideOtherContainers(exceptContainerId) {
        var containers = document.querySelectorAll(".info, #review-container");
        containers.forEach(function(container) {
            if (container.id !== exceptContainerId) {
                container.style.display = "none";
            }
        });
    }
</script>

</body>
</html>
