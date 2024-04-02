<?php
// Controler (MVC)
require_once('./db.php');

$db = new Database();

if (isset($_POST['action']) && $_POST['action'] == "view") {

    $output = '';
    $data = $db->read();

    // print_r($data);

    if ($db->totalRowCount() > 0) {
        $output .= '<table class="table table-striped table-sm table-bordered ">
        <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">First Name</th>
                <th class="text-center">Last Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>';

        foreach ($data as $row) {

            // echo var_dump($row);

            $output .= '<tr class=" text-center">
            <td class="text-center">' . $row['id'] . '</td>
            <td>' . $row['first_name'] . '</td>
            <td>' . $row['last_name'] . '</td>
            <td>' . $row['email'] . '</td>
            <td class="text-center">' . $row['phone'] . '</td>
            <td class="d-flex align-items-center justify-content-center gap-3">
                <a href="#" title="View Details" class=" text-success "><i class="fa-solid fa-circle-info"></i></a>
                <a href="#" title="Edit Details" class=" text-primary "><i class="fa-solid fa-pen-to-square"></i></a>
                <a href="#" title="Delete Detail" class=" text-danger "><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>';
        }

        $output .= '</tbody></table>';

        echo $output;
    } else {

        echo '<h3 class=" text-center text-secondary ">:( No any user present in the database!</h3>';
    }
}
