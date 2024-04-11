<?php
// Array of ISO/IEC 27001 Annex A controls
$controls = array(
    "A.5 Information Security Policies",
    "A.6 Organization of Information Security",
    "A.7 Human Resource Security",
    "A.8 Asset Management",
    "A.9 Access Control",
    "A.10 Cryptography",
    "A.11 Physical and Environmental Security",
    "A.12 Operations Security",
    "A.13 Communications Security",
    "A.14 System Acquisition, Development, and Maintenance",
    "A.15 Supplier Relationships",
    "A.16 Information Security Incident Management",
    "A.17 Information Security Continuity",
    // Add more controls as needed
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ISO/IEC 27001 Controls List</title>
    <style>
        /* Style for the controls list */
        .controls-list ul {
            list-style-type: none; /* Remove default markers */
            padding-left: 0; /* Remove default padding */
        }

        .controls-list li::before {
            content: "\2192"; /* Right arrow symbol */
            margin-right: 10px; /* Space between arrow and text */
            font-size: 20px; /* Larger font size for arrows */
        }

        .controls-list li {
            font-size: 18px; /* Larger font size for list items */
            margin-bottom: 10px; /* Space between list items */
        }
    </style>
</head>
<body>
    <h2>ISO/IEC 27001 Annex A Controls</h2>
    <div class="controls-list">
        <ul>
            <?php
            // Loop through the controls array to display each control with an arrow as a list item
            foreach ($controls as $control) {
                echo "<li>$control</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
